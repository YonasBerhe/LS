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
	$sql = "CALL rptGADbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$rowcount = 1;
	if ($Result) {
		$rowcount = 1;
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			$client_key = $row['client_key'];
			$gad1 = ($row['gad1']);
//			$t1 += ($row['gad1']);
			$gad2 = ($row['gad2']);
//			$t2 += ($row['gad2']);
			$gad3 = ($row['gad3']);
//			$t3 += ($row['gad3']);
			$gad4 = ($row['gad4']);
//			$t4 += ($row['gad4']);
			$gad5 = ($row['gad5']);
//			$t5 += ($row['gad5']);
			$gad6 = ($row['gad6']);
//			$t6 += ($row['gad6']);
			$gad7 = ($row['gad7']);
//			$t7 += ($row['gad7']);

			$total = $gad1 + $gad2 + $gad3 + $gad4 + $gad5 + $gad6 + $gad7;
//			$avgtotal += $total;
			

$report_data .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_gad_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$gad1}</td>
		<td class="center">{$gad2}</td>
		<td class="center">{$gad3}</td>
		<td class="center">{$gad4}</td>
		<td class="center">{$gad5}</td>
		<td class="center">{$gad6}</td>
		<td class="center">{$gad7}</td>
		<td class="reporttotal"><b>{$total}</b></td>
	</tr>
EOD;

$rowcount++;
		}
	}
// $t1 = $t1 / $rowcount;
// $t2 = $t2 / $rowcount;
// $t3 = $t3 / $rowcount;
// $t4 = $t4 / $rowcount;
// $t5 = $t5 / $rowcount;
// $t6 = $t6 / $rowcount;
// $t7 = $t7 / $rowcount;
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
                <h1>GAD Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="500px">
	                <tr>
	                    <td colspan="9" class="titlerow">GAD Survey: {$survey}.</td>
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
						<th style="width: 80px;">Total</th>
					</tr>
					{$report_data}
					<!--<tr>
						<th style="width: 140px;">Average</th>
						<th style="width: 40px;">{$t1}</th>
						<th style="width: 40px;">{$t2}</th>
						<th style="width: 40px;">{$t3}</th>
						<th style="width: 40px;">{$t4}</th>
						<th style="width: 40px;">{$t5}</th>
						<th style="width: 40px;">{$t6}</th>
						<th style="width: 40px;">{$t7}</th>
						<th style="width: 80px;">{$avgtotal}</th>
					</tr>-->
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="2">LEGEND</th>
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