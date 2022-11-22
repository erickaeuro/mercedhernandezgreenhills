<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('C:\xampp\htdocs\mercedhernandezgreenhills\vendor\phpmailer\phpmailer\src\Exception.php');
require ('C:\xampp\htdocs\mercedhernandezgreenhills\vendor\phpmailer\phpmailer\src\PHPMailer.php');
require ('C:\xampp\htdocs\mercedhernandezgreenhills\vendor\phpmailer\phpmailer\src\SMTP.php');

$otp = rand(11111, 99999);
$link = "<a href = 'http://localhost/mercedhernandezgreenhills/newpassword.php'> Click the Link </a>";

if(isset($_POST["forgotpassword"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'capistranoerickaeuro@gmail.com';
    $mail->Password = 'afnpchdzqxvwijeo';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Port= 587;
    
    $mail->setFrom('mercedhernandez645@gmail.com', 'capistranoerickaeuro@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Subject='New Password Link';
    $mail->Body = "Here is the link for the New Password: $link";


    $mail->send();

    echo "<script> alert('Sent Successfully'); 
    document.location.href ='forgotpassword.php';
    </script>";
    //header('Location: .php');

}