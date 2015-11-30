<?php 
require_once("./include/config.inc.php");
require_once('./include/mysqli.inc.php');
require_once("./include/utils.inc.php");
require_once("./include/mail_utils.php");
include "./emails/instruct.php";
include "./emails/intro.php";


$mail = getSocksMailer();
$mail->AddAddress("swatee@litesprite.com");
$mail->Subject("Litesprite Survey Completed");
$mail->body = $instr1 . $instr2;
sendMail($mail);

$mail = getSocksMailer();
$mail->AddAddress("swatee@litesprite.com");
$mail->Subject = "Socks has a new friend!";
$mail->body = $intro1 . $intro2;
sendMail($mail);


?>