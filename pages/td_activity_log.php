<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

if (strlen($args[1]) > 0) {
    $OrgID = $args[1];
} else {
    $OrgID = 2;
}

	//Validate the user
	$sql = 'CALL td_activity_log_by_org('.sql_escape_string($OrgID, 0).');';
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$organization = $row['organization'];
			$client_key = $row['client_key'];
			$activity_id = $row['activity_id'];
			$client_id = $row['client_id'];
			$device_id = $row['device_id'];
			$session_id = $row['session_id'];
			$activity_code = $row['activity_code'];
			$activity_lat = $row['activity_lat'];
			$activity_long = $row['activity_long'];
			$activity_timestamp = $row['activity_timestamp'];
			$activity_timezone = $row['activity_timezone'];
			$activity_added = $row['activity_added'];
	

$report_data .= <<<EOD
	<tr>
		<td class="left">{$organization}</td>
		<td class="left">{$client_key}</td>
		<td class="center">{$activity_id}</td>
		<td class="center">{$client_id}</td>
		<td class="center">{$device_id}</td>
		<td class="center">{$session_id}</td>
		<td class="center">{$activity_code}</td>
		<td class="center">{$activity_lat}</td>
		<td class="center">{$activity_long}</td>
		<td class="center">{$activity_timestamp}</td>
		<td class="center">{$activity_timezone}</td>
		<td class="center">{$activity_added}</td>
	</tr>
EOD;
		}
	}

$additionalCSS .= <<<EOD
    <link href=  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
    <link href="../css/litesprite.css" rel="stylesheet" media="screen"/>   
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
                <h1>Activity Log Table Dump By Org: {$organization}</h1>
            </div>
            <div class="reporting"> 
				<table  width="1000">
					<tr>
						<th>Organization</th>
						<th>Client Key</th>
						<th>Activity ID</th>
						<th>Client ID</th>
						<th>Device ID</th>
						<th>Session</th>
						<th>Activity Code</th>
						<th>GPS Lat</th>
						<th>GPS Long</th>
						<th>Timestamp</th>
						<th>Timezone</th>
						<th>Added</th>
					</tr>
				{$report_data}
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>