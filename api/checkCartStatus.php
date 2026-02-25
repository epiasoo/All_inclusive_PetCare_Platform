<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

require_once 'dbinfo.php';

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => $conn->connect_error]));
}

// Use GROUP BY to handle the aggregation correctly
$sql = "
    SELECT cart_id, quantity
    FROM addToCart
    WHERE user_id = ? AND product_id = ?
    GROUP BY cart_id, quantity
";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $user_id, $product_id);

$stmt->execute();
$result = $stmt->get_result();

$cart_id = null;
$current_quantity = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cart_id = $row['cart_id'];
    $current_quantity = $row['quantity'];
}

echo json_encode(['inCart' => $cart_id !== null, 'cart_id' => $cart_id, 'quantity' => $current_quantity]);

$stmt->close();
$conn->close();
