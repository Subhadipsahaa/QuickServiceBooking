<?php
require 'sessionstart.php';
?>
<?php
session_destroy();
header("location:index.php");
?>