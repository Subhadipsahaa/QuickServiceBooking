<?php
require 'sessionstart.php';

?>
<?php
if (!isset($_SESSION['user'])){
    header("location:index.php");
}
?>