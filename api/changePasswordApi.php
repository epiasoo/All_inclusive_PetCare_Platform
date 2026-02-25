<?php
session_start();

require_once 'dbinfo.php';

if (isset($_POST["oldPassword"]) && isset($_POST["newPassword"])) {
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];

    $userId = $_SESSION['user_id'];
    $role = $_SESSION['role'];

    $getUserPasswordQuery = "SELECT password FROM user_info WHERE user_id = '$userId'";
    $result = $conn->query($getUserPasswordQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPassword = $row["password"];

        if ($oldPassword === $currentPassword) {
            $updatePasswordQuery = "UPDATE user_info SET password = '$newPassword' WHERE user_id = '$userId'";
            if ($conn->query($updatePasswordQuery) === TRUE) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "error" => "Error updating password: " . $conn->error]);
            }
        } else {
            echo json_encode(["success" => false, "error" => "Old password is incorrect"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "User not found"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing oldPassword or newPassword"]);
}

$conn->close();
