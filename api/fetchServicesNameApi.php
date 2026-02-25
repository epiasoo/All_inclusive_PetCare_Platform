<?php
require_once 'dbinfo.php';

$sql = "SELECT service_name FROM pet_services";

$result = $conn->query($sql);

if ($result) {
    $serviceNames = [];
    while ($row = $result->fetch_assoc()) {
        $serviceNames[] = $row['service_name'];
    }

    header('Content-Type: application/json');
    echo json_encode($serviceNames);
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
