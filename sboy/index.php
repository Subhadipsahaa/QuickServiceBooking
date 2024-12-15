<?php
session_start(); // Start session to access session variables
require '../Admin/dbcon.php'; // Include database connection file
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
    <title>Service Boy Log-In</title>
</head>

<body>
    <div class="container mt-5">
        <div class="col-6 border pt-5 pb-5 pl-5 pr-5 mx-auto div1 mb-5" style="width: 40%;">
            <div class="p-5 mb-2 mr-n5 ml-n5 mt-n5 bg-dark div2 text-center text-white">
                <h2>Service Verification</h2>
            </div>

            <form class="frm" method="post" action="backend.php">
                <br>
                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error === 'invalid_password') {
                        echo '<div class="alert alert-danger" role="alert">Invalid password. Please try again.</div>';
                    } elseif ($error === 'user_not_found') {
                        echo '<div class="alert alert-danger" role="alert">User not found. Please check your credentials.</div>';
                    }
                }
                ?>
                <div class="form-group">
                    <label for="name">Enter Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" autofocus required>
                    <br>
                    <label for="num">Enter Contact Number:</label>
                    <input type="tel" name="num" id="num" class="form-control" placeholder="Enter Your Number" required>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg " value="Sign In">
                </div>
                <br>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
