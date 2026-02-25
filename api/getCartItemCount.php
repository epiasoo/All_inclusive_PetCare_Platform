<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];

    // Include your database connection file
    require_once 'dbinfo.php';

    $query = "SELECT SUM(quantity) as total_quantity FROM addToCart WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return the sum of quantities
    echo json_encode(array("count" => $row['total_quantity'] ?? 0));
} else {
    echo json_encode(array("count" => 0));
}
