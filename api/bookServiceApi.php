<?php
require_once 'dbinfo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $service_id = $_POST['service_id'];
    $booking_date = $_POST['booking_date'];
    $timeRange = $_POST['timeRange'];
    $pet_type = $_POST['pet_type'];
    $service_type = $_POST['service_type'];
    $door_to_door_info = $_POST['door_to_door_info'];
    $petName = $_POST['petName'];
    $petGender = $_POST['petGender'];
    $species = $_POST['species'];
    $petAge = $_POST['petAge'];
    $importantInfo = $_POST['importantInfo'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, service_id, booking_date, timeRange, pet_type, service_type, door_to_door_info, petName, petGender, species, petAge, importantInfo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssssss", $user_id, $service_id, $booking_date, $timeRange, $pet_type, $service_type, $door_to_door_info, $petName, $petGender, $species, $petAge, $importantInfo);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Booking successful"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Booking failed"]);
    }

    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request method"]);
}

$conn->close();
