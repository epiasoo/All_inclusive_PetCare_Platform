<?php
session_start();
require_once 'dbinfo.php';

if (isset($_POST["rating_data"]) && isset($_POST["service_id"])) {

    $user_id = $_SESSION['user_id'];
    $service_id = $_POST["service_id"];
    $user_rating = $_POST["rating_data"];
    $review_comment = $_POST["user_review"];
    $check_query = "SELECT * FROM review_info WHERE user_id = ? AND service_id = ?";
    $check_statement = $conn->prepare($check_query);
    $check_statement->bind_param('ii', $user_id, $service_id);
    $check_statement->execute();
    $existing_review = $check_statement->get_result()->fetch_assoc();

    if ($existing_review) {
        $update_query = "UPDATE review_info SET user_rating = ?, review_comment = ? WHERE user_id = ? AND service_id = ?";
        $update_statement = $conn->prepare($update_query);
        $update_statement->bind_param('isii', $user_rating, $review_comment, $user_id, $service_id);

        if ($update_statement->execute()) {
            echo "Your Review & Rating Successfully Updated";
        } else {
            echo "Error updating review: " . $conn->error;
        }
    } else {
        $insert_query = "INSERT INTO review_info (user_id, service_id, user_rating, review_comment) VALUES (?, ?, ?, ?)";
        $insert_statement = $conn->prepare($insert_query);
        $insert_statement->bind_param('iiis', $user_id, $service_id, $user_rating, $review_comment);

        if ($insert_statement->execute()) {
            echo "Your Review & Rating Successfully Submitted";
        } else {
            echo "Error inserting review: " . $conn->error;
        }
    }
}

if (isset($_POST["action"]) && $_POST["action"] === 'load_data' && isset($_POST["service_id"])) {
    $service_id = $_POST["service_id"];
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;

    $query = "SELECT ri.*, ui.username, ui.profile FROM review_info ri 
              LEFT JOIN user_info ui ON ri.user_id = ui.user_id 
              WHERE ri.service_id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $service_id);
    $statement->execute();
    $result = $statement->get_result();

    $reviews = [];

    while ($row = $result->fetch_assoc()) {
        if ($row["user_rating"] == '5') {
            $five_star_review++;
        } elseif ($row["user_rating"] == '4') {
            $four_star_review++;
        } elseif ($row["user_rating"] == '3') {
            $three_star_review++;
        } elseif ($row["user_rating"] == '2') {
            $two_star_review++;
        } elseif ($row["user_rating"] == '1') {
            $one_star_review++;
        }

        $total_review++;
        $total_user_rating += $row["user_rating"];
        $reviews[] = $row;
    }

    $average_rating = $total_review > 0 ? number_format($total_user_rating / $total_review, 1) : 0;

    $output = [
        'average_rating' => $average_rating,
        'total_review' => $total_review,
        'five_star_review' => $five_star_review,
        'four_star_review' => $four_star_review,
        'three_star_review' => $three_star_review,
        'two_star_review' => $two_star_review,
        'one_star_review' => $one_star_review,
        'reviews' => $reviews
    ];

    $updateQuery = "UPDATE pet_services SET overall_rating = ? WHERE service_id = ?";
    $updateStatement = $conn->prepare($updateQuery);
    $updateStatement->bind_param('di', $average_rating, $service_id);

    if ($updateStatement->execute()) {
        $output['update_status'] = "Overall Rating Updated Successfully";
    } else {
        $output['update_status'] = "Error updating overall rating: " . $conn->error;
    }

    echo json_encode($output);
}
