<?php
session_start();
if (isset($_POST['recipeId'])) {
    $serviceId = $_POST['serviceId'];
    $user_id = $_SESSION['user_id'];
    require_once 'dbinfo.php';

    $stmt = $conn->prepare("DELETE FROM pet_services WHERE service_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $serviceId, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete service']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Service ID not provided']);
}
