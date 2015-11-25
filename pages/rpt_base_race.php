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
			$baseline2 = $row['baseline2'];
			$baseline2a = $row['baseline2a'];
			switch ($baseline2) {
					case NULL:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left"> - - </td>
	</tr>	
EOD;
					break;
				case 0:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Prefer not to say</td>
	</tr>	
EOD;
					break;
				case 1:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Caucasian/White</td>
	</tr>	
EOD;
					break;
				case 2:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Black or African American</td>
	</tr>	
EOD;
					break;
				case 3:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">American Indian or Alaskan Native</td>
	</tr>	
EOD;
					break;
				case 4:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Asian (Asian Indian, Chinese, Filipino, Japanese, Korean, Vietnamese)</td>
	</tr>	
EOD;
					break;
				case 5:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Native Hawaiian or other Pacific Islander (Samoan, Guamanian, Chamorro)</td>
	</tr>	
EOD;
					break;
				case 6:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Other : {$baseline2a}</td>
	</tr>	
EOD;
					break;
				case 7:
$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 120px;"><a href="/rpt_base_one/{$client_key}">{$client_key}</a></td><td class="left">Mixed / Various</td>
	</tr>	
EOD;
					break;

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
				<table  width="600px">
					<tr>
	                    <td colspan="2" class="titlerow">Baseline Detail<span class="titlenote"><a href="/rpt_base_sum/{$survey_id}">(View Summary Report)</a></span></td>
	                </tr>
					<tr>
	                    <th>Client Key</th>
	                    <th class="left">What is your race?</th>
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