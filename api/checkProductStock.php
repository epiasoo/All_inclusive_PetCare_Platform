<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_POST['product_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

require_once 'dbinfo.php';

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => $conn->connect_error]));
}

$sql = "SELECT stock FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    echo json_encode(['stock' => $row['stock']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Product not found']);
}

$stmt->close();
$conn->close();
