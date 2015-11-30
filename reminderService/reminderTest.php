<?php
require_once("../include/phpmailer/class.phpmailer.php");
require_once("../include/mail_utils.php");

$mail = getSocksMailer();
$mail->Subject = "TEST Litesprite Reminder";
$mail->Body = "this is a test";
$mail->AddAddress('joshua.j.moore@gmail.com');
sendMail($mail);

?>