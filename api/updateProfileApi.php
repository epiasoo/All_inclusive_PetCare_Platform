<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
    require_once('dbinfo.php');

    $uploadDirectory = '../profileUploads/';

    $file = $_FILES['profileImage'];
    $fileName = basename($file['name']);
    $fileTempName = $file['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


    $uniqueFilename = uniqid('profile_') . '.' . $fileExtension;
    $destination = $uploadDirectory . $uniqueFilename;

    if (move_uploaded_file($fileTempName, $destination)) {
        $userId = $_SESSION['user_id'];
        $role = $_SESSION['role'];


        $updateQuery = "UPDATE user_info SET profile = ? WHERE user_id = ?";


        $stmt = $conn->prepare($updateQuery);

        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
            exit();
        }

        $stmt->bind_param("si", $destination, $userId);

        if ($stmt->execute()) {
            echo json_encode(['success' => 'Profile image updated successfully', 'updatedImageUrl' => $destination]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error updating profile image: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to move uploaded file to destination']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
