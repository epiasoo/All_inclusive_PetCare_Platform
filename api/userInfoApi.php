<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(array('error' => 'User not logged in'));
    exit();
}

require_once 'dbinfo.php';

$user_id = $_SESSION['user_id'];


$stmt = $conn->prepare("SELECT * FROM user_info WHERE user_id = ?");

$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    echo json_encode($user_data);
} else {
    echo json_encode(array('error' => 'User data not found'));
}
$stmt->close();
$conn->close();
