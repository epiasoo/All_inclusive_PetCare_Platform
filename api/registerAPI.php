<?php

session_start();
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$role = htmlspecialchars($_POST['role']);
$password = htmlspecialchars($_POST['password']);

require_once 'dbinfo.php';

if ($_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
    $fileName = $_FILES['profilePicture']['name'];
    $fileSize = $_FILES['profilePicture']['size'];
    $fileType = $_FILES['profilePicture']['type'];

    $uploadDir = '../profileUploads/';
    $destPath = $uploadDir . $fileName;


    if (move_uploaded_file($fileTmpPath, $destPath)) {

        $stmt = null;

        $stmt = $conn->prepare("SELECT * FROM user_info WHERE email = ?");

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo 'Email already registered';
            exit();
        }

        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO user_info (username, email, password, role, profile) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $username, $email, $password, $role, $destPath);
        $stmt->execute();
        $insertedId = $conn->insert_id;
        if ($stmt->affected_rows > 0) {
            echo 'Success';
            $_SESSION['role'] = $role;
            $_SESSION['user_id'] = $insertedId;
        } else {
            echo 'Unable to register';
        }

        $stmt->close();
    } else {
        echo 'Error in file upload';
    }
} else {
    echo 'Error in file upload: ' . $_FILES['profilePicture']['error'];
}

$conn->close();
