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
	$sql = "CALL rptMeditationTimebyDay();";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$date = $row['date'];
			$one = $row['1'];
			$three = $row['3'];
			$seven = $row['7'];
			$ten = $row['10'];
			$fifteen = $row['15'];
			$twenty = $row['20'];


$report_data .= <<<EOD
	<tr>
		<td class="left">{$date}</td>
		<td class="center">{$one}</td>
		<td class="center">{$three}</td>
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
	                    <td colspan="12" class="titlerow">Meditation Time count by Date.</td>
	                </tr>
					<tr>
						<th>Date</th>
						<th>1 min</th>
						<th>3 min</th>
						<th>7 min</th>
						<th>10 min</th>
						<th>15 min</th>
						<th>20 min</th>
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