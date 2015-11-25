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
	$sql = "CALL rptPHQbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
$client_key = $row['client_key'];
$phq1 = $row['phq1'];
$phq2 = $row['phq2'];
$phq3 = $row['phq3'];
$phq4 = $row['phq4'];
$phq5 = $row['phq5'];
$phq6 = $row['phq6'];
$phq7 = $row['phq7'];
$phq8 = $row['phq8'];
$phq9 = $row['phq9'];
$phq10 = $row['phq10'];

$report_data .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_phq_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$phq1}</td>
		<td class="center">{$phq2}</td>
		<td class="center">{$phq3}</td>
		<td class="center">{$phq4}</td>
		<td class="center">{$phq5}</td>
		<td class="center">{$phq6}</td>
		<td class="center">{$phq7}</td>
		<td class="center">{$phq8}</td>
		<td class="center">{$phq9}</td>
		<td class="center">{$phq10}</td>
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
                <h1>PHQ Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="940px">
	                <tr>
	                    <td colspan="11" class="titlerow">PHQ Survey: {$survey}.</td>
	                </tr>
					<tr>
						<th style="width: 140px;">Client</th>
						<th style="width: 80px;">PHQ-1</th>
						<th style="width: 80px;">PHQ-2</th>
						<th style="width: 80px;">PHQ-3</th>
						<th style="width: 80px;">PHQ-4</th>
						<th style="width: 80px;">PHQ-5</th>
						<th style="width: 80px;">PHQ-6</th>
						<th style="width: 80px;">PHQ-7</th>
						<th style="width: 80px;">PHQ-8</th>
						<th style="width: 80px;">PHQ-9</th>
						<th style="width: 80px;">PHQ-10</th>
					</tr>
				{$report_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="2">LEGEND for 1-9</th>
					</tr>
					<tr>
						<td width="80">0</td><td class="left">Not at all</td>
					</tr>
					<tr>
						<td>1</td><td class="left">Several days</td>
					</tr>
					<tr>
						<td>2</td><td class="left">More than half of the days</td>
					</tr>
					<tr>						
						<td>3</td><td class="left">Nearly every day</td>
					</tr>
					<th colspan="2">LEGEND for PHQ-10</th>
					<tr>
						<td width="80">0</td><td class="left">Not difficult at all</td>
					</tr>
					<tr>
						<td>1</td><td class="left">Somewhat difficult</td>
					</tr>
					<tr>
						<td>2</td><td class="left">Very difficult</td>
					</tr>
					<tr>						
						<td>3</td><td class="left">Extremely difficult</td>
					</tr>
					<tr>						
						<td colspan="2">Lower score is better.</td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>