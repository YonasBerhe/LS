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
	$sql = "CALL rptlsqbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$rowcount = 1;
	if ($Result) {
		$rowcount = 1;
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			$client_key = $row['client_key'];
			$lsq1 = ($row['lsq1']);
			$lsq2 = ($row['lsq2']);
			$lsq3 = ($row['lsq3']);
			$lsq4 = ($row['lsq4']);
			$lsq5 = ($row['lsq5']);
			$lsq6 = ($row['lsq6']);
			$lsq7 = ($row['lsq7']);
			$lsq8 = ($row['lsq8']);
			$lsq9 = ($row['lsq9']);

			$total = $lsq1 + $lsq2 + $lsq3 + $lsq4 + $lsq5 + $lsq6 + $lsq7 + $lsq8 + $lsq9;
			

$report_data .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_lsq_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$lsq1}</td>
		<td class="center">{$lsq2}</td>
		<td class="center">{$lsq3}</td>
		<td class="center">{$lsq4}</td>
		<td class="center">{$lsq5}</td>
		<td class="center">{$lsq6}</td>
		<td class="center">{$lsq7}</td>
		<td class="center">{$lsq8}</td>
		<td class="center">{$lsq9}</td>
		<td class="reporttotal"><b>{$total}</b></td>
	</tr>
EOD;

$rowcount++;
		}
	}

$avgtotal = $avgtotal / $rowcount;

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
                <h1>LSQ Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="500px">
	                <tr>
	                    <td colspan="11" class="titlerow">LSQ Survey: {$survey}.</td>
	                </tr>
					<tr>
						<th style="width: 140px;">Client Key</th>
						<th style="width: 40px;">1</th>
						<th style="width: 40px;">2</th>
						<th style="width: 40px;">3</th>
						<th style="width: 40px;">4</th>
						<th style="width: 40px;">5</th>
						<th style="width: 40px;">6</th>
						<th style="width: 40px;">7</th>
						<th style="width: 40px;">8</th>
						<th style="width: 40px;">9</th>
						<th style="width: 80px;">Total</th>
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
						<td width="80">1</td><td class="left">Very Dissatisfying</td>
					</tr>
					<tr>
						<td width="80">2</td><td class="left">Dissatisfying</td>
					</tr>
					<tr>
						<td width="80">3</td><td class="left">Rather Dissatisfying</td>
					</tr>
					<tr>
						<td width="80">4</td><td class="left">Rather Satisfying</td>
					</tr>
					<tr>
						<td width="80">5</td><td class="left">Satisfying</td>
					</tr>
					<tr>
						<td width="80">6</td><td class="left">Very Satisfying</td>
					</tr>
					<tr>						
						<td colspan="2">Higher score is better.</td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>