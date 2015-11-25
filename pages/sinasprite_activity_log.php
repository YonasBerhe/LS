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
	$sql = "CALL getSinaspriteActivityOverview();";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$date = $row['date'];
			
			$client_key = $row['client_key'];
			$countnew = $row['countnew'];
			$countlog = $row['countlog'];
			$countmm = $row['countmm'];
			$countjc = $row['countjc'];
			$countjcadd = $row['countjcadd'];
			$countjcdel = $row['countjcdel'];
			$countme = $row['countme'];
			$countpa = $row['countpa'];
			$countga = $row['countga'];
			$countor = $row['countor'];
			$count = $countnew + $countlog + $countmm + $countjc + $countjcadd + $countjcdel + $countme + $countpa + $countga + $countor;



$report_data .= <<<EOD
	<tr>
		<td class="left">{$date}</td>
		<td class="left">{$client_key}</td>
		<td class="center">{$count}</td>
		<td class="center">{$countnew}</td>
		<td class="center">{$countmm}</td>
		<td class="center">{$countjc}</td>
		<td class="center">{$countjcadd}</td>
		<td class="center">{$countjcdel}</td>
		<td class="center">{$countme}</td>
		<td class="center">{$countpa}</td>
		<td class="center">{$countga}</td>
		<td class="center">{$countor}</td>
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
                <h1>Sinasprite Activity Log (by Date)</h1>
            </div>
            <div class="reporting"> 
				<table  width="1000">
					<tr>
						<th>Date</th>
						<th>Client Key</th>
						<th>Count</th>
						<th>New</th>
						<th>Menu</th>
						<th>Journal</th>
						<th>Add</th>
						<th>Del</th>
						<th>Meditation</th>
						<th>Painting</th>
						<th>Gallery</th>
						<th>Oracle</th>
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