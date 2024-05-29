<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
?>
<?php
if (isset($_POST['uid'])) {
    $item = $_POST['uid'];
    $sqlq = "DELETE FROM user WHERE u_id=$item;";
    $rec=mysqli_query($conn,$sqlq) or die(mysqli_error($conn));
    if($rec==1)
    header("location:users.php");
else{
    header("location:users.php");
}
}
?>
