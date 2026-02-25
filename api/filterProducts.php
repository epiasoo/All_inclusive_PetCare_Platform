<?php
include 'dbinfo.php';

$mainCategory = isset($_GET['mainCategory']) ? $_GET['mainCategory'] : '';
$subCategory = isset($_GET['subCategory']) ? $_GET['subCategory'] : '';

$query = "SELECT * FROM products WHERE 1=1";

if (!empty($mainCategory)) {
    $query .= " AND main_category = ?";
}
if (!empty($subCategory)) {
    $query .= " AND sub_category = ?";
}

$stmt = $conn->prepare($query);

$types = '';
$params = [];
if (!empty($mainCategory)) {
    $types .= 's';
    $params[] = $mainCategory;
}
if (!empty($subCategory)) {
    $types .= 's';
    $params[] = $subCategory;
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$products = [];

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($products);
