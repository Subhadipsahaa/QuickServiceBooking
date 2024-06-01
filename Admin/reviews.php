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
                                <th>Reviews Id</th>
                                <th>User</th>
                                <th>Reviews</th>
                                <th>Rating</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Service boy</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // r_id u_id content rating sboy_id;
                            if (isset($_POST['sboyid'])) {
                                $sboyid = $_POST['sboyid'];
                                $src = "SELECT * FROM reviews where sboy_id=$sboyid";
                                $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                                if (mysqli_num_rows($rs) > 0) {

                                    while ($rec = mysqli_fetch_assoc($rs)) {
                            ?>

                                        <tr>
                                            <td><?php echo $rec['r_id'] ?></td>
                                            <td>
                                                <?php $uid = $rec['u_id'];
                                                // r_id u_id content rating sboy_id;
                                                $src1 = "SELECT u_id,name FROM user";
                                                $rs1 = mysqli_query($conn, $src1) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs1) > 0) {

                                                    while ($rec1 = mysqli_fetch_assoc($rs1)) {
                                                        if ($uid == $rec1['u_id']) {
                                                            echo $rec1['name'];
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rec['content'] ?></td>
                                            <td><?php echo $rec['rating'] ?></td>
                                            <td><?php echo $rec['time'] ?></td>
                                            <td><?php echo $rec['date'] ?></td>
                                            <td>
                                                <?php $sboyid = $rec['sboy_id'];
                                                // r_id u_id content rating sboy_id;
                                                $src2 = "SELECT sboy_id,name FROM serviceboys";
                                                $rs2 = mysqli_query($conn, $src2) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs2) > 0) {

                                                    while ($rec2 = mysqli_fetch_assoc($rs2)) {
                                                        if ($sboyid == $rec2['sboy_id']) {
                                                            echo $rec2['name'];
                                                            break;
                                                        }
                                                    }
                                                }

                                                ?></td>
                                            <td>
                                                <form name="del<?php echo $i ?>" method="post" action="#">
                                                    <input type="hidden" name="uid" value="<?php echo $rec['sboy_id'];  ?>">
                                                    <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form name="del<?php echo $i ?>" method="post" action="delete/rdelete.php">
                                                    <input type="hidden" name="uid" value="<?php echo $rec['sboy_id'];  ?>">
                                                    <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-regular fa-trash-can" style="color: #f00000;"></i></button>
                                                </form>
                                            </td>
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
                            } else {
                                $src = "SELECT * FROM reviews ";
                                $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                                if (mysqli_num_rows($rs) > 0) {

                                    while ($rec = mysqli_fetch_assoc($rs)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $rec['r_id'] ?></td>
                                            <td>
                                                <?php $uid = $rec['u_id'];
                                                $src1 = "SELECT u_id,name FROM user";
                                                $rs1 = mysqli_query($conn, $src1) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs1) > 0) {

                                                    while ($rec1 = mysqli_fetch_assoc($rs1)) {
                                                        if ($uid == $rec1['u_id']) {
                                                            echo $rec1['name'];
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rec['content'] ?></td>
                                            <td><?php echo $rec['rating'] ?></td>
                                            <td><?php echo $rec['time'] ?></td>

                                            <td><?php echo $rec['date'] ?></td>

                                            <td>
                                                <?php $sboyid = $rec['sboy_id'] ?>
                                                <?php
                                                // r_id u_id content rating sboy_id;
                                                $src2 = "SELECT sboy_id,name FROM serviceboys";
                                                $rs2 = mysqli_query($conn, $src2) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs2) > 0) {

                                                    while ($rec2 = mysqli_fetch_assoc($rs2)) {
                                                        if ($sboyid == $rec2['sboy_id']) {
                                                            echo $rec2['name'];
                                                            break;
                                                        }
                                                    }
                                                }

                                                ?></td>
                                            <td>
                                                <form name="del<?php echo $i ?>" method="post" action="#">
                                                    <input type="hidden" name="rid" value="<?php echo $rec['sboy_id'];  ?>">
                                                    <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form name="del<?php echo $i ?>" method="post" action="delete/rdelete.php">
                                                    <input type="hidden" name="rid" value="<?php echo $rec['r_id'];  ?>">
                                                    <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-regular fa-trash-can" style="color: #f00000;"></i></button>
                                                </form>
                                            </td>
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