<?php
require_once 'dbinfo.php'; // Include your database connection details

// Retrieve input data from POST request
$service_id = $_POST['service_id'];
$booking_date = $_POST['booking_date'];

// Fetch service details including opening days
$stmt = $conn->prepare("SELECT openingDays, service_name FROM pet_services WHERE service_id = ?");
$stmt->bind_param("i", $service_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($openingDays, $service_name);
    $stmt->fetch();

    // Check if the service is open on the selected day
    $selectedDay = date('l', strtotime($booking_date)); // Get day name from date
    $openingDaysArray = explode(",", $openingDays); // Convert string to array

    if (in_array($selectedDay, $openingDaysArray)) {
        // Service is open on selected day
        echo json_encode(array('status' => 'success'));
    } else {
        // Service is closed on the selected day
        echo json_encode(array('status' => 'error', 'message' => $service_name . ' is closed on the selected date.'));
    }
} else {
    // No service found with the given ID
    echo json_encode(array('status' => 'error', 'message' => 'Service not found.'));
}

$stmt->close();
$conn->close();
