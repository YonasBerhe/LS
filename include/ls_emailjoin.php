<?php
require_once("config.inc.php");
require_once('mysqli.inc.php');
require_once("utils.inc.php");
require_once("mail_utils.php");
require_once('../emails/intro.php');

session_destroy(); 
session_unset();
session_regenerate_id();

session_start(); 

$emailaddress = trim($_REQUEST["emailaddress"]);
$_SESSION['email'] = $emailaddress;
$ipaddress = getRealIpAddr();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$client_key;

$testEmail = "call emailInSystem(".sql_escape_string($emailaddress,1).");";
$Email = execute_query($mysqli, $testEmail);

if($Email && $emailaddress == trim(trim($Email[0]->fetch_array(MYSQLI_NUM)[0], '"'), "'")) {
	$output = "Email address: ".$emailaddress." is already in use. <br>Please use a different email, or if there is an issue contact <a href='mailto:socks@litesprite.com'>socks@litesprite.com</a>.<br>";
} else {
	$sql = "call insert_ls_emailjoin(".sql_escape_string($emailaddress, 1).", ".sql_escape_string($ipaddress, 1).", ".sql_escape_string($user_agent, 1).");";	
	//echo $sql;
	 
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$t_emailjoin_id = $row['t_emailjoin_id'];
		}

			$getKey = "call createAndGetClientKey();";
			$keyResult = execute_query($mysqli, $getKey);
			if($keyResult) {
				$client_key = $keyResult[0]->fetch_array(MYSQLI_NUM)[0];
				$_SESSION['client_key'] = $client_key;
				$_SESSION['clientkey'] =$client_key;
			}
				$addPlayer = "call setPlayerInfo(" . sql_escape_string($_SESSION['client_key'], 1) . ", " . "'TEST User'" . ","
			. "' ' , ' ', " . sql_escape_string($_SESSION['email'], 1) . ", 0" ." );";
			//echo $addPlayer;
			$Result = execute_query($mysqli, $addPlayer);
			if($Result){
				$mail = getSocksMailer();
				//$mail->AddAddress("socks@litesprite.com");
				$mail->AddAddress($emailaddress);
				$mail->Subject = "Socks has a new friend!";
				$mail->AddEmbeddedImage('../images/paw.png', 'paw');
				$mail->Body = $intro1 . $client_key . $intro2;
				$mail->WordWrap = 80;
				if(!$mail->Send()) {
				   	$MMessage = "Confirmation Message was not sent";
				   //	$MMessage = "Mailer Error: " . $mail->ErrorInfo;
					//echo $MMessage. "<br/>";
				} else {

					//$MMessage = "Message has been sent". "<br/>";
					//echo $MMessage;



					//SEND TO SOCKS
					$mail = getSocksMailer();
					$mail->Subject = "Socks has a new friend!";
					$mail->Body = "Email: ".$emailaddress." has signed up for the beta";
					$mail->AddAddress("socks@litesprite.com");
					$mail->Send();
				}
			}
	}

	#script for generating a new client key
	// $getKey = "call createAndGetClientKeyTest();";
	// $keyResult = execute_query($mysqli, $getKey);
	// if($keyResult) {
	// 	$client_key = $keyResult[0]->fetch_array(MYSQLI_NUM)[0];
	// 	#echo 'client_key: ' . $client_key;
	// }


	if (strlen($t_emailjoin_id) > 0) {
		// Send email
		$output = "email added";
		//$output = "<br> <p style='font-weight:bold;'>Thank you! Email Address (<b>".$emailaddress."</b>) Added.<br> Check your email for further instructions <p><br>";
	} else {
		$output = "An error occurred - please try again.";
	}

}
echo $output;
	
?>
