<?php
require_once 'dbinfo.php';

$query = "SELECT * FROM products ORDER BY product_id DESC LIMIT 9;";
$result = $conn->query($query);
$rows = $result->num_rows;
if ($rows != 0) {
    $all_rows = $result->fetch_all(MYSQLI_ASSOC);
    $json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
    echo $json_string;
} else {
    echo 'Nothing Found';
}
