<?php 
    require('config.php'); 
    require('checkSession.php');
    if(isset($_POST['uid'])){
        $uid=$_POST['uid'];
        $_SESSION['uid']=$uid;
    }else{
        $uid=$_SESSION['uid'];
    }

    $rs=mysqli_query($con, "SELECT * FROM user WHERE uid=$uid")or die(mysqli_error($con));
    $rec=mysqli_fetch_assoc($rs);
    $lang=explode(',', $rec['lang']);
?>
<?php require('navbar.php') ?>
<div class="container">
    <div class="col-6">
        <h2 class="text-center text-primary">Update user details</h2>
        <form name="ref-frm" id="reg-frm" method="post">
            <div class="form-group">
                <label for="name">Enter name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $rec['name'] ?>">
            </div>
            <div class="form-group">
                <label for="email_id">Enter email</label>
                <input type="email" value="<?php echo $rec['email_id'] ?>" name="email_id" id="email_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Enter password</label>
                <input type="password" value="<?php echo $rec['pwd'] ?>" name="pwd" id="pwd" class="form-control">
            </div>
            <div class="form-group">
                <label for="dob">Select Date of birth</label>
                <input type="date" name="dob" value="<?php echo $rec['dob'] ?>" id="dob" class="form-control">
            </div>
            <label for="gender" class="mb-0">Specify Gender</label><br>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="gender" type="radio" id="gender" value="Male"
                <?php
                if($rec['gender']=='Male'){
                    echo 'checked';
                }
                ?>
                >
                <label class="form-check-label" for="gender">Male</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="gender" type="radio" id="gender" value="Female"
                <?php
                if($rec['gender']=='Female'){
                    echo 'checked';
                }
                ?>
                >
                <label class="form-check-label" for="gender">Female</label>
            </div>
            <br><label for="gender" class="mt-3 mb-0">Specify Language</label><br>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="C"
                <?php
                if(in_array('C', $lang)){
                    echo 'checked';
                }
                ?>
                >
                <label class="form-check-label" for="lang">C</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="C++"
                <?php
                if(in_array('C++',$lang)){
                    echo 'checked';
                }
                ?>
                >
                <label class="form-check-label" for="lang">C++</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="PHP"
                <?php
                if(in_array('PHP',$lang)){
                    echo 'checked';
                }
                ?>
                >
                <label class="form-check-label" for="lang">PHP</label>
            </div>
            <div class="form-group">
                <label for="address" class="mt-2">Address</label>
                <textarea rows="5" name="address" id="address" class="form-control"><?php echo $rec['address'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="city">Select City</label>
                <select name="city" id="city" class="form-control">
                    <option value="<?php echo $rec['city'] ?>" selected><?php echo $rec['city'] ?></option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                </select>
            </div>
            <input type="submit" name="ok" value="Save Changes" class="btn btn-info">
        </form>
        <?php
        if(isset($_POST['ok'])){
            $name=$_POST['name'];
            $email_id=$_POST['email_id'];
            $pwd=$_POST['pwd'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $lang=implode(",",$_POST['lang']);
            $city=$_POST['city'];
            $address=$_POST['address'];
            $sql="UPDATE user SET name='$name', email_id='$email_id', pwd='$pwd', dob='$dob', gender='$gender', lang='$lang', city='$city', 
            address='$address' WHERE uid=$uid";
            $res=mysqli_query($con, $sql) or die(mysqli_error($con));
            if($res==1){
                unset($_SESSION['uid']);
                $_SESSION['msg']='User details update successfully';
                ?>
                <script>
                    window.location='view.php';
                </script>
                <?php
            }
            else{
                unset($_SESSION['uid']);
                $_SESSION['err']='User details not update successfully';
                ?>
                <script>
                    window.location='view.php';
                </script>
                <?php
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