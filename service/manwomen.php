<?php
require '../Admin/dbcon.php';
require '../sessionstart.php';
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
        <!-- <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping" style="color: black;"></i></a> -->
    </nav>
    <main>

        <div class="catagoris">
            <h2 style="padding:8px;">Man & Women</h2>
            <div class="div1">
                <!-- <div class="beauty"> -->
                    <table class="t1">
                        <div>
                            <h3 style="background-color: #eee; padding:10px;padding-left:20px">Beauty</h3>
                        </div>
                        <?php
                        $sql = "SELECT * FROM beauty ";
                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        ?>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($res) > 0) {
                                while ($reco = mysqli_fetch_assoc($res)) {

                            ?>
                                    <tr class="trow">
                                        <td scope="row"><img src="<?php echo $reco['img_loc'] ?>" alt="img" class="photo"></td>
                                        <td><div class="star"><i class="fa-solid fa-star" style="color:white"></i></div></td>
                                        <td><?php echo $reco['plans'] ?></td>
                                        <td><?php echo $reco['price'] ?><br><a href="#" class="btn bg-dark text-light">Book Now</a></td>
                                        <!-- <td></td> -->
                                    </tr>
                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <!-- </div> -->
                <table class="t1">
                        <div>
                            <h3 style="background-color: #eee; padding:10px;padding-left:20px">Salon</h3>
                        </div>
                        <?php
                        $sql = "SELECT * FROM salon ";
                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        ?>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($res) > 0) {
                                while ($reco = mysqli_fetch_assoc($res)) {

                            ?>
                                    <tr class="trow">
                                        <td scope="row"><img src="<?php echo $reco['img_loc'] ?>" alt="img" class="photo"></td>
                                        <td><?php echo $reco['plans'] ?></td>
                                        <td><?php echo $reco['price'] ?><br><a href="#" class="btn bg-dark text-light">Book Now</a></td>
                                        <!-- <td></td> -->
                                    </tr>
                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
            </div>

        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>