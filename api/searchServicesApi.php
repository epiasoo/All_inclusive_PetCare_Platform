<?php

require_once 'dbinfo.php';

if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {

    // Retrieve search term and prepare for query
    $searchTerm = '%' . $conn->real_escape_string($_GET['searchTerm']) . '%';


    $sql = "SELECT * FROM pet_services WHERE service_name LIKE ? OR service_type LIKE ?";


    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $services = array();
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($services);
    } else {
        echo "Not found!";
    }

    $stmt->close();
} else {
    echo "Please provide a search term!";
}

$conn->close();
