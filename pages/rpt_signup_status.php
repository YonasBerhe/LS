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

	$sql = "CALL getBasicInfo();";
	$Result = execute_query($mysqli, $sql);	
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$key = $row['client_key'];
			$device_email = $row['device_email'];
			$group = $row['group'];
			$email = $row['email'];
			$lname = $row['lname'];
			$fname = $row['fname'];
			$nda_time = $row['ndatime'];
			if($nda_time) {
				$nda_time = date_create_from_format('Y-m-d H:i:s', $nda_time)->format('m-d-Y');
			}

			$device = '';
			if($row['device'] == 'A') {
				$device = "Android";
			} else if ($row['device'] == 'I') {
				$device = 'iOS';
			}
			$survey_time = $row['surveytime'];
			if($survey_time) {
				$survey_time = date_create_from_format('Y-m-d H:i:s', $survey_time)->format('m-d-Y');
			}
			//$survey_time = date_create_from_format('Y-m-d H:i:s', $row['surveytime'])->format('m-d-Y');
			$sina_time = $row['sinatime'];
			
			$six_week = '';
			$twelve_week = '';
			if($sina_time) {
				$temp_time = date_create_from_format('Y-m-d H:i:s', $sina_time);
				$six_week = $temp_time->modify('+'. 6 .'weeks')->format('m-d-Y');
				$twelve_week = $temp_time->modify('+'. 6 .'weeks')->format('m-d-Y');
				$sina_time =date_create_from_format('Y-m-d H:i:s', $sina_time)->format('m-d-Y');;
			}


$email_data .= <<<EOD
	<tr>
		<td class="center">{$key}</td>
		<td class="center">{$six_week}</td>
		<td class="center">{$twelve_week}</td>
		<td class="center">{$sina_time}</td>
		<td class="center">{$nda_time}</td>
		<td class="center">{$survey_time}</td>
		<td class="left"><b><a href="mailto:{$email}">{$email}</a></b></td>
		<td class="center">{$lname}</td>
		<td class="center">{$fname}</td>
		<td class="center">{$device}</td>
		<td class="center">{$device_email}</td>

	</tr>
EOD;
//totals 
			$total++;
		}
	}

$email_body .= <<<EOD
	<div class="reporting"> 
		<table >
		<tr>
			<th class="left"><b>Client Key</b></th>
			<th class="center"><b>6 Week</b></th>
			<th class="center"><b>12 Week</b></th>
			<th class="center"><b>Sinasprite Start Time</b></th>
			<th class="center"><b>Sign Up Completetion Time</b></th>
			<th class="center"><b>Survey Completetion Time</b></th>
			<th class="center"><b>Email</b></th>
			<th class="center"><b>Last Name</b></th>
			<th class="center"><b>First Name</b></th>
			<th class="center"><b>Device Type</b></th>
			<th class="center"><b>Device Type</b></th>
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
    <script type='text/javascript' src="../js/reports.js"></script>

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
            	<h1>Important User Dates and Information</h1>
            </div>
			{$email_body}

            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
