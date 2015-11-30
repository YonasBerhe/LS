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
	$sql = "CALL rptPMPHbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			$survey_id = $row['client_survey_baseline_id'];
			$client_key = $row['client_key'];
			$pmph3 = evalYN($row['pmph3']);

$report_data1 .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_pmph_one/{$client_key}">{$client_key}</a></td><td>{$pmph3}</td>
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
            	<h1>Survey Personal Medical &amp; Psychiatric History Results : {$survey}</h1>
            </div>
            <div class="reporting">
				<table  width="600px">
					<tr>
	                    <td colspan="2" class="titlerow">Have you had any other disease?<span class="titlenote"><a href="/rpt_pmph_sum/{$survey_id}">(View Summary Report)</a></span></td>
	                </tr>
					<tr>
	                    <th style="width: 300px;">Client Key</th>
	                    <th class="left"></th>
	                </tr>
					{$report_data1}
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>