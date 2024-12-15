<?php
require 'sessionstart.php';// Start session for managing user state

// Include database connection file
require '../Admin/dbcon.php'; // Adjust the path as per your directory structure

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']); // Sanitize and escape user input
    $pwd = mysqli_real_escape_string($conn, $_POST['num']);

    // Query to check if user exists
    $query = "SELECT name, contact FROM serviceboys WHERE name='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
        $vpassword = $record['contact'];

        // Verify password
        if ($pwd == $vpassword) {
            $_SESSION['username'] = $username; // Store username in session
            header("location: main.php"); // Redirect if authentication is successful
            exit();
        } else {
            header("location: index.php?error=invalid_password"); // Redirect with error message
            exit();
        }
    } else {
        header("location: index.php?error=user_not_found"); // Redirect with error message
        exit();
    }
} else {
    header("location: index.php"); // Redirect if form was not submitted
    exit();
}
?>
