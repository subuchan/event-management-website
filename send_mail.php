<style>
    .events_css{
        background-color:white; 
         box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
          padding:20px; color:black;
          font-size: 20px;
    }
</style>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'config.php';

extract($_REQUEST);
if(isset($submit) && $submit == 'submit'){
    extract($_POST);
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $event = $_POST["event"];
    $date = $_POST["date"];
    $comments = $_POST["comments"];

$sql = "INSERT INTO customer (name,number,email,event,date,comments) values ('$name','$number','$email','$event','$date','$comments')";
$query=mysqli_query($link,$sql);
if($query){
    header('location:index.html');
   }else{
    echo "error";
   }
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                   
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yanianand571@gmail.com';                     //SMTP username
    $mail->Password   = 'abpsjrxrxndhleyk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('manish.yakobu@gmail.com', 'Jackpot Events Management');
    $mail->addAddress('manish.yakobu@gmail.com');     //Add a recipient
 
    $message=  "<div class='events_css'>" . "Name : " . $name.  "<br>" . "Mobile Number : " . $number . "<br>" . "Email :" . $email . "<br>" . "Selected Event :" . $event . "<br>" . "Event Date :" . $date . "<br>" . "Description :" . $comments . "</div>";
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $name.'-Jackpot Events Management Booking';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   $success= $mail->send();
  

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}



?>
