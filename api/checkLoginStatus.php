<?php
session_start();

$userLoggedIn = isset($_SESSION['user_id']) ? true : false;

$response = array(
    'userLoggedIn' => $userLoggedIn
);

header('Content-Type: application/json');

echo json_encode($response);
