<?php
// Include database connection details
require_once 'dbinfo.php';

// Check if serviceId is provided
if (isset($_GET['serviceId'])) {
    $serviceId = $_GET['serviceId'];

    // Prepare SQL query to fetch pet hotel bookings with additional pet information
    $sql = "SELECT 
                ph.booking_id,
                ph.checkin_date,
                ph.checkout_date,
                ph.checkin_hour,
                ph.checkout_hour,
                ui.username,
                ph.pet_type,
                ph.room_type,
                ph.door_to_door_info,
                ph.service_type,
                ph.petName,
                ph.petGender,
                ph.species,
                ph.petAge,
                ph.importantInfo
            FROM pethotelbookings ph
            INNER JOIN user_info ui ON ph.user_id = ui.user_id
            INNER JOIN pet_services ps ON ph.service_id = ps.service_id
            WHERE ph.service_id = ? AND ps.service_type = 'petHotel' AND ph.status = 'pending'";

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
            $checkinDate,
            $checkoutDate,
            $checkinHour,
            $checkoutHour,
            $userName,
            $petType,
            $roomType,
            $doorToDoorInfo,
            $serviceType,
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
                'checkin_date' => $checkinDate,
                'checkout_date' => $checkoutDate,
                'checkin_hour' => $checkinHour,
                'checkout_hour' => $checkoutHour,
                'user_name' => $userName,
                'pet_type' => $petType,
                'room_type' => $roomType,
                'door_to_door_info' => $doorToDoorInfo,
                'service_type' => $serviceType,
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
