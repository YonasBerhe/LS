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
	$sql = 'CALL td_journal_by_org('.sql_escape_string($OrgID, 0).');';
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$organization = $row['organization'];
			$client_key = $row['client_key'];
			$anxiety_id = $row['anxiety_id'];
			$client_id = $row['client_id'];
			$device_id = $row['device_id'];
			$session_id = $row['session_id'];
			$anxiety_type = $row['anxiety_type'];
			$journal_other_text = $row['journal_other_text'];
			$anxiety_rating = $row['anxiety_rating'];
			$anxiety_manageable = $row['anxiety_manageable'];
			$anxiety_description = $row['anxiety_description'];
			$anxiety_created = $row['anxiety_created'];
			$anxiety_deleted = $row['anxiety_deleted'];
			$anxiety_timestamp = $row['anxiety_timestamp'];
			$anxiety_timezone = $row['anxiety_timezone'];
			$anxiety_added = $row['anxiety_added'];
	


$report_data .= <<<EOD
	<tr>
		<td class="left">{$organization}</td>
		<td class="left">{$client_key}</td>
		<td class="center">{$anxiety_id}</td>
		<td class="center">{$client_id}</td>
		<td class="center">{$device_id}</td>
		<td class="center">{$session_id}</td>
		<td class="center">{$anxiety_type}</td>
		<td class="center">{$journal_other_text}</td>
		<td class="center">{$anxiety_rating}</td>
		<td class="center">{$anxiety_manageable}</td>
		<td class="center">{$anxiety_description}</td>
		<td class="center">{$anxiety_created}</td>
		<td class="center">{$anxiety_deleted}</td>
		<td class="center">{$anxiety_timestamp}</td>
		<td class="center">{$anxiety_timezone}</td>
		<td class="center">{$anxiety_added}</td>
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
                <h1>Journal (Anxieties) Table Dump By Org: {$organization}</h1>
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
						<th>Anxiety Type</th>
						<th>Other Text</th>
						<th>Rating</th>
						<th>Manageable</th>
						<th>Description</th>
						<th>Created</th>
						<th>Deleted</th>
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