<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
require 'unsetpsession.php';
$upload_by=$_SESSION['u_info']['uid'];
$about=$_POST['about'];
$fname=$_FILES['ff']['name'];
$destination='uploaded_files/'.rand(00000000,99999999)."_".$fname;
$source=$_FILES['ff']['tmp_name'];
$fextarr=explode(".",$fname);
$fext=end($fextarr);
$ftype=array('png','PNG','JPEG','jpeg','jpg','JPG','webp','WEBP');
if(in_array($fext, $ftype)){
    if(move_uploaded_file($source, $destination)){
        $res=mysqli_query($con, "INSERT INTO files (fname, fpath, about, upload_by) VALUES ('$fname', '$destination', '$about', '$upload_by')")or die(mysqli_error($con));
        if($res==1){
            $_SESSION['msg']='Upload successfull';
            ?>
            <script>
                window.location='photos.php'
            </script>
            <?php
        }else{
            $_SESSION['err']='Please try again later';
            ?>
            <script>
                window.location='upload.php'
            </script>
            <?php
        }
    }else{
        $_SESSION['err']='Not upload successfully';
        ?>
        <script>
            window.location='upload.php'
        </script>
        <?php
    }
}else{
    $_SESSION['err']='Please select image file only';
    ?>
    <script>
        window.location='upload.php'
    </script>
    <?php
}
?>