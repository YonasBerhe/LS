<?php 
require_once("../include/config.survey.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");

include './include/header.php';
//include './include/debug.php';

session_start();
$client_key = $_SESSION['clientkey'];
if (strlen($_SESSION['clientkey']) < 1) {
	//header('Location: index.php');		
} 

if (strlen($_SESSION['survey_id']) < 1) {
	$_SESSION['survey_id'] = 1;
}
	
//echo session_id();
	$sql = "call getClientSurveyHeader(".sql_escape_string(session_id(), 1).");";
	//echo $sql;
	//echo $sql;
	$genderf = null;
	$genderm = null;
	$options = "";
	$client_age = null;
	$Result = execute_query($mysqli, $sql);
	$hasresults = 0;
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = 1;
			$_SESSION['client_survey_header_id'] = $row['client_survey_header_id'];
			$client_survey_id = $row['client_id'];
			$_SESSION["client_id"] = $row['client_id'];
			//$client_survey_period = $row['client_survey_period'];
			$client_key = $row['client_key'];
			$client_id = $row['client_id'];
			$client_age = $row['client_age'];
			$client_gender = $row['client_gender'];
			$client_survey_started = $row['client_survey_started'];
			$client_survey_completed = $row['client_survey_completed'];
			$client_survey_completed_timestamp = $row['client_survey_completed_timestamp'];
			$client_survey_active = $row['client_survey_active'];
		}
		if(!$hasresults){
			$sql1 = "call setClientSurveyHeader(" . sql_escape_string($_SESSION['survey_id'], 0) . ", "
						. sql_escape_string(strtolower($_SESSION['clientkey']), 1) . ", ". sql_escape_string(session_id(), 1) . ",  " 
						. 'null' . ", " . 'null' . ", ". sql_escape_string(date("Y-m-d H:i:s"), 1) . ", null, null );";	
			//echo '<br>'.$sql1;
			$Result = execute_query($mysqli, $sql1);
			if ($Result) {
			$rowcount =	0;
				while ($row = $Result[0]->fetch_assoc()) {
					$hasresults = 1;
					$_SESSION['client_survey_header_id'] = $row['client_survey_header_id'];
					$client_survey_id = $row['client_id'];
					$_SESSION["client_id"] = $row['client_id'];
					//$client_survey_period = $row['client_survey_period'];
					$client_key = $row['client_key'];
					$client_id = $row['client_id'];
					$client_age = $row['client_age'];
					$client_gender = $row['client_gender'];
					$client_survey_started = $row['client_survey_started'];
					$client_survey_completed = $row['client_survey_completed'];
					$client_survey_completed_timestamp = $row['client_survey_completed_timestamp'];
					$client_survey_active = $row['client_survey_active'];
				}
			}
		}
		
	} 

	// if there is no resultset = clear everything.
	if ($hasresults != 1) {
		$tmpKey = $_SESSION['clientkey'];
		session_unset();
		$_SESSION['clientkey'] = $tmpKey;
		$_SESSION['survey_id'] = 1;
	 }
	 $options;
		//fill the age box
	if($client_age && $client_age>17){
		$options = '<option value="0">-</option>';
	} else {
		$options = '<option value="0" selected>-</option>';
	}
	for ($x=18; $x<=100; $x++) {
		if ($client_age && $x == $client_age) {
			$options .= '<option value="'.$x.'" selected>'.$x.'</option>';
		} else {
			$options .= '<option value="'.$x.'">'.$x.'</option>';	
		}
	} 
	if($hasresults){
		switch ($client_gender) {
			case 'f':
				$genderf = 'checked';
				break;
			case 'm':
				$genderm = 'checked';
				break;
			case 'n':
				$gendern = 'checked';
				break;
			case 'o':
				$gendero = 'checked';
				break;
			default:
				break;
		}
	}

/**
	baseline
*/
	if($hasresults){
		$sql = "call getClientSurveyBaseline(" . sql_escape_string($_SESSION['client_survey_header_id'], 0) . ", " . sql_escape_string($_SESSION['client_id'], 1) . ");";
		$Result = execute_query($mysqli, $sql);
		if ($Result) {
			$rowcount =	0;
			while ($row = $Result[0]->fetch_assoc()) {
				$hasresults = 1;
				$baseline1 = $row['baseline1'];
				$baseline4 = $row['baseline4'];
				$baseline4a = $row['baseline4a'];
				$baseline4b = $row['baseline4b'];
				$baseline5 = $row['baseline5'];
			}

			$q1[$baseline1] = 'checked';
			$q4[$baseline4] = 'checked';
			$q4a[$baseline4a] = 'checked';
			$q4b = $baseline4b;
			$q5[$baseline5] = 'selected';
		}


	}

	/**
		pmph info
	*/
	$pmph1 = "";
	$pmph3 = "";
	$pmph3a = "";
	$pmph4 = "";
	$pmph4ayear = "";
	$pmph4atreatment = "";
	$pmph4byear = "";
	$pmph4btreatment = "";
	$pmph4cyear = "";
	$pmph4ctreatment = "";
	$pmph5a = "";
	$pmph5atime = "";
	$pmph5b = "";
	$pmph5btime = "";
	$pmph5c = "";
	$pmph5ctime = "";
	$pmph5d = "";
	$pmph5dtime = "";
	$pmph5e = "";
	$pmph5etime = "";
	$pmph5f = "";
	$pmph5g = "";
	$pmph5h = "";
	$pmph5i = "";
	$pmph6aname = "";
	$pmph6apurpose = "";
	$pmph6adosage = "";
	$pmph6bname = "";
	$pmph6bpurpose = "";
	$pmph6bdosage = "";
	$pmph6cname = "";
	$pmph6cpurpose = "";
	$pmph6cdosage = "";
	$pmph6dname = "";
	$pmph6dpurpose = "";
	$pmph6ddosage = "";
	$pmph6ename = "";
	$pmph6epurpose = "";
	$pmph6edosage = "";
	$pmph6fname = "";
	$pmph6fpurpose = "";
	$pmph6fdosage = "";
	$pmph6gname = "";
	$pmph6gpurpose = "";
	$pmph6gdosage = "";
	$pmph6hname = "";
	$pmph6hpurpose = "";
	$pmph6hdosage = "";
	$pmph6iname = "";
	$pmph6ipurpose = "";
	$pmph6idosage = "";
	$pmph6jname = "";
	$pmph6jpurpose = "";
	$pmph6jdosage = "";
	if($hasresults){
		$sql = "call getClientSurveyPMPH(" . sql_escape_string($_SESSION['client_survey_header_id'], 0) . ", " . sql_escape_string($_SESSION['client_id'], 1) . ");";
		$Result = execute_query($mysqli, $sql);
		if ($Result) {
			$rowcount =	0;
			while ($row = $Result[0]->fetch_assoc()) {
				$hasresults = 1;
				$pmph1 = $row['pmph1'];
				$pmph3 = $row['pmph3'];
				$pmph3a = $row['pmph3a'];
				$pmph4 = $row['pmph4'];
				$pmph4ayear = $row['pmph4ayear'];
				$pmph4atreatment = $row['pmph4atreatment'];
				$pmph4byear = $row['pmph4byear'];
				$pmph4btreatment = $row['pmph4btreatment'];
				$pmph4cyear = $row['pmph4cyear'];
				$pmph4ctreatment = $row['pmph4ctreatment'];
				$pmph5a = $row['pmph5a'];
				$pmph5atime = $row['pmph5atime'];
				$pmph5b = $row['pmph5b'];
				$pmph5btime = $row['pmph5btime'];
				$pmph5c = $row['pmph5c'];
				$pmph5ctime = $row['pmph5ctime'];
				$pmph5d = $row['pmph5d'];
				$pmph5dtime = $row['pmph5dtime'];
				$pmph5e = $row['pmph5e'];
				$pmph5etime = $row['pmph5etime'];
				$pmph5f = $row['pmph5f'];
				$pmph5g = $row['pmph5g'];
				$pmph5h = $row['pmph5h'];
				$pmph5i = $row['pmph5i'];
				$pmph6aname = $row['pmph6aname'];
				$pmph6apurpose = $row['pmph6apurpose'];
				$pmph6adosage = $row['pmph6adosage'];
				$pmph6bname = $row['pmph6bname'];
				$pmph6bpurpose = $row['pmph6bpurpose'];
				$pmph6bdosage = $row['pmph6bdosage'];
				$pmph6cname = $row['pmph6cname'];
				$pmph6cpurpose = $row['pmph6cpurpose'];
				$pmph6cdosage = $row['pmph6cdosage'];
				$pmph6dname = $row['pmph6dname'];
				$pmph6dpurpose = $row['pmph6dpurpose'];
				$pmph6ddosage = $row['pmph6ddosage'];
				$pmph6ename = $row['pmph6ename'];
				$pmph6epurpose = $row['pmph6epurpose'];
				$pmph6edosage = $row['pmph6edosage'];
				$pmph6fname = $row['pmph6fname'];
				$pmph6fpurpose = $row['pmph6fpurpose'];
				$pmph6fdosage = $row['pmph6fdosage'];
				$pmph6gname = $row['pmph6gname'];
				$pmph6gpurpose = $row['pmph6gpurpose'];
				$pmph6gdosage = $row['pmph6gdosage'];
				$pmph6hname = $row['pmph6hname'];
				$pmph6hpurpose = $row['pmph6hpurpose'];
				$pmph6hdosage = $row['pmph6hdosage'];
				$pmph6iname = $row['pmph6iname'];
				$pmph6ipurpose = $row['pmph6ipurpose'];
				$pmph6idosage = $row['pmph6idosage'];
				$pmph6jname = $row['pmph6jname'];
				$pmph6jpurpose = $row['pmph6jpurpose'];
				$pmph6jdosage = $row['pmph6jdosage'];

			}
		}

		$q1[$pmph1] = 'checked';
		$q3[$pmph3] = 'checked';
		$q4[$pmph4] = 'checked';
		$q5a[$pmph5a] = 'checked';
		$q5b[$pmph5b] = 'checked';
		$q5c[$pmph5c] = 'checked';
		$q5d[$pmph5d] = 'checked';
		$q5e[$pmph5e] = 'checked';
		$q5f[$pmph5f] = 'checked';
		$q5g[$pmph5g] = 'checked';
		$q5h[$pmph5h] = 'checked';
		$q5i[$pmph5i] = 'checked';
	}

	// if ($_SESSION['survey_id'] > 1) {
	// 	$link = '<a href="survey2a.php" class="srv_btn"><- back</a>';
	// } else {
	// 	$link = '<a href="survey2.php" class="srv_btn"><- back</a>';
	// }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Litesprite" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="survey.css" media="screen" />
		<title>Sinasprite Beta Survey</title>
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./js/jquery.validate.min.js" type="text/javascript"></script> 
		<script src="./js/survey.js" type="text/javascript"></script> 
	</head>
	<body>
		<?php echo $header; ?>
		<div class="wrapper">
			<h1>Background & Medical History <span class="pageNum">(Page 2 of 4)</span></h1>
			<form action="survey2.php" method="post" name="survey1" id="survey1">
				<table>
					<tr>
						<td>Please input your Sinaprite Client Key:</td>
						<td colspan="2"><input type="text" id="clientkey" name="clientkey" value="<?= $client_key; ?>" title="Please enter your Client Key.<br/>"/></td>
					</tr>
					<tr>
						<td>What is your age (years):</td>
						<td colspan="2"><select id="age" name="age"  title="Please enter your age.<br/>"><?php if($options){echo $options;}?></select></td>
					</tr>
					<tr>
						<td>Gender you identify with:</td>
						<td style="width: 100px;"><input type="radio" id="gender-f" name="gender" value="f" <?php if($genderf){echo $genderf;}?>> Female</td>
						<td style="width: 100px;"><input type="radio" id="gender-m" name="gender" value="m" <?php if($genderm){echo $genderm;}?>> Male</td>
						<td style="width: 120px;"><input type="radio" id="gender-n" name="gender" value="m" <?php if($gendern){echo $gendern;}?>> Non-Binary</td>
						<td style="width: 100px;"><input type="radio" id="gender-o" name="gender" value="m" <?php if($gendero){echo $gendero;}?>> Other</td>

					</tr>
				</table>
				<br>
				1. What is your highest level of education now?<br/>
				<input type="radio" id="q1-1" name ="baseline1" value="1" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[1])){echo $q1[1];}?>/> Did not graduate from high school<br/>
				<input type="radio" id="q1-2" name ="baseline1" value="2" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[2])){echo $q1[2];}?>/> GED or ABE certificate<br/>
				<input type="radio" id="q1-3" name ="baseline1" value="3" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[3])){echo $q1[3];}?>/> High school diploma<br/>
				<input type="radio" id="q1-4" name ="baseline1" value="4" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[4])){echo $q1[4];}?>/> Trade or technical school graduate<br/>
				<input type="radio" id="q1-5" name ="baseline1" value="5" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[5])){echo $q1[5];}?>/> Some college but not a 4-year degree<br/>
				<input type="radio" id="q1-6" name ="baseline1" value="6" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[6])){echo $q1[6];}?>/> 4-year college degree (BA, BS, or equivalent)<br/>
				<input type="radio" id="q1-7" name ="baseline1" value="7" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[7])){echo $q1[7];}?>/> Graduate or professional study but no graduate degree<br/>
				<input type="radio" id="q1-8" name ="baseline1" value="8" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[8])){echo $q1[8];}?>/> Graduate or professional degree<br/>
				<input type="radio" id="q1-0" name ="baseline1" value="0" onclick="doRadioClick('baseline', this);" <?php if(isset($q1[0])){echo $q1[0];}?>/> Prefer not to say<br/>
				<br/>
				<br/>
				2. What is your marital status?<br/>
				<input type="radio" id="q4-1" name ="baseline4" value="1" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[1])){ echo $q4[1];}?>/> Married<br/>
				<input type="radio" id="q4-2" name ="baseline4" value="2" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[2])){ echo $q4[2];}?>/> Living as married (living with fiancé, boyfriend, or girlfriend but not married)<br/>
				<input type="radio" id="q4-3" name ="baseline4" value="3" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[3])){ echo $q4[3];}?>/> Separated and not living as married<br/>
				<input type="radio" id="q4-4" name ="baseline4" value="4" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[4])){ echo $q4[4];}?>/> Divorced and not living as married<br/>
				<input type="radio" id="q4-5" name ="baseline4" value="5" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[5])){ echo $q4[5];}?>/> Widowed and not living as married<br/>
				<input type="radio" id="q4-6" name ="baseline4" value="6" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[6])){ echo $q4[6];}?>/> Single, never married, and not living as married<br/>
				<input type="radio" id="q4-0" name ="baseline4" value="0" onclick="doRadioClick('baseline', this);" <?php if(isset($q4[0])){ echo $q4[0];}?>/> Prefer not to say<br/>
				<br/>
				3a. Have you had any relationship status changes in the past 12 months?  
					<input type="radio" id="q4a-1" name="baseline4a" value="1" onclick="doRadioClick('baseline', this);" <?php if(isset($q4a[0])){echo $q4a[0];}?>/>Yes
					<input type="radio" id="q4a-0" name="baseline4a" value="0" onclick="doRadioClick('baseline', this);" <?php if(isset($q4a[0])){echo $q4a[0];}?>/>No<br/>
				3b. If YES, please describe: <input type="text" class="othertext" maxlength="400" id="q4b" name="baseline4b" value="<?php if(isset($q4b)){echo $q4b;}?>" onchange="doTextChange('baseline', this)"/><br/>
				<br/>
				4. How many people live in your household including yourself?
				<select id="q5" name="baseline5" onchange="doSelectChange('baseline', this)">
					<option value="0" <?php if(isset($q5[0])){ echo $q5[0];}?>>-</option>
					<option value="1" <?php if(isset($q5[1])){ echo $q5[1];}?>>1</option>
					<option value="2" <?php if(isset($q5[2])){ echo $q5[2];}?>>2</option>
					<option value="3" <?php if(isset($q5[3])){ echo $q5[3];}?>>3</option>
					<option value="4" <?php if(isset($q5[4])){ echo $q5[4];}?>>4</option>
					<option value="5" <?php if(isset($q5[5])){ echo $q5[5];}?>>5</option>
					<option value="6" <?php if(isset($q5[6])){ echo $q5[6];}?>>6</option>
					<option value="7" <?php if(isset($q5[7])){ echo $q5[7];}?>>7</option>
					<option value="8" <?php if(isset($q5[8])){ echo $q5[8];}?>>8</option>
					<option value="9" <?php if(isset($q5[9])){ echo $q5[9];}?>>9</option>
					<option value="10" <?php if(isset($q5[10])){ echo $q5[10];}?>>10</option>
					<option value="11" <?php if(isset($q5[11])){ echo $q5[11];}?>>11</option>
					<option value="12" <?php if(isset($q5[12])){ echo $q5[12];}?>>12</option>
					<option value="13" <?php if(isset($q5[13])){ echo $q5[13];}?>>13</option>
					<option value="14" <?php if(isset($q5[14])){ echo $q5[14];}?>>14</option>
					<option value="15" <?php if(isset($q5[15])){ echo $q5[15];}?>>15</option>
					<option value="16" <?php if(isset($q5[16])){ echo $q5[16];}?>>16+</option>
				</select><br/>
				5. Do you receive regular medical care from a physician or clinic?  
					<input type="radio" id="q1-1" name="pmph1" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q1[1])){echo $q1[1];}?>/>Yes
					<input type="radio" id="q1-0" name="pmph1" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q1[0])){echo $q1[0];}?>/>No<br/>
				<br/>
				<br/>
				6. Have you ever received any psychiatric or psychological treatment?  
					<input type="radio" id="q4-1" name="pmph4" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q4[1])){echo $q4[1];}?>/>Yes
					<input type="radio" id="q4-0" name="pmph4" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q4[0])){echo $q4[0];}?>/>No<br/>
				6a. If yes, complete the following:<br/>
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<td>Year</td>
						<td>Past/current treatment(s)</td>
					</tr>
					<tr>
						<td><input type="text" id="q4a-year" name="pmph4ayear" maxlength="24" value="<?=$pmph4ayear?>" onchange="doTextChange('pmph', this)"/></td>
						<td><input type="text" id="q4a-treatments" name="pmph4atreatment" maxlength="200" value="<?=$pmph4atreatment?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td><input type="text" id="q4b-year" name="pmph4byear" maxlength="24" value="<?=$pmph4byear?>" onchange="doTextChange('pmph', this)"/></td>
						<td><input type="text" id="q4b-treatments" name="pmph4btreatment" maxlength="200" value="<?=$pmph4btreatment?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td><input type="text" id="q4c-year" name="pmph4cyear" maxlength="24" value="<?=$pmph4cyear?>" onchange="doTextChange('pmph', this)"/></td>
						<td><input type="text" id="q4c-treatments" name="pmph4ctreatment" maxlength="200" value="<?=$pmph4ctreatment?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
				</table>
				<br/>
				7. Have you been told by a health care provider that you have or had:
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th></th>
						<th style="width: 60px;">Yes</th>
						<th style="width: 60px;">No</th>
						<th style="width: 120px;">If yes, How Long?</th>
					</tr>
					<tr>
						<td>a. Major Depression</td>
						<td class="center"><input type="radio" id="q5a-1" name="pmph5a" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5a[1])){echo $q5a[1];}?>/></td>
						<td class="center"><input type="radio" id="q5a-0" name="pmph5a" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q5a[0])){echo $q5a[0];}?>/></td>
						<td class="center"><input type="text" id="q5a-time" name="pmph5atime" maxlength="200" value="<?=$pmph5atime?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td>b. Anxiety Disorder</td>
						<td class="center"><input type="radio" id="q5b-1" name="pmph5b" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5b[1])){echo $q5b[1];}?>/></td>
						<td class="center"><input type="radio" id="q5b-0" name="pmph5b" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q5a[0])){echo $q5a[0];}?>/></td>
						<td class="center"><input type="text" id="q5b-time" name="pmph5btime" maxlength="200" value="<?=$pmph5btime?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td>c. Schizophrenia/Personality Disorder</td>
						<td class="center"><input type="radio" id="q5c-1" name="pmph5c" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5c[1])){echo $q5c[1];}?>/></td>
						<td class="center"><input type="radio" id="q5c-0" name="pmph5c" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q5c[0])){echo $q5c[0];}?>/></td>
						<td class="center"><input type="text" id="q5c-time" name="pmph5ctime" maxlength="200" value="<?=$pmph5ctime?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td>d. Bipolar Disorder</td>
						<td class="center"><input type="radio" id="q5d-1" name="pmph5d" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5d[1])){echo $q5d[1];}?>/></td>
						<td class="center"><input type="radio" id="q5d-0" name="pmph5d" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q5d[0])){echo $q5d[0];}?>/></td>
						<td class="center"><input type="text" id="q5d-time" name="pmph5dtime" maxlength="200" value="<?=$pmph5dtime?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td>e. Substance Dependence</td>
						<td class="center"><input type="radio" id="q5e-1" name="pmph5e" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5e[1])){echo $q5e[1];}?>/></td>
						<td class="center"><input type="radio" id="q5e-0" name="pmph5e" value="0" onclick="doRadioClick('pmph', this);" <?php if(isset($q5e[0])){echo $q5e[0];}?>/></td>
						<td class="center"><input type="text" id="q5e-time" name="pmph5etime" maxlength="200" value="<?=$pmph5etime?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
				</table><br/>
				If yes to any of the above, please let us know what methods you have used in the past or are currently using to improve symptoms? <br/>
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th></td>
						<th style="width: 120px;">Used in the Past</th>
						<th style="width: 120px;">Use Currently</th>
						<th style="width: 120px;">NA</th>
					</tr>
					<tr>
						<td>f. Individual Counseling/Therapy</td>
						<td class="center"><input type="radio" id="q5f-1" name="pmph5f" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5f[1])){ echo $q5f[1];}?>/></td>
						<td class="center"><input type="radio" id="q5f-2" name="pmph5f" value="2" onclick="doRadioClick('pmph', this);" <?php if(isset($q5f[2])){ echo $q5f[2];}?>/></td>
						<td class="center"><input type="radio" id="q5f-99" name="pmph5f" value="99" onclick="doRadioClick('pmph', this);" <?php if(isset($q5f[99])){ echo $q5f[99];}?>/></td>
					</tr>
					<tr>
						<td>g. Group Counseling/Therapy</td>
						<td class="center"><input type="radio" id="q5g-1" name="pmph5g" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5g[1])){ echo $q5g[1];}?>/></td>
						<td class="center"><input type="radio" id="q5g-2" name="pmph5g" value="2" onclick="doRadioClick('pmph', this);" <?php if(isset($q5g[2])){ echo $q5g[2];}?>/></td>
						<td class="center"><input type="radio" id="q5g-99" name="pmph5g" value="99" onclick="doRadioClick('pmph', this);" <?php if(isset($q5g[99])){ echo $q5g[99];}?>/></td>
					</tr>
					<tr>
						<td>h. Over-the-counter medications</td>
						<td class="center"><input type="radio" id="q5h-1" name="pmph5h" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5h[1])){ echo $q5h[1];}?>/></td>
						<td class="center"><input type="radio" id="q5h-2" name="pmph5h" value="2" onclick="doRadioClick('pmph', this);" <?php if(isset($q5h[2])){ echo $q5h[2];}?>/></td>
						<td class="center"><input type="radio" id="q5h-99" name="pmph5h" value="99" onclick="doRadioClick('pmph', this);" <?php if(isset($q5h[99])){ echo $q5h[99];}?>/></td>
					</tr>
					<tr>
						<td>i.  Prescription Medications</td>
						<td class="center"><input type="radio" id="q5i-1" name="pmph5i" value="1" onclick="doRadioClick('pmph', this);" <?php if(isset($q5i[1])){ echo $q5i[1];}?>/></td>
						<td class="center"><input type="radio" id="q5i-2" name="pmph5i" value="2" onclick="doRadioClick('pmph', this);" <?php if(isset($q5i[2])){ echo $q5i[2];}?>/></td>
						<td class="center"><input type="radio" id="q5i-99" name="pmph5i" value="99" onclick="doRadioClick('pmph', this);" <?php if(isset($q5i[99])){ echo $q5i[99];}?>/></td>
					</tr>
				</table>
				<br/>
				8. Please list the prescription medications or over-the-counter herbs/supplements that you are CURRENTLY taking (for any reasons)?<br/>
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th style="width: 300px;">Name of Medicine/Supplement<br/>(ex: synthroid)</td>
						<th style="width: 300px;">Purpose (Amount and times taken per day)<br/>To help my thyroid</td>
						<th style="width: 300px;">Dosage (What do you take this for)<br/>100mcg tablet, 1x/day</td>
					</tr>
					<tr>
						<td class="center"><input type="text" id="q6a-name" name="pmph6aname" maxlength="200" value="<?=$pmph6aname?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6a-purpose" name="pmph6apurpose" maxlength="200" value="<?=$pmph6apurpose?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6a-dosage" name="pmph6adosage" maxlength="200" value="<?=$pmph6adosage?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td class="center"><input type="text" id="q6b-name" name="pmph6bname" maxlength="200" value="<?=$pmph6bname?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6b-purpose" name="pmph6bpurpose" maxlength="200" value="<?=$pmph6bpurpose?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6b-dosage" name="pmph6bdosage" maxlength="200" value="<?=$pmph6bdosage?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td class="center"><input type="text" id="q6c-name" name="pmph6cname" maxlength="200" value="<?=$pmph6cname?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6c-purpose" name="pmph6cpurpose" maxlength="200" value="<?=$pmph6cpurpose?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6c-dosage" name="pmph6cdosage" maxlength="200" value="<?=$pmph6cdosage?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
					<tr>
						<td class="center"><input type="text" id="q6d-name" name="pmph6dname" maxlength="200" value="<?=$pmph6dname?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6d-purpose" name="pmph6dpurpose" maxlength="200" value="<?=$pmph6dpurpose?>" onchange="doTextChange('pmph', this)"/></td>
						<td class="center"><input type="text" id="q6d-dosage" name="pmph6ddosage" maxlength="200" value="<?=$pmph6ddosage?>" onchange="doTextChange('pmph', this)"/></td>
					</tr>
				</table>
				<br/>
				<div class="error"></div>
				<input class="btn btn-success" type="submit" value="Next >"/>
			</form>
		</div>
		<?php #echo $debug;?>
	</body>

	
</html>
