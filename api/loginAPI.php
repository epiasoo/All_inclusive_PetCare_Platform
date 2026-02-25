<?php
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

require_once 'dbinfo.php';

$stmt = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo 'Email not registered';
} else {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    if ($password === $storedPassword) {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role'];
        echo 'Success';
    } else {
        echo 'Incorrect password';
    }
}
$stmt->close();

$conn->close();
