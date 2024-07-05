<?php
// Include the database connection file
require '../Admin/dbcon.php';

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $u_id = mysqli_real_escape_string($conn, $_POST['uid']);
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $booked_time = mysqli_real_escape_string($conn, $_POST['booked_time']);
    $booked_date = mysqli_real_escape_string($conn, $_POST['booked_date']);
    $sed_time_24 = mysqli_real_escape_string($conn, $_POST['sed_time']);
    $sed_date = mysqli_real_escape_string($conn, $_POST['sed_date']);
    $vcode = rand(000000, 999999);



    function findLowestInAssocArray($assocArray)
    {
        $min = null; // Initialize min with null or some default value
        $minKey = null; // Initialize minKey with null or some default value

        foreach ($assocArray as $key => $value) {
            if ($min === null || $value < $min) {
                $min = $value; // Update min if a smaller value is found
                $minKey = $key; // Update minKey to current key
            }
        }

        return [$minKey, $min]; // Return an array containing both key and value
    }


    $data = []; // Initialize $data as an array to accumulate database results

    $sql = "SELECT name, tasks FROM serviceboys WHERE service_name = '$service_name'";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        while ($record = mysqli_fetch_assoc($res)) {
            $data[$record['name']] = $record['tasks']; // Assign tasks to the name key in $data array
        }
    }

    list($lowestKey, $lowestValue) = findLowestInAssocArray($data,);

    $sql24 = "SELECT name,email FROM user WHERE u_id = '$u_id'";
    $res24 = mysqli_query($conn, $sql24) or die(mysqli_error($conn));

    if (mysqli_num_rows($res24) > 0) {
        $record24 = mysqli_fetch_assoc($res24);
        $username=$record24['name'];
        $email=$record24['email'];
    }


    $sed_time = date("h:i A", strtotime($sed_time_24));
    // Check if all required fields are filled
    if (!empty($u_id) && !empty($service_name) && !empty($category) && !empty($booked_time) && !empty($booked_date) && !empty($sed_time) && !empty($sed_date)) {
        // Construct the SQL query
        $sqlquery = "INSERT INTO `bookings` (`u_id`, `service_name`, `category`, `time`, `date`, `sed_time`, `sed_date`, `s_boy`,`code`, `s_status`) 
                     VALUES ('$u_id', '$service_name', '$category', '$booked_time', '$booked_date', '$sed_time', '$sed_date','$lowestKey','$vcode', '0')";

        // Execute the SQL query
        $result = mysqli_query($conn, $sqlquery);

        // Check if the query was successful
        if ($result) {
            $task = $lowestValue + 1;
            $updateQuery = "UPDATE serviceboys SET tasks = $task WHERE name = '$lowestKey'";
            $ress = mysqli_query($conn, $updateQuery);
            if ($ress) {
                $to_email = $email;
                $subject = "Service Booking";
                $body = "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Document</title>
                    <style>
                        *{
                            font-family: Arial, sans-serif;
                            /* font-size: 30px; */
                            padding: 0;
                        }
                        body{
                            padding: 0;
                            margin: 0;
                        }
                        .header{
                            width: 97%;
                            background-color: rgb(73, 70, 70);
                            font-size: 30px;
                            color: white;
                            text-align: center;
                            padding: 10px;
                        }
                        msg{
                            font-size: 15px;
                        }
                        footer{
                            width: 97%;
                            background-color:rgb(73, 70, 70) ;
                            color: rgb(187, 184, 184);
                            padding: 10px;
                            font-size: 20px;
                            text-align: center;
                            position: absolute;
                            bottom: 0;
                        }
                        .wormsg{
                            color:red;
                            font-size:12px;
                        }
                    </style>
                </head>
                <body>
                    <h3 class='header'>Quick Service Booking</h3>
                    <p class='msg'>Hi, " . $username . "<br>We received a booking request from you (".$category." at ".$booked_time.").
                    Our service boy will visit your address at the scheduled date(".$sed_date.".) and time(".$sed_time.").
                            If the booking is not made by you, Cancel it from Booking section in your account.
                             <br>
                            <br>Here is the code :" . $vcode. ".</p>
                            <br><p class='wormsg'>*Note:Share the code after completion the task.</p>
                            <footer>
                            <h3><strong>Thanks for choosing us.</strong><h3>
                        </footer>
                </body>
                </html>
                ";
                $headers = "From: QuickServiceBooking<quickservicebooking.care@gmail.com>\r\n";
                $headers .= "Reply-To: quickservicebooking.care@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


                // $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                // $headers = "From: Sreeja De <de.sreeja2003@gmail.com>\r\n";
                // $headers .= "MIME-Version: 1.0\r\n";



                if (mail($to_email, $subject, $body, $headers)) {
                    $res123 = 1;
                }

                if ($res123 == 1) {
                    // Redirect to userbooking.php after successful insertion
                    header("Location: ../userbooking.php");
                    exit();
                }
            }
        } else {
            // Handle the case where the query failed
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Handle the case where some fields were not filled out
        echo "All fields are required.";
    }
}
