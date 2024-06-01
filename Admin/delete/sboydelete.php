<?php
require_once('../dbcon.php');
require_once('../sessionchecher.php');
?>
<?php
if (isset($_POST['sboyid'])) {
    $item = $_POST['sboyid'];
    $sqlq = "DELETE FROM serviceboys WHERE sboy_id='$item';";
    $rec = mysqli_query($conn, $sqlq) or die(mysqli_error($conn));
    if ($rec == 1) {
        header("location:../sboy.php");
    } else {
        header("location:../sboy.php");
    }
}
?>
