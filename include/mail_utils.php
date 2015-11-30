<?php
require_once("../include/phpmailer/class.phpmailer.php");
//returns a php mailer with socks@litesprite sender info 
function getSocksMailer() {
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Port = 465; // or 587
	$mail->Host = "smtp.gmail.com"; // SMTP server
	$mail->SMTPAuth = true;
	$mail->Username = "socks@litesprite.com"; // SMTP username
	$mail->Password = "Litesprite14"; // SMTP password
	//$mail->AddReplyTo("socks@litesprite.com", "Litesprite Support");
	$mail->From = "socks@litesprite.com";
	$mail->Sender = "socks@litesprite.com";
	$mail->FromName = "Litesprite Support";
	return $mail;
}

//sends email with phpMailer object $mail
function sendMail($mail) {
	if(!$mail->Send())
	{
	   $MMessage = "Message was not sent";
	   $MMessage = "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
	   $MMessage = "Message has been sent";
	}
}
?>