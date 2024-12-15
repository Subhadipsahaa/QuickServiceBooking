<?php
require 'Admin/dbcon.php';
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
    </style>
</head>

<body>
    <main>
        <?php require 'menu.php' ?>
        <table class="table" style="margin-top: 60px;">
            <?php
            $uid = $rec2['u_id'];
            $sql = "SELECT * FROM bookings WHERE u_id = '$uid' ORDER BY b_id DESC";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
            ?>
                <thead>
                    <tr>
                        <th style="text-align: center;">Booking Id</th>
                        <th style="text-align: center;">Service Name</th>
                        <th style="text-align: center;">Catagory</th>
                        <th style="text-align: center;">Scheduled Time</th>
                        <th style="text-align: center;">Scheduled Date</th>
                        <th style="text-align: center;">Service Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    // b_id 	u_id 	service_name 	category 	time 	date 	sed_time 	sed_date 	s_boy 	code 	s_status 	
                    while ($reco = mysqli_fetch_assoc($res)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $reco['b_id']; ?></td>
                            <td><?php echo $reco['service_name']; ?></td>
                            <td><?php echo $reco['category']; ?></td>
                            <td><?php echo $reco['sed_time']; ?></td>
                            <td><?php echo $reco['sed_date']; ?></td>
                            <?php if ($reco['s_status'] == 0) {
                            ?>
                                <td style="color: #856404;background-color: #fff3cd;border-color: #ffeeba;;">
                                    Pending
                                </td>
                            <?php
                            } elseif ($reco['s_status'] == 1) {
                            ?>
                                <td style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;" class="align-middle">
                                    Completed
                                </td>
                            <?php
                            } elseif ($reco['s_status'] == 3) {
                            ?>
                                <td style="color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;">
                                    Canceled
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($reco['s_status'] != 3 && $reco['s_status'] != 1) {
                            ?>
                                <td>
                                    <form name="del<?php echo $i ?>" method="post" action="cancel.php" style="width:100%: height:100%">
                                        <input type="hidden" name="bid" value="<?php echo $reco['b_id'];  ?>">
                                        <button type="submit" class="btn" style="width: 100%;height:100%;color: #f00000;">Cancel</button>
                                    </form>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($reco['s_status'] != 3  && $reco['s_status'] != 0) {
                            ?>
                                <td>

                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i><br>Write Review
                                    </button>

                                </td>
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
                                                    <h3 class="heading">Review</h3>
                                                </div>
                                                <form method="post" class="form" name="rev<?php echo $i; ?>" id="loginForm">
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Review</label>
                                                        <textarea class="form-control" id="message-text"></textarea>
                                                    </div>
                                                    <label>
                                                        <input type="radio" name="option" value="5">
                                                        <i class="fa-solid fa-face-smile-beam custom-radio" style="color: #2d830c; font-size:45px"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="option" value="4">
                                                        <i class="fa-solid fa-face-smile custom-radio" style="color: #41d709; font-size:45px"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="option" value="3">
                                                        <i class="fa-solid fa-face-meh custom-radio" style="color: #efe138; font-size:45px"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="option" value="2">
                                                        <i class="fa-solid fa-face-frown-open custom-radio" style="color: #ff7d1e; font-size:45px"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="option" value="1">
                                                        <i class="fa-solid fa-face-frown custom-radio" style="color: #ff1111; font-size:45px"></i>
                                                    </label>
                                                    
                                                    <input type="submit" class="revbtn" value="Submit">
                                                </form>
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    // Get form data
                                                    $review_text = $_POST['message-text'];
                                                    $rating = $_POST['rating'];

                                                    // Validate the data
                                                    if (empty($review_text) || empty($rating)) {
                                                        echo "Review text and rating are required.";
                                                    } else {
                                                        // Prepare an SQL statement to prevent SQL injection
                                                        $stmt = $conn->prepare("INSERT INTO reviews (u_id, content, rating, time, date, sboy_id, service_name) VALUES (?, ?, ?, NOW(), CURDATE(), ?, ?)");

                                                        // Bind parameters
                                                        $u_id = 1; // Example user ID, replace with actual user ID
                                                        $sboy_id = 1; // Example sboy ID, replace with actual sboy ID
                                                        $service_name = 'Service Name'; // Example service name, replace with actual service name

                                                        $stmt->bind_param("issi", $u_id, $review_text, $rating, $sboy_id, $service_name);

                                                        // Execute the query
                                                        if ($stmt->execute()) {
                                                            echo "Review submitted successfully!";
                                                        } else {
                                                            echo "Error: " . $stmt->error;
                                                        }

                                                        // Close the statement
                                                        $stmt->close();
                                                    }
                                                }
                                                ?>

                                            <?php
                                        }
                                            ?>
                        </tr>
                    <?php
                    }
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