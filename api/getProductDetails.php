<?php
require_once 'dbinfo.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $query = $conn->prepare("SELECT product_name, product_price, product_description, product_image, stock FROM products WHERE product_id = ?");
    $query->bind_param("i", $product_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        echo json_encode($product);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }

    $query->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
