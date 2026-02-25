<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(array('error' => 'User not logged in'));
        exit();
    }
    $userId = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $role = $_SESSION['role'];

    require_once 'dbinfo.php';


    $stmt = $conn->prepare("SELECT * FROM user_info WHERE email = ? AND user_id != ?");

    $stmt->bind_param("si", $email, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingUser = $result->fetch_assoc();

    if ($existingUser) {
        http_response_code(400);
        echo json_encode(array('error' => 'Email already exists'));
        exit();
    }

    $stmt = $conn->prepare("UPDATE user_info SET username = ?, email = ?,  phone = ?, birthday = ?, gender = ? WHERE user_id = ?");
    $stmt->execute([$username, $email, $phone, $birthday, $gender, $userId]);

    $response = array("success" => true, "message" => "User information updated successfully");
    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(array("error" => "Invalid request method"));
}
