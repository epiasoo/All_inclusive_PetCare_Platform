<?php
session_start();
require 'dbinfo.php'; // Use the dbinfo.php file for database connection

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['booking_id']) && isset($_POST['booking_type'])) {
        $bookingId = $_POST['booking_id'];
        $bookingType = $_POST['booking_type'];
        $userId = $_SESSION['user_id']; // Assuming user_id is stored in the session

        // Validate if the booking belongs to the current user
        if ($bookingType === 'regular') {
            $stmt = $conn->prepare("SELECT * FROM bookings WHERE booking_id = ? AND user_id = ?");
        } else if ($bookingType === 'hotel') {
            $stmt = $conn->prepare("SELECT * FROM petHotelBookings WHERE booking_id = ? AND user_id = ?");
        } else {
            $response['success'] = false;
            $response['message'] = 'Invalid booking type.';
            echo json_encode($response);
            exit;
        }

        $stmt->bind_param("ii", $bookingId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Booking belongs to the user, proceed to cancel
            if ($bookingType === 'regular') {
                $stmt = $conn->prepare("DELETE FROM bookings WHERE booking_id = ?");
            } else if ($bookingType === 'hotel') {
                $stmt = $conn->prepare("DELETE FROM petHotelBookings WHERE booking_id = ?");
            }

            $stmt->bind_param("i", $bookingId);

            if ($stmt->execute()) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
                $response['message'] = 'Database error: Unable to cancel booking.';
            }

            $stmt->close();
        } else {
            $response['success'] = false;
            $response['message'] = 'Booking not found or you do not have permission to cancel this booking.';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid request.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);

$conn->close();
