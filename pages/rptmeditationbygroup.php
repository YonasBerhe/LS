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
	$sql = "CALL rptMeditationByGroup(2);";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$key = $row["client_key"];
			$duration = $row["duration"];
			$date = $date["date"];
			if($date) {
				$date = date_create_from_format('Y-m-d H:i:s', $date)->format('m-d-Y');
			}


$report_data_ls .= <<<EOD
	<tr>
		<td class="left">{$key}</td>
		<td class="center">{$date}</td>
		<td class="center">{$duration}</td>
		<td class="center">{$seven}</td>
		<td class="center">{$ten}</td>
		<td class="center">{$fifteen}</td>
		<td class="center">{$twenty}</td>
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
                <h1>Sinasprite Meditation Overview</h1>
            </div>
            <div class="reporting"> 
				<table  width="800">
	                <tr>
	                    <td colspan="12" class="titlerow">Meditation - Litesprite</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Date</th>
						<th>Duration</th>
						<th>Words</th>
					</tr>
				{$report_data_ls}
				</table>
			</div>

			<div class="reporting"> 
				<table  width="800">
	                <tr>
	                    <td colspan="12" class="titlerow">Meditation - Madigan</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Date</th>
						<th>Duration</th>
						<th>Words</th>
					</tr>
				{$report_data_md}
				</table>
			</div>
            <div class="reporting"> 
				<table  width="800">
	                <tr>
	                    <td colspan="12" class="titlerow">Meditation - Assurance</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Date</th>
						<th>Duration</th>
						<th>Words</th>
					</tr>
				{$report_data_as}
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>