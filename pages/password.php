<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once("include/phpmailer/class.phpmailer.php");
require_once('include/header.php');
require_once('include/footer.php');


// user Email submitted for reset
if (strlen($_REQUEST["txtPasswordEmail"]) > 0) {
	$passwordemail = $_REQUEST["txtPasswordEmail"];
	$sql = "CALL PasswordResetRequest('".$passwordemail."');";
	$Result = execute_query($mysqli, $sql);
	//echo $sql."<br/>";
	
	while ($row = $Result[0]->fetch_assoc()) {
		$temp_user_id = $row['user_key'];
		$temp_user_emailaddress = $row['user_email_address'];
		$action_code = $row['action_code'];
		}

	if (strlen($temp_user_id) > 0 ) {
		// log the user activity?	
		$sql = "CALL LogUserAction('".$temp_user_id."', '".getRealIpAddr()."', 'Password Reset Request');";
		$Result = execute_query($mysqli, $sql);
		//echo $sql."<br/>";

$emailpasswordbody = <<<EOD
<table style="font-family:arial;" cellspacing="4">
	<tr>
		<td style="text-align: left; font-style: italic; color: #86ac47; font-weight: bold;">LITESPRITE PASSWORD RESET</td>
	</tr>
	<tr>
		<td style="color: #4e5150;">Remember to login using your email address: ({$temp_user_emailaddress}).</td>
	</tr>
	<tr>
		<td style="color: #4e5150;"><a href="https://litesprite.com/action/{$action_code}">Click here to reset your password.</a></td>
	</tr>
	<tr>
		<td style="color: #4e5150;">If you have any questions - please email: <span style="color: #86ac47;">socks@litesprite.com</span></td>
	</tr>
</table>
EOD;

		// Do the email
		$mail = new PHPMailer();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->IsHTML(true);
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Port = 465; // or 587
		$mail->Host = "smtp.gmail.com"; // SMTP server
		$mail->SMTPAuth = true;
		$mail->Username = "socks@litesprite.com"; // SMTP username
		$mail->Password = "Litesprite14"; // SMTP password
		$mail->AddReplyTo("socks@litesprite.com", "Litesprite Support");
		$mail->From = "socks@litesprite.com";
		$mail->FromName = "Litesprite Support";
		$mail->AddAddress($temp_user_emailaddress);
		$mail->AddBCC("ric@litesprite.com", "Litesprite Support");
		$mail->Sender= "socks@litesprite.com";
		$mail->Subject = "Litesprite Password Reset Request ";
		$mail->Body = $emailpasswordbody; 
		//'Remember to log in using your email address: ('.$temp_user_emailaddress.').<br/><br/><a href="https://litesprite.com/action/'.$action_code.'">Click here to reset your password.</a><br/><br/>If you have any questions - please email: socks@litesprite.com';
//echo '<a href="'.$homeurl.'action/'.$action_code.'">Click here to reset your password.</a>'."<br/>";
		$mail->WordWrap = 80;
		
		if(!$mail->Send())
		{
		    $MMessage = "Message was not sent";
		    $MMessage = "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		    $MMessage = "Message has been sent";
		}
		
	
$password_body = <<<EOD
	<table border="1" cellpadding="4" cellspacing="1" width="400" style="margin: auto;border: 1px solid #7c8f5b;">
		<tr>
			<td style="background: #eee; padding: 10px; color: #333; text-align: center;">
				<b>Request a Password Reset</b>
			</td>
		</tr>
		<tr>
			<td style="background: #fafafa; padding: 10px; text-align: center;">
				<p>An email has been sent to the account:</p><p><b>{$temp_user_emailaddress}</b></p>
				<p>&nbsp;</p>
				<p>Please check your spam/junk folder for emails from: <a href="mailto:socks@litesprite.com">socks@litesprite.com</a></p>
			
			</td>
		</tr>
		<tr>
			<td style="background: #fafafa; padding: 10px; color: #333; text-align: center;">
				<a href="/login">Return to the login screen.</a>
			</td>
		</tr>
	</table>
EOD;

		} else {
			//no email found
$password_body = <<<EOD
	<table border="1" cellpadding="4" cellspacing="1" width="400" style="margin: auto;border: 1px solid #7c8f5b;">
		<tr>
			<td style="background: #eee; padding: 10px; color: #333; text-align: center;">
				<b>Request a Password Reset</b>
			</td>
		</tr>
		<tr>
			<td style="background: #eee; padding: 10px; color: darkred; text-align: center;">
				Account not found, please use a valid acciunt.
			</td>
		</tr>
		<tr>
			<td style="background: #fafafa; padding: 10px;">
				<form name="frmreset" id="frmreset" method="post" action="{$homeurl}password">
				<table border="1" cellpadding="4" cellspacing="1" width="100%" style="margin: auto; background: #fff;">
					<tr>
						<td style="background: #fafafa; padding: 10px;">Email Address:</td>
						<td  style="background: #fafafa; padding: 10px;">
							<input type="text" name="txtPasswordEmail" id="txtPasswordEmail" value="" style="width: 180px; font-size: 12pt;" >
						</td>
					</tr>
					<tr>
						<td style="background: #fafafa; padding: 10px;">&nbsp;</td>
						<td style="background: #fafafa; padding: 10px;">
							<span class="actionbutton" style=""  onclick="document.getElementById('frmreset').submit();" class="button">Reset</span>
						</td>
					</tr>
				</table>
				</form>
				</center>
			</td>
		</tr>
	</table>
EOD;
	}

}

// user passwords submitted for reset
if (strlen($_REQUEST["txtPassword1"]) > 0) {
	$password = $_REQUEST["txtPassword1"];
//echo 'password change for:'. $password."<br/>";
	 
	$sql = "CALL PasswordReset('".$passwordemail."');";
	$Result = execute_query($mysqli, $sql);
echo $sql." - What?<br/>";
	
	
	while ($row = $Result[0]->fetch_assoc()) {
		$temp_member_key = $row['member_key'];
		$temp_user_emailaddress = $row['user_emailaddress'];
	}
	// log the user activity?	
	$Result = execute_query($mysqli, "CALL LogMemberAction('".$temp_member_key."', '".getRealIpAddr()."', 'Password Reset Request');");
	
$password_body = <<<EOD
	<table border="1" cellpadding="4" cellspacing="1" width="400" style="margin: auto;border: 1px solid #7c8f5b;">
		<tr>
			<td style="background: #eee; padding: 10px; color: #333; text-align: center;">
				<b>Request a Password Reset</b>
			</td>
		</tr>
		<tr>
			<td style="background: #fafafa; padding: 10px; text-align: center;">
				<br>An email has been sent to the account: {$temp_user_emailaddress}
			</td>

		</tr>
	</table>
EOD;

}
// should be the task_code - show password entry if valid
if (strlen($args[1]) > 0) {
	
$password_body = <<<EOD
	<table border="0" cellpadding="0" cellspacing="0" width="330">
		<tr>
			<td style="background: #fff; text-align: center;">
				reset code: {$args[1]}
			</td>
		</tr>
	</table>

EOD;

	} 
	
if 	( (strlen($args[1]) < 1) && (strlen($_REQUEST["txtPasswordEmail"]) < 1)  ) {
	
$password_body = <<<EOD
	<table border="1" cellpadding="4" cellspacing="1" width="400" style="margin: auto;border: 1px solid #7c8f5b;">
		<tr>
			<td style="background: #eee; padding: 10px; color: #333; text-align: center;">
				<b>Request a Password Reset</b>
			</td>
		</tr>
		<tr>
			<td style="background: #fafafa; padding: 10px;">
				<form name="frmreset" id="frmreset" method="post" action="{$homeurl}password">
				<table border="1" cellpadding="4" cellspacing="1" width="100%" style="margin: auto; background: #fff;">
					<tr>
						<td style="background: #fafafa; padding: 10px;">Email Address:</td>
						<td  style="background: #fafafa; padding: 10px;">
							<input type="text" name="txtPasswordEmail" id="txtPasswordEmail" value="" style="width: 180px; font-size: 12pt;" >
						</td>
					</tr>
					<tr>
						<td style="background: #fafafa; padding: 10px;">&nbsp;</td>
						<td style="background: #fafafa; padding: 10px;">
							<span class="actionbutton" style=""  onclick="document.getElementById('frmreset').submit();" class="button">Reset</span>
						</td>
					</tr>
				</table>
				</form>
				</center>
			</td>
		</tr>
	</table>
EOD;
		
	}

$additionalCSS .= <<<EOD
    <link href="https://{$domain}/css/skeleton.css" rel="stylesheet" media="screen">
EOD;


$additionalJS.= <<<EOD

EOD;



$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center"">
            <!-- Column 1 start -->
			<div class="passwordcontainer">
				{$password_body}
			</div>
		</div>
	</div>
	{$footer}
EOD;

$auxcss .= <<<EOD

.passwordcontainer {
	position: relative;
	display: inline-block;
    padding: 50px 0px;
    width: 98%;
    text-align: center;
}
EOD;


?>