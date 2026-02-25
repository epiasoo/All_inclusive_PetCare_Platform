<?php
session_start();
include 'dbinfo.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['user_id'];
$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM products WHERE user_id = ?";

if ($query) {
    $sql .= " AND product_name LIKE ?";
    $query = "%" . $query . "%";
}

$stmt = $conn->prepare($sql);
if ($query) {
    $stmt->bind_param("is", $user_id, $query);
} else {
    $stmt->bind_param("i", $user_id);
}
$stmt->execute();
$result = $stmt->get_result();

$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
