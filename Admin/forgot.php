<?php
require 'dbcon.php';
?>
<?php
require 'sessionstart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Log-In</title>
    <style>


    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="col-6 border pt-5 pb-5 pl-5 pr-5 mx-auto div1 mb-5" style="width: 40%;">
            <div class="p-5 mb-2 mr-n5 ml-n5 mt-n5 bg-dark div2 text-center text-white">
                <h2>Admin Log In</h2>
            </div>

            <form class="frm" method="post" style="height:25vh">
                <br>
                <div class="form-group">
                    <label for="adminid">Enter Username</label>
                    <input type="text" name="adminid" id="adminid" class="form-control" placeholder="Enter Your Username" required>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" name="ok" class="btn btn-dark btn-lg " value="Next">
                </div>
                <br>
            </form>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['ok'])) {
                $username = $_POST['adminid'];
                $src = "SELECT username,password,email FROM admin WHERE username='$username'";
                $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                // print_r($rs);
                if (mysqli_num_rows($rs) == 1) {
                    $rec = mysqli_fetch_assoc($rs);
                    $vpassword = $rec['password'];
                    $adminid = $rec['username'];
                    $email = $rec['email'];
                    if ($adminid == $username) {
                        $to_email = $email;
                        $subject = "Forgot Password";
                        $body = "<!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Document</title>
                            <style>
                                *{
                                    font-family: Arial, sans-serif;
                                    /* font-size: 30px; */
                                    padding: 0;
                                }
                                body{
                                    padding: 0;
                                    margin: 0;
                                }
                                .header{
                                    width: 97%;
                                    background-color: rgb(73, 70, 70);
                                    font-size: 30px;
                                    color: white;
                                    text-align: center;
                                    padding: 10px;
                                }
                                p{
                                    font-size: 15px;
                                }
                                footer{
                                    width: 97%;
                                    background-color:rgb(73, 70, 70) ;
                                    color: rgb(187, 184, 184);
                                    padding: 10px;
                                    font-size: 20px;
                                    text-align: center;
                                    position: absolute;
                                    bottom: 0;
                                }
                            </style>
                        </head>
                        <body>
                            <h3 class='header'>Quick Service Booking</h3>
                            <p>Hi, " . $adminid . "<br>We received a request from you that you had forgotten your password.<br>
                                    <br>Here is your password :" . $vpassword . ".</p>
                                    <footer>
                                    Thanks You...
                                </footer>
                        </body>
                        </html>
                        ";
                        $headers = "From: QuickServiceBooking<quickservicebooking.care@gmail.com>\r\n";
                        $headers .= "Reply-To: quickservicebooking.care@gmail.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
                        
                        // $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                        // $headers = "From: Sreeja De <de.sreeja2003@gmail.com>\r\n";
                        // $headers .= "MIME-Version: 1.0\r\n";



                        if (mail($to_email, $subject, $body, $headers)) {
                            $res = 1;
                        } else {
                            echo "";
                            $res = 3;
                        }
                    } else {
                        $res = 0;
                    }
                } else {
        ?>
                    <div class="alert alert-danger" role="alert">
                        You are not an Admin.
                    </div>
                <?php

                }
            }
            if (isset($res))
                if ($res == 1) {
                ?>
                <div class="alert alert-success" role="alert">
                    Password is sent Succesfully,Check your E-Mail.
                </div>
            <?php
                    header("refresh:3;url=dashb.php");
                } elseif ($res == 3) {
            ?>
                <div class="alert alert-danger" role="alert">
                    Email sending failed
                </div>
            <?php
                } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    You are not an Admin.
                </div>
        <?php
                }
        }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>