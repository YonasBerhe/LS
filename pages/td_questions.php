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
	$sql = 'CALL td_questions_by_org('.sql_escape_string($OrgID, 0).');';
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$organization = $row['organization'];
			$client_key = $row['client_key'];
			$question_id = $row['question_id'];
			$client_id = $row['client_id'];
			$device_id = $row['device_id'];
			$session_id = $row['session_id'];
			$oracle_question_id = $row['oracle_question_id'];
			$question = $row['question'];
			$question_text = $row['question_text'];
			$oracle_question_option_id = $row['oracle_question_option_id'];
			$question_response = $row['question_response'];
			$question_timestamp = $row['question_timestamp'];
			$question_timezone = $row['question_timezone'];
			$question_added = $row['question_added'];

$report_data .= <<<EOD
	<tr>
		<td class="left">{$organization}</td>
		<td class="left">{$client_key}</td>
		<td class="center">{$question_id}</td>
		<td class="center">{$client_id}</td>
		<td class="center">{$device_id}</td>
		<td class="center">{$session_id}</td>
		<td class="center">{$oracle_question_id}</td>
		<td class="center">{$question}</td>
		<td class="center">{$question_text}</td>
		<td class="center">{$oracle_question_option_id}</td>
		<td class="center">{$question_response}</td>
		<td class="center">{$question_timestamp}</td>
		<td class="center">{$question_timezone}</td>
		<td class="center">{$question_added}</td>
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
                <h1>Oracle Questions Table Dump By Org: {$organization}</h1>
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
						<th>Question ID</th>
						<th>Question Text(2)</th>
						<th>Question Text(1)</th>
						<th>Response(2)</th>
						<th>Response(1)</th>
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