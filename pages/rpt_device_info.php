<?php
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}


$email_data = '';
$email_body = '';
$total = 0;

	$sql = "CALL getAllNDAInfo();";
	$Result = execute_query($mysqli, $sql);	
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$email = $row['email'];
			$device_email = $row['device_email'];
			$lname = $row['lname'];
			$fname = $row['fname'];
			$device= $row['device'];
			if($device == 'A') {
				$device = "Android";
			} else if ($device == 'I') {
				$device = "iOS";
			} else {
				$device = '';
			}

$email_data .= <<<EOD
	<tr>
		<td class="center">{$email}</td>
		<td class="left">{$device_email}</td>
		<td class="left">{$device}</td>
		<td class="center">{$lname}</td>
		<td class="center">{$fname}</td>

	</tr>
EOD;
//totals 
			$total++;
		}
	}

$email_body .= <<<EOD
	<div class="reporting"> 
		<table width="1000px">
		<tr>
			<th class="left"><b>User Email</b></th>
			<th class="center"><b>Device Email</b></th>
			<th class="center"><b>Device Type</b></th>
			<th class="center"><b>Device First Name</b></th>
			<th class="center"><b>Device Last Name</b></th>
		</tr>
		{$email_data}
		</table>
	</div>
	<div class="reportlegend"> 
		<table width="400px">
			<tr>						
				<td colspan="1">Total: {$total}</td>
			</tr>
		</table>
	</div>	
EOD;



$additionalCSS .= <<<EOD
 
EOD;


$additionalJS.= <<<EOD

EOD;


$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
			<div class="backlink">
            	<a href="/reports">[ View all Reports ]</a>
            </div>
            <div class="pagetitle">
            	<h1>User Device Information</h1>
            </div>
			{$email_body}

            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
