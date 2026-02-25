<?php
session_start(); // Start the session

require 'dbinfo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $businessName = $_POST['businessName'];
    $businessDescription = $_POST['businessDescription'];
    $phoneNumber = $_POST['phoneNumber'];
    $availableServices = $_POST['availableServices'];
    $openingHours = $_POST['openingHours'];
    $closingHours = $_POST['closingHours'];
    $openingDays = json_decode($_POST['openingDays']);
    $userId = $_SESSION['user_id']; // Retrieve the user ID from session
    $role = $_SESSION['role'];

    // Check if a file was uploaded successfully
    if ($_FILES['businessLogo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['businessLogo']['tmp_name'];
        $fileName = $_FILES['businessLogo']['name'];
        $fileSize = $_FILES['businessLogo']['size'];
        $fileType = $_FILES['businessLogo']['type'];

        $uploadDir = '../businessLogoUploads/';
        $destPath = $uploadDir . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Prepare SQL statement for inserting data into the database
            $sql = "INSERT INTO pet_services (user_id, service_name, service_desc, service_phone, available_services, service_type, service_image, openingHours, closingHours, openingDays) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Convert openingDays array to comma-separated string
            $openingDaysString = implode(',', $openingDays);

            $stmt->bind_param("isssssssss", $userId, $businessName, $businessDescription, $phoneNumber,  $availableServices, $role, $destPath, $openingHours, $closingHours, $openingDaysString);

            // Execute the SQL statement
            if ($stmt->execute()) {
                echo 'Success';
            } else {
                echo 'Error: ' . $stmt->error;
            }

            $stmt->close(); // Close the statement
        } else {
            echo 'Error in file upload';
        }
    } else {
        echo 'Error in file upload: ' . $_FILES['businessLogo']['error'];
    }

    $conn->close(); // Close the database connection
} else {
    echo 'Invalid request method';
}
