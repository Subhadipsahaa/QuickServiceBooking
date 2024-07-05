<?php
require '../Admin/dbcon.php';
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
                <h2>Service Boy Log In</h2>
            </div>

            <form class="frm" method="post" action="main.php">
                <br>
                <div class="form-group">
                    <label for="name">Enter Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" autofocus required>
                    <br>
                    <label for="num">Enter Contact Number:</label>
                    <input type="tel" name="num" id="num" class="form-control" placeholder="Enter Your Number" required>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" name="ok" class="btn btn-dark btn-lg " value="Sign In">
                </div>
                <br>
                <!-- <div><a href="register.php"></a></div> -->
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>