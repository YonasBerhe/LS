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
	$sql = "CALL rptCSEbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey[$i] = $row['survey'];
			$survey_id[$i] = $row['survey_id'];
			$client_key = $row['client_key'];
			$array1[$i] = $row['cse1'];
			$array2[$i] = $row['cse2'];
			$array3[$i] = $row['cse3'];
			$array4[$i] = $row['cse4'];
			$array5[$i] = $row['cse5'];
			$array6[$i] = $row['cse6'];
			$array7[$i] = $row['cse7'];
			$array8[$i] = $row['cse8'];
			$array9[$i] = $row['cse9'];
			$array10[$i] = $row['cse10'];
			$array11[$i] = $row['cse11'];
			$array12[$i] = $row['cse12'];
			$array13[$i] = $row['cse13'];
			$array14[$i] = $row['cse14'];
			$array15[$i] = $row['cse15'];
			$array16[$i] = $row['cse16'];
			$array17[$i] = $row['cse17'];
			$array18[$i] = $row['cse18'];
			$array19[$i] = $row['cse19'];
			$array20[$i] = $row['cse20'];
			$array21[$i] = $row['cse21'];
			$array22[$i] = $row['cse22'];
			$array23[$i] = $row['cse23'];
			$array24[$i] = $row['cse24'];
			$array25[$i] = $row['cse25'];
			$array26[$i] = $row['cse26'];
			$total[$i] = $array1[$i] + $array2[$i] + $array3[$i] + $array4[$i] + $array5[$i] + $array6[$i] + $array7[$i] + $array8[$i] + $array9[$i] + $array10[$i] + $array11[$i] + $array12[$i] + $array13[$i] + $array14[$i] + $array15[$i] + $array16[$i] + $array17[$i] + $array18[$i] + $array19[$i] + $array20[$i] + $array21[$i] + $array22[$i] + $array23[$i] + $array24[$i] + $array25[$i] + $array26[$i];
			$i++;
		}
	}
	$d11 = docalcfunchigher($array1[1], $array1[2]);
	$d12 = docalcfunchigher($array2[1], $array2[2]);
	$d13 = docalcfunchigher($array3[1], $array3[2]);
	$d14 = docalcfunchigher($array4[1], $array4[2]);
	$d15 = docalcfunchigher($array5[1], $array5[2]);
	$d16 = docalcfunchigher($array6[1], $array6[2]);
	$d17 = docalcfunchigher($array7[1], $array7[2]);
	$d18 = docalcfunchigher($array8[1], $array8[2]);
	$d19 = docalcfunchigher($array9[1], $array9[2]);
	$d110 = docalcfunchigher($array10[1], $array10[2]);
	$d111 = docalcfunchigher($array11[1], $array11[2]);
	$d112 = docalcfunchigher($array12[1], $array12[2]);
	$d113 = docalcfunchigher($array13[1], $array13[2]);
	$d114 = docalcfunchigher($array14[1], $array14[2]);
	$d115 = docalcfunchigher($array15[1], $array15[2]);
	$d116 = docalcfunchigher($array16[1], $array16[2]);
	$d117 = docalcfunchigher($array17[1], $array17[2]);
	$d118 = docalcfunchigher($array18[1], $array18[2]);
	$d119 = docalcfunchigher($array19[1], $array19[2]);
	$d120 = docalcfunchigher($array20[1], $array20[2]);
	$d121 = docalcfunchigher($array21[1], $array21[2]);
	$d122 = docalcfunchigher($array22[1], $array22[2]);
	$d123 = docalcfunchigher($array23[1], $array23[2]);
	$d124 = docalcfunchigher($array24[1], $array24[2]);
	$d125 = docalcfunchigher($array25[1], $array25[2]);
	$d126 = docalcfunchigher($array26[1], $array26[2]);


	$d21 = docalcfunchigher($array1[1], $array1[3]);
	$d22 = docalcfunchigher($array2[1], $array2[3]);
	$d23 = docalcfunchigher($array3[1], $array3[3]);
	$d24 = docalcfunchigher($array4[1], $array4[3]);
	$d25 = docalcfunchigher($array5[1], $array5[3]);
	$d26 = docalcfunchigher($array6[1], $array6[3]);
	$d27 = docalcfunchigher($array7[1], $array7[3]);
	$d28 = docalcfunchigher($array8[1], $array8[3]);
	$d29 = docalcfunchigher($array9[1], $array9[3]);
	$d210 = docalcfunchigher($array10[1], $array10[3]);
	$d211 = docalcfunchigher($array11[1], $array11[3]);
	$d212 = docalcfunchigher($array12[1], $array12[3]);
	$d213 = docalcfunchigher($array13[1], $array13[3]);
	$d214 = docalcfunchigher($array14[1], $array14[3]);
	$d215 = docalcfunchigher($array15[1], $array15[3]);
	$d216 = docalcfunchigher($array16[1], $array16[3]);
	$d217 = docalcfunchigher($array17[1], $array17[3]);
	$d218 = docalcfunchigher($array18[1], $array18[3]);
	$d219 = docalcfunchigher($array19[1], $array19[3]);
	$d220 = docalcfunchigher($array20[1], $array20[3]);
	$d221 = docalcfunchigher($array21[1], $array21[3]);
	$d222 = docalcfunchigher($array22[1], $array22[3]);
	$d223 = docalcfunchigher($array23[1], $array23[3]);
	$d224 = docalcfunchigher($array24[1], $array24[3]);
	$d225 = docalcfunchigher($array25[1], $array25[3]);
	$d226 = docalcfunchigher($array26[1], $array26[3]);

//totals 
$dt1 = docalcfunchigher($total[1], $total[2]);	
$dt2 = docalcfunchigher($total[1], $total[3]);	


$report_data .= <<<EOD
	<tr>
		<td class="left">Keep from getting down in the dumps.</td>
		<td class="center">{$array1[1]}</td>
		<td class="center">{$array1[2]} {$d11}</td>
		<td class="center">{$array1[3]} {$d21}</td>
	</tr>
	<tr>
		<td class="left">Talk positively to yourself.</td>
		<td class="center">{$array2[1]}</td>
		<td class="center">{$array2[2]} {$d12}</td>
		<td class="center">{$array2[3]} {$d22}</td>
	</tr>
	<tr>
		<td class="left">Sort out what can be changed, and what can not be changed.</td>
		<td class="center">{$array3[1]}</td>
		<td class="center">{$array3[2]} {$d13}</td>
		<td class="center">{$array3[3]} {$d23}</td>
	</tr>
	<tr>
		<td class="left">Get emotional support from friends and family.</td>
		<td class="center">{$array4[1]}</td>
		<td class="center">{$array4[2]} {$d14}</td>
		<td class="center">{$array4[3]} {$d24}</td>
	</tr>
	<tr>
		<td class="left">Find solutions to your most difficult problems.</td>
		<td class="center">{$array5[1]}</td>
		<td class="center">{$array5[2]} {$d15}</td>
		<td class="center">{$array5[3]} {$d25}</td>
	</tr>
	<tr>
		<td class="left">Break an upsetting problem down into smaller parts.</td>
		<td class="center">{$array6[1]}</td>
		<td class="center">{$array6[2]} {$d16}</td>
		<td class="center">{$array6[3]} {$d26}</td>
	</tr>
	<tr>
		<td class="left">Leave options open when things get stressful.</td>
		<td class="center">{$array7[1]}</td>
		<td class="center">{$array7[2]} {$d17}</td>
		<td class="center">{$array7[3]} {$d27}</td>
	</tr>
	<tr>
		<td class="left">Make a plan of action and follow it when confronted with a problem.</td>
		<td class="center">{$array8[1]}</td>
		<td class="center">{$array8[2]} {$d18}</td>
		<td class="center">{$array8[3]} {$d28}</td>
	</tr>
	<tr>
		<td class="left">Develop new hobbies or recreations.</td>
		<td class="center">{$array9[1]}</td>
		<td class="center">{$array9[2]} {$d19}</td>
		<td class="center">{$array9[3]} {$d29}</td>
	</tr>
	<tr>
		<td class="left">Take your mind off unpleasant thoughts.</td>
		<td class="center">{$array10[1]}</td>
		<td class="center">{$array10[2]} {$d110}</td>
		<td class="center">{$array10[3]} {$d210}</td>
	</tr>
	<tr>
		<td class="left">Look for something good in a negative situation.</td>
		<td class="center">{$array11[1]}</td>
		<td class="center">{$array11[2]} {$d111}</td>
		<td class="center">{$array11[3]} {$d2711}</td>
	</tr>
	<tr>
		<td class="left">Keep from feeling sad.</td>
		<td class="center">{$array12[1]}</td>
		<td class="center">{$array12[2]} {$d112}</td>
		<td class="center">{$array12[3]} {$d212}</td>
	</tr>
	<tr>
		<td class="left">See things from the other person’s point of view during a heated argument.</td>
		<td class="center">{$array13[1]}</td>
		<td class="center">{$array13[2]} {$d113}</td>
		<td class="center">{$array13[3]} {$d213}</td>
	</tr>
	<tr>
		<td class="left">Try other solutions to your problems if your first solutions don’t work.</td>
		<td class="center">{$array14[1]}</td>
		<td class="center">{$array14[2]} {$d114}</td>
		<td class="center">{$array14[3]} {$d214}</td>
	</tr>
	<tr>
		<td class="left">Stop yourself from being upset by unpleasant thoughts.</td>
		<td class="center">{$array15[1]}</td>
		<td class="center">{$array15[2]} {$d115}</td>
		<td class="center">{$array15[3]} {$d215}</td>
	</tr>
	<tr>
		<td class="left">Make new friends.</td>
		<td class="center">{$array16[1]}</td>
		<td class="center">{$array16[2]} {$d116}</td>
		<td class="center">{$array16[3]} {$d216}</td>
	</tr>
	<tr>
		<td class="left">Get friends to help you with the things you need.</td>
		<td class="center">{$array17[1]}</td>
		<td class="center">{$array17[2]} {$d117}</td>
		<td class="center">{$array17[3]} {$d217}</td>
	</tr>
	<tr>
		<td class="left">Do something positive for yourself when you are feeling discouraged.</td>
		<td class="center">{$array18[1]}</td>
		<td class="center">{$array18[2]} {$d118}</td>
		<td class="center">{$array18[3]} {$d218}</td>
	</tr>
	<tr>
		<td class="left">Make unpleasant thoughts go away.</td>
		<td class="center">{$array19[1]}</td>
		<td class="center">{$array19[2]} {$d119}</td>
		<td class="center">{$array19[3]} {$d219}</td>
	</tr>
	<tr>
		<td class="left">Think about one part of the problem at a time.</td>
		<td class="center">{$array20[1]}</td>
		<td class="center">{$array20[2]} {$d120}</td>
		<td class="center">{$array20[3]} {$d220}</td>
	</tr>
	<tr>
		<td class="left">Visualize a pleasant activity or place.</td>
		<td class="center">{$array21[1]}</td>
		<td class="center">{$array21[2]} {$d121}</td>
		<td class="center">{$array21[3]} {$d221}</td>
	</tr>
	<tr>
		<td class="left">Keep yourself from feeling lonely.</td>
		<td class="center">{$array22[1]}</td>
		<td class="center">{$array22[2]} {$d122}</td>
		<td class="center">{$array22[3]} {$d222}</td>
	</tr>
	<tr>
		<td class="left">Pray or meditate.</td>
		<td class="center">{$array23[1]}</td>
		<td class="center">{$array23[2]} {$d123}</td>
		<td class="center">{$array23[3]} {$d223}</td>
	</tr>
	<tr>
		<td class="left">Get emotional support from community organizations or resources.</td>
		<td class="center">{$array24[1]}</td>
		<td class="center">{$array24[2]} {$d124}</td>
		<td class="center">{$array24[3]} {$d224}</td>
	</tr>
	<tr>
		<td class="left">Stand your ground and fight for what you want.</td>
		<td class="center">{$array25[1]}</td>
		<td class="center">{$array25[2]} {$d125}</td>
		<td class="center">{$array25[3]} {$d225}</td>
	</tr>
	<tr>
		<td class="left">Resist the impulse to act hastily when under pressure.</td>
		<td class="center">{$array26[1]}</td>
		<td class="center">{$array26[2]} {$d126}</td>
		<td class="center">{$array26[3]} {$d226}</td>
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
                <h1>CSE Survey Results by User</h1>
            </div>
            <div class="reporting"> 
				<table width="1000px">
	                <tr>
	                    <td colspan="4" class="titlerow">Coping Self Efficacy By User: {$client_key} <span class="titlenote"><a href="/rpt_cse_sum">(View Summary Report)</a></span></td>
	                </tr>
					<tr>
						<th style="width: 400px;">Question</th>
						<th style="width: 200px;">{$survey[1]}</th>	
						<th style="width: 200px;">{$survey[2]}</th>
						<th style="width: 200px;">{$survey[3]}</th>
					</tr>
				{$report_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="600px">
					<tr>
						<th colspan="10">LEGEND</th>
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