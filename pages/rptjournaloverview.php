<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


// echo isset($_SESSION['user_key'])."<br/>";
// echo strlen($_SESSION['user_key'])."<br/>";

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

if (strlen($args[1]) < 1) {
    $survey_id = 1;
} else {
    $survey_id = $args[1];
}

	//Validate the user
	$sql = "CALL rptAnxietyOverview();";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
$client_key = $row['client_key'];
$anxiety_type = $row['anxiety_type'];
$anxiety_rating = $row['anxiety_rating'];
$anxiety_manageable = $row['anxiety_manageable'];
if ($anxiety_manageable == 1) {
	$anxiety_manageable = "Yes";
} else {
	$anxiety_manageable = "No";
}
$anxiety_description = $row['anxiety_description'];
$anxiety_created = $row['anxiety_created'];
$anxiety_deleted = $row['anxiety_deleted'];
if ($anxiety_deleted == 'Dec 31 1969 04:00 PM') {
	$anxiety_deleted = "";
}
$active = $row['active'];
if ($active == 1) {
	$active = "Yes";
} else {
	$active = "No";
}

$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 80px;">{$client_key}</td>
		<td class="left" style="width: 100px;">{$anxiety_type}</td>
		<td class="left" style="width: 300px;">{$anxiety_description}</td>
		<td class="center">{$anxiety_rating}</td>
		<td class="center">{$anxiety_manageable}</td>
		<td class="right" style="width: 180px;">{$anxiety_created}</td>
		<td class="right" style="width: 180px;">{$anxiety_deleted}</td>
		<td class="center">{$active}</td>
	</tr>
EOD;
		}
	}

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
                <h1>Sinasprite Journal Overview</h1>
            </div>
            <div class="reporting"> 
				<table>
	                <tr>
	                    <td colspan="8" class="titlerow">Active / Inactive Journals by date.</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Type</th>
						<th>Description</th>
						<th>Rating</th>
						<th>Manageable</th>
						<th>Created</th>
						<th>Removed</th>
						<th>Active</th>
					</tr>
				{$report_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="2">LEGEND</th>
					</tr>
					<tr>						
						<td colspan="2">Lower Rating is better.</td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>