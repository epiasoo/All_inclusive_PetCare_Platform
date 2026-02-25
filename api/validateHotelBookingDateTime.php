<?php
require_once 'dbinfo.php'; // Include your database connection details

// Retrieve input data from POST request
$service_id = $_POST['service_id'];
$checkin_date = $_POST['checkin_date'];
$checkin_hour = $_POST['checkin_hour'];
$checkout_date = $_POST['checkout_date'];
$checkout_hour = $_POST['checkout_hour'];

// Fetch service details including opening hours
$stmt = $conn->prepare("SELECT openingDays, openingHours, closingHours, service_name FROM pet_services WHERE service_id = ?");
$stmt->bind_param("i", $service_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($openingDays, $openingHours, $closingHours, $service_name);
    $stmt->fetch();


    // Check if the service is open on the check-in date and check-out date
    $checkinDay = date('l', strtotime($checkin_date)); // Get day name from date
    $checkoutDay = date('l', strtotime($checkout_date)); // Get day name from date
    $openingDaysArray = explode(",", $openingDays); // Convert string to array


    if (in_array($checkinDay, $openingDaysArray) && in_array($checkoutDay, $openingDaysArray)) {
        // Service is open on both check-in and check-out dates, now check opening and closing times
        $checkinDateTime = strtotime("$checkin_date $checkin_hour");
        $checkoutDateTime = strtotime("$checkout_date $checkout_hour");
        $openingTime = strtotime("$checkin_date $openingHours");
        $closingTime = strtotime("$checkout_date $closingHours");


        if (
            $checkinDateTime >= $openingTime && $checkinDateTime <= $closingTime &&
            $checkoutDateTime >= $openingTime && $checkoutDateTime <= $closingTime
        ) {
            // Check-in and check-out dates and times are valid
            echo json_encode(array('status' => 'success'));
        } else {
            // Service is closed at the chosen check-in or check-out time
            echo json_encode(array('status' => 'error', 'message' => $service_name . ' is closed on the chosen check-in or check-out time.'));
        }
    } else {
        // Service is closed on either the check-in or check-out date
        echo json_encode(array('status' => 'error', 'message' =>  $service_name . ' is closed on the chosen check-in or check-out date.'));
    }
} else {
    // No service found with the given ID
    echo json_encode(array('status' => 'error', 'message' => 'Service not found.'));
}

$stmt->close();
$conn->close();
