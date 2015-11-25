<?php 
require_once("../include/config.inc.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");
require_once('../include/header.php');
require_once('../include/footer.php');
if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');	
}
if ((isset($_SESSION['company_id']) == true) && ($_SESSION['company_id']) == 1
	&& (isset($_SESSION['user_role_id']) && ($_SESSION['user_role_id'] == 0 || ($_SESSION['user_role_id'] == 1)))) {
		if(isset($_REQUEST['email'])) {
			$dblogin = sql_escape_string(strtolower($_POST['email']), 1);
			$dbpassword = sql_escape_string(hash('sha256', doubleSalt($_POST['password'], $dblogin)), 1);
			$sql = "call createReportUser("	.sql_escape_string($_REQUEST['org'], 0).','
											.$dblogin.','
											.sql_escape_string($_REQUEST['fname'],1).','
											.sql_escape_string($_REQUEST['lname'],1).','
											.$dbpassword.','
											.sql_escape_string($_REQUEST['role'], 0).");";
			//echo $sql;
			execute_query($mysqli, $sql);
		} else {
			echo 'error';
		}
}


header('location: /manageusers');
?>