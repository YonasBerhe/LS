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
    $client_key = 'null';
} else {
    $client_key = $args[1];
}

	//Validate the user
	$sql = "CALL rptPHQbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey[$i] = $row['survey'];
			$survey_id[$i] = $row['survey_id'];
			$client_key = $row['client_key'];
			$array1[$i] = $row['phq1'];
			$array2[$i] = $row['phq2'];
			$array3[$i] = $row['phq3'];
			$array4[$i] = $row['phq4'];
			$array5[$i] = $row['phq5'];
			$array6[$i] = $row['phq6'];
			$array7[$i] = $row['phq7'];
			$array8[$i] = $row['phq8'];
			$array9[$i] = $row['phq9'];
			$array10[$i] = $row['phq10'];
			$total[$i] = $array1[$i] + $array2[$i] + $array3[$i] + $array4[$i] + $array5[$i] + $array6[$i] + $array7[$i] + $array8[$i] + $array9[$i] + $array10[$i];
			$i++;

		}
	}

	$d11 = docalcfunc($array1[1], $array1[2]);
	$d12 = docalcfunc($array2[1], $array2[2]);
	$d13 = docalcfunc($array3[1], $array3[2]);
	$d14 = docalcfunc($array4[1], $array4[2]);
	$d15 = docalcfunc($array5[1], $array5[2]);
	$d16 = docalcfunc($array6[1], $array6[2]);
	$d17 = docalcfunc($array7[1], $array7[2]);
	$d18 = docalcfunc($array8[1], $array8[2]);
	$d19 = docalcfunc($array9[1], $array8[2]);
	$d110 = docalcfunc($array10[1], $array10[2]);

	$d21 = docalcfunc($array1[1], $array1[3]);
	$d22 = docalcfunc($array2[1], $array2[3]);
	$d23 = docalcfunc($array3[1], $array3[3]);
	$d24 = docalcfunc($array4[1], $array4[3]);
	$d25 = docalcfunc($array5[1], $array5[3]);
	$d26 = docalcfunc($array6[1], $array6[3]);
	$d27 = docalcfunc($array7[1], $array7[3]);
	$d28 = docalcfunc($array8[1], $array8[3]);
	$d29 = docalcfunc($array9[1], $array9[3]);
	$d210 = docalcfunc($array10[1], $array10[3]);

//Totals	
$dt1 = docalcfunc($total[1], $total[2]);	
$dt2 = docalcfunc($total[1], $total[3]);	

$report_data .= <<<EOD
	<tr>
		<td class="left">Little interest or pleasure in doing things</td>
		<td class="center">{$array1[1]}</td>
		<td class="center">{$array1[2]} {$d11}</td>
		<td class="center">{$array1[3]} {$d21}</td>
	</tr>
	<tr>
		<td class="left">Feeling down, depressed, or hopeless</td>
		<td class="center">{$array2[1]}</td>
		<td class="center">{$array2[2]} {$d12}</td>
		<td class="center">{$array2[3]} {$d22}</td>
	</tr>
	<tr>
		<td class="left">Trouble falling or staying asleep, or sleeping too much</td>
		<td class="center">{$array3[1]}</td>
		<td class="center">{$array3[2]} {$d13}</td>
		<td class="center">{$array3[3]} {$d23}</td>
	</tr>
	<tr>
		<td class="left">Feeling tired or having little energy</td>
		<td class="center">{$array4[1]}</td>
		<td class="center">{$array4[2]} {$d14}</td>
		<td class="center">{$array4[3]} {$d24}</td>
	</tr>
	<tr>
		<td class="left">Poor appetite or overeating</td>
		<td class="center">{$array5[1]}</td>
		<td class="center">{$array5[2]} {$d15}</td>
		<td class="center">{$array5[3]} {$d25}</td>
	</tr>
	<tr>
		<td class="left">Feeling bad about yourself — or that you are a failure or have let yourself or your family down</td>
		<td class="center">{$array6[1]}</td>
		<td class="center">{$array6[2]} {$d16}</td>
		<td class="center">{$array6[3]} {$d26}</td>
	</tr>
	<tr>
		<td class="left">Trouble concentrating on things, such as reading the newspaper or watching television</td>
		<td class="center">{$array7[1]}</td>
		<td class="center">{$array7[2]} {$d17}</td>
		<td class="center">{$array7[3]} {$d27}</td>
	</tr>
	<tr>
		<td class="left">Moving or speaking so slowly that other people could have noticed? Or the opposite — being so fidgety or restless that you have been moving around a lot more than usual</td>
		<td class="center">{$array8[1]}</td>
		<td class="center">{$array8[2]} {$d18}</td>
		<td class="center">{$array8[3]} {$d28}</td>
	</tr>
	<tr>
		<td class="left">Thoughts that you would be better off dead or of hurting yourself in some way</td>
		<td class="center">{$array9[1]}</td>
		<td class="center">{$array9[2]} {$d19}</td>
		<td class="center">{$array9[3]} {$d29}</td>
	</tr>
	<tr>
		<td class="left">If you checked off any problems, how difficult have these problems made it for you to do your work, take care of things at home, or get along with other people?</td>
		<td class="center">{$array10[1]}</td>
		<td class="center">{$array10[2]} {$d110}</td>
		<td class="center">{$array10[3]} {$d210}</td>
	</tr>
	<tr>
		<td class="left"><b>Totals</b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;


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
                <h1>PHQ Survey Results</h1>
            </div>
            <div class="reporting"> 
				<table  width="80%">
	                <tr>
	                	<td colspan="4" class="titlerow">PHQ By User: {$client_key} <span class="titlenote"><a href="/rpt_phq_sum">(View Summary Report)</a></span></td>
	                </tr>
					<tr>
						<th>Question</th>
						<th style="width: 200px;">{$survey[1]}</th>	
						<th style="width: 200px;">{$survey[2]}</th>
						<th style="width: 200px;">{$survey[3]}</th>
					</tr>
				{$report_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="2">LEGEND for 1-9</th>
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
					<th colspan="2">LEGEND for PHQ-10</th>
					<tr>
						<td width="80">0</td><td class="left">Not difficult at all</td>
					</tr>
					<tr>
						<td>1</td><td class="left">Somewhat difficult</td>
					</tr>
					<tr>
						<td>2</td><td class="left">Very difficult</td>
					</tr>
					<tr>						
						<td>3</td><td class="left">Extremely difficult</td>
					</tr>
					<tr>						
						<td colspan="2">Lower score is better.</td>
					</tr>
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<td colspan="2"><a href="/rpt_base_one/{$client_key}">View Client Demographics</a></td>
					</tr>
					<tr>
						<td colspan="2"><a href="/rpt_pmph_one/{$client_key}">View Client PMPH</a></td>
					</tr>
				</table>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>