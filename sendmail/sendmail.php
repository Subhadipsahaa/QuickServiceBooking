
<?php
$to_email = "pradipbag721242@gmail.com";
$subject = "Fine for breaking cyber rules";
$body = "Hi Pradip,We have seen that you post our copyright video.So you have to pay fine or we have take legal step. For more information you can reply us. ";
$headers = "From: QuickServiceBooking<quickservicebooking.care@gmail.com>";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>