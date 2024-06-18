<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
require 'unsetpsession.php';
$fname = $_FILES['ff']['name'];
$destination = '../img/catag/' . rand(00000000, 99999999) . "_" . $fname;
$source = $_FILES['ff']['tmp_name'];
$table = $_POST['tname'];
$fextarr = explode(".", $fname);
$fext = end($fextarr);
$id = $_POST['pid'];
$ftype = array('png', 'PNG', 'JPEG', 'jpeg', 'jpg', 'JPG', 'webp', 'WEBP');
if (in_array($fext, $ftype)) {
    $sql2 = "SELECT * FROM $table WHERE p_id ='$id'";
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if (mysqli_num_rows($res2) > 0) {
        $result = mysqli_fetch_assoc($res2);
        $fpath = $result['img_loc'];
        if ($fpath != null) {
            unlink($fpath);
        }
    }
    if (move_uploaded_file($source, $destination)) {
        $sql = "UPDATE $table SET img_loc='$destination' WHERE p_id='$id'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($con));
        if ($res == 1) {
?>
            <form id="redirectForm" action="photos.php" method="post">
                <input type="hidden" name="sername" value="<?php echo $table; ?>">
            </form>
            <script type="text/javascript">
                document.getElementById("redirectForm").submit();
            </script>
        <?php
        } else {

        ?>
            <form id="redirectForm" action="photos.php" method="post">
                <input type="hidden" name="sername" value="<?php echo $table; ?>">
            </form>
            <script type="text/javascript">
                document.getElementById("redirectForm").submit();
            </script>
        <?php
        }
    } else {
        ?>
        <form id="redirectForm" action="photos.php" method="post">
            <input type="hidden" name="sername" value="<?php echo $table; ?>">
        </form>
        <script type="text/javascript">
            document.getElementById("redirectForm").submit();
        </script>
    <?php
    }
} else {
    ?>
    <form id="redirectForm" action="photos.php" method="post">
        <input type="hidden" name="sername" value="<?php echo $table; ?>">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
<?php
}
?>