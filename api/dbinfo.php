<?php

$host = "localhost";
$database = "pet_db";
$user = "root";
$pass = "Epso@192002";

$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die($conn->connect_error);
}
