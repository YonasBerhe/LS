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
	$sql = "CALL rptpssbySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$rowcount = 1;
	if ($Result) {
		$rowcount = 1;
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
			$client_key = $row['client_key'];
			$pss1 = ($row['pss1']);
			$pss2 = ($row['pss2']);
			$pss3 = ($row['pss3']);
			$pss4 = ($row['pss4']);
			$pss5 = ($row['pss5']);
			$pss6 = ($row['pss6']);
			$pss7 = ($row['pss7']);
			$pss8 = ($row['pss8']);
			$pss9 = ($row['pss9']);
			$pss10 = ($row['pss10']);

			$total = $pss1 + $pss2 + $pss3 + $pss4 + $pss5 + $pss6 + $pss7 + $pss8 + $pss9 + $pss10;
			

$report_data .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_pss_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$pss1}</td>
		<td class="center">{$pss2}</td>
		<td class="center">{$pss3}</td>
		<td class="center">{$pss4}</td>
		<td class="center">{$pss5}</td>
		<td class="center">{$pss6}</td>
		<td class="center">{$pss7}</td>
		<td class="center">{$pss8}</td>
		<td class="center">{$pss9}</td>
		<td class="center">{$pss10}</td>
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
                <h1>PSS Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="820px">
	                <tr>
	                    <td colspan="12" class="titlerow">PSS Survey: {$survey}.</td>
	                </tr>
					<tr>
						<th style="width: 140px;">Client Key</th>
						<th style="width: 60px;">1</th>
						<th style="width: 60px;">2</th>
						<th style="width: 60px;">3</th>
						<th style="width: 60px;">4*</th>
						<th style="width: 60px;">5*</th>
						<th style="width: 60px;">6</th>
						<th style="width: 60px;">7*</th>
						<th style="width: 60px;">8*</th>
						<th style="width: 60px;">9</th>
						<th style="width: 60px;">10</th>
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
						<td width="80">0</td><td class="left">Never</td>
					</tr>
					<tr>
						<td width="80">1</td><td class="left">Almost Never</td>
					</tr>
					<tr>
						<td width="80">2</td><td class="left">Sometimes</td>
					</tr>
					<tr>
						<td width="80">3</td><td class="left">Fairly Often</td>
					</tr>
					<tr>
						<td width="80">4</td><td class="left">Very Often</td>
					</tr>
					<tr>						
						<td colspan="2">Higher score is better. *4,5,7,8 Reversed</td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>