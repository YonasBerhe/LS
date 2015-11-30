<?php 
require_once("../include/config.inc.php");
require_once("../include/mysqli.inc.php");
require_once("../include/utils.inc.php");
require_once("../include/mail_utils.php");
require_once("../include/phpmailer/class.phpmailer.php");
require_once("../emails/instruct.php");
require_once("../emails/final.php");

session_start();
if(!isset($_SESSION['client_key']) ){
	header("Location: https://litesprite.com");
}
$client_key = $_SESSION['client_key'];
// 	echo $client_key;
//echo $_REQUEST['emailaddress'];
if (strlen($_REQUEST['emailaddress']) > 0) {
	$email = $_REQUEST['emailaddress'];

	if(isset($_REQUEST['provider']) && strlen($_REQUEST['provider']) > 0) {
		//change group code
		$sql = 'call updateGroup('.sql_escape_string($client_key, 1).','.sql_escape_string(intval($_REQUEST['provider']),0).');';
		//echo $sql;
		execute_query($mysqli, $sql);
	}

	//NDA 
	$sql = "call setNDANew(" . sql_escape_string($_REQUEST['emailaddress'], 1) . ", " . sql_escape_string($_REQUEST['firstname'], 1) . ", " 
		. sql_escape_string($_REQUEST['lastname'], 1) . ", " . sql_escape_string($_REQUEST['deviceemail']) . ", " 
		. sql_escape_string($_REQUEST['devicefirstname']) . ", " . sql_escape_string($_REQUEST['devicelastname']) . ", " 
		. sql_escape_string($_REQUEST['device']) . ", " 
		. sql_escape_string($_REQUEST['checkshare'], 0) . ", " . sql_escape_string(getRealIpAddr(), 1) . ", " . sql_escape_string(session_id(), 1) . ");";

	//echo $sql;
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		//send message to socks about sign up
		sendSocks();
		//send download instructions and tutorial link to user
		//$sql = "SELECT client_key FROM litesprite.players WHERE player_email_address =" . sql_escape_string($_REQUEST['emailaddress']) . ";";
		// //echo $sql;
		// $result = execute_query($mysqli, $sql);
		// if($result) {
			//$key = trim($result[0]->fetch_array(MYSQLI_NUM)[0], '"');
			if($client_key && strlen($client_key)>1) {
				//echo $client_key;
				sendIntructions($client_key, $instr1, $instr2);
				//add player name to players
				$activate = 'call activatePlayer(' . sql_escape_string($_REQUEST['emailaddress'], 1) .  ', ' 
					. sql_escape_string($_REQUEST['firstname'], 1) . ', ' 
					. sql_escape_string($_REQUEST['lastname'], 1) .');';
				//echo $activate;
				$Res = execute_query($mysqli, $activate);

				// $done = 'call getIfOnboardedKey('.sql_escape_string($client_key,1).');';
				// //echo $done.'<br>';
				// $Res = execute_query($mysqli, $sql);
				// if($Res && trim($Res[0]->fetch_array(MYSQL_NUM)[0],"'") == $client_key){
				// 	echo trim($Res[0]->fetch_array(MYSQL_NUM)[0],"'").'<br>';
				// 	echo $client_key;
				// 	//echo 'result';

				// 	sendFinalEmails($email, $client_key, $final1, $final2, $final3);
				// }
			}
		//}
	}
		
}

//sends socks a email when the user signs up 
function sendSocks() {
	$mail = getSocksMailer();
	#$mail->AddBCC("ric@litesprite.com", "Litesprite Survey");
	$mail->Subject = "Litesprite NDA Completed:";
	$mail->Body = 'NDA Signed by : ' . $_REQUEST['emailaddress'];
	$mail->WordWrap = 80;
	$mail->AddAddress("socks@litesprite.com");
	sendMail($mail);
}

//sends an email with instructions for downlaods, link to tutorial, and reminder to complete survey
function sendIntructions($key, $instr1, $instr2) {
	$mail = getSocksMailer();
	$mail->AddEmbeddedImage('../images/paw.png', 'paw');

	//$mail->FromName = "Litesprite Survey";
	$mail->Subject = 'Download instructions: Beta Test with Litesprite';
		if($key && $key != "") {
			$text = $instr1 . $key . $instr2;
			$mail->Body = $text;
		} else {
			$body = $mail->msgHTML(file_get_contents('../emails/instruct.html'), dirname(__FILE__));
		}
	//echo "<br>instr: ".$_REQUEST['emailaddress'];

	$mail->AddAddress($_REQUEST['emailaddress']);
	sendMail($mail);
}

function sendFinalEmails ($email, $client_key, $final1, $final2, $final3) {
	//echo "<br>final: ".$email;
	//GET CLIENT KEY
	//find device email and device type
	$sql = "call getDeviceInfo(".sql_escape_string($email,1).")";
	$Result = execute_query($mysqli, $sql);
	if($Result) {
		$row = $Result[0]->fetch_assoc();
		$device_email = $row['email'];
		$device = $row['device'];
		$fname = $row['fname'];
		$lname = $row['lname'];

		//send to Socks
		$sMail = getSocksMailer();
		$sMail->Subject = "Litesprite User Completed Onboarding";
		$sMail->Body = "client key: ".$client_key."<br>
						Codes and Instructions have been sent to: ".$email."<br> 
						Device: ".(($device == 'A') ?'Android':'iOS')."<br> 
						Device email: ".$device_email."<br>
						Last name: ".$lname."<br>
						First name:".$fname;
		$sMail->AddAddress("socks@litesprite.com");
		sendMail($sMail);
		//send to User
		$uMail = getSocksMailer();
		$uMail->Subject = "Litesprite Beta Sign-Up Completed!";
		$uMail->AddEmbeddedImage('../images/paw.png', 'paw');
		$uMail->Body = $final1.$client_key.$final2.$device_email.$final3;
		$uMail->AddAddress($email);
		sendMail($uMail);
	}
}


header('Location: ../survey/index.php?key='.$_SESSION['client_key'].'&survey=1');
?>

