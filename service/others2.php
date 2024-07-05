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
</head>

<body>
    <nav class="navbar navbar-light bg-light" style="box-shadow: 0 10px 10px -10px rgba(124, 124, 147, 0.3);">
        <a class="navbar-brand" href="../main.php">
            <div class="backicon"><i class="fa-solid fa-arrow-left"></i></div>
        </a>
    </nav>
    <main>

        <div class="catagoris">
            <div class="div1">
                <?php
                if (isset($_GET['input'])) {
                    $input = $_GET['input'];
                    $req = htmlspecialchars($input);
                }
                ?>
                <?php
                if ($req == "electricians") {
                ?>
                    <div class="ser">
                        <?php require 'electrician.php' ?>
                    </div>
                <?php
                } elseif ($req == "plumber") {
                ?>
                    <div class="ser">
                        <?php require 'plumber.php' ?>
                    </div>
                <?php
                } elseif ($req == "carpainter") {
                ?>
                    <div class="ser">
                        <?php require 'carpenter.php' ?>
                    </div>
                <?php
                } elseif ($req == "car_repair") {
                ?>
                    <div class="ser">
                        <?php require 'car_repair.php' ?>
                    </div>
                <?php
                } elseif ($req == "beauty") {
                ?>
                    <div class="ser">
                        <?php require 'beauty.php' ?>
                    </div>
                <?php
                } elseif ($req == "salon") {
                ?>
                    <div class="ser">
                        <?php require 'salon.php' ?>
                    </div>
                <?php
                } elseif ($req == "ac_repair") {
                ?>
                    <div class="ser">
                        <?php require 'ac_repair.php' ?>
                    </div>
                <?php
                }elseif ($req == "cleaner") {
                    ?>
                        <div class="ser">
                            <?php require 'cleaning.php' ?>
                        </div>
                    <?php
                    } else {
                    header("location:main.php")
                ?>

                <?php
                }
                ?>
            </div>

        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>