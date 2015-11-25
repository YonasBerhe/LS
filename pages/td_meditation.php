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
	$sql = 'CALL td_meditation_by_org('.sql_escape_string($OrgID, 0).');';
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$organization = $row['organization'];
			$client_key = $row['client_key'];
			$meditation_id = $row['meditation_id'];
			$client_id = $row['client_id'];
			$device_id = $row['device_id'];
			$session_id = $row['session_id'];
			$meditation_selected = $row['meditation_selected'];
			$meditation_completed = $row['meditation_completed'];
			$meditation_lat = $row['meditation_lat'];
			$meditation_long = $row['meditation_long'];
			$meditation_mandala = $row['meditation_mandala'];
			$meditation_color = $row['meditation_color'];
			$meditation_movement = $row['meditation_movement'];
			$meditation_audio = $row['meditation_audio'];
			$meditation_timestamp = $row['meditation_timestamp'];
			$meditation_timezone = $row['meditation_timezone'];
			$meditation_added = $row['meditation_added'];

$report_data .= <<<EOD
	<tr>
		<td class="left">{$organization}</td>
		<td class="left">{$client_key}</td>
		<td class="center">{$meditation_id}</td>
		<td class="center">{$client_id}</td>
		<td class="center">{$device_id}</td>
		<td class="center">{$session_id}</td>
		<td class="center">{$meditation_selected}</td>
		<td class="center">{$meditation_completed}</td>
		<td class="center">{$meditation_lat}</td>
		<td class="center">{$meditation_long}</td>
		<td class="center">{$meditation_mandala}</td>
		<td class="center">{$meditation_color}</td>
		<td class="center">{$meditation_movement}</td>
		<td class="center">{$meditation_audio}</td>
		<td class="center">{$meditation_timestamp}</td>
		<td class="center">{$meditation_timezone}</td>
		<td class="center">{$meditation_added}</td>
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
                <h1>Meditation Table Dump By Org: {$organization}</h1>
            </div>
            <div class="reporting"> 
				<table  width="1000">
					<tr>
						<th>Organization</th>
						<th>Client Key</th>
						<th>Row ID</th>
						<th>Client ID</th>
						<th>Device ID</th>
						<th>Session</th>
						<th>Time Selected</th>
						<th>Time Completed</th>
						<th>GPS Lat</th>
						<th>GPS Long</th>
						<th>Mandala</th>
						<th>Color</th>
						<th>Movement</th>
						<th>Audio</th>
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