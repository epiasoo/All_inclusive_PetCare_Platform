<?php
require_once 'dbinfo.php';

if (isset($_POST['service_id'])) {
    $serviceId = $_POST['service_id'];

    $stmt = $conn->prepare("SELECT * FROM pet_services WHERE service_id = ?");
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $serviceDetails = array(
            'service_name' => $row['service_name'],
            'service_desc' => $row['service_desc'],
            'service_type' => $row['service_type'],
            'service_phone' => $row['service_phone'],
            'available_spots' => $row['available_spots'],
            'overall_rating' => $row['overall_rating'],
            'service_image' => $row['service_image'],
            'available_services' => $row['available_services'],
            'openingHours' => $row['openingHours'],
            'closingHours' => $row['closingHours'],
            'openingDays' => $row['openingDays'],
        );

        echo json_encode($serviceDetails);
    } else {
        http_response_code(404);
        echo json_encode(array("error" => "Service not found"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("error" => "Missing service_id"));
}

$stmt->close();
$conn->close();
