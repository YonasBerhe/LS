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
			$client_key = $row['client_key'];
			$baseline4 = $row['baseline4'];
			switch ($row['baseline4a']) {
				case NULL:
					$baseline4a	= "";
					break;
				case 0:
					$baseline4a	= "No";
					break;
				case 1:
					$baseline4a	= "Yes";
					break;
			} 
			$baseline4b = $row['baseline4b'];

			switch ($baseline4) {
					case NULL:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left"> - - </td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 0:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Prefer not to say</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 1:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Married</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 2:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Living as married (living with fiancé, boyfriend, or girlfriend but not married)</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 3:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Separated and not living as married</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 4:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Divorced and not living as married</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 5:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Widowed and not living as married</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
					break;
				case 6:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Single, never married, and not living as married</td><td class="left">{$baseline4a}</td><td class="left">{$baseline4b}</td>
	</tr>	
EOD;
			} 
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
            	<h1>Survey Demographics Results : {$survey}</h1>
            </div>
            <div class="reporting"> 
				<table  width="800px">
					<tr>
	                    <td colspan="4" class="titlerow">Baseline Detail<span class="titlenote"><a href="/rpt_base_sum/{$survey_id}">(View Summary Report)</a></span></td>
	                </tr>
					<tr>
	                    <th style="width: 120px;">Client Key</th>
	                    <th class="left"  style="width: 400px;">What is your marital status?</th>
	                    <th style="width: 80px;" class="left">Change?</th>
	                    <th class="left">Description</th>
	                </tr>
				{$report_data}
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>