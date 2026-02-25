<?php
// Include database connection file
include 'dbinfo.php';

session_start();
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

// SQL query to fetch purchase data
$sql = "
    SELECT 
        o.order_id, o.order_date, o.total_price, o.total_products
    FROM 
        `order` o
    WHERE 
        o.user_id = ?
";

// Prepare and execute the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch all data
$purchases = [];
while ($row = $result->fetch_assoc()) {
    // Decode the total_products JSON string into an array
    $row['total_products'] = json_decode($row['total_products']);
    $purchases[] = $row;
}

// Return JSON response
echo json_encode($purchases);
