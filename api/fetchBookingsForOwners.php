<?php
// Include database connection file
include 'dbinfo.php';

session_start();
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

// SQL query to fetch bookings from the 'bookings' table
$sql1 = "
    SELECT 
        b.booking_id, b.booking_date AS date, b.timeRange AS timeRange, 
        b.service_type, ps.service_name, ps.service_image
    FROM 
        bookings b
    JOIN 
        pet_services ps ON b.service_id = ps.service_id
    WHERE 
        b.user_id = ?
";

// SQL query to fetch bookings from the 'petHotelBookings' table
$sql2 = "
    SELECT 
        phb.booking_id, phb.checkin_date, phb.checkout_date, phb.checkin_hour, phb.checkout_hour, 
        phb.room_type AS service_type, ps.service_name, ps.service_image
    FROM 
        petHotelBookings phb
    JOIN 
        pet_services ps ON phb.service_id = ps.service_id
    WHERE 
        phb.user_id = ?
";

// Prepare and execute the statements
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $user_id);
$stmt1->execute();
$result1 = $stmt1->get_result();

$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();

// Fetch all data
$bookings = [];
while ($row = $result1->fetch_assoc()) {
    $row['type'] = 'regular'; // Mark as regular booking
    $bookings[] = $row;
}

while ($row = $result2->fetch_assoc()) {
    $row['type'] = 'hotel'; // Mark as hotel booking
    $bookings[] = $row;
}

// Return JSON response
echo json_encode($bookings);
