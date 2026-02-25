<?php
require_once 'dbinfo.php';

session_start();
$user_id = $_SESSION['user_id']; // Assuming you have the user ID in the session

$sql = "SELECT o.order_id, o.order_date, o.total_price, o.total_products, o.name, o.surname, o.email, o.phone, o.address_line1, o.address_line2, o.state, o.district, o.zip_code, u.username, u.profile 
        FROM `order` o
        JOIN `user_info` u ON o.user_id = u.user_id
        WHERE o.shop_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$customers = array();
while ($row = $result->fetch_assoc()) {
    $row['total_products'] = json_decode($row['total_products'], true);
    $customers[] = $row;
}

echo json_encode($customers);

$stmt->close();
$conn->close();
