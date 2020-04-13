<?php
require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'spw19159323@gmail.com';
$mail->Password = 'kaiying98';
$mail->SetFrom('spw19159323@gmail.com');
$mail->Subject = "Hello World";
$mail->Body = 'A test email!';
$mail->AddAddress('limkaiying98@gmail.com');

$mail->Send();


?>