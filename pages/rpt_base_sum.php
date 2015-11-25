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
	$sql = "CALL rptBASELINEbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			//$survey_id = $row['client_survey_baseline_id'];
			$client_key = $row['client_key'];

			$baseline2 = $row['baseline2'];
			$baseline2a = $row['baseline2a'];
			$baseline3 = $row['baseline3'];
			$baseline4 = $row['baseline4'];
			switch ($row['baseline4a']) {
				case 0:
					$baseline4a	= "No";
					break;
				case 1:
					$baseline4a	= "Yes";
					break;
			} 
			$baseline4b = $row['baseline4b'];
			$baseline5 = $row['baseline5'];
			$baseline6 =$row['baseline6'];

		}

		while ($row1 = $Result[1]->fetch_assoc()) {
			$count1v[$row1['baseline1']] = $row1['count'];
		}

		while ($row2 = $Result[2]->fetch_assoc()) {
			$count2v[$row2['baseline2']] = $row2['count'];
		}

		while ($row3 = $Result[3]->fetch_assoc()) {
			$count3v[$row3['baseline3']] = $row3['count'];
		}

		while ($row4 = $Result[4]->fetch_assoc()) {
			$count4v[$row4['baseline4']] = $row4['count'];
		}
		while ($row5 = $Result[5]->fetch_assoc()) {
			$count4av[$row5['baseline4a']] = $row5['count'];
		}
		while ($row6 = $Result[6]->fetch_assoc()) {
			$count4bv[$row6['baseline4a']] = $row6['count'];
		}
		while ($row7 = $Result[7]->fetch_assoc()) {
			$count5v[$row7['baseline5']] = $row7['count'];
		}
		while ($row8 = $Result[8]->fetch_assoc()) {
			$count6v[$row8['baseline6']] = $row8['count'];
		}

	}

$report_data1 = <<<EOD
<table  width="600px">
	<tr>
		<td class="titlerow left" colspan="2">What is your highest level of education now? <span class="titlenote"><a href="/rpt_base_education/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Did not graduate from high school</td><td style="width: 80px;">{$count1v[1]}</td>
	</tr>
	<tr>
		<td class="left">GED or ABE certificate</td><td>{$count1v[2]}</td>
	</tr>
	<tr>
		<td class="left">High school diploma</td><td>{$count1v[3]}</td>
	</tr>
	<tr>
		<td class="left">Trade or technical school graduate</td><td>{$count1v[4]}</td>
	</tr>
	<tr>
		<td class="left">Some college but not a 4-year degree</td><td>{$count1v[5]}</td>
	</tr>
	<tr>
		<td class="left">4-year college degree (BA, BS, or equivalent)</td><td>{$count1v[6]}</td>
	</tr>
	<tr>
		<td class="left">Graduate or professional study but no graduate degree</td><td>{$count1v[7]}</td>
	</tr>
	<tr>
		<td class="left">Graduate or professional degree</td><td>{$count1v[8]}</td>
	</tr>
	<tr>
		<td class="left">Prefer not to say</td><td>{$count1v[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="600px">				
	<tr>
		<td class="titlerow left" colspan="2">What is your race? <span class="titlenote"><a href="/rpt_base_race/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Caucasian/White</td><td style="width: 80px;">{$count2v[1]}</td>
	</tr>
	<tr>
		<td class="left">Black or African American</td><td>{$count2v[2]}</td>
	</tr>
	<tr>
		<td class="left">American Indian or Alaskan Native</td><td>{$count2v[3]}</td>
	</tr>
	<tr>
		<td class="left">Asian (Asian Indian, Chinese, Filipino, Japanese, Korean, Vietnamese)</td><td>{$count2v[4]}</td>
	</tr>
	<tr>
		<td class="left">Native Hawaiian or other Pacific Islander (Samoan, Guamanian, Chamorro)</td><td>{$count2v[5]}</td>
	</tr>
	<tr>
		<td class="left">Other</td><td>{$count2v[6]}</td>
	</tr>			
	<tr>
		<td class="left">Mixed / Various</td><td>{$count2v[7]}</td>
	</tr>
	<tr>
		<td class="left">Prefer not to say</td><td>{$count2v[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="600px">				
	<tr>
		<td class="titlerow left" colspan="2">Are you Spanish/Hispanic/Latino? <span class="titlenote"><a href="/rpt_base_shl/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">No, not Spanish/Hispanic/Latino</td><td style="width: 80px;">{$count3v[1]}</td>
	</tr>
	<tr>
		<td class="left">Yes, Mexican/Mexican-American/Chicano</td><td>{$count3v[2]}</td>
	</tr>
	<tr>
		<td class="left">Yes, Puerto Rican</td><td>{$count3v[3]}</td>
	</tr>
	<tr>
		<td class="left">Yes, Cuban</td><td>{$count3v[4]}</td>
	</tr>
	<tr>
		<td class="left">Yes, other Spanish/Hispanic/Latino</td><td>{$countsv[5]}</td>
	</tr>
	<tr>
		<td class="left">Prefer not to say</td><td>{$count3v[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="600px">				
	<tr>
		<td class="titlerow left" colspan="2">What is your marital status? <span class="titlenote"><a href="/rpt_base_relationship/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<th class="left" colspan="2">What is your marital status?</th>
	</tr>
	<tr>
		<td class="left">Married</td><td style="width: 80px;">{$count4v[1]}</td>
	</tr>
	<tr>
		<td class="left">Living as married (living with fiancé, boyfriend, or girlfriend but not married)</td><td>{$count4v[2]}</td>
	</tr>
	<tr>
		<td class="left">Separated and not living as married</td><td>{$count4v[3]}</td>
	</tr>
	<tr>
		<td class="left">Divorced and not living as married</td><td>{$count4v[4]}</td>
	</tr>
	<tr>
		<td class="left">Widowed and not living as married</td><td>{$count4v[5]}</td>
	</tr>
	<tr>
		<td class="left">Single, never married, and not living as married</td><td>{$count4v[6]}</td>
	</tr>
	<tr>
		<td class="left">Prefer not to say</td><td>{$count4v[0]}</td>
	</tr>
	<tr>
		<th class="left" colspan="2">Have you had any relationship status changes in the past 12 months?</th>
	</tr>
	<tr>
		<td class="left">Yes</td><td>{$count4av[1]}</td>
	</tr>
	<tr>
		<td class="left">No</td><td>{$count4bv[0]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="600px">				
	<tr>
		<td class="titlerow left" colspan="2">Household residents including yourself? <span class="titlenote"><a href="/rpt_base_household/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">1</td><td style="width: 80px;">{$count5v[1]}</td>
	</tr>
	<tr>
		<td class="left">2</td><td>{$count5v[2]}</td>
	</tr>
	<tr>
		<td class="left">3</td><td>{$count5v[3]}</td>
	</tr>
	<tr>
		<td class="left">4</td><td>{$count5v[4]}</td>
	</tr>
	<tr>
		<td class="left">5</td><td>{$count5v[5]}</td>
	</tr>
	<tr>
		<td class="left">6</td><td>{$count5v[6]}</td>
	</tr>
	<tr>
		<td class="left">7</td><td>{$count5v[7]}</td>
	</tr>
	<tr>
		<td class="left">8</td><td>{$count5v[8]}</td>
	</tr>
	<tr>
		<td class="left">9</td><td>{$count5v[9]}</td>
	</tr>
	<tr>
		<td class="left">10</td><td>{$count5v[10]}</td>
	</tr>
	<tr>
		<td class="left">11</td><td>{$count5v[11]}</td>
	</tr>
	<tr>
		<td class="left">12</td><td>{$count5v[12]}</td>
	</tr>
	<tr>
		<td class="left">13</td><td>{$count5v[13]}</td>
	</tr>
	<tr>
		<td class="left">14</td><td>{$count5v[14]}</td>
	</tr>
	<tr>
		<td class="left">15</td><td>{$count5v[15]}</td>
	</tr>
	<tr>
		<td class="left">16 or more</td><td>{$count5v[16]}</td>
	</tr>
</table>
<p>&nbsp;<p/>
<table  width="600px">				
	<tr>
		<td class="titlerow left" colspan="2">What is your household income before taxes? <span class="titlenote"><a href="/rpt_base_income/{$survey_id}">(View Detail Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Under $20,000</td><td style="width: 80px;">{$count6v[1]}</td>
	</tr>
	<tr>
		<td class="left">$20,000-29,999</td><td>{$count6v[2]}</td>
	</tr>
	<tr>
		<td class="left">$30,000-39,999</td><td>{$count6v[3]}</td>
	</tr>
	<tr>
		<td class="left">$40,000-49,999</td><td>{$count6v[3]}</td>
	</tr>
	<tr>
		<td class="left">$50,000-59,999</td><td>{$count6v[4]}</td>
	</tr>
	<tr>
		<td class="left">$60,000-69,999</td><td>{$count6v[5]}</td>
	</tr>
	<tr>
		<td class="left">$70,000-99,999</td><td>{$count6v[6]}</td>
	</tr>
	<tr>
		<td class="left">$100,000-149,999</td><td>{$count6v[7]}</td>
	</tr>
	<tr>
		<td class="left">Above $150,000</td><td>{$count6v[8]}</td>
	</tr>
	<tr>
		<td class="left">Prefer not to say</td><td>{$count6v[0]}</td>
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
            	<h1>Survey Demographics Results : {$survey}</h1>
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