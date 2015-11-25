<?php
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}


// Table Name  
if (isset($args[1])) {
	$value = trim($args[1]);
	$search = array("'", '&', '<', '>');
	$replace = array("''", '&amp;', '&lt;', '&gt' );
	$client_key = dbstr_replace($search, $replace, $value);
} else {
	header('Location: /reports');
}


require_once('include/header.php');
require_once('include/footer.php');

	$sql = "CALL rptBaselinebyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	$Result = execute_query($mysqli, $sql);	
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$client_age = $row['client_age'];
			$client_gender = strtoupper($row['client_gender']);
		}
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


$cse_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="/rpt_cse_one/{$client_key}">CSE Details</a></b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;

$cse_body .= <<<EOD
	<div class="reporting"> 
		<table width="600px">
	        <tr>
	            <td colspan="4" class="titlerow">CSE</td>
	        </tr>
			<tr>
				<th style="width: 300px;" style="left">Question</th>
				<th style="width: 100px;">{$survey[1]}</th>	
				<th style="width: 100px;">{$survey[2]}</th>
				<th style="width: 100px;">{$survey[3]}</th>
			</tr>
		{$cse_data}
		</table>
	</div>
	<div class="reportlegend"> 
		<table width="400px">
			<tr>
				<th colspan="1">LEGEND</th>
			</tr>
			<tr>						
				<td colspan="1">Higher score is better.</td>
			</tr>
		</table>
	</div>	
EOD;

	//Validate the user
	$sql = "CALL rptGADbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey[$i] = $row['survey'];
			$survey_id[$i] = $row['survey_id'];
			$client_key = $row['client_key'];
			$array1[$i] = $row['gad1'];
			$array2[$i] = $row['gad2'];
			$array3[$i] = $row['gad3'];
			$array4[$i] = $row['gad4'];
			$array5[$i] = $row['gad5'];
			$array6[$i] = $row['gad6'];
			$array7[$i] = $row['gad7'];
			$total[$i] = $array1[$i] + $array2[$i] + $array3[$i] + $array4[$i] + $array5[$i] + $array6[$i] + $array7[$i];
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

	$d21 = docalcfunc($array1[1], $array1[3]);
	$d22 = docalcfunc($array2[1], $array2[3]);
	$d23 = docalcfunc($array3[1], $array3[3]);
	$d24 = docalcfunc($array4[1], $array4[3]);
	$d25 = docalcfunc($array5[1], $array5[3]);
	$d26 = docalcfunc($array6[1], $array6[3]);
	$d27 = docalcfunc($array7[1], $array7[3]);

	
//totals 
$dt1 = docalcfunc($total[1], $total[2]);	
$dt2 = docalcfunc($total[1], $total[3]);	

$gad_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="/rpt_gad_one/{$client_key}">GAD Details</a></b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;

$gad_body .= <<<EOD

            <div class="reporting"> 
				<table width="600px">
	                <tr>
	                    <td colspan="4" class="titlerow">GAD</td>
	                </tr>
					<tr>
						<th style="width: 300px;">Question</th>
						<th style="width: 100px;">{$survey[1]}</th>	
						<th style="width: 100px;">{$survey[2]}</th>
						<th style="width: 100px;">{$survey[3]}</th>
					</tr>
				{$gad_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="1">LEGEND</th>
					</tr>
					<tr>						
						<td colspan="1">Lower score is better.</td>
					</tr>
				</table>
			</div>
           
EOD;


	$sql = "CALL rptlsqbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey[$i] = $row['survey'];
			$survey_id[$i] = $row['survey_id'];
			$client_key = $row['client_key'];
			$array1[$i] = $row['lsq1'];
			$array2[$i] = $row['lsq2'];
			$array3[$i] = $row['lsq3'];
			$array4[$i] = $row['lsq4'];
			$array5[$i] = $row['lsq5'];
			$array6[$i] = $row['lsq6'];
			$array7[$i] = $row['lsq7'];
			$array8[$i] = $row['lsq8'];
			$array9[$i] = $row['lsq9'];
			$total[$i] = $array1[$i] + $array2[$i] + $array3[$i] + $array4[$i] + $array5[$i] + $array6[$i] + $array7[$i] + $array8[$i] + $array9[$i];
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


	$d21 = docalcfunchigher($array1[1], $array1[3]);
	$d22 = docalcfunchigher($array2[1], $array2[3]);
	$d23 = docalcfunchigher($array3[1], $array3[3]);
	$d24 = docalcfunchigher($array4[1], $array4[3]);
	$d25 = docalcfunchigher($array5[1], $array5[3]);
	$d26 = docalcfunchigher($array6[1], $array6[3]);
	$d27 = docalcfunchigher($array7[1], $array7[3]);
	$d28 = docalcfunchigher($array8[1], $array8[3]);
	$d29 = docalcfunchigher($array9[1], $array9[3]);

	
//totals 
$dt1 = docalcfunchigher($total[1], $total[2]);	
$dt2 = docalcfunchigher($total[1], $total[3]);	

$lsq_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="/rpt_lsq_one/{$client_key}">LSQ Details</a></b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;

$lsq_body .= <<<EOD
    <div class="reporting"> 
		<table width="600px">
            <tr>
                <td colspan="4" class="titlerow">LSQ</td>
            </tr>
			<tr>
				<th style="width: 300px;">Question</th>
				<th style="width: 100px;">{$survey[1]}</th>	
				<th style="width: 100px;">{$survey[2]}</th>
				<th style="width: 100px;">{$survey[3]}</th>
			</tr>
		{$lsq_data}
		</table>
	</div>
	<div class="reportlegend"> 
		<table width="400px">
			<tr>
				<th colspan="1">LEGEND</th>
			</tr>
			<tr>						
				<td colspan="1">Higher score is better.</td>
			</tr>
		</table>
	</div>
 
EOD;


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

$phq_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="/rpt_phq_one/{$client_key}">PHQ Details</a></b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;

$phq_body .= <<<EOD
	      <div class="reporting"> 
				<table  width="600">
	                <tr>
	                	<td colspan="4" class="titlerow">PHQ</td>
	                </tr>
					<tr>
						<th style="width: 300px;">Question</th>
						<th style="width: 100px;">{$survey[1]}</th>	
						<th style="width: 100px;">{$survey[2]}</th>
						<th style="width: 100px;">{$survey[3]}</th>
					</tr>
				{$phq_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="1">LEGEND</th>
					</tr>
					<tr>						
						<td colspan="1">Lower score is better.</td>
					</tr>
				</table>
			</div>
EOD;

	$sql = "CALL rptpssbyUser(".sql_escape_string($client_key, 1).");";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);	
	$i=1;
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$survey[$i] = $row['survey'];
			$survey_id[$i] = $row['survey_id'];
			$client_key = $row['client_key'];
			$array1[$i] = $row['pss1'];
			$array2[$i] = $row['pss2'];
			$array3[$i] = $row['pss3'];
			$array4[$i] = $row['pss4'];
			$array5[$i] = $row['pss5'];
			$array6[$i] = $row['pss6'];
			$array7[$i] = $row['pss7'];
			$array8[$i] = $row['pss8'];
			$array9[$i] = $row['pss9'];
			$array10[$i] = $row['pss10'];
			$total[$i] = $array1[$i] + $array2[$i] + $array3[$i] + $array4[$i] + $array5[$i] + $array6[$i] + $array7[$i] + $array8[$i] + $array9[$i] + $array10[$i];
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

	
//totals 
$dt1 = docalcfunchigher($total[1], $total[2]);	
$dt2 = docalcfunchigher($total[1], $total[3]);	

$pss_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="/rpt_pss_one/{$client_key}">PSS Details</a></b></td>
		<td class="center"><b>{$total[1]}</b></td>
		<td class="center"><b>{$total[2]} {$dt1}</b></td>
		<td class="center"><b>{$total[3]} {$dt2}</b></td>
	</tr>
EOD;

$pss_body .= <<<EOD

            <div class="reporting"> 
				<table width="600px">
	                <tr>
	                    <td colspan="4" class="titlerow">PSS</td>
	                </tr>
					<tr>
						<th style="width: 300px;">Question</th>
						<th style="width: 100px;">{$survey[1]}</th>	
						<th style="width: 100px;">{$survey[2]}</th>
						<th style="width: 100px;">{$survey[3]}</th>
					</tr>
				{$pss_data}
				</table>
			</div>
			<div class="reportlegend"> 
				<table width="400px">
					<tr>
						<th colspan="1">LEGEND</th>
					</tr>
					<tr>						
						<td colspan="1">Higher score is better. *4,5,7,8 Reversed</td>
					</tr>
				</table>
			</div>
EOD;

$additionalCSS .= <<<EOD
    <link href=  <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
    <link href="../../css/litesprite.css" rel="stylesheet" media="screen"/>    
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
            	<h1>User Survey Data Totals for: {$client_key} [ {$client_gender} / {$client_age} ]</h1>
            </div>
			{$cse_body}
			{$gad_body}
			{$lsq_body}
			{$phq_body}
			{$pss_body}
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
