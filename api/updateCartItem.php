<?php
session_start();
require_once 'dbinfo.php';

if (isset($_SESSION['user_id']) && isset($_POST['id']) && isset($_POST['change'])) {
    $userId = $_SESSION['user_id'];
    $id = $_POST['id'];
    $change = $_POST['change'];

    $query = "
        UPDATE addtocart
        SET quantity = quantity + ?
        WHERE user_id = ? AND cart_id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii', $change, $userId, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false]);
}
