<?php
require("config.php");
$email_id=$_POST['email_id'];
$pwd=$_POST['pwd'];
$src="SELECT * FROM user WHERE email_id='$email_id' AND  pwd='$pwd'";
$rs=mysqli_query($con, $src)or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
    $rec=mysqli_fetch_assoc($rs);
    if($rec['active']=='1'){
        $_SESSION['u_info']=$rec; // Storing the data into session
        header('location:view.php');
    }else{
        header('location:verify.php?email_id='.$email_id);
    }
}else{
    $_SESSION['err']='Invalid email or password';
    header('location:login.php');
}
?>