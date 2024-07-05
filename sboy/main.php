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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <?php
        echo $_POST['name'];
        if (isset($_POST['ok'])) {
            $username = $_POST['name'];
            $pwd = $_POST['num'];
            $src = "SELECT name,contact FROM serviceboys WHERE name='$username'";
            $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
            if (mysqli_num_rows($rs) > 0) {
                $rec = mysqli_fetch_assoc($rs);
                $vpassword = $rec['contact'];
                $adminid = $rec['name'];
                if ($pwd == $vpassword) {
                    $res = 1;
                } else {
                    $res = 0;
                }
            } else {
                header("location:index.php");
            }
            if (isset($res)) {
                if ($res == 1) {
                    header("location:main.php");
                } else {
                    header("location:index.php");
                }
            }
    ?>
            <table class="table" style="margin-top: 60px;">
                <?php
                $sql = "SELECT * FROM bookings WHERE s_boy = '$username' ORDER BY b_id DESC";
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
                        // b_id 	u_id 	service_name 	category 	time 	date 	sed_time 	sed_date 	s_boy 	code 	s_status 	
                        while ($reco = mysqli_fetch_assoc($res)) {
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
                                    <td style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;">
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
    <?php
        }
    
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>