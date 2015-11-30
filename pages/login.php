<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


if ((isset($_SESSION['user_key'])) && (strlen($_SESSION['user_key']) > 0)) {
	header('Location: /dashboard');	
}

	// foreach($_REQUEST as $key => $value) 	{
	// 	echo $key;
	// 	echo ": " . $value;
	// 	echo "<br/>";
	// 	}



if (($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_POST['bf_login']))) {
	if (strlen($_POST['log']) < 1) {
		$logerr = "fielderror";
	}
	if (strlen($_POST['pwd']) < 1) {
		$pwderr = "fielderror";
	}
}


if (isset($_POST['log']) && isset($_POST['pwd'])) {

	//posted data : yes
	$dblogin = sql_escape_string(strtolower($_POST['log']), 1);
	$dbpassword = sql_escape_string(hash('sha256', doubleSalt($_POST['pwd'], $dblogin)), 1);

	//Validate the user
	$sql = "CALL ValidateUser(".$dblogin.", ".$dbpassword.", '".getRealIpAddr()."');";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$validemail = 1;
		}
		while ($row[1] = $Result[1]->fetch_assoc()) {
			$_SESSION['user_id'] = $row[1]['user_id'];
			$_SESSION['user_key'] = $row[1]['user_key'];
			$_SESSION['company_id'] = $row[1]['company_id'];
			$_SESSION['organization_id'] = $row[1]['organization_id'];
			$_SESSION['organization_name'] = $row[1]['organization_name'];
			$_SESSION['user_email_address'] = $row[1]['user_email_address'];
			$_SESSION['user_first_name'] = $row[1]['user_first_name'];
			$_SESSION['user_last_name'] = $row[1]['user_last_name'];
			$_SESSION['user_role_id'] = $row[1]['user_role_id'];
			$validated = 1;
		}
	} else {
		$pwderr = "fielderror";
	}
	if ($validated != 1) {
		$pwderr = "fielderror";
	}
	if ($validemail != 1) {
		$logerr = "fielderror";
	}

}

if ((isset($_SESSION['user_key'])) && (strlen($_SESSION['user_key']) > 0)) {
	header('Location: /reports');	
}


$additionalCSS .= <<<EOD
    <link href="https://litesprite.com/css/skeleton.css" rel="stylesheet" media="screen">
EOD;


$additionalJS.= <<<EOD
<script type="text/javascript">
	window.onload = function() {
	  document.getElementById("log").focus();
	};
</script>
EOD;


$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
			<h1>Welcome to Litesprite.</h1>
			<form class="center" action="#" method="post" id="loginform" name="loginform">
				<table border="0" cellpadding="1" cellspacing="2" style="width: 300px; margin: auto; background: #fff; border: 1px solid #ddd;">
					<tr>
						<td style="background: #fafafa; padding: 8px 4px 0px 4px; text-align: right;">Email:</td><td  colspan="2"style="background: #fafafa; padding: 4px; text-align: left;"><input class="loginfield {$logerr}" type="text" name="log" id="log" value="{$_POST['log']}" size="20" /></td>
					</tr>
					<tr>
						<td style="background: #fafafa; padding: 8px 4px 0px 4px; text-align: right;">Password:</td><td style="background: #fafafa; padding: 4px; text-align: left;"><input type="password" class="loginfield {$pwderr}"  name="pwd" id="pwd" size="20" value="{$_POST['pwd']}" /></td>
						<td style="background: #fafafa; padding: 4px;"><input type="submit" name="bf_login" value="GO!" id="header_member_button" /></td>
					</tr>
					<tr><td colspan="3"  style="background: #fafafa; padding: 4px; text-align: center;"><a href="/password" id="forgotpassword">Forgot your password?</a></td></tr>
				</table>
			</form>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>