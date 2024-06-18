<?php
require 'Admin/dbcon.php';
require 'sessionstart.php';

$error_msg = "";
$res = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? null;
    $name = $_POST['name'] ?? null;
    $contact = $_POST['contact'] ?? null;
    $rpassword = $_POST['rpassword'] ?? null;
    $sreq = $_POST['sreq'] ?? null;
    $otp = $_POST['otp'] ?? null;
    if ($email_id && !$password && !$otp) {
        // Check if email exists
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // $_SESSION['muser'] = $email_id;
            $res = 1; // Email exists
        } else {
            $res = 3;
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }

    if (isset($name) && isset($contact)) {
        $res = 4;
    }


    if ($otp) {
        $sql1 = "SELECT v_code FROM user WHERE email = '$email_id' AND password = '$password'";
        $resultv = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        if (mysqli_num_rows($resultv) == 1) {
            $vercode = mysqli_fetch_assoc($resultv);
            // Compare OTP entered by the user with the stored OTP
            if ($vercode['v_code'] == $otp) {
                // OTP matched, update user status
                $upd = mysqli_query($conn, "UPDATE user SET v_status='1' WHERE email='$email_id'") or die(mysqli_errno($conn));
                $res = 10; // OTP verification successful
                $_SESSION['muser'] = $vercode['email'];
            }
        } else {
            $error_msg = "Couldn't verify OTP." . $vercode['v_code']; // Update error message
        }
    }


    if ($email_id && $password && !$otp) {
        // Check email and password
        $stmt = $conn->prepare("SELECT name,email, password, v_status FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email_id, $password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($usname, $email, $npassword, $v_status); // Bind the result variables
        $stmt->fetch();
        if ($v_status == '1') {
            if ($stmt->num_rows == 1) {
                $_SESSION['muser'] = $email_id;
                $res = 2; // Email and password are correct
            } else {
                $res = 7;
                $error_msg = "Invalid Email or Password.";
            }
        } elseif ($v_status == '0') {
            $res = 9;
            $error_msg = $otp;
        }

        $stmt->close();
    }

    if (isset($sreq) && isset($email_id)) {
        if ($sreq) {
            $vcode = rand(000000, 999999);
            $sql = "UPDATE user SET v_code= '$vcode' WHERE email = '$email_id'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($result == 1) {
                $to_email = $email_id;
                $subject = "E-Mail Verification";
                $body = "$usname otp-$vcode";
                $headers = "From: QuickServiceBooking<quickservicebooking.care@gmail.com>\r\n";
                $headers .= "Reply-To: quickservicebooking.care@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                if (mail($to_email, $subject, $body, $headers)) {
                    $res = 12;
                } else {
                    $res = 9;
                }
            }
        } else {
            $error_msg = "coundn't send $email_id";
        }
    }



    if ($email_id && $name && $contact && $rpassword) {
        $stmt = $conn->prepare("INSERT INTO `user` ( `name`, `email`, `contact`, `password`) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email_id, $contact, $rpassword);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->affected_rows > 0) {
            $res = 5; // Email exists
        } else {
            $res = 6;
            $error_msg = "Invalid Email.";
        }
        $stmt->close();
    }
    header('Content-Type: application/json');
    echo json_encode(['res' => $res, 'error' => $error_msg]);
    exit();
}
