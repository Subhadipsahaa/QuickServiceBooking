<?php 
    require('config.php');
    require('checkSession.php');
    $uid=$_POST['uid'];
    $del=mysqli_query($con, "DELETE FROM user WHERE uid=$uid")or die(mysqli_error($con));
    if($del==1){
        $_SESSION['msg']='User details delete successfully';
        ?>
        <script>
            window.location='view.php';
        </script>
        <?php
        //echo "Delete succesfull";
    }else{
        $_SESSION['err']='User details not delete successfully';
        header('location:view.php');
    }
?>