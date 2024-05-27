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
                        <?php
                        function capitalizeFirstLetter($string)
                        {
                            $string = strtolower($string);
                            $string = ucfirst($string);
                            return $string;
                        }

                        $tname = $_SESSION['service_name'];
                        $src = "SELECT * FROM services ";
                        $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                        if (mysqli_num_rows($rs) > 0) {
                            while ($rec = mysqli_fetch_assoc($rs)) {
                                if ($rec['service_name'] == $tname) {
                                    $s_id = $rec['s_id'];
                                    break;
                                }
                            }
                        }
                        ?>
                        <h1 class="display-4"><?php echo capitalizeFirstLetter($tname); ?></h1>
                        <form name="frm" method="post"><!-- enctype="multipart/form-data" -->
                            <div class="form-group">
                                <label for="p_name">Plan Name</label>
                                <input type="text" name="p_name" id="p_name" placeholder="Enter Plan" class="form-control">
                            </div>
                            <div class="from-group">
                                <label for="description">Description</label>
                                <textarea rows="2" name="description" id="description" class="form-control" placeholder="Enter Description" required></textarea>
                            </div>
                            <div>
                                <label for="price">Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['ok'])) {
                                    $plans = $_POST['p_name'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];
                                    $sql = "INSERT INTO $tname (`plans`, `description`, `price`, `s_id`) VALUES ('$plans', ' $description', ' $price', '$s_id') ";
                                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                    if (isset($res)) {
                                        $_SESSION['add'] = 1;
                                    }

                            ?>


                            <?php

                                }
                            }

                            ?>
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <input type="submit" name="ok" value="Add<?php if (isset($_SESSION['add'])) {
                                                                                if ($_SESSION['add'] == 1) {
                                                                                    echo " next";
                                                                                }
                                                                            } ?> Plan" class="btn btn-primary">
                            </div>

                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_SESSION['add'])) {
                                if ($_SESSION['add'] == 1) {
                        ?>
                                    <form name="frm3" method="post">
                                        <div class="btn-group mt-3" role="group" div class="from-group mt-3" aria-label="Second group">
                                            <input type="submit" name="done" value="Done" class="btn btn-primary">
                                        </div>
                                        <?php

                                        if (isset($_POST['done'])) {
                                            if ($_SESSION['add'] == 1) {
                                                unset($_SESSION['add']);
                                                unset($_SESSION['service_name']);
                                        ?>
                                                <script>
                                                    window.location.href = "services.php";
                                                </script>
                                        <?php
                                            }
                                        }

                                        ?>
                                    </form>
                                    <?php
                                    if ($_SESSION['add'] == 1) {
                                    ?>
                                        <div class="alert alert-success mt-3" role="alert">
                                            Successful.
                                        </div>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            Something Wrong! Please try again later.
                                        </div>

                                    <?php
                                    }
                                    ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>