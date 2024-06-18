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
                <h2 class="mt-4">All Services</h2>
                <div class="col-12">
                    <a href="addservices.php" class="btn btn-dark border-0 text-white">Add New Services</a>
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>Service Id</th>
                                <th>Service Name</th>
                                <th colspan="3">Categories</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <!-- <th>Description</th> -->
                                <!-- <th>price</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $src = "SELECT * FROM services ";
                            $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                            if (mysqli_num_rows($rs) > 0) {

                                while ($rec = mysqli_fetch_assoc($rs)) {
                            ?>


                                    <tr>
                                        <td><?php echo $rec['s_id'] ?></td>
                                        <td><?php echo $rec['service_name'] ?></td>
                                        <td class="p-0">
                                            <?php
                                            $tname = strtolower($rec['service_name']);
                                            $sql = "SELECT * FROM $tname ";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            ?>
                                            <select style="width: 100%; height:65px;border:0px;">
                                                <?php
                                                $j = 1;
                                                if (mysqli_num_rows($res) > 0) {
                                                    while ($reco = mysqli_fetch_assoc($res)) {

                                                ?>
                                                        <option>
                                                            <?php echo "No: " . $j . "  " . $reco['plans'] . " , Price-" . $reco['price']; ?>
                                                        </option>
                                                <?php
                                                        $j++;
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <form name="addcat<?php echo $i ?>" method="post" action="photos.php">
                                                <input type="hidden" name="sername" value="<?php echo $rec['service_name'];  ?>">
                                                <button type="submit" class="btn" style="width: 100%;height:100%; font-size:20px;">
                                                    <i class="fa-regular fa-image"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form name="addcat<?php echo $i ?>" method="post" action="plan.php">
                                                <input type="hidden" name="serid" value="<?php echo $rec['s_id'];  ?>">
                                                <?php
                                                $_SESSION['service_name'] = $rec['service_name'];
                                                ?>
                                                <button type="submit" class="btn" style="width: 100%;height:100%; font-size:20px;"><i class="fa-regular fa-square-plus"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form name="update<?php echo $i ?>" method="post" action="#">
                                                <input type="hidden" name="serid" value="<?php echo $rec['s_id'];  ?>">
                                                <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form name="del<?php echo $i ?>" method="post" action="delete/servdelete.php">
                                                <input type="hidden" name="sername" value="<?php echo $rec['s_id'];  ?>">
                                                <button type="submit" class="btn" style="width: 100%;height:100%;"><i class="fa-regular fa-trash-can" style="color: #f00000;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center"><?php echo "No record Found" ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>