<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity']; // Default quantity

require_once 'dbinfo.php';

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => $conn->connect_error]));
}

$sql = "INSERT INTO addToCart (user_id, product_id, quantity) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('iii', $user_id, $product_id, $quantity);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add product to cart']);
}

$stmt->close();
$conn->close();
