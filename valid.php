<?php
require 'Admin/dbcon.php';
require 'sessionstart.php';

$error_msg = "";
$res = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $name = $_POST['name'] ?? null;
    $contact = $_POST['contact'] ?? null;
    $rpassword=$_POST['rpassword'] ?? null;

    
    if ($email_id && !$password) {
        // Check if email exists
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // $_SESSION['muser'] = $email_id;
            $res = 1; // Email exists
        } else {
            $res = 3;
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }

    if (isset($name) && isset($contact)) {
        $res = 4;
    }

    if ($email_id && $password) {
        // Check email and password
        $stmt = $conn->prepare("SELECT email, password FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email_id, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['muser'] = $email_id;
            $res = 2; // Email and password are correct
        } else {
            $res=7;
            $error_msg = "Invalid Email or Password.";
        }
        $stmt->close();
    }

    if($email_id && $name && $contact && $rpassword ){
        $stmt = $conn->prepare("INSERT INTO `user` ( `name`, `email`, `contact`, `password`) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("ssss",$name, $email_id, $contact, $rpassword);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->affected_rows > 0) {
            $res = 5; // Email exists
        } else {
            $res = 6;
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }
    header('Content-Type: application/json');
    echo json_encode(['res' => $res, 'error' => $error_msg]);
    exit();
}
