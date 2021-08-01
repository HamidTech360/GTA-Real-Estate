<?php


echo "<h1>PHP mailer</h1>";
 //require 'PHPMailerAutoload.php';

if(isset($_POST['submit'])){
    $area = $_POST['area'];
    $price = $_POST['price'];
    $contact = $_POST['whatsapp'];
    $gmail = $_POST['gmail'];
    $fname = $_POST['fname'];
    $btn = " <a href='https://api.whatsapp.com/send?phone=$contact &text= Hello $fname !!! GTA Real Estate got your order'><button class='fixed-bottom' style='background-color:green; color:white; width: 100px;height:30px;border-radius:20px;'>Whatsapp <i class='fa fa-whatsapp'></i></button></a>";

    echo $btn;
    echo $fname. $area. $price. $contact . $gmail;

$mail = new PHPMailer;

$mail->setFrom('hamid@gtarealestatealade.com.ng', 'GTA Real Estate');
$mail->addReplyTo('replyto@example.com', 'GTA Real Estate');
$mail->addAddress($gmail, 'GTA');
$mail->Subject = 'AN ORDER WAS PLACED';
$mail->Body = "<div> $fname with the Gmail $gmail just placed an order for an apartment at $area </br>
                connect with $fname on <br>
                $btn 
                
         </div>";

        
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    header("location:success.php");

}


}