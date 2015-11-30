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
	$sql = "CALL rptPaintingOverview();";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
$client_key = $row['client_key'];
$painting_brush = $row['painting_brush'];
$brush_name = $row['brush_name'];
$painting_words = $row['painting_words'];
$painting_timestamp = $row['painting_timestamp'];

$report_data .= <<<EOD
	<tr>
		<td class="left">{$client_key}</td>
		<td class="left">{$brush_name}</td>
		<td class="left">{$painting_words}</td>
		<td class="left">{$painting_timestamp}</td>
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
                <h1>Sinasprite Painting Overview</h1>
            </div>
            <div class="reporting"> 
				<table  width="800">
	                <tr>
	                    <td colspan="7" class="titlerow">Painting Overview.</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Brush</th>
						<th>Words</th>
						<th>Created</th>
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