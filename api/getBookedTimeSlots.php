<?php
// Include database connection details
require_once 'dbinfo.php';

// Get parameters from POST request
$service_id = isset($_POST['service_id']) ? $_POST['service_id'] : null;
$booking_date = isset($_POST['booking_date']) ? $_POST['booking_date'] : null;

// Check if parameters are provided
if ($service_id === null || $booking_date === null) {
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}

// Prepare the query to fetch booked time slots
$query = "SELECT timeRange FROM bookings WHERE service_id = ? AND booking_date = ?";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    echo json_encode(['error' => 'Prepare statement failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("is", $service_id, $booking_date);
if (!$stmt->execute()) {
    echo json_encode(['error' => 'Execute statement failed: ' . $stmt->error]);
    exit;
}

$stmt->bind_result($timeRange);

$bookedTimeSlots = [];
while ($stmt->fetch()) {
    $bookedTimeSlots[] = $timeRange;
}

// Close statement and connection
$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($bookedTimeSlots);
