<?php
session_start();
include 'dbinfo.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "DELETE FROM addtocart WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cart cleared']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to clear cart']);
}

$stmt->close();
$conn->close();
