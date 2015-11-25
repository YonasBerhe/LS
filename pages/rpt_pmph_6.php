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
			//$survey = $row['survey'];
			// $survey_id = $row['client_survey_baseline_id'];
			$client_key = $row['client_key'];

			$pmph5f = eval5($row['pmph5f']);
			$pmph5g = eval5($row['pmph5g']);
			$pmph5h = eval5($row['pmph5h']);
			$pmph5i = eval5($row['pmph5i']);
			

$report_data1 .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_pmph_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$pmph5f}</td>
		<td class="center">{$pmph5g}</td>
		<td class="center">{$pmph5h}</td>
		<td class="center">{$pmph5i}</td>
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
				<table  width="800px">				
					<tr>
						<td class="titlerow left" colspan="23">Have you been told by a health care provider that you have or had:<span class="titlenote"><a href="/rpt_pmph_sum/{$survey_id}">(View Summary Report)</a></span></td>
					</tr>
					<tr>
						<th></th>
						<th class="center">f.</th>
						<th class="center">g.</th>
						<th class="center">h.</th>
						<th class="center">i.</th>
					</tr>
				{$report_data1}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr><th colspan="2">ANSWERS</th></tr>
					<tr><td class="center">-</td><td class="left">No Answer</td></tr>
					<tr><td class="center">Y</td><td class="left">Yes</td></tr>
					<tr><td class="center">N</td><td class="left">No</td></tr>
					<tr><th colspan="2">LEGEND</th></tr>
					<tr><td class="center">f.</td><td class="left">Individual Counseling/Therapy</td></tr>
					<tr><td class="center">g.</td><td class="left">Group Counseling/Therapy</td></tr>
					<tr><td class="center">h.</td><td class="left">Over-the-counter medications</td></tr>
					<tr><td class="center">i.</td><td class="left">Prescription Medications</td></tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>