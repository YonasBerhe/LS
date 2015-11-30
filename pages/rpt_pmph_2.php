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
			$pmph2a = eval2($row['pmph2a']);
			$pmph2b = eval2($row['pmph2b']);
			$pmph2c = eval2($row['pmph2c']);
			$pmph2d = eval2($row['pmph2d']);
			$pmph2e = eval2($row['pmph2e']);
			$pmph2f = eval2($row['pmph2f']);
			$pmph2g = eval2($row['pmph2g']);
			$pmph2h = eval2($row['pmph2h']);
			$pmph2i = eval2($row['pmph2i']);
			$pmph2j = eval2($row['pmph2j']);
			$pmph2k = eval2($row['pmph2k']);
			$pmph2l = eval2($row['pmph2l']);
			$pmph2m = eval2($row['pmph2m']);
			$pmph2n = eval2($row['pmph2n']);
			$pmph2o = eval2($row['pmph2o']);
			$pmph2p = eval2($row['pmph2p']);
			$pmph2q = eval2($row['pmph2q']);
			$pmph2r = eval2($row['pmph2r']);
			$pmph2s = eval2($row['pmph2s']);
$report_data1 .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_pmph_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$pmph2a}</td>
		<td class="center">{$pmph2b}</td>
		<td class="center">{$pmph2c}</td>
		<td class="center">{$pmph2d}</td>
		<td class="center">{$pmph2e}</td>
		<td class="center">{$pmph2f}</td>
		<td class="center">{$pmph2g}</td>
		<td class="center">{$pmph2h}</td>
		<td class="center">{$pmph2i}</td>
		<td class="center">{$pmph2j}</td>
		<td class="center">{$pmph2k}</td>
		<td class="center">{$pmph2l}</td>
		<td class="center">{$pmph2m}</td>
		<td class="center">{$pmph2n}</td>
		<td class="center">{$pmph2o}</td>
		<td class="center">{$pmph2p}</td>
		<td class="center">{$pmph2q}</td>
		<td class="center">{$pmph2r}</td>
		<td class="center">{$pmph2s}</td>
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
						<td class="titlerow left" colspan="23">Medical conditions <span class="titlenote"><a href="/rpt_pmph_sum/{$survey_id}">(View Summary Report)</a></span></td>
					</tr>
					<tr>
						<th></th>
						<th class="center">a.</th>
						<th class="center">b.</th>
						<th class="center">c.</th>
						<th class="center">d.</th>
						<th class="center">e.</th>
						<th class="center">f.</th>
						<th class="center">g.</th>
						<th class="center">h.</th>
						<th class="center">i.</th>
						<th class="center">j.</th>
						<th class="center">k.</th>
						<th class="center">l.</th>
						<th class="center">m.</th>
						<th class="center">n.</th>
						<th class="center">o.</th>
						<th class="center">p.</th>
						<th class="center">q.</th>
						<th class="center">r.</th>
						<th class="center">s.</th>
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
					<tr><td class="center">?</td><td class="left">Don't Know</td></tr>
					<tr><th colspan="2">LEGEND</th></tr>
					<tr><td class="center">a.</td><td class="left">Heart Disease</td></tr>
					<tr><td class="center">b.</td><td class="left">High Blood Pressure</td></tr>
					<tr><td class="center">c.</td><td class="left">Diabetes or High Blood Sugar</td></tr>
					<tr><td class="center">d.</td><td class="left">Cancer</td></tr>
					<tr><td class="center">e.</td><td class="left">Thyroid Disease</td></tr>
					<tr><td class="center">f.</td><td class="left">Stroke</td></tr>
					<tr><td class="center">g.</td><td class="left">Gout</td></tr>
					<tr><td class="center">h.</td><td class="left">High Cholesterol</td></tr>
					<tr><td class="center">i.</td><td class="left">Hormone Problem</td></tr>
					<tr><td class="center">j.</td><td class="left">Asthma</td></tr>
					<tr><td class="center">k.</td><td class="left">Tuberculosis</td></tr>
					<tr><td class="center">l.</td><td class="left">Kidney Disease</td></tr>
					<tr><td class="center">m.</td><td class="left">Peptic Ulcers</td></tr>
					<tr><td class="center">n.</td><td class="left">Gall Bladder Problems</td></tr>
					<tr><td class="center">o.</td><td class="left">Spinal cord, neck or head injury</td></tr>
					<tr><td class="center">p.</td><td class="left">Back problem</td></tr>
					<tr><td class="center">q.</td><td class="left">Depression</td></tr>
					<tr><td class="center">r.</td><td class="left">Eating Disorder</td></tr>
					<tr><td class="center">s.</td><td class="left">Anxiety or Stress</td></tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>