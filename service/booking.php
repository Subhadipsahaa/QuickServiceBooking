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
    <link rel="stylesheet" href="css/booking.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>Title</title>
</head>

<body>
    <?php
    $page = $_POST['page'];
    $catag = $_POST['catag'];
    $tname = $_POST['table'];
    $sql = "SELECT * FROM $tname WHERE plans = '$catag'";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($res) > 0) {
        $reco = mysqli_fetch_assoc($res);
    ?>
        <?php require '../menu.php' ?>
        <main>
            <div class="bcontainer">
                <div class="photodiv12" style="width: 50%;">
                    <img src="<?php echo $reco['img_loc'] ?>" class="photo12" alt="Img" style="width: 100%; padding: 10px;border: #adadad45 solid 1px; box-shadow: 1px 1px 5px rgba(124, 124, 147, 0.3)">
                </div>
                <div class="info">
                    <h3><?php echo $reco['plans'] ?></h3>
                    <div class="star"><i class="fa-solid fa-star" style="color:white"></i>
                        <span style="color:white;">
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
                        </span>
                    </div>
                    <div class="forms">
                        <form id="bookingForm" method="post" action="bookingbackend.php">
                            <div class="form-group">
                                <input type="hidden" id="uid" name="uid" value="<?php echo $rec2['u_id'];; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="service_name" name="service_name" value="<?php echo $tname; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="category" name="category" value="<?php echo $catag ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sed_time">Preferred Time</label>
                                <input type="time" class="form-control" id="sed_time" name="sed_time" required>
                            </div>
                            <div class="form-group">
                                <label for="sed_date">Preferred Date</label>
                                <input type="date" class="form-control" id="sed_date" name="sed_date" required>
                            </div>
                            <!-- Hidden fields for booked time and booked date (fetched via JS on submit) -->
                            <input type="hidden" id="booked_time" name="booked_time">
                            <input type="hidden" id="booked_date" name="booked_date">
                            <button class="btn btn-dark col-12" type="submit" style="height: 10vh; border-radius:10px;">Book Service</button>

                        </form>
                    </div>
                </div>
            </div>
        </main>
        <div class="rev" style="border: #adadad45 solid 1px; box-shadow: 1px -5px 5px rgba(124, 124, 147, 0.3); margin-top:25px">
            <?php require '../review.php' ?>
        </div>

    <?php
    }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        // Fetch current time and date and set them in hidden fields before form submission
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Fetch current time and date
            var now = new Date();
            var bookedTime = now.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
            var bookedDate = now.toISOString().slice(0, 10);

            // Set fetched values in hidden input fields
            document.getElementById('booked_time').value = bookedTime;
            document.getElementById('booked_date').value = bookedDate;

            // Submit the form
            this.submit();
        });
    </script>
</body>

</html>