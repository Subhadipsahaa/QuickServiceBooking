<?php
require('config.php');
require('checkSession.php');
$fid=$_POST['fid'];
$fpath=$_POST['fpath'];
$del=mysqli_query($con, "DELETE FROM files WHERE fid='$fid'")or die(mysqli_error($con));
if($del==1){
    unlink($fpath);
    $_SESSION['msg']='File delete successfully';
    ?>
    <script>
        window.location='index.php';
    </script>
    <?php
}else{
    $_SESSION['err']='File not delete successfully';
    ?>
    <script>
        window.location='index.php';
    </script>
    <?php
}

?>