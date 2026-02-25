<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_POST['id']) || !isset($_POST['quantity'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit();
}

$userId = $_SESSION['user_id'];
$cartId = $_POST['id'];
$newQuantity = $_POST['quantity'];

require_once 'dbinfo.php';

// Check current quantity in the cart
$query = "SELECT quantity FROM addToCart WHERE user_id = ? AND cart_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $userId, $cartId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['quantity'];

    // Calculate the updated quantity
    $updatedQuantity = $currentQuantity + $newQuantity;

    // Update the cart with the new quantity
    $updateQuery = "UPDATE addToCart SET quantity = ? WHERE user_id = ? AND cart_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("iii", $updatedQuantity, $userId, $cartId);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update cart item']);
    }

    $updateStmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
}

$stmt->close();
$conn->close();
