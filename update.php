<?php
require 'Admin/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $dist = $_POST['dist'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $landmark = $_POST['landmark'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $updateQuery = "UPDATE user SET name='$name', contact='$contact', area='$area', city='$city', dist='$dist', state='$state', pin='$pin', landmark='$landmark', password='$password' WHERE email = '$email';";
        if (mysqli_query($conn, $updateQuery)) {
            $res = 1;
?>
            <script>
                window.location.href = "plan.php";
            </script>
        <?php
        } else {
            // $res = 0;
            // $message = "Error updating profile";
            // echo $message;
        ?>
            <script>
                window.location.href = "plan.php";
            </script>
        <?php
        }
    } else {
        // $res = 0;
        // $message = "Password do not match";
        // echo $message;
        ?>
        <script>
            window.location.href = "plan.php";
        </script>
<?php
    }
}
?>