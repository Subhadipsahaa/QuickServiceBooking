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
    <link rel="stylesheet" href="../css/services.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>Title</title>
    <style> 
    .ser{
        margin-top: 5px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light" style="box-shadow: 0 10px 10px -10px rgba(124, 124, 147, 0.3);">
        <a class="navbar-brand" href="../main.php">
            <div class="backicon"><i class="fa-solid fa-arrow-left"></i></div>
        </a>
    </nav>
    <main>

        <div class="catagoris">
            <h2 style="padding:8px;">Carpenter, Plumber & Car Repair</h2>
            <div class="div1">

                <div class="ser">
                    <?php require 'plumber.php' ?>
                </div>
                <div class="ser">
                    <?php require 'carpenter.php' ?>
                </div>
                <div class="ser">
                    <?php require 'car_repair.php' ?>
                </div>
            </div>

        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>