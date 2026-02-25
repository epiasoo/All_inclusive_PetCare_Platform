<?php
// Include database connection details
require_once 'dbinfo.php';

// Check if serviceId is provided
if (isset($_GET['serviceId'])) {
    $serviceId = $_GET['serviceId'];

    // Prepare SQL query to fetch bookings with additional pet information and only pending status
    $sql = "SELECT 
                bookings.booking_id,
                bookings.booking_date,
                bookings.timeRange,
                user_info.username,
                bookings.pet_type,
                bookings.service_type,
                bookings.door_to_door_info,
                bookings.petName,
                bookings.petGender,
                bookings.species,
                bookings.petAge,
                bookings.importantInfo
            FROM bookings
            INNER JOIN user_info ON bookings.user_id = user_info.user_id
            WHERE bookings.service_id = ? AND bookings.status = 'pending'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind serviceId parameter
        $stmt->bind_param('i', $serviceId);

        // Execute statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result(
            $bookingId,
            $bookingDate,
            $bookingTime,
            $userName,
            $petType,
            $serviceType,
            $doorToDoorInfo,
            $petName,
            $petGender,
            $species,
            $petAge,
            $importantInfo
        );

        // Fetch results
        $bookings = array();
        while ($stmt->fetch()) {
            // Store each row in an associative array
            $booking = array(
                'booking_id' => $bookingId,
                'booking_date' => $bookingDate,
                'booking_time' => $bookingTime,
                'user_name' => $userName,
                'pet_type' => $petType,
                'service_type' => $serviceType,
                'door_to_door_info' => $doorToDoorInfo,
                'petName' => $petName,
                'petGender' => $petGender,
                'species' => $species,
                'petAge' => $petAge,
                'importantInfo' => $importantInfo
            );
            $bookings[] = $booking;
        }

        // Close statement
        $stmt->close();

        // Return bookings as JSON
        echo json_encode($bookings);
    } else {
        // Query preparation failed
        echo json_encode(array('error' => 'Query preparation failed.'));
    }
} else {
    // ServiceId parameter not provided
    echo json_encode(array('error' => 'ServiceId parameter is missing.'));
}

// Close database connection
$conn->close();
