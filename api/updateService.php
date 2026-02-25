<?php
include 'dbinfo.php'; // Include your database connection details

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceId = $_POST['serviceId'];
    $serviceName = $_POST['serviceName'];
    $serviceDesc = $_POST['serviceDescription'];
    $servicePhone = $_POST['servicePhone'];
    $openingHours = $_POST['openingHours'];
    $closingHours = $_POST['closingHours'];
    $openingDays = $_POST['openingDays'];

    $query = "UPDATE pet_services SET 
              service_name=?, 
              service_desc=?, 
              service_phone=?, 
              openingHours=?, 
              closingHours=?, 
              openingDays=? 
              WHERE service_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $serviceName, $serviceDesc, $servicePhone, $openingHours, $closingHours, $openingDays, $serviceId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
