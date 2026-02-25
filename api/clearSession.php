<?php
// Start the session
session_start();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);

    session_destroy();

    echo "Session cleared successfully.";
} else {
    echo "No session to clear.";
}
