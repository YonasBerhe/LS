<?php
session_unset();
unset($_SESSION['clientkey']);
unset($_SESSION['client_key']);
unset($_SESSION['survey_id']);
session_destroy();
session_start();
session_regenerate_id();
//require_once("include/config.inc.php");
require_once("../include/config.survey.php");
require_once('include/mysqli.inc.php');
require_once("../include/utils.inc.php");
require_once('./include/header.php');
//include './include/debug.php';


$error = null;
if(isset($_SESSION['error'])){
	$error = $_SESSION['error'];
}


if (strlen($_REQUEST['key']) > 0) {
	$_SESSION['clientkey'] = $_REQUEST['key'];
	$_SESSION['client_key'] = $_REQUEST['key'];
	//echo $_SESSION['client_key'];
}

	$sql = "call ValidateClientKey(".sql_escape_string($_SESSION['clientkey'], 1).");";
	//echo $sql;

	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$_SESSION['client_key'] = $row['client_key'];
			//echo "client_key:".$_SESSION['client_key'];
		}
	}

if (strlen($_REQUEST['survey']) > 0) {
	$_SESSION['survey_id'] = $_REQUEST['survey'];
} else {
	$_SESSION['survey_id'] = 1;
}

	if ($_SESSION['survey_id'] > 1) { //if statement no longer neccessary REMOVE
		$link = '<a href="survey1.php">Begin the survey -></a>';
		$copy = '<h1>Thank you for playing Sinaprite! Please take this follow-up survey</h1>';
	} else {
		if (strlen($error) > 0) {
			$link = '<p style="color: darkred;">There are no valid surveys for you at this time.<p/>';
			$_SESSION['error'] = "";
		}  else {
			$link = '<a href="survey1.php" class="btn btn-success">Begin the survey -></a>';
			$copy = '<h1>Thank you! Sinasprite Sign-Up Completed. Welcome to the Sinaprite Beta Survey.</h1>';
		}
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
		<link rel="stylesheet" type="text/css" href="survey.css" media="screen" />
		<title>Sinasprite Beta Survey</title>
	</head>
	<body>
		<?= $header; ?>
			<div class="wrapper">
				<?= $copy; ?>

				<p>To start we are going to ask you complete a standard assessments and a few questions about your background and medical history.
					We’ll ask this information again at 6 and 12-week points to generate your progress report.
					This information will also help us understand and interpret the usefulness of the game for different groups of people.
					Each series of answers will be saved, and you can review or change your answers until you complete the survey or leave the site.</p>
				<p>You can come back later to complete the survey from a link we’ll send you.
						Keep in mind, you’ll start from the beginning of the survey. When you save your responses, they will be recorded.
				</p>
				<p style="font-weight: bold;"> Any information you provide will be kept completely confidential.
						Once you have completed all of the questions, the survey will be locked and will not be accessible or visible.</p>
				<p>If you experience any issues while taking the survey - please email <a href="mailto:socks@litepsrite.com">Socks</a>.</p>
				<p>Socks <img src="../images/socksFace.png" width="70px" height="70px"></p>
			<?= $link; ?>
		</div>
		<?php #echo $debug;?>
	</body>

</html>
