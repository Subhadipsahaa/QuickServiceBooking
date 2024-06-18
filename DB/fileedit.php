<?php 
    require('config.php');
    require('checkSession.php');
    if(isset($_POST['fid'])){
        $fid=$_POST['fid'];
        $_SESSION['fid']=$fid;
        $fpath=$_POST['fpath'];
        $_SESSION['fpath']=$fpath;
    }else{
        $fid=$_SESSION['fid'];
        $fpath=$_SESSION['fpath'];
    }
    $rs=mysqli_query($con, "SELECT * FROM files WHERE fid=$fid") or die(mysqli_error($con));
    $rec=mysqli_fetch_assoc($rs);
?>
<?php require('navbar.php') ?>
    <div class="container">
        <h1 class="text-center text-primary">Upload File</h1>
        <div class="container">
            <form name="src" method="post" enctype="multipart/form-data">
                <div class="form-group col-6">
                    <label for="ff">Select File</label>
                    <input type="file" name="ff" id="ff" class="form-control border-primary">
                    <br>
                    <img src="<?php echo $rec['fpath'] ?>" alt="<?php $rec['fname'] ?>" width="75" height="50"> 
                </div>
                <div class="form-group col-6">
                    <label for="about">About</label>
                    <input type="text" name="about" id="about" class="form-control border-primary" value="<?php echo $rec['about'] ?>">
                </div>
                <div class="col-1">
                    <input type="submit" name="ok" value="Upload" class="btn btn-primary">
                </div>
            </form>
            <?php
            if(isset($_POST['ok'])){
                $about=$_POST['about'];
                $fname=$_FILES['ff']['name'];
                if(empty($fname)){
                    $res=mysqli_query($con, "UPDATE files SET about='$about' WHERE fid=$fid")or die(mysqli_error($con));
                        if($res==1){
                            $_SESSION['msg']='Update successfull';
                            unset($_SESSION['fid']);
                            ?>
                            <script>
                                window.location='index.php'
                            </script>
                            <?php
                        }else{
                            $_SESSION['err']='Please try again later';
                            unset($_SESSION['fid']);
                            ?>
                            <script>
                                window.location='index.php'
                            </script>
                            <?php
                        }
                }
                else{
                $destination='uploaded_files/'.rand(00000000,99999999)."_".$fname;
                $source=$_FILES['ff']['tmp_name'];
                // echo "<pre>";
                // print_r($_FILES);
                $fextarr=explode(".",$fname);
                $fext=end($fextarr);
                $ftype=array('png','PNG','JPEG','jpeg','jpg','JPG','webp','WEBP');
                if(in_array($fext, $ftype)){
                    if(move_uploaded_file($source, $destination)){
                        $res=mysqli_query($con, "UPDATE files SET fname='$fname', fpath='$destination', about='$about' WHERE fid=$fid")or die(mysqli_error($con));
                        if($res==1){
                            $_SESSION['msg']='Update successfull';
                            unlink($fpath);
                            unset($_SESSION['fpath']);
                            unset($_SESSION['fid']);
                            ?>
                            <script>
                                window.location='index.php'
                            </script>
                            <?php
                        }else{
                            unset($_SESSION['fpath']);
                            $_SESSION['err']='Please try again later';
                            unset($_SESSION['fid']);
                            ?>
                            <script>
                                window.location='index.php'
                            </script>
                            <?php
                        }
                    }else{
                        unset($_SESSION['fpath']);
                        $_SESSION['err']='Not update successfully';
                        unset($_SESSION['fid']);
                        ?>
                        <script>
                            window.location='index.php'
                        </script>
                        <?php
                    }
                }else{
                    unset($_SESSION['fpath']);
                    $_SESSION['err']='Please select image file only';
                    unset($_SESSION['fid']);
                    ?>
                    <script>
                        window.location='index.php'
                    </script>
                    <?php
                }
            }
            }
            ?>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>