<?php
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}



require_once('include/header.php');
require_once('include/footer.php');
$report_types = array
(
	0 => 'CSE',
	1 => 'GAD',
	2 => 'LSQ',
	3 => 'PHQ',
	4 => 'PSS'
);

$report_owners = array
(
	0 => 'Total',
	1 => 'Litesprite',
	2 => 'Assurance',
	3 => 'Madigan',
);


function report_legend($i) {
	if($i == 0 || $i == 2) {
		return "Higher Score is Better.";
	} else if ($i == 4) {
		return "Higher score is better. *4,5,7,8 Reversed";
	} else {
		return "Lower score is better.";
	}
}


$got_help_all;
$getting_help_all;
$got_help_ls;
$getting_help_ls;
$got_help_as;
$getting_help_as;
$got_help_md;
$getting_help_md;
$sql = "call gettingHelp();";
$Results = execute_query($mysqli, $sql);
if($Results) {
	$row = $Results[0]->fetch_assoc();
	$got_help_all = $row["got_help"];
	$getting_help_all = $row["getting_help"];
	$row2 = $Results[1]->fetch_assoc();
	$got_help_ls = $row2["got_help"];
	$getting_help_ls = $row2["getting_help"];
	$row2 = $Results[2]->fetch_assoc();
	$got_help_as = $row2["got_help"];
	$getting_help_as = $row2["getting_help"];
	$row2 = $Results[3]->fetch_assoc();
	$got_help_md = $row2["got_help"];
	$getting_help_md = $row2["getting_help"];
}

function dataAndBody($name,&$Result,&$data, &$body, $i, $got_help, $getting_help) {
	if($Result) {

		while ($row1 = $Result[$i+1]->fetch_assoc()) {
			$min = $row1['min'];
			$max = $row1['max'];
			$avg = round($row1['avg'],2);
		}
		while ($row1 = $Result[$i+3]->fetch_assoc()) {
			$min1 = $row1['min'];
			$max1 = $row1['max'];
			$avg1 = round($row1['avg'],2);
		}
		while ($row1 = $Result[$i+5]->fetch_assoc()) {
			$min2 = $row1['min'];
			$max2 = $row1['max'];
			$avg2 = round($row1['avg'],2);
		}
$data .= <<<EOD

	<tr>
		<td class="left">{$name}</td>
		<td class="left">{$got_help}</td>
		<td class="left">{$getting_help}</td>
		<td class="left">{$min}</td>
		<td class="left">{$max}</td>
		<td class="left">{$avg}</td>
		<td class="left">{$count}</td>
		<td class="left">{$min1}</td>
		<td class="left">{$max1}</td>
		<td class="left">{$avg1}</td>
		<td class="left">{$count1}</td>
		<td class="left">{$min2}</td>
		<td class="left">{$max2}</td>
		<td class="left">{$avg2}</td>
		<td class="left">{$count}</td>
	</tr>
EOD;

$array = array();

	while ($row1 = $Result[$i]->fetch_assoc()) {
		$array[$row1["client_key"]] = array(
				'gender' => $row1["gender"],
				"age" => $row1["age"],
				'baseline' => $row1['sum']
			);
	}
	while ($row1 = $Result[$i+2]->fetch_assoc()) {
		$array[$row1["client_key"]]['six_week'] = $row1["sum"];
	}
	while ($row1 = $Result[$i+4]->fetch_assoc()) {
		$array[$row1["client_key"]]['twelve_week'] = $row1["sum"];
	}

	foreach ($array as $key => $value) {
$body .= <<<EOD
<tr>
	<td>{$key}</td>
	<td>{$value['gender']}</td>
	<td>{$value['age']}</td>
	<td>{$value['baseline']}</td>
	<td>{$value['six_week']}</td>
	<td>{$value['twelve_week']}</td>
</tr>
EOD;
	}

}
}

/**
CSE
*/
	//Validate the user
	$sql = "CALL userGraphsCSE();";
	$cse_data = array();
	$cse_body = array();
	$Result = execute_query($mysqli, $sql);
	$i=1;
	if ($Result) {
		//ALL
		dataAndBody("Total",$Result, $cse_data[0], $cse_body[0], 0, $got_help_all, $getting_help_all);
		//LS
		dataAndBody("Litesprite", $Result, $cse_data[1], $cse_body[1], 6, $got_help_ls, $getting_help_ls);
		dataAndBody("Assurance",$Result, $cse_data[2], $cse_body[2], 13, $got_help_as, $getting_help_as);
		dataAndBody("Madigan",$Result, $cse_data[3], $cse_body[3], 18, $got_help_md, $getting_help_md);
	}
/**
	GAD
*/
	$sql = "call userGraphsGAD();";
	$Result = execute_query($mysqli, $sql);
	$gad_data = array();
	$gad_body = array();
	if($Result) {
		dataAndBody("Total",$Result, $gad_data[0], $gad_body[0], 0, $got_help_all, $getting_help_all);
		dataAndBody("Litesprite",$Result, $gad_data[1], $gad_body[1], 6, $got_help_ls, $getting_help_ls);
		dataAndBody("Assurance",$Result, $gad_data[2], $gad_body[2], 13, $got_help_as, $getting_help_as);
		dataAndBody("Madigan",$Result, $gad_data[3], $gad_body[3], 18, $got_help_md, $getting_help_md);
	}


/**
	LSQ
*/
	$sql = "call userGraphsLSQ();";
	$Result = execute_query($mysqli, $sql);
	$lsq_data = array();
	$lsq_body = array();
	if($Result) {
		dataAndBody("Total",$Result, $lsq_data[0], $lsq_body[0], 0, $got_help_all, $getting_help_all);
		dataAndBody("Litesprite",$Result, $lsq_data[1], $lsq_body[1], 6, $got_help_ls, $getting_help_ls);
		dataAndBody("Assurance",$Result, $lsq_data[2], $lsq_body[2], 13, $got_help_as, $getting_help_as);
		dataAndBody("Madigan",$Result, $lsq_data[3], $lsq_body[3], 18, $got_help_md, $getting_help_md);
	}


/**
	PHQ
*/
	$sql = "call userGraphsPHQ();";
	$Result = execute_query($mysqli, $sql);
	$phq_data = array();
	$phq_body = array();
	if($Result) {
		dataAndBody("Total",$Result, $phq_data[0], $phq_body[0], 0, $got_help_all, $getting_help_all);
		dataAndBody("Litesprite",$Result, $phq_data[1], $phq_body[1], 6, $got_help_ls, $getting_help_ls);
		dataAndBody("Assurance",$Result, $phq_data[2], $phq_body[2], 13, $got_help_as, $getting_help_as);
		dataAndBody("Madigan",$Result, $phq_data[3], $phq_body[3], 18, $got_help_md, $getting_help_md);
	}

/**
	PSS
*/
	$sql = "call userGraphsPSS();";
	$Result = execute_query($mysqli, $sql);
	$pss_data = array();
	$pss_body = array();
	if($Result) {
		dataAndBody("Total",$Result, $pss_data[0], $pss_body[0], 0, $got_help_all, $getting_help_all);
		dataAndBody("Litesprite",$Result, $pss_data[1], $pss_body[1], 6, $got_help_ls, $getting_help_ls);
		dataAndBody("Assurance",$Result, $pss_data[2], $pss_body[2], 13, $got_help_as, $getting_help_as);
		dataAndBody("Madigan",$Result, $pss_data[3], $pss_body[3], 18, $got_help_md, $getting_help_md);
	}

$data = array();
array_push($data, $cse_data, $gad_data, $lsq_data, $phq_data, $pss_data);
$body = array();
array_push($body, $cse_body, $gad_body, $lsq_data, $phq_body, $pss_body);

$additionalCSS .= <<<EOD
    <link href=  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="css/litesprite.css" rel="stylesheet" media="screen"/>
EOD;


$additionalJS.= <<<EOD

EOD;


$tabledata="";
for($i=0; $i<5; $i++) {
$tabledata.= <<<EOD
<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="15" class="titlerow">{$report_types[$i]}</td>
		        </tr>
		        <tr>
		        	<td colspan="3"></td>
		        	<td colspan="4">P1 Baseline</td>
		        	<td colspan="4">P1 6-week</td>
		        	<td colspan="4">P1 12-week</td>
		        <tr>
				<tr>
					<td></td>
					<td>Got Help Before</td>
					<td>Getting Help Now</td>
					<td>Min</td>
					<td>Max</td>
					<td>Average</td>
					<td>Count</td>
					<td>Min</td>
					<td>Max</td>
					<td>Average</td>
					<td>Count</td>
					<td>Min</td>
					<td>Max</td>
					<td>Average</td>
					<td>Count</td>
				</tr>
EOD;
	for($j=0;$j<4;$j++) {
		$tabledata.=$data[$i][$j];
	}
	$legend = report_legend($i);
$tabledata.= <<<EOD
			</table>
		</div>
		<div class="reportlegend">
			<table width="400px">
				<tr>
					<th colspan="1">LEGEND</th>
				</tr>
				<tr>
					<td colspan="1">{$legend}</td>
				</tr>
			</table>
		</div>
EOD;
}

$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
			<div class="backlink">
            	<a href="/reports">[ View all Reports ]</a>
            </div>
            <div class="pagetitle">
            	<h1>Summary Player Assessment Results</h1>
            </div>
    	{$tabledata}
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">CSE - All </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$cse_body[0]}

			</table>
		</div>
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">CSE - Litesprite </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$cse_body[1]}

			</table>
		</div>
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">GAD - All </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$gad_body[0]}

			</table>
		</div>
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">LSQ - All </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$lsq_body[0]}

			</table>
		</div>
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">PHQ - All </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$phq_body[0]}

			</table>
		</div>
		<div class="reporting">
			<table width="600px">
		        <tr>
		            <td colspan="12" class="titlerow">PSS - All </td>
		        </tr>

				<tr>
					<td></td>
					<td>gender</td>
					<td>age</td>
					<td>P1 Baseline</td>
					<td>P1 6-Week</td>
					<td>P1 12-week</td>
				</tr>
				{$pss_body[0]}

			</table>
		</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
