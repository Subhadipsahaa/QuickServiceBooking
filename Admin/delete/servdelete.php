<?php
require_once('../dbcon.php');
require_once('../sessionchecher.php');
?>
<?php
if (isset($_POST['serid'])) {
    $item = $_POST['serid'];
    $src = "SELECT * FROM services WHERE s_id='$item'";
    $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
    // print_r($rs);
    if (mysqli_num_rows($rs) == 1) {
        $reco = mysqli_fetch_assoc($rs);
        if(isset($reco)){
        $tname= $reco['service_name'];
        }
    }
    $src2 = "DROP TABLE $tname ";
    $res = mysqli_query($conn, $src2) or die(mysqli_error($conn));
    // if ($res == 1) {
    $sqlq = "DELETE FROM services WHERE s_id='$item';";
    $rec = mysqli_query($conn, $sqlq) or die(mysqli_error($conn));
    if ($rec == 1) {
        header("location:../services.php");
    } else {
        header("location:../services.php");
    }
}
?>
