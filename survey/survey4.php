<?php 
require_once("../include/config.survey.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once("../include/mail_utils.php");
	
	session_start();

	// validate permissions
	if (strlen($_SESSION['client_id']) < 1) {
		header('Location: index.php');		
	} 

include 'include/header.php';
include 'include/debug.php';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Litesprite" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="survey.css" media="screen" />
		<title>Sinasprite Beta Survey</title>
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./js/jquery.validate.min.js" type="text/javascript"></script> 
		<script src="./js/survey.js" type="text/javascript"></script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	</head>
	<body>
		<?php echo $header; ?>
		<div class="wrapper">
			<h1>Save and Finish</h1>
			<p>
			That's it! Thank you for taking the time to give us this information. </p>
			<p>Socks <img src="../images/socksFace.png" width="70px" height="70px"></p>
			<br>
			<p>
<!-- 			<?php if(isset($_SESSION['client_key']) && !isset($_SESSION['signup_done'])) {
				//echo 'If you have not filled out the sign up form, the \'Sign Up\' button will take you there, Or';
			 } ?> -->
			 Click "Save and Finish" to complete your survey and to complete the sign-up process. </p>
			<form action="email.php">
				<input class="btn btn-success" type="submit" id="finish" name="finish" value="Save and Finish"/>
			</form>		
		</div>
		<?php # echo $debug;?>
	</body>
</html>
