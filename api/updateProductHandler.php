<?php
require_once 'dbinfo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $stock = $_POST['stock'];
    $productDescription = $_POST['product_description'];
    $mainCategory = $_POST['mainCategory2'];
    $subCategory = $_POST['subCategory2'];

    // Handle image upload
    $imageUrl = $_POST['current_image_url']; // Default to existing image URL
    if (!empty($_FILES['product_image']['name'])) {
        $targetDir = "../productsUploads/";
        $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
            $imageUrl = $targetFile;
        }
    }

    // Update product in the database
    $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_price = ?, stock = ?, product_description = ?, main_category = ?, sub_category = ?, product_image = ? WHERE product_id = ?");
    $stmt->bind_param("sdissssi", $productName, $productPrice, $stock, $productDescription, $mainCategory, $subCategory, $imageUrl, $productId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product updated successfully";
    } else {
        echo "Failed to update product";
    }
}
