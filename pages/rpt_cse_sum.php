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
	$sql = "CALL rptcsebySurvey(".sql_escape_string($survey_id, 0).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey = $row['survey'];
$client_key = $row['client_key'];
$cse1 = $row['cse1'];
$cse2 = $row['cse2'];
$cse3 = $row['cse3'];
$cse4 = $row['cse4'];
$cse5 = $row['cse5'];
$cse6 = $row['cse6'];
$cse7 = $row['cse7'];
$cse8 = $row['cse8'];
$cse9 = $row['cse9'];
$cse10 = $row['cse10'];
$cse11 = $row['cse11'];
$cse12 = $row['cse12'];
$cse13 = $row['cse13'];
$cse14 = $row['cse14'];
$cse15 = $row['cse15'];
$cse16 = $row['cse16'];
$cse17 = $row['cse17'];
$cse18 = $row['cse18'];
$cse19 = $row['cse19'];
$cse20 = $row['cse20'];
$cse21 = $row['cse21'];
$cse22 = $row['cse22'];
$cse23 = $row['cse23'];
$cse24 = $row['cse24'];
$cse25 = $row['cse25'];
$cse26 = $row['cse26'];

$total = $cse1 + $cse2 + $cse3 + $cse4 + $cse5 + $cse6 + $cse7 + $cse8 + $cse9 + $cse10 + $cse11 + $cse12 + $cse13 + $cse14 + $cse15 + $cse16 + $cse17 + $cse18 + $cse19 + $cse20 + $cse21 + $cse22 + $cse23 + $cse24 + $cse25 + $cse26;


$report_data .= <<<EOD
	<tr>
		<td class="left"><a href="/rpt_cse_one/{$client_key}">{$client_key}</a></td>
		<td class="center">{$cse1}</td>
		<td class="center">{$cse2}</td>
		<td class="center">{$cse3}</td>
		<td class="center">{$cse4}</td>
		<td class="center">{$cse5}</td>
		<td class="center">{$cse6}</td>
		<td class="center">{$cse7}</td>
		<td class="center">{$cse8}</td>
		<td class="center">{$cse9}</td>
		<td class="center">{$cse10}</td>
		<td class="center">{$cse11}</td>
		<td class="center">{$cse12}</td>
		<td class="center">{$cse13}</td>
		<td class="center">{$cse14}</td>
		<td class="center">{$cse15}</td>
		<td class="center">{$cse16}</td>
		<td class="center">{$cse17}</td>
		<td class="center">{$cse18}</td>
		<td class="center">{$cse19}</td>
		<td class="center">{$cse20}</td>
		<td class="center">{$cse21}</td>
		<td class="center">{$cse22}</td>
		<td class="center">{$cse23}</td>
		<td class="center">{$cse24}</td>
		<td class="center">{$cse25}</td>
		<td class="center">{$cse26}</td>
		<td class="center">{$total}</td>
	</tr>
EOD;
		}
	}

$additionalCSS = <<<EOD
    <link href=  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
    <link href="../css/litesprite.css" rel="stylesheet" media="screen"/> 
EOD;


$additionalJS= <<<EOD

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
                <h1>CSE Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="1280px">
	                <tr>
	                    <td colspan="28" class="titlerow">Coping Self Efficacy Survey: {$survey}.</td>
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
						<th style="width: 40px;">10</th>
						<th style="width: 40px;">11</th>
						<th style="width: 40px;">12</th>
						<th style="width: 40px;">13</th>
						<th style="width: 40px;">14</th>
						<th style="width: 40px;">15</th>
						<th style="width: 40px;">16</th>
						<th style="width: 40px;">17</th>
						<th style="width: 40px;">18</th>
						<th style="width: 40px;">19</th>
						<th style="width: 40px;">20</th>
						<th style="width: 40px;">21</th>
						<th style="width: 40px;">22</th>
						<th style="width: 40px;">23</th>
						<th style="width: 40px;">24</th>
						<th style="width: 40px;">25</th>
						<th style="width: 40px;">26</th>
						<th style="width: 80px;">Total</th>
					</tr>
				{$report_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="600px">
					<tr>
						<th colspan="2">LEGEND</th>
					</tr>
					<tr>
						<th class="left" colspan="3">Cannot do at all</th>
						<th class="center" colspan="4">Moderately certain can do</th>
						<th class="right" colspan="3">Certain can do</th>
					</tr>
					<tr>
						<td class="center">1</td>
						<td class="center">2</td>
						<td class="center">3</td>
						<td class="center">4</td>
						<td class="center">5</td>
						<td class="center">6</td>
						<td class="center">7</td>
						<td class="center">8</td>
						<td class="center">9</td>
						<td class="center">10</td>
					</tr>
					<tr>						
						<td colspan="10">Higher score is better.</td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>