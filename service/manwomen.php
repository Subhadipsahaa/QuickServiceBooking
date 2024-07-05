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
            <h2 style="padding:8px;">Man & Women</h2>
            <div class="div1">
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
                                    <td class="ptd"><img src="<?php echo $reco['img_loc'] ?>" alt="img" class="photo"></td>
                                    <td style="padding: 15px;">
                                        <div class="star"><i class="fa-solid fa-star sticon" style="color:white"></i>

                                            <?php
                                            $splan = $reco['plans'];
                                            $sql11 = "SELECT * FROM reviews WHERE service_name = '$splan'";
                                            $res11 = mysqli_query($conn, $sql11) or die(mysqli_error($conn));

                                            if (mysqli_num_rows($res11) > 0) {
                                                $totalRating = 0;
                                                $numRatings = 0;

                                                while ($row = mysqli_fetch_assoc($res11)) {
                                                    $totalRating += $row['rating'];
                                                    $numRatings++;
                                                }
                                                $averageRating = $totalRating / $numRatings;

                                                echo round($averageRating, 2);
                                            } else {
                                                echo 0;
                                            }
                                            ?>

                                        </div>
                                    </td>
                                    <td><?php echo $reco['plans'] ?></td>
                                    <td><?php echo $reco['price'] ?><br>
                                        <form name="booking<?php echo $i ?>" action="booking.php" method="post">
                                            <input type="hidden" name="page" value="<?php echo "manwomen.php";  ?>">
                                            <input type="hidden" name="catag" value="<?php echo $reco['plans'];  ?>">
                                            <input type="hidden" name="table" value="<?php echo "Beauty";  ?>">
                                            <button type="submit" class="btn bg-dark text-light" name="ok" style="width: 100%;height:100%;">Book Now </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php

                            }
                        }
                        ?>
                    </tbody>
                </table>
                <table class="t1">
                    <div>
                        <h3 style="background-color: #eee; padding:10px;padding-left:20px">Salon</h3>
                    </div>
                    <?php
                    $sql = "SELECT * FROM salon ";
                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    $i = 1;
                    ?>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($res) > 0) {
                            while ($reco = mysqli_fetch_assoc($res)) {

                        ?>
                                <tr class="trow">
                                    <td class="ptd"><img src="<?php echo $reco['img_loc'] ?>" alt="img" class="photo"></td>
                                    <td style="padding: 15px;">
                                        <div class="star"><i class="fa-solid fa-star sticon" style="color:white"></i>

                                            <?php
                                            $splan = $reco['plans'];
                                            $sql11 = "SELECT * FROM reviews WHERE service_name = '$splan'";
                                            $res11 = mysqli_query($conn, $sql11) or die(mysqli_error($conn));

                                            if (mysqli_num_rows($res11) > 0) {
                                                $totalRating = 0;
                                                $numRatings = 0;

                                                while ($row = mysqli_fetch_assoc($res11)) {
                                                    $totalRating += $row['rating'];
                                                    $numRatings++;
                                                }
                                                $averageRating = $totalRating / $numRatings;

                                                echo round($averageRating, 2);
                                            } else {
                                                echo 0;
                                            }

                                            ?>

                                        </div>
                                    </td>
                                    <td><?php echo $reco['plans'] ?></td>
                                    <td><?php echo $reco['price'] ?><br>
                                        <form name="booking<?php echo $i ?>" method="post" action="booking.php">
                                            <input type="hidden" name="page" value="<?php echo 'manwomen.php';  ?>">
                                            <input type="hidden" name="catag" value="<?php echo $reco['plans'];  ?>">
                                            <input type="hidden" name="table" value="<?php echo "Salon";  ?>">
                                            <button type="submit" class="btn bg-dark text-light" style="width: 100%;height:100%;">Book Now </button>
                                        </form>
                                    </td>
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