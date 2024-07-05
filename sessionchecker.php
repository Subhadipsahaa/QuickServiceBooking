<?php
require 'sessionstart.php';
if (!isset($_SESSION['muser'])){
    $_SESSION['message'] = "You must be logged in to access this page.";
    header("location:../main.php");
    exit;
}
?>