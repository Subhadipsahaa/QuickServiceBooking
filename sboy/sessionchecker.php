<?php
require 'sessionstart.php';
if (!isset($_SESSION['username'])){
    header("location:index.php");
    exit;
}
?>