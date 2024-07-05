<?php
require_once('Admin/dbcon.php');
require_once('sessionchecker.php');
?>
<?php
if (isset($_POST['bid'])) {
    $bid = $_POST['bid'];




    $sql24 = "SELECT s_boy FROM bookings WHERE b_id = '$bid'";
    $res24 = mysqli_query($conn, $sql24) or die(mysqli_error($conn));

    if (mysqli_num_rows($res24) > 0) {
        $resc24 = mysqli_fetch_assoc($res24);
        $sboyname = $resc24['s_boy'];



        $sql = "SELECT name, tasks FROM serviceboys WHERE name = '$sboyname'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            $record = mysqli_fetch_assoc($res);
            $task = $record['tasks'] - 1;

            $sqlq52 = "UPDATE serviceboys SET tasks = '$task'  WHERE name ='$sboyname'";
            $rec52 = mysqli_query($conn, $sqlq52) or die(mysqli_error($conn));
            if ($rec52 == 1) {
                $sqlq = "UPDATE bookings SET  s_status = '3' WHERE b_id='$bid';";
                $rec = mysqli_query($conn, $sqlq) or die(mysqli_error($conn));
                if ($rec == 1) {
                    header("location:userbooking.php");
                } else {
                    header("location:userbooking.php");
                }
            } else {
                header("location:userbooking.php");
            }
        }
    }
}
?>
