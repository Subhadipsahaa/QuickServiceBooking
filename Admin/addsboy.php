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
                    <h2 class="mt-4">Add New Service Boy</h2>
                </div>
                <div class="col-12">
                    <div class="col-6">
                        <form name="frm" method="post"><!-- enctype="multipart/form-data" -->

                            <!-- sboy_id name email contact service_name -->
                            <div class="form-group">
                                <label for="sboy_name">Service Boy Name:</label>
                                <input type="text" name="sboy_name" id="sboy_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="tel" name="contact" id="contact"  minlength="10" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="s_name">Service Name:</label>
                                <!-- <input type="text" name="s_name" id="s_name" class="form-control" required> -->
                                <?php
                                            $sql1 = "SELECT * FROM services";
                                            $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                            ?>
                                <select style="margin-top:10px;padding:8px;width:100%;border:0px;border-radius:10px" name="s_name" id="s_name">
                                                <?php
                                                $j = 1;
                                                if (mysqli_num_rows($res1) > 0) {
                                                    while ($reco = mysqli_fetch_assoc($res1)) {

                                                ?>
                                                        <option value="<?php echo $reco['service_name'];?>"><?php echo "No: " . $j . "  " . $reco['service_name']; ?></option>
                                                <?php
                                                        $j++;
                                                    }
                                                }
                                                ?>
                                            </select>
                            </div>
                            <div class="from-group mt-3">
                                <input type="submit" name="ok" value="Submit" class="btn btn-dark">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ok'])) {
                            $sboy_name = $_POST['sboy_name'];
                            $email_id = $_POST['email'];
                            $contact = $_POST['contact'];
                            $s_name = $_POST['s_name'];
                            if (isset($sboy_name) && isset($email_id) && isset($email_id) && isset($s_name)) {
                                $sqlquary = "INSERT INTO `serviceboys` ( `name`, `email`, `contact`, `service_name`) VALUES ('$sboy_name', '$email_id', '$contact', '$s_name') ";
                                $result = mysqli_query($conn, $sqlquary) or die(mysqli_error($conn));
                                if ($result == 1) {
                        ?>
                                    <script>
                                        window.location.href = "sboy.php";
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