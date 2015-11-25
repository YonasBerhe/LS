<?php
require_once("../include/config.inc.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");
require_once("../include/mail_utils.php");
require_once('../emails/intro.php');
require_once('../include/header.php');


session_start();

if(isset($_SESSION['email'])) {
	$emailaddress = $_SESSION['email'];
}

$client_key = null;
if(!isset($_SESSION['client_key']) && !isset($_REQUEST['key'])) {
		header('Location: https://litesprite.com');
} else if (isset($_REQUEST['key'])){
	$client_key = $_REQUEST['key'];

} else {
	$client_key = $_SESSION['client_key'];
}


 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Litesprite" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../survey/survey.css" media="screen" />
		<title>Sinasprite Tester Intro</title>
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../js/jquery.validate.min.js" type="text/javascript"></script> 
		<script src="../js/nda.js" type="text/javascript"></script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	</head>
	</head>
	<body>
	<div class="header container">
		<div class="title">
			<img class="logo" src="../images/litesprite.png"/>
			<div class="titletext">Litesprite Sign-Up</div>
		</div>
		</div>
		<div class="wrapper container">
		<br>
		<p style="font-weight:bold;color:#447a2d;">This information has also been sent to your email if you wish to complete the sign-up form or survey at a later date.</p>
		<?php
		echo '<p>Hello!</p>
					<p>
					    Thank you for volunteering to be a beta tester for our game, Sinasprite, that helps people manage stress, anxiety, and depression! To get started please:
					</p>';

					    $sql = 'call getIfOnboardedKey('.sql_escape_string($client_key,1).');';
					    $Result = execute_query($mysqli, $sql);
					    //&& $row = $Res[0]->fetch_array(MYSQL_NUM) && trim($Res[0]->$row[0],"'") == $client_key
					    if($Result && strlen($Result[0]->fetch_array()[0]) > 1){
					    	echo '<p style="color:green;"><img style="vertical-align:bottom;" src="../images/check.png" width="30" height="30"> Sign-up and Survey Competed</p>';

						} else {
							echo '<p> 
						    <button class="btn btn-success link-same" href="http://test.litesprite.com/signup/index.php?key='
						    .$client_key.'&">Complete the Sign Up and Survey</button></p>';
						}

		echo'
					<p>
					    After you\'ve completed the process above, we will send you unique access codes.      

					</p>
					<p>
					    These <a class="link" href="https://litesprite.com/info/faq.php">FAQs</a> tell you how and why we are doing this Beta.
					</p>
					<p>
					    For your participation, you\'ll get:
					</p>
					<ol>
					    <li>Free access to a 6 week program that teaches proven stress management techniques.</li>
					    <li>Free access to an on-demand self-help tool.</li>
					    <li>Progress report at the end of the study.</li>
					</ol>
					<p>
					    Please make sure you meet these minimum requirements:
					</p>
					<ol>
					    <li>Age 18 years or older.</li>
					    <li>English-speaking.</li>
					    <li>In possession of a personal phone or tablet for use during the study. Note we don\'t yet support the Nook.</li>
					    <li>iPhone / iPad users must be running at least iOS 8.</li>
					</ol>
					<p>
					    Your Time Commitment:
					</p>
					<ul>
					    <li>A 15 min pre-screening questionnaire.</li>
					    <li>6 week app pilot study.</li>
					    <li>A 10 min questionnaire post 6 week study.</li>
					    <li>A 10 min questionnaire post 12 week study.</li>
					</ul>
					<p>
					If you know of a friend who would like to participate in the beta test / pilot study, please forward this note or tell them to contact <a style="font-weight:bold;" href="mailto:socks@litesprite.com">socks@litesprite.com</a>
					</p>
					<p>
					    - Socks <img width="40" height="40" src="cid:paw"  onerror=\'this.onerror = null; this.src="../images/paw.png"\'/>,
					</p>
					<p>
					    UX/UI Development Team Litesprite, Inc
					</p>';
			?>
		
		</div>
	</body>
</html>
