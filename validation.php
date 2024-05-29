<?php
require 'Admin/dbcon.php';
session_start();

$error_msg = "";
$res = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($email_id && !$password) {
        // Check if email exists
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['user'] = $email_id;
            $res = 1; // Email exists
        } else {
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }

    if ($email_id && $password) {
        // Check email and password
        $stmt = $conn->prepare("SELECT email, password FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email_id, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['user'] = $email_id;
            $res = 2; // Email and password are correct
        } else {
            $error_msg = "Invalid Email or Password.";
        }
        $stmt->close();
    }

    header('Content-Type: application/json');
    echo json_encode(['res' => $res, 'error' => $error_msg]);
    exit();
}
?>