<?php
// Start a session
session_start();
require_once('include/config.inc.php');
require_once('include/mysqli.inc.php');
require_once('include/utils.inc.php');
require_once("include/phpmailer/class.phpmailer.php");


$action_type_id = isset($_REQUEST["action_type_id"]) ? $_REQUEST["action_type_id"] : ''; // Action type

if (strlen($action_type_id) > 0) {

	
	switch 	($action_type_id) {
		case 1: //password reset
			//if the passwords are long enough and they match
				$pass1 = isset($_REQUEST["password1"]) ? $_REQUEST["password1"] : ''; // Pass1
				$pass2 = isset($_REQUEST["password2"]) ? $_REQUEST["password2"] : ''; // Pass2
				$dblogin = isset($_REQUEST["action_user_email_address"]) ? $_REQUEST["action_user_email_address"] : ''; // login
				$action_code = isset($_REQUEST["action_code"]) ? $_REQUEST["action_code"] : ''; // Action code			
				$action_user_key = isset($_REQUEST["action_user_key"]) ? $_REQUEST["action_user_key"] : ''; // Action user
				$dblogin = sql_escape_string(strtolower($dblogin), 1);
				$pass1 = sql_escape_string(hash(sha256, doubleSalt($pass1, $dblogin)), 1);
				$pass2 = sql_escape_string(hash(sha256, doubleSalt($pass2, $dblogin)), 1);
				
			if ((strlen($action_code) == 36) && (strlen($pass1) > 0) && (strlen($pass2) > 0) && ($pass1 == $pass2)) {

				$sql = "CALL PasswordResetAction(".$action_type_id.", '".$action_user_key."', '".$action_code."', ".$pass1.", ".$pass2."  );";
				//echo $sql;
				
				$Result = execute_query($mysqli, $sql);
				
				if ($Result) {
					while ($row = $Result[0]->fetch_assoc()) {
						$_SESSION['user_email_address'] = $row['user_email_address'];
						$_SESSION['user_first_name'] = $row['user_first_name'];
						$_SESSION['user_last_name'] = $row['user_last_name'];
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['user_key'] = $row['user_key'];
						$_SESSION['user_role_id'] = $row['user_role_id'];
						$validated = 1;
						}		
					} else {
						$_SESSION['user_key'] = '';
					}
					$Result = execute_query($mysqli, "CALL LogUserAction('".$_SESSION['user_key']."', '".getRealIpAddr()."', 'Password Changed');");
			}		
       break;
	}
	
	
	// foreach($_REQUEST as $key => $value) 	{
	// 	echo $key;
	// 	echo ": " . $value;
	// 	echo "<br/>";
	// 	}
}


header( 'Location: /reports' );


?>