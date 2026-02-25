<?php
include 'dbinfo.php'; // Your database configuration

$query = "SELECT * FROM pet_services ORDER BY overall_rating DESC LIMIT 6";
$result = $conn->query($query);

$services = array();
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'data' => $services
]);

$conn->close();
