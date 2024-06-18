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
    <?php require('menu.php');
    $tabname = $_POST['sername']; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4"><?php echo $tabname; ?> </h2>
                <div class="col-12">
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>Photos</th>
                                <th>Categories</th>
                            </tr>
                        </thead>
                        <?php
                        $sql12 = "SELECT * FROM $tabname";
                        $j = 1;
                        $res = mysqli_query($conn, $sql12) or die(mysqli_error($conn));
                        if (mysqli_num_rows($res) > 0) {
                            while ($reco = mysqli_fetch_assoc($res)) {

                        ?>
                                <tbody>
                                    <tr>
                                        <td style="width:200px;">
                                            <?php
                                            if ($reco['img_loc'] != null) {
                                            ?>
                                                <img src="<?php echo $reco['img_loc']; ?>" alt="img" width="200px">
                                            <?php
                                            } else {
                                            ?>
                                                <form name="src<?php echo $j; ?>" method="post" action="fupload.php" enctype="multipart/form-data">
                                                    <div class="form-group col-6 mx-auto text-center" style="width: 100%; padding:50px">
                                                    <label for="ff">Add File</label>
                                                        <input type="file" name="ff" id="ff" class="form-control">
                                                        <input type="hidden" name="pid" value="<?php echo $reco['p_id'];  ?>">
                                                        <input type="hidden" name="tname" value="<?php echo $tabname;  ?>">
                                                    </div>
                                                    <input type="submit" class="btn btn-dark" value="Upload File" name="submit" style="width: 100%;">
                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo "No: " . $j . "  " . $reco['plans']; ?>
                                        </td>
                                        <?php
                                        if ($reco['img_loc'] != null) {
                                        ?>    
                                            <td>
                                                <form name="src<?php echo $j; ?>" method="post" action="fupload.php" enctype="multipart/form-data">
                                                    <div class="form-group col-6 mx-auto" style="width: 100%; padding:50px">
                                                        <input type="file" name="ff" id="ff" class="form-control">
                                                        <input type="hidden" name="pid" value="<?php echo $reco['p_id'];  ?>">
                                                        <input type="hidden" name="tname" value="<?php echo $tabname;  ?>">
                                                    </div>
                                                    <input type="submit" class="btn btn-dark" value="Upload File" name="submit" style="width: 100%;">
                                                </form>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                <?php
                                $j++;
                            }
                        }
                                ?>
                                    </tr>
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