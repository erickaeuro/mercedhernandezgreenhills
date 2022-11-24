<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('C:\xampp\htdocs\senderemail\vendor\phpmailer\phpmailer\src\Exception.php');
require ('C:\xampp\htdocs\senderemail\vendor\phpmailer\phpmailer\src\PHPMailer.php');
require ('C:\xampp\htdocs\senderemail\vendor\phpmailer\phpmailer\src\SMTP.php');

$otp = rand(11111, 99999);

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mercedhernandez645@gmail.com';
    $mail->Password = 'vkxcoabownzcvcju';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Port= 587;
    
    $mail->setFrom('mercedhernandez645@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Subject='Your OTP Code';
    $mail->Body = "Here is your OTP code: <br> $otp";

    $mail->send();

    echo "<script> alert('Sent Successfully'); 
    document.location.href ='index.php';
    </script>";
    header('Location: enterotp.php');

}