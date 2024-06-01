<?php
require_once('../dbcon.php');
require_once('../sessionchecher.php');
?>
<?php
if (isset($_POST['rid'])) {
    $item = $_POST['rid'];
    $sqlq = "DELETE FROM reviews WHERE r_id='$item';";
    $rec = mysqli_query($conn, $sqlq) or die(mysqli_error($conn));
    if ($rec == 1) {
        header("location:../reviews.php");
    } else {
        header("location:../reviews.php");
    }
}
?>
