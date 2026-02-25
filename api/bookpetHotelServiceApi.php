<?php
require_once 'dbinfo.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the POST data
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $service_id = isset($_POST['service_id']) ? $_POST['service_id'] : null;
    $checkin_date = isset($_POST['checkin_date']) ? $_POST['checkin_date'] : null;
    $checkout_date = isset($_POST['checkout_date']) ? $_POST['checkout_date'] : null;
    $checkin_hour = isset($_POST['checkin_hour']) ? $_POST['checkin_hour'] : null;
    $checkout_hour = isset($_POST['checkout_hour']) ? $_POST['checkout_hour'] : null;
    $pet_type = isset($_POST['pet_type']) ? $_POST['pet_type'] : null;
    $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : null;
    $door_to_door_info = isset($_POST['door_to_door_info']) ? $_POST['door_to_door_info'] : null;
    $service_type = $_POST['service_type'];
    $petName = $_POST['petName'];
    $petGender = $_POST['petGender'];
    $species = $_POST['species'];
    $petAge = $_POST['petAge'];
    $importantInfo = $_POST['importantInfo'];

    // Validate the required fields
    if ($user_id && $service_id && $checkin_date && $checkout_date && $checkin_hour && $checkout_hour && $pet_type && $room_type && $door_to_door_info && $service_type && $petName && $petGender && $species && $petAge && $importantInfo) {
        // Prepare the SQL query
        $sql = "INSERT INTO petHotelBookings (user_id, service_id, checkin_date, checkout_date, checkin_hour, checkout_hour, pet_type, room_type, door_to_door_info, service_type, petName, petGender, species, petAge, importantInfo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameters
            $stmt->bind_param('iisssssssssssss', $user_id, $service_id, $checkin_date, $checkout_date, $checkin_hour, $checkout_hour, $pet_type, $room_type, $door_to_door_info, $service_type, $petName, $petGender, $species, $petAge, $importantInfo);

            // Execute the query
            if ($stmt->execute()) {
                // Respond with success message
                http_response_code(200);
                echo json_encode(['message' => 'Booking successful!']);
            } else {
                // Respond with an error message
                http_response_code(500);
                echo json_encode(['message' => 'Error booking the service.']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // Respond with an error message
            http_response_code(500);
            echo json_encode(['message' => 'Error preparing the SQL statement.']);
        }
    } else {
        // Respond with an error message
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input. Please fill in all required fields.']);
    }
} else {
    // Respond with an error message
    http_response_code(405);
    echo json_encode(['message' => 'Invalid request method.']);
}

// Close the database connection
$conn->close();
