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
			// $client_key = $row['client_key'];


		}

		while ($row1 = $Result[1]->fetch_assoc()) {
			$count1v[$row1['pmph1']] = $row1['count'];
		}

		for ($i=1; $i < 20; $i++) { 
			while ($row[$i] = $Result[$i+1]->fetch_assoc()) {
				$count2[$i][$row[$i]['val']] = $row[$i]['count'];
			}
		}		

		while ($row21 = $Result[21]->fetch_assoc()) {
			$count3[$row21['pmph3']] = $row21['count'];
		}

		while ($row22 = $Result[22]->fetch_assoc()) {
			$count4[$row22['pmph4']] = $row22['count'];
		}

		for ($i=1; $i < 10; $i++) { 
			while ($row5[$i] = $Result[$i+22]->fetch_assoc()) {
				$count5[$i][$row5[$i]['val']] = $row5[$i]['count'];
			}
		}		
	}

$report_data1 = <<<EOD
<table  width="800px">
	<tr>
		<td class="titlerow left" colspan="2">Do you receive regular medical care from a physician or clinic? <span class="titlenote"><a href="/rpt_pmph_1/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Yes</td><td style="width: 80px;">{$count1v[1]}</td>
	</tr>
	<tr>
		<td class="left">No</td><td>{$count1v[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">				
	<tr>
		<td class="titlerow left" colspan="4">Medical conditions <span class="titlenote"><a href="/rpt_pmph_2/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<th></th>
		<th style="width: 100px;">Yes</th>
		<th style="width: 100px;">No</th>
		<th style="width: 100px;">Don't Know</th>
	</tr>
	<tr>
		<td class="left">a. Heart Disease</td>
		<td class="center">{$count2[1][1]}</td>
		<td class="center">{$count2[1][0]}</td>
		<td class="center">{$count2[1][99]}</td>
	</tr>
	<tr>
		<td class="left">b. High Blood Pressure</td>
		<td class="center">{$count2[2][1]}</td>
		<td class="center">{$count2[2][0]}</td>
		<td class="center">{$count2[2][99]}</td>
	</tr>
	<tr>
		<td class="left">c. Diabetes or High Blood Sugar</td>
		<td class="center">{$count2[3][1]}</td>
		<td class="center">{$count2[3][0]}</td>
		<td class="center">{$count2[3][99]}</td>
	</tr>
	<tr>
		<td class="left">d. Cancer</td>
		<td class="center">{$count2[4][1]}</td>
		<td class="center">{$count2[4][0]}</td>
		<td class="center">{$count2[4][99]}</td>
	</tr>
	<tr>
		<td class="left">e. Thyroid Disease</td>
		<td class="center">{$count2[5][1]}</td>
		<td class="center">{$count2[5][0]}</td>
		<td class="center">{$count2[5][99]}</td>
	</tr>
	<tr>
		<td class="left">f. Stroke</td>
		<td class="center">{$count2[6][1]}</td>
		<td class="center">{$count2[6][0]}</td>
		<td class="center">{$count2[6][99]}</td>
	</tr>
	<tr>
		<td class="left">g. Gout</td>
		<td class="center">{$count2[7][1]}</td>
		<td class="center">{$count2[7][0]}</td>
		<td class="center">{$count2[7][99]}</td>
	</tr>
	<tr>
		<td class="left">h. High Cholesterol</td>
		<td class="center">{$count2[8][1]}</td>
		<td class="center">{$count2[8][0]}</td>
		<td class="center">{$count2[8][99]}</td>
	</tr>
	<tr>
		<td class="left">i. Hormone Problem</td>
		<td class="center">{$count2[9][1]}</td>
		<td class="center">{$count2[9][0]}</td>
		<td class="center">{$count2[9][99]}</td>
	</tr>
	<tr>
		<td class="left">j. Asthma</td>
		<td class="center">{$count2[10][1]}</td>
		<td class="center">{$count2[10][0]}</td>
		<td class="center">{$count2[10][99]}</td>
	</tr>
	<tr>
		<td class="left">k. Tuberculosis</td>
		<td class="center">{$count2[11][1]}</td>
		<td class="center">{$count2[11][0]}</td>
		<td class="center">{$count2[11][99]}</td>
	</tr>
	<tr>
		<td class="left">l. Kidney Disease</td>
		<td class="center">{$count2[12][1]}</td>
		<td class="center">{$count2[12][0]}</td>
		<td class="center">{$count2[12][99]}</td>
	</tr>
	<tr>
		<td class="left">m. Peptic Ulcers</td>
		<td class="center">{$count2[13][1]}</td>
		<td class="center">{$count2[13][0]}</td>
		<td class="center">{$count2[13][99]}</td>
	</tr>
	<tr>
		<td class="left">n. Gall Bladder Problems</td>
		<td class="center">{$count2[14][1]}</td>
		<td class="center">{$count2[14][0]}</td>
		<td class="center">{$count2[14][99]}</td>
	</tr>
	<tr>
		<td class="left">o. Spinal cord, neck or head injury</td>
		<td class="center">{$count2[15][1]}</td>
		<td class="center">{$count2[15][0]}</td>
		<td class="center">{$count2[15][99]}</td>
	</tr>
	<tr>
		<td class="left">p. Back problem</td>
		<td class="center">{$count2[16][1]}</td>
		<td class="center">{$count2[16][0]}</td>
		<td class="center">{$count2[16][99]}</td>
	</tr>
	<tr>
		<td class="left">q. Depression</td>
		<td class="center">{$count2[17][1]}</td>
		<td class="center">{$count2[17][0]}</td>
		<td class="center">{$count2[17][99]}</td>
	</tr>
	<tr>
		<td class="left">r. Eating Disorder</td>
		<td class="center">{$count2[18][1]}</td>
		<td class="center">{$count2[18][0]}</td>
		<td class="center">{$count2[18][99]}</td>
	</tr>
	<tr>
		<td class="left">s. Anxiety or Stress</td>
		<td class="center">{$count2[19][1]}</td>
		<td class="center">{$count2[19][0]}</td>
		<td class="center">{$count2[19][99]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<td class="titlerow left" colspan="2">Have you had any other disease? <span class="titlenote"><a href="/rpt_pmph_3/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Yes</td><td style="width: 80px;">{$count3[1]}</td>
	</tr>
	<tr>
		<td class="left">No</td><td>{$count3[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">
	<tr>
		<td class="titlerow left" colspan="2">Have you ever received any psychiatric or psychological treatment?  <span class="titlenote"><a href="/rpt_pmph_4/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Yes</td><td style="width: 80px;">{$count4[1]}</td>
	</tr>
	<tr>
		<td class="left">No</td><td>{$count4[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">				
	<tr>
		<td class="titlerow left" colspan="3">Have you been told by a health care provider that you have or had:<span class="titlenote"><a href="/rpt_pmph_5/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<th></th>
		<th style="width: 100px;">Yes</th>
		<th style="width: 100px;">No</th>
	</tr>
	<tr>
		<td class="left">a. Major Depression</td>
		<td class="center">{$count5[1][1]}</td>
		<td class="center">{$count5[1][0]}</td>
	</tr>
	<tr>
		<td class="left">b. Anxiety Disorder</td>
		<td class="center">{$count5[2][1]}</td>
		<td class="center">{$count5[2][0]}</td>
	</tr>
	<tr>
		<td class="left">c. Schizophrenia/Personality Disorder</td>
		<td class="center">{$count5[3][1]}</td>
		<td class="center">{$count5[3][0]}</td>
	</tr>
	<tr>
		<td class="left">d. Bipolar Disorder</td>
		<td class="center">{$count5[4][1]}</td>
		<td class="center">{$count5[4][0]}</td>
	</tr>
	<tr>
		<td class="left">e. Substance Dependence</td>
		<td class="center">{$count5[5][1]}</td>
		<td class="center">{$count5[5][0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="800px">				
	<tr>
		<td class="titlerow left" colspan="4">Methods used:<span class="titlenote"><a href="/rpt_pmph_6/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<th></th>
		<th style="width: 150px;">Used in the Past</th>
		<th style="width: 150px;">Use Currently</th>
		<th style="width: 100px;">N/A</th>
	</tr>	
	<tr>
		<td class="left">f. Individual Counseling/Therapy</td>
		<td class="center">{$count5[6][1]}</td>
		<td class="center">{$count5[6][2]}</td>
		<td class="center">{$count5[6][99]}</td>
	</tr>
	<tr>
		<td class="left">g. Group Counseling/Therapy</td>
		<td class="center">{$count5[7][1]}</td>
		<td class="center">{$count5[7][2]}</td>
		<td class="center">{$count5[7][99]}</td>
	</tr>
	<tr>
		<td class="left">h. Over-the-counter medications</td>
		<td class="center">{$count5[8][1]}</td>
		<td class="center">{$count5[8][2]}</td>
		<td class="center">{$count5[8][99]}</td>
	</tr>
	<tr>
		<td class="left">i. Prescription Medications</td>
		<td class="center">{$count5[9][1]}</td>
		<td class="center">{$count5[9][2]}</td>
		<td class="center">{$count5[9][99]}</td>
	</tr>
</table>

EOD;


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
            	<h1>Survey Personal Medical &amp; Psychiatric History Results : {$survey}</h1>
            </div>
            <div class="reporting"> 
				{$report_data1}
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>