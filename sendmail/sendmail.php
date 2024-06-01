
<?php
$to_email = "subhasaha9976@gmail.com";
$subject = "Fine for breaking cyber rules";
$body = "Hi Subha ,We have seen that you post our copyright video.So you have to pay fine or we have take legal step. For more information you can reply us. ";
// $headers = "From: QuickServiceBooking<quickservicebooking.care@gmail.com>";
$headers=" From:Sreeja De<de.sreeja2003@gmail.com>";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>