<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
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
                <div>
                    <h2 class="mt-4">Add New Service</h2>
                </div>
                <div class="col-12">
                    <div class="col-6">
                        <form name="frm" method="post" ><!-- enctype="multipart/form-data" -->
                            <div class="form-group">
                                <label for="s_name">Service Name</label>
                                <input type="text" name="s_name" id="s_name" class="form-control">
                            </div>
                            <div class="from-group mt-3">
                                <input type="submit" name="ok" value="Add Services" class="btn btn-primary">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ok'])) {
                            $service_name = $_POST['s_name'];
                            if (isset($service_name))
                                $src = "INSERT INTO `services` (`service_name`) VALUES ( '$service_name') ";
                            $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                            if ($rs == 1) {
                                $_SESSION['service_name']=$service_name;
                                $sql = "CREATE TABLE `quickservicebooking`. $service_name (`p_id` INT(255) NOT NULL AUTO_INCREMENT , `plans` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , `price` VARCHAR(255) NOT NULL , `s_id` INT(255) NOT NULL , UNIQUE `1` (`p_id`)) ENGINE = InnoDB; ";
                                $rsc = mysqli_query($conn, $sql) or die(mysqli_error($conn));;
                                if ($rsc == 1) {
                                    ?>
                                    <script>
                                        window.location.href="plan.php";
                                    </script>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </main>
        <?php require('footer.php') ?>
    </div>
    <!-- </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>