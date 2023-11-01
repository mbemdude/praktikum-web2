<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();

    // Redirect the user to the login page or any other page you prefer
    header("Location: login.php"); // Change this to the desired page
    exit();
} else {
    // If the user is not logged in, you can handle this case as needed (e.g., redirect to the login page).
    header("Location: login.php"); // Change this to the desired page
    exit();
}
