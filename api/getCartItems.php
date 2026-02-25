<?php
session_start();
require_once 'dbinfo.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $query = "
        SELECT p.product_image, p.product_name, p.product_price, p.stock, c.quantity, c.cart_id
        FROM addtocart c
        JOIN products p ON c.product_id = p.product_id
        WHERE c.user_id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $cartItems = [];
    while ($row = $result->fetch_assoc()) {
        $row['total_price'] = $row['product_price'] * $row['quantity'];
        $cartItems[] = $row;
    }

    echo json_encode($cartItems);
} else {
    echo json_encode([]);
}

$conn->close();
