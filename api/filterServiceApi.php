<?php
require_once 'dbinfo.php';

if (isset($_GET['service'])) {
    $service = $_GET['service'];

    if (!empty($service)) {
        // Use $service in your database query
        $sql = "SELECT * FROM pet_services WHERE service_type = '$service'";
    } else {
        // If service is empty, fetch all services
        $sql = "SELECT * FROM pet_services";
    }
} else {
    // If service parameter is not set, fetch all services
    $sql = "SELECT * FROM pet_services";
}

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$jsonResponse = json_encode($data);

header('Content-Type: application/json');
echo $jsonResponse;

$conn->close();
