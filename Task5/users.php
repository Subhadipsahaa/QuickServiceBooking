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
                                <th>User Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone No.</th>
                                <th>Area</th>
                                <th>City</th>
                                <th>District</th>
                                <th>State</th>
                                <th>Pin</th>
                                <th>Landmark</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $src = "SELECT * FROM user ";
                            $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                            if (mysqli_num_rows($rs) > 0) {

                                while ($rec = mysqli_fetch_assoc($rs)) {
                            ?>
                                    <tr>
                                        <td><?php echo $rec['u_id'] ?></td>
                                        <td><?php echo $rec['name'] ?></td>
                                        <td><?php echo $rec['email'] ?></td>
                                        <td><?php echo $rec['contact'] ?></td>
                                        <td><?php echo $rec['area'] ?></td>
                                        <td><?php echo $rec['city'] ?></td>
                                        <td><?php echo $rec['dist'] ?></td>
                                        <td><?php echo $rec['state'] ?></td>
                                        <td><?php echo $rec['pin'] ?></td>
                                        <td><?php echo $rec['landmark'] ?></td>
                                        <td><?php echo $rec['password'] ?></td>
                                        <td>
                                            <form name="del<?php echo $i ?>" method="post" action="update.php">
                                                <input type="hidden" name="uid" value="<?php echo $rec['u_id'];  ?>">
                                                <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form name="del<?php echo $i ?>" method="post" action="udelete.php">
                                                <input type="hidden" name="uid" value="<?php echo $rec['u_id'];  ?>">
                                                <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-regular fa-trash-can" style="color: #f00000;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
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