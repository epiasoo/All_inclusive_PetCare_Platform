<?php
require_once 'dbinfo.php';

$sql = "SELECT product_name FROM products";

$result = $conn->query($sql);

if ($result) {
    $productNames = [];
    while ($row = $result->fetch_assoc()) {
        $productNames[] = $row['product_name'];
    }

    header('Content-Type: application/json');
    echo json_encode($productNames);
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
