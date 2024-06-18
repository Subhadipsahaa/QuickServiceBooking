<?php
require("config.php");
unset($_SESSION['u_info']);
header('location:login.php');
?>