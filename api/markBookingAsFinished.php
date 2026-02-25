<?php
include 'dbinfo.php'; // Include your database connection details

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingId = $_POST['bookingId'];
    $serviceType = $_POST['serviceType']; // Get service_type from POST data

    if ($serviceType === 'petHotel') {
        $query = "UPDATE pethotelbookings SET status='finished' WHERE booking_id=?";
    } else {
        $query = "UPDATE bookings SET status='finished' WHERE booking_id=?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bookingId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
