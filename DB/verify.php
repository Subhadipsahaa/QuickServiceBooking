<?php
require("config.php");
$email_id=$_GET['email_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Verify</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary">Verify Your Email</h1>
        <div class="col-6">
            <form name="v-email" method="post">
                <div class="form-group">
                    <label for="vcode">Enter verification code</label>
                    <input type="text" name="vcode" class="form-control border-primary">
                </div>
                <input type="submit" name="ok" value="Submit" class="btn btn-outline-primary ">
            </form>
            <?php
            if(isset($_POST['ok'])){
                $vcode=$_POST['vcode'];
                $rs=mysqli_query($con, "SELECT vcode FROM user WHERE email_id='$email_id'")or die(mysqli_error($con));
                $rec=mysqli_fetch_assoc($rs);
                print_r($rec);
                if($rec['vcode']==$vcode){
                    $upd=mysqli_query($con,"UPDATE user SET active='1' WHERE email_id='$email_id'")or die(mysqli_errno($con));
                    if($upd==1){
                        header('location:login.php?msg=Verification complete, please login yourself');
                    }else{
                        ?>
                        <div class="alert alert-danger">
                           Please try again later
                        </div>
                    <?php
                    }
                }else{
                    ?>
                    <div class="alert alert-danger">
                        Invalid verification code
                    </div>
                    <?php
                }
            }
            ?>
            <?php
            if(isset($_GET['msg'])){
                ?>
                <div class="alert alert-danger">
                    Your registration is successfull and verify your email
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>