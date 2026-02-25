<?php
session_start();
include 'dbinfo.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM pet_services WHERE user_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['error' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param("i", $user_id);

if (!$stmt->execute()) {
    echo json_encode(['error' => 'Failed to execute statement']);
    exit;
}

$result = $stmt->get_result();
$services = [];

while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($services);
