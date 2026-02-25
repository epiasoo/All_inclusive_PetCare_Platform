<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'petShop') {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$user_id = $_SESSION['user_id'];
require_once 'dbinfo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $stock = $_POST['stock'];
    $productDescription = $_POST['product_description'];
    $mainCategory = $_POST['mainCategory'];
    $subCategory = $_POST['subCategory'];

    // Handle file upload
    $targetDir = "../productsUploads/";
    $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
    if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => "Failed to upload image"]);
        exit;
    }

    $query = "INSERT INTO products (user_id, product_image, product_name, product_price, stock, product_description, main_category, sub_category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issdisss", $user_id, $targetFile, $productName, $productPrice, $stock, $productDescription, $mainCategory, $subCategory);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Product added successfully"]);
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => "Failed to add product"]);
    }
}
