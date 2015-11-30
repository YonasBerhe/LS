<?php 
require_once("../include/config.survey.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");
require_once("../include/mail_utils.php");
require_once("../emails/final.php");
session_start();


// validate permissions
if (strlen($_SESSION['client_id']) < 1) {
	header('Location: index.php');		
} 
$client_key = $_SESSION['client_key'];

$sql = "call setClientSurveyFinished(".sql_escape_string($_SESSION['client_survey_header_id'], 0).", ".sql_escape_string($_SESSION['client_key'], 1).", ". sql_escape_string(strtolower($_SESSION['client_id']), 1).", 1,  ".sql_escape_string(date("Y-m-d H:i:s"), 1).");";
//echo $sql;
$Result = execute_query($mysqli, $sql);
if ($Result) {
	//echo "Result <br>";
		//nothing expected

	if (strlen( $_SESSION['client_key']) > 0) {
		//echo 'mail<br>';
		mailSocks();
		$sql = "call getPlayerEmail(" . sql_escape_string($_SESSION['client_key'],1) . ");";
		//echo $sql;
		$Result = execute_query($mysqli, $sql);
		if($Result) {
			$email = trim($Result[0]->fetch_row()[0], "'");
			//echo "email: ".$email;
			//mailUser($email);
			$done = 'call getIfOnboardedKey('.sql_escape_string($_SESSION['client_key'],1).');';
			//echo $done;
			$Res = execute_query($mysqli, $done);
			if($Res && strlen(trim($Res[0]->fetch_array(MYSQL_NUM)[0],"'")) > 1){
				//echo "Res:".$Res[0]->fetch_array(MYSQLI_NUM)[1].'<br>';
				//echo $final1;
				//echo "<br>send final emails";
				sendFinalEmails($email, $_SESSION['client_key'], $final1, $final2, $final3, $final4);
			}
		}
	} else {
		//echo "No client key";
	}
}

//send survey completion confirmation to socks
function mailSocks($mail) {
		//echo 'mail socks <br>';
		$mail = getSocksMailer();
		$mail->AddAddress("socks@litesprite.com");
		$mail->Subject = "Litesprite Survey Completed: ". $_SESSION['client_key'];
		$mail->Body = 'Tester: ' . $_SESSION['client_key'] . ' has completed the survey: #'.$_SESSION['survey_id']." .";
		$mail->WordWrap = 80;
		sendMail($mail);
}

//sends survey completion and nda reminder email to the user
function mailUser($email) {
	//echo "mail user <br>";
	$mail = getSocksMailer();
	$mail->Subject = "Litesprite Survey Completed";
	$mail->AddEmbeddedImage('../images/paw.png', 'paw');
	$mail->msgHTML(file_get_contents('../emails/postSurvey.html'), dirname(__FILE__));
	$mail->AddAddress($email);
	sendMail($mail);
}

function sendFinalEmails ($email, $client_key, $final1, $final2, $final3, $final4) {
	//echo 'final email '.$email.' '.$client_key.'<br>';
	//find device email and device type
	$sql = "call getDeviceInfo(".sql_escape_string($email,1).");";
	echo $sql;
	$Result = execute_query($mysqli, $sql);
	if($Result) {
		$row = $Result[0]->fetch_assoc();
		$device_email = $row['email'];
		$device = $row['device'];
		$fname = $row['fname'];
		$lname = $row['lname'];
		$gSQL = 'CALL getOrgByKey('.sql_escape_string($client_key,1).');';
		//echo $gSQL;
		//echo '<br>';

		$gResult = execute_query($mysqli, $gSQL);
		$group_code = $gResult[0]->fetch_array()[0];
		//echo $group_code;
		//echo '<br>';

		//send to Socks
		$sMail = getSocksMailer();
		$sMail->Subject = "Litesprite User Completed Onboarding";
		$sMail->Body = "client key: ".$client_key."<br>
						group: ".$group_code."<br>
						Codes and Instructions have been sent to: ".$email."<br> 
						Device: ".(($device == 'A') ?'Android':'iOS')."<br> 
						Device email: ".$device_email."<br>
						Last name: ".$lname."<br>
						First name:".$fname;
		//echo $sMail->Body;
		//echo '<br>';
		$sMail->AddAddress("socks@litesprite.com");
		sendMail($sMail);
		//send to User
		$uMail = getSocksMailer();
		$uMail->Subject = "Litesprite Beta Sign-Up Completed!";
		$uMail->AddEmbeddedImage('../images/paw.png', 'paw');
		$uMail->Body = $final1.$group_code.$final2.$client_key.$final3.$device_email.$final4;
		//echo $uMail->Body;
		$uMail->AddAddress($email);
		sendMail($uMail);
	}
}
session_destroy();
session_unset();
session_start();
session_regenerate_id();

$_SESSION['survey_done'] = 'true';
header('Location: http://litesprite.com/index.php');

?>