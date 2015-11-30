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
    $client_key = 'null';
} else {
    $client_key = $args[1];
}

	//Validate the user
	$sql = "CALL rptBaselinebyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			$survey_id = $row['client_survey_baseline_id'];
			$client_key = $row['client_key'];
			$client_age = $row['client_age'];
			$client_gender = $row['client_gender'];
			$baseline1 = $row['baseline1'];
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

	}


switch ($baseline1) {
				case NULL:
					$baseline1 = " - - ";
					break;
				case 0:
					$baseline1 = "Prefer not to say";
					break;
				case 1:
					$baseline1 = "Did not graduate from high school";
					break;
				case 2:
					$baseline1 = "GED or ABE certificate";
					break;
				case 3:
					$baseline1 = "High school diploma";
					break;
				case 4:
					$baseline1 = "Trade or technical school graduate";
					break;
				case 5:
					$baseline1 = "Some college but not a 4-year degree";
					break;
				case 6:
					$baseline1 = "4-year college degree (BA, BS, or equivalent)";
					break;
				case 7:
					$baseline1 = "Graduate or professional study but no graduate degree";
					break;
				case 8:
					$baseline1 = "Graduate or professional degree";
					break;
			} 

			switch ($baseline2) {
					case NULL:
					$baseline2 = " - - ";
					break;
				case 0:
					$baseline2 = "Prefer not to say";
					break;
				case 1:
					$baseline2 = "Caucasian/White";
					break;
				case 2:
					$baseline2 = "Black or African American";
					break;
				case 3:
					$baseline2 = "American Indian or Alaskan Native";
					break;
				case 4:
					$baseline2 = "Asian (Asian Indian, Chinese, Filipino, Japanese, Korean, Vietnamese)";
					break;
				case 5:
					$baseline2 = "Native Hawaiian or other Pacific Islander (Samoan, Guamanian, Chamorro)";
					break;
				case 6:
					$baseline2 = "Other : ". $baseline2a;
					break;
				case 7:
					$baseline2 = "Mixed / Various";
					break;
			} 

			switch ($baseline3) {
					case NULL:
					$baseline3 = " - - ";
					break;
				case 0:
					$baseline3 = "Prefer not to say";
					break;
				case 1:
					$baseline3 = "No, not Spanish/Hispanic/Latino";
					break;
				case 2:
					$baseline3 = "Yes, Mexican/Mexican-American/Chicano";
					break;
				case 3:
					$baseline3 = "Yes, Puerto Rican";
					break;
				case 4:
					$baseline3 = "Yes, Cuban";
					break;
				case 5:
					$baseline3 = "Yes, other Spanish/Hispanic/Latino";
					break;
			} 

			switch ($baseline4) {
					case NULL:
					$baseline3 = " - - ";
					break;
				case 0:
					$baseline3 = "Prefer not to say";
					break;
				case 1:
					$baseline3 = "Married";
					break;
				case 2:
					$baseline3 = "Living as married (living with fiancé, boyfriend, or girlfriend but not married)";
					break;
				case 3:
					$baseline3 = "Separated and not living as married";
					break;
				case 4:
					$baseline3 = "Divorced and not living as married";
					break;
				case 5:
					$baseline3 = "Widowed and not living as married";
					break;
				case 6:
					$baseline3 = "Single, never married, and not living as married";
			} 


			switch ($baseline6) {
					case NULL:
					$baseline6 = " - - ";
					break;
				case 0:
					$baseline6 = "Prefer not to say";
					break;
				case 1:
					$baseline6 = "Under $20,000";
					break;
				case 2:
					$baseline6 = "$20,000-29,999";
					break;
				case 3:
					$baseline6 = "$30,000-39,999";
					break;
				case 4:
					$baseline6 = "$40,000-49,999";
					break;
				case 5:
					$baseline6 = "$50,000-59,999";
					break;
				case 6:
					$baseline6 = "$60,000-69,999";
					break;
				case 7:
					$baseline6 = "$70,000-99,999";
					break;
				case 8:
					$baseline6 = "$100,000-149,999";
					break;
				case 9:
					$baseline6 = "Above $150,000";
					break;
			} 

$report_data1 = <<<EOD
<table  width="800px">
	<tr>
		<td class="titlerow left" colspan="2">{$client_key} <span class="titlenote"><a href="/rpt_base_sum">(View Summary Report)</a></span></td>
	</tr>
	<tr>
		<td class="left">Age</td><td class="left">{$client_age}</td>
	</tr>
	<tr>
		<td class="left">Gender</td><td class="left">{$client_gender}</td>
	</tr>
	<tr>
		<td class="left">What is your highest level of education now?</td><td class="left">{$baseline1}</td>
	</tr>
	<tr>
		<td class="left">What is your race?</td><td class="left">{$baseline2}</td>
	</tr>
	<tr>
		<td class="left">Are you Spanish/Hispanic/Latino?</td><td class="left">{$baseline3}</td>
	</tr>
	<tr>
		<td class="left">What is your marital status?</td><td class="left">{$baseline4}</td>
	</tr>
	<tr>
		<td class="left">Status Changed:{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>
	<tr>
		<td class="left">How many people live in your household including yourself?</td><td class="left">{$baseline5}</td>
	</tr>
	<tr>
		<td class="left">What is your household income before taxes?</td><td class="left">{$baseline6}</td>
	</tr>
</table>
EOD;


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
            	<h1>Survey Demographics Results : {$survey}</h1>
            </div>
            <div class="reporting"> 
				{$report_data1}
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<td colspan="2"><a href="/rpt_pmph_one/{$client_key}">View Client PMPH</a></td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>