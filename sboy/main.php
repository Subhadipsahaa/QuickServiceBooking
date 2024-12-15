<?php
require '../Admin/dbcon.php';
?>
<?php
require 'sessionchecker.php';
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
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>Title</title>
    <style>
        .info {
            width: 50%;
            padding: 30px;
        }

        .star {
            background-color: green;
            padding: 5px;
            border-radius: 30px;
            width: 60px;
        }

        .forms {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        td {
            text-align: center;
        }

        .revbtn {
            height: 45px;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 6px;
            border-radius: 10px;
            border: 0px;
            margin-top: 20px;
            height: 50px;
            width: 100%;
            background-color: #3f3c3c;
            color: rgb(255, 255, 255);
            font-size: 15px;
        }

        .divpop {
            border-radius: 15px;
            padding: 20px;
        }

        input[type="radio"] {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            width: 0;
            height: 0;
            position: absolute;
            opacity: 0;
        }

        /* Style the label to create custom appearance */
        .custom-radio {
            display: inline-block;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
        }

        /* When radio button is checked, change appearance of the label */
        input[type="radio"]:checked+.custom-radio {
            border: 2px solid #6f6f6f;
            box-shadow: 0 4px 6px rgba(176, 176, 176, 0.18), 0 -4px 6px rgba(176, 176, 176, 0.18), 4px 0 6px rgba(176, 176, 176, 0.18), -4px 0 6px rgba(176, 176, 176, 0.18);
            /* background-color: #; */
        }
        .logout{
            color: black;
        }
        .logout:hover{
            color: #3f3c3c;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1" style="font-size:1.5rem;">Quick Service Booking</span>
        <a class="nav-link logout" href="logout.php" style="font-size:1.2rem;text-align:center;"><i class="fa-solid fa-right-from-bracket"></i>Log Out<span class="sr-only">(current)</span></a>
    </nav>
    <main>
        <table class="table" style="margin-top: 60px;">
            <?php
            $uid = $_SESSION['username'];
            $sql = "SELECT * FROM bookings WHERE s_boy = '$uid' ORDER BY b_id DESC";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
            ?>
                <thead>
                    <tr>
                        <th style="text-align: center;">Booking Id</th>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Catagory</th>
                        <th style="text-align: center;">Scheduled Time</th>
                        <th style="text-align: center;">Scheduled Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // b_id 	u_id 	service_name 	category 	time 	date 	sed_time 	sed_date 	s_boy 	code 	s_status 	
                    while ($reco = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $reco['b_id']; ?></td>
                            <td>
                                <?php
                                if (isset($reco['u_id'])) {
                                    $u_id = $reco['u_id'];
                                    $src2 = "SELECT * FROM user WHERE  u_id ='$u_id'";
                                    $rs2 = mysqli_query($conn, $src2) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($rs2) > 0) {
                                        $rec2 = mysqli_fetch_assoc($rs2);
                                    }
                                }
                                echo $rec2['name']; ?></td>
                            <td><?php echo $rec2['landmark'].",".$rec2['area'].",".$rec2['city'].","."<br>".$rec2['dist'].",".$rec2['state'].",".$rec2['pin']; ?></td>
                            <td><?php echo $reco['category']; ?></td>
                            <td><?php echo $reco['sed_time']; ?></td>
                            <td><?php echo $reco['sed_date']; ?></td>

                                <td>

                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Verify
                                    </button>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td colspan="11" class="text-center"><?php echo "No record Found" ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
        </table>



        <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content divpop">
                    <div class="pheader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h3 class="heading">Verify</h3>
                        </div>
                        <form method="post" class="form" id="loginForm">
                            <div class="form-group">
                                <label for="vcode" class="col-form-label">Enter Verification Code:</label>
                                <input type="tel" class="form-control" id="vcode">
                            </div>
                            <input type="submit" class="revbtn" value="verify">
                        </form>
                        <?php

                        ?>
                    </div>
                </div>
            </div>
        </div>



    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>