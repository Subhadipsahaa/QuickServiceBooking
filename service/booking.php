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
        <nav class="navbar navbar-light bg-light" style="box-shadow: 0 10px 10px -10px rgba(124, 124, 147, 0.3);">
            <a class="navbar-brand" href="<?php echo $page; ?>">
                <div class="backicon"><i class="fa-solid fa-arrow-left"></i></div>
            </a>
        </nav>
        <main>
            <div class="bcontainer">
                <div class="photodiv">
                    <img src="<?php echo $reco['img_loc'] ?>" class="photo" alt="Img">
                </div>
                <div class="info">
                    <h3><?php echo $reco['plans'] ?></h3>
                    <div class="star"><i class="fa-solid fa-star" style="color:white"></i></div>
                </div>

            </div>
        </main>
    <?php
    }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>