<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "quickservicebooking";
$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    die("connection faild:" . $conn->connect_error);
}
?>