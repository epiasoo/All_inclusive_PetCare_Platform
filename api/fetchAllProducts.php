<?php
// fetchAllProducts.php
include 'dbinfo.php';

// Get the search query from the request
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Build the query with search functionality
$query = "SELECT * FROM products";
if ($search !== '') {
    $query .= " WHERE product_name LIKE '%$search%' OR product_description LIKE '%$search%'";
}

$result = $conn->query($query);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($products);
