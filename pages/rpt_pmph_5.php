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

			$pmph5a = evalYN($row['pmph5a']);
			$pmph5b = evalYN($row['pmph5b']);
			$pmph5c = evalYN($row['pmph5c']);
			$pmph5d = evalYN($row['pmph5d']);
			$pmph5e = evalYN($row['pmph5e']);

$report_data1 .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_pmph_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$pmph5a}</td>
		<td class="center">{$pmph5b}</td>
		<td class="center">{$pmph5c}</td>
		<td class="center">{$pmph5d}</td>
		<td class="center">{$pmph5e}</td>
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
						<th class="center">a.</th>
						<th class="center">b.</th>
						<th class="center">c.</th>
						<th class="center">d.</th>
						<th class="center">e.</th>
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
					<tr><td class="center">a.</td><td class="left">Major Depression</td></tr>
					<tr><td class="center">b.</td><td class="left">Anxiety Disorder</td></tr>
					<tr><td class="center">c.</td><td class="left">Schizophrenia/Personality Disorder</td></tr>
					<tr><td class="center">d.</td><td class="left">Bipolar Disorder</td></tr>
					<tr><td class="center">e.</td><td class="left">Substance Dependence</td></tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>