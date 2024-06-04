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
    if (isset($name) && isset($contact)) {
        $res = 4;
    }

    if ($email_id && $name && $contact && $password) {
        $stmt = $conn->prepare("INSERT INTO `user` ( `name`, `email`, `contact`, `password`) VALUES ( '?', '?', '?', '?')");
        $stmt->bind_param("ss", $email_id, $password, $name, $contact);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $res = 1; // Email exists
        } else {
            $res = 3;
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }
    header('Content-Type: application/json');
    echo json_encode(['res' => $res, 'error' => $error_msg]);
    exit();
}
