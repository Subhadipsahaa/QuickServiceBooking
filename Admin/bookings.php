<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
require 'unsetpsession.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashborad Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('menu.php') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">All User</h2>
                <div class="col-12">
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>Booking Id</th>
                                <th>Service Name</th>
                                <th>Category</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Schedule Time</th>
                                <th>Schedule Date</th>
                                <th>Service Boy</th>
                                <th>Service Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $src = "SELECT * FROM bookings";
                            $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                            if (mysqli_num_rows($rs) > 0) {

                                while ($rec = mysqli_fetch_assoc($rs)) {
                            ?>

                                    <tr>
                                        <td><?php echo $rec['b_id'] ?></td>
                                        <td><?php echo $rec['service_name']; ?> </td>
                                        <td><?php echo $rec['category'] ?></td>
                                        <td><?php echo $rec['time'] ?></td>
                                        <td><?php echo $rec['date'] ?></td>

                                        <td><?php echo $rec['sed_time'] ?></td>

                                        <td><?php echo $rec['sed_date'] ?></td>
                                        <td><?php echo $rec['s_boy'] ?></td>
                                        <td><?php if ($rec['s_status'] == 0) {
                                                echo "Pending";
                                            } elseif ($rec['s_status'] == 1) {
                                                echo "Completed";
                                            } ?></td>
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
        </main>
        <div>
            <?php require('footer.php') ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>