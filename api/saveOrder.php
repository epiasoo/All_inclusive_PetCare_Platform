<?php
session_start();
include 'dbinfo.php';

// Get user ID from session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Get form data
$name = $_POST['name'] ?? '';
$surname = $_POST['surname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address_line1 = $_POST['address_line1'] ?? '';
$address_line2 = $_POST['address_line2'] ?? '';
$country = $_POST['country'] ?? '';
$state = $_POST['state'] ?? '';
$district = $_POST['district'] ?? '';
$zip_code = $_POST['zip_code'] ?? '';
$payment_method = $_POST['payment_method'];
$total_price = $_POST['total_price'] ?? 0.00;
$total_products = $_POST['total_products'] ?? '[]';

$total_products_array = json_decode($total_products, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['success' => false, 'message' => 'Invalid total_products format']));
}

// Extract product names and quantities
$product_quantities = [];
foreach ($total_products_array as $product) {
    preg_match('/(.+)\s*\((\d+)\)/', $product, $matches); // Assuming product string format is 'product_name (quantity)'
    if (!empty($matches[1]) && !empty($matches[2])) {
        $product_name = trim($matches[1]);
        $quantity = intval($matches[2]);
        $product_quantities[$product_name] = $quantity;
    }
}

if (empty($product_quantities)) {
    die(json_encode(['success' => false, 'message' => 'No valid product names or quantities found']));
}

// Fetch product IDs from database
$product_ids = [];
$product_name_to_id = [];
foreach (array_keys($product_quantities) as $product_name) {
    $product_query = "SELECT product_id FROM products WHERE product_name = ?";
    $product_stmt = $conn->prepare($product_query);
    $product_stmt->bind_param('s', $product_name);
    $product_stmt->execute();
    $result = $product_stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $product_id = $row['product_id'];
        $product_ids[] = $product_id;
        $product_name_to_id[$product_name] = $product_id;
    } else {
        die(json_encode(['success' => false, 'message' => 'Product not found: ' . $product_name]));
    }
    $product_stmt->close();
}

if (empty($product_ids)) {
    die(json_encode(['success' => false, 'message' => 'No valid product IDs found']));
}

$shop_id_query = "SELECT user_id FROM products WHERE product_id IN (" . implode(',', $product_ids) . ") LIMIT 1";
$shop_id_result = $conn->query($shop_id_query);
$shop_id_row = $shop_id_result->fetch_assoc();
$shop_id = $shop_id_row['user_id'] ?? 0;

// Insert order data
$stmt = $conn->prepare("INSERT INTO `order` (user_id, shop_id, name, surname, email, phone, address_line1, address_line2, state, district, zip_code, country, payment_method, total_price, total_products) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('iisssssssssssis', $user_id, $shop_id, $name, $surname, $email, $phone, $address_line1, $address_line2, $state, $district, $zip_code, $country, $payment_method, $total_price, $total_products);

if ($stmt->execute()) {
    // Subtract stock
    $update_stock_success = true;
    foreach ($product_quantities as $product_name => $quantity) {
        $product_id = $product_name_to_id[$product_name];
        $update_stock_query = "UPDATE products SET stock = stock - ? WHERE product_id = ? AND stock >= ?";
        $update_stock_stmt = $conn->prepare($update_stock_query);
        $update_stock_stmt->bind_param('iii', $quantity, $product_id, $quantity);

        if (!$update_stock_stmt->execute()) {
            $update_stock_success = false;
            break;
        }
        $update_stock_stmt->close();
    }

    if ($update_stock_success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update product stock']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to place order']);
}

$stmt->close();
$conn->close();
