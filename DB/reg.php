<?php require('config.php');  ?>
<?php require('navbar.php') ?>
<div class="container">
    <div class="col-6">
        <h2 class="text-center text-primary">User Registration</h2>
        <form name="ref-frm" id="reg-frm" method="post">
            <div class="form-group">
                <label for="name">Enter name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email_id">Enter email</label>
                <input type="email" name="email_id" id="email_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Enter password</label>
                <input type="password" name="pwd" id="pwd" class="form-control">
            </div>
            <div class="form-group">
                <label for="dob">Select Date of birth</label>
                <input type="date" name="dob" id="dob" class="form-control">
            </div>
            <label for="gender" class="mb-0">Specify Gender</label><br>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="gender" type="radio" id="gender" value="Male">
                <label class="form-check-label" for="gender">Male</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="gender" type="radio" id="gender" value="Female">
                <label class="form-check-label" for="gender">Female</label>
            </div>
            <br><label for="gender" class="mt-3 mb-0">Specify Language</label><br>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="C">
                <label class="form-check-label" for="lang">C</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="C++">
                <label class="form-check-label" for="lang">C++</label>
            </div>
            <div class="form-check form-check-inline">     
                <input class="form-check-input" name="lang[]" type="checkbox" id="lang" value="PHP">
                <label class="form-check-label" for="lang">PHP</label>
            </div>
            <div class="form-group">
                <label for="address" class="mt-2">Address</label>
                <textarea rows="5" name="address" id="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="city">Select City</label>
                <select name="city" id="city" class="form-control">
                    <option value="" selected>-Select City-</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                </select>
            </div>
            <input type="submit" name="ok" value="Register" class="btn btn-info">
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
            $src="SELECT email_id FROM user WHERE email_id='$email_id'";
            $rs=mysqli_query($con, $src)or die(mysqli_errno($con));
            if(mysqli_num_rows($rs)>0){
                ?>
                <div class="alert alert-warning">
                    You are already registered
                </div>
                <?php
            }else{
                $vcode=rand(000000,999999);
                $sql="INSERT INTO user (name, email_id, pwd, dob, gender, lang, city, 
                address, vcode) VALUES ('$name', '$email_id', '$pwd', '$dob', '$gender', 
                '$lang', '$city', '$address','$vcode')";
                $res=mysqli_query($con, $sql) or die(mysqli_error($con));
                if($res==1){
                    $subject = "Verify Your Email";
                    $body = "Your verification code is :-".$vcode;
                    $headers = "From: My Website";
                    if (mail($email_id, $subject, $body, $headers)) {
                        ?>
                        <script>
                            window.location='verify.php?email_id='+<?php echo $email_id ?>+'&msg=Your registration is successfull';
                        </script>
                        <?php
                        //header('location:);
                    } else {
                        ?>
                        <div class="alert alert-danger">
                            Your registration is unsuccessfull
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <div class="alert alert-danger">
                        Your registration is unsuccessfull
                    </div>
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