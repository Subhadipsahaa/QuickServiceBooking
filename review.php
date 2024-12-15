<?php
require_once('Admin/dbcon.php');
?>
<body class="sb-nav-fixed">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="col-12">
                    <h3 style="margin-top: 5px;"><strong>Reviews</strong></h3>
                    <table class="table" style="width: 100%;">
                        <tbody>
                            <?php
                            if (isset($catag)) {
                                $src = "SELECT * FROM reviews  WHERE service_name = '$catag' ";
                                $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                                if (mysqli_num_rows($rs) > 0) {

                                    while ($rec = mysqli_fetch_assoc($rs)) {
                            ?>

                                        <tr>
                                            <td>
                                                <?php $uid = $rec['u_id'];
                                                $src1 = "SELECT u_id,name FROM user";
                                                $rs1 = mysqli_query($conn, $src1) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs1) > 0) {

                                                    while ($rec1 = mysqli_fetch_assoc($rs1)) {
                                                        if ($uid == $rec1['u_id']) {
                                                            echo "<i class='fa-solid fa-user'></i>" . " " . $rec1['name'];
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rec['content'] ?></td>
                                            <td>
                                                <div class="star"><i class="fa-solid fa-star" style="color:white"></i>
                                                    <span style="color:white;">
                                                        <?php echo $rec['rating'] ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td><?php echo $rec['time'] ?>
                                                <br><?php echo $rec['date'] ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="11" class="text-center"><?php echo "No review Found" ?></td>
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
    </div>
</body>

