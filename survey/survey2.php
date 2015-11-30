<?php 
require_once("../include/config.survey.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");

session_start();

if(isset($_POST['clientkey']) && strlen($_POST['clientkey']) > 0) {
	$_SESSION['clientkey'] = $_POST['clientkey'];	
}
if(isset($_POST['age']) && strlen($_POST['age']) > 0) {
	$_SESSION['age'] = $_POST['age'];	
}
if(isset($_POST['gender']) && strlen($_POST['gender']) > 0) {
	$_SESSION['gender'] = $_POST['gender'];	
}

	$sql = "call ValidateClientKey(".sql_escape_string($_SESSION['clientkey'], 1).");";	
	//echo $sql;
	 
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$_SESSION['client_key'] = $row['client_key'];
			//$_SESSION['survey_id'] = $row['survey_id'];
		}
	}

	// validate permissions
	if (strlen($_SESSION['survey_id']) < 1) {
		// no permission - reset back to index.php
		//$_SESSION['error'] = "error";
		header('Location: index.php');		
	} 

include 'include/header.php';
include 'include/debug.php';

	$sql = "call updateClientSurveyHeader(".sql_escape_string($_SESSION['client_id'],1).', '. sql_escape_string($_SESSION['client_survey_header_id'], 0).", "
		.sql_escape_string($_SESSION['age'], 0) . ", " . sql_escape_string($_SESSION['gender'], 1)
		.", null, null );";	
	//echo $sql;
	 
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = 1;
			$_SESSION['client_survey_header_id'] = $row['client_survey_header_id'];
			$_SESSION['survey_id'] = $row['survey_id'];
			$_SESSION['client_key'] = $row['client_key'];
			$_SESSION['client_id'] = $row['client_id'];
			$_SESSION['client_age'] = $row['client_age'];
			$_SESSION['client_gender'] = $row['client_gender'];
			$_SESSION['client_survey_started'] = $row['client_survey_started'];
			$_SESSION['client_survey_completed'] = $row['client_survey_completed'];
			$_SESSION['client_survey_completed_timestamp'] = $row['client_survey_completed_timestamp'];
			$_SESSION['client_survey_active'] = $row['client_survey_active'];
		}
	}

	$sql = "call getClientSurveyPHQ(" . sql_escape_string($_SESSION['client_survey_header_id'], 0) . ", " . sql_escape_string($_SESSION['client_id'], 1) . ");";
	$Result = execute_query($mysqli, $sql);
	$hasresults = false;
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = true;
			$phq1 = $row['phq1'];
			$phq2 = $row['phq2'];
			$phq3 = $row['phq3'];
			$phq4 = $row['phq4'];
			$phq5 = $row['phq5'];
			$phq6 = $row['phq6'];
			$phq7 = $row['phq7'];
			$phq8 = $row['phq8'];
			$phq9 = $row['phq9'];
			$phq10 = $row['phq10'];
		}
	}
	if($hasresults) {
		$q1[$phq1] = 'checked';
		$q2[$phq2] = 'checked';
		$q3[$phq3] = 'checked';
		$q4[$phq4] = 'checked';
		$q5[$phq5] = 'checked';
		$q6[$phq6] = 'checked';
		$q7[$phq7] = 'checked';
		$q8[$phq8] = 'checked';
		$q9[$phq9] = 'checked';
		$q10[$phq10] = 'checked';
	}

	$hasresults = false;
	$sql = "call getClientSurveyGAD(" . sql_escape_string($_SESSION['client_survey_header_id'], 0) . ", " . sql_escape_string($_SESSION['client_id'], 1) . ");";
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = true;
			$gad1 = $row['gad1'];
			$gad2 = $row['gad2'];
			$gad3 = $row['gad3'];
			$gad4 = $row['gad4'];
			$gad5 = $row['gad5'];
			$gad6 = $row['gad6'];
			$gad7 = $row['gad7'];

		}
	}
	if($hasresults){
		$q11[$gad1] = 'checked';
		$q12[$gad2] = 'checked';
		$q13[$gad3] = 'checked';
		$q14[$gad4] = 'checked';
		$q15[$gad5] = 'checked';
		$q16[$gad6] = 'checked';
		$q17[$gad7] = 'checked';
	}
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
			<br>
			<a href="survey1.php" class="btn btn-success">< back</a>
			<h1>Patient Health Questionnaire <span class="pageNum">(page 3 of 4)</span></h1>
			<p> This is the first assessment. 
			We’ll ask this information again at 6 and 12-week points to generate your progress report and tell you how you are doing
			</p>
			<form action="survey3.php" method="post">
								<p>Over the last 2 weeks, how often have you been bothered by any of the following problems?</p>
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th></th>
						<th style="width: 100px;">Not at all</th>
						<th style="width: 100px;">Several days</th>
						<th style="width: 100px;">More than half of the days</th>
						<th style="width: 100px;">Nearly every day</th>
					</tr>
					<tr>
						<td>Little interest or pleasure in doing things</td>
						<td class="center"><input type="radio" id="q1-0" name="phq1" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q1[0])){ echo $q1[0];}?>/></td>
						<td class="center"><input type="radio" id="q1-1" name="phq1" value="1" onclick="doRadioClick('phq', this);"  <?php if(isset($q1[1])){ echo $q1[1];}?>/></td>
						<td class="center"><input type="radio" id="q1-2" name="phq1" value="2" onclick="doRadioClick('phq', this);"  <?php if(isset($q1[2])){ echo $q1[2];}?>/></td>
						<td class="center"><input type="radio" id="q1-3" name="phq1" value="3" onclick="doRadioClick('phq', this);"  <?php if(isset($q1[3])){ echo $q1[3];}?>/></td>
					</tr>
					<tr>
						<td>Feeling down, depressed, or hopeless</td>
						<td class="center"><input type="radio" id="q2-0" name="phq2" value="0" onclick="doRadioClick('phq', this);"  <?php if(isset($q2[0])){ echo $q2[0];}?>/></td>
						<td class="center"><input type="radio" id="q2-1" name="phq2" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q2[1])){ echo $q2[1];}?>/></td>
						<td class="center"><input type="radio" id="q2-2" name="phq2" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q2[2])){ echo $q2[2];}?>/></td>
						<td class="center"><input type="radio" id="q2-3" name="phq2" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q2[3])){ echo $q2[3];}?>/></td>
					</tr>
					<tr>
						<td>Trouble falling or staying asleep, or sleeping too much</td>
						<td class="center"><input type="radio" id="q3-0" name="phq3" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q3[0])){ echo $q3[0];}?>/></td>
						<td class="center"><input type="radio" id="q3-1" name="phq3" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q3[1])){ echo $q3[1];}?>/></td>
						<td class="center"><input type="radio" id="q3-2" name="phq3" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q3[2])){ echo $q3[2];}?>/></td>
						<td class="center"><input type="radio" id="q3-3" name="phq3" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q3[3])){ echo $q3[3];}?>/></td>
					</tr>
					<tr>
						<td>Feeling tired or having little energy</td>
						<td class="center"><input type="radio" id="q4-0" name="phq4" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q4[0])){ echo $q4[0];}?>/></td>
						<td class="center"><input type="radio" id="q4-1" name="phq4" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q4[1])){ echo $q4[1];}?>/></td>
						<td class="center"><input type="radio" id="q4-2" name="phq4" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q4[2])){ echo $q4[2];}?>/></td>
						<td class="center"><input type="radio" id="q4-3" name="phq4" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q4[3])){ echo $q4[3];}?>/></td>
					</tr>
					<tr>
						<td>Poor appetite or overeating</td>
						<td class="center"><input type="radio" id="q5-0" name="phq5" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q5[0])){ echo $q5[0];}?>/></td>
						<td class="center"><input type="radio" id="q5-1" name="phq5" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q5[1])){ echo $q5[1];}?>/></td>
						<td class="center"><input type="radio" id="q5-2" name="phq5" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q5[2])){ echo $q5[2];}?>/></td>
						<td class="center"><input type="radio" id="q5-3" name="phq5" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q5[3])){ echo $q5[3];}?>/></td>
					</tr>
					<tr>
						<td>Feeling bad about yourself — or that you are a failure or have let yourself or your family down</td>
						<td class="center"><input type="radio" id="q6-0" name="phq6" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q6[0])){ echo $q6[0];}?>/></td>
						<td class="center"><input type="radio" id="q6-1" name="phq6" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q6[1])){ echo $q6[1];}?>/></td>
						<td class="center"><input type="radio" id="q6-2" name="phq6" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q6[2])){ echo $q6[2];}?>/></td>
						<td class="center"><input type="radio" id="q6-3" name="phq6" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q6[3])){ echo $q6[3];}?>/></td>
					</tr>
					<tr>
						<td>Trouble concentrating on things, such as reading the newspaper or watching television</td>
						<td class="center"><input type="radio" id="q7-0" name="phq7" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q7[0])){ echo $q7[0];}?>/></td>
						<td class="center"><input type="radio" id="q7-1" name="phq7" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q7[1])){ echo $q7[1];}?>/></td>
						<td class="center"><input type="radio" id="q7-2" name="phq7" value="2" onclick="doRadioClick('phq', this);"<?php if(isset($q7[2])){ echo $q7[2];}?>/></td>
						<td class="center"><input type="radio" id="q7-3" name="phq7" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q7[3])){ echo $q7[3];}?>/></td>
					</tr>
					<tr>
						<td>Moving or speaking so slowly that other people could have noticed? Or the opposite — being so fidgety or restless that you have been moving around a lot more than usual</td>
						<td class="center"><input type="radio" id="q8-0" name="phq8" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q8[0])){ echo $q8[0];}?>/></td>
						<td class="center"><input type="radio" id="q8-1" name="phq8" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q8[1])){ echo $q8[1];}?>/></td>
						<td class="center"><input type="radio" id="q8-2" name="phq8" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q8[2])){ echo $q8[2];}?>/></td>
						<td class="center"><input type="radio" id="q8-3" name="phq8" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q8[3])){ echo $q8[3];}?>/></td>
					</tr>
					<tr>
						<td>Thoughts that you would be better off dead or of hurting yourself in some way</td>
						<td class="center"><input type="radio" id="q9-0" name="phq9" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q9[0])){ echo $q9[0];}?>/></td>
						<td class="center"><input type="radio" id="q9-1" name="phq9" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q9[1])){ echo $q9[1];}?>/></td>
						<td class="center"><input type="radio" id="q9-2" name="phq9" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q9[2])){ echo $q9[2];}?>/></td>
						<td class="center"><input type="radio" id="q9-3" name="phq9" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q9[3])){ echo $q9[3];}?>/></td>
					</tr>
				</table>
				<br/>
				If you checked off any problems, how difficult have these problems made it for you to do your work, take care of things at home, or get along with other people?<br/>
				<input type="radio" id="q10-0" name="phq10" value="0" onclick="doRadioClick('phq', this);" <?php if(isset($q10[0])){ echo $q10[0];}?>/> Not difficult at all <br/>
				<input type="radio" id="q10-1" name="phq10" value="1" onclick="doRadioClick('phq', this);" <?php if(isset($q10[1])){ echo $q10[1];}?>/> Somewhat difficult<br/>
				<input type="radio" id="q10-2" name="phq10" value="2" onclick="doRadioClick('phq', this);" <?php if(isset($q10[2])){ echo $q10[2];}?>/> Very difficult <br/>
				<input type="radio" id="q10-3" name="phq10" value="3" onclick="doRadioClick('phq', this);" <?php if(isset($q10[3])){ echo $q10[3];}?>/> Extremely difficult<br/>

				<p>Over the last 2 weeks, how often have you been bothered by the following problems?</p>
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th></th>
						<th style="width: 100px;">Not at all</th>
						<th style="width: 100px;">Several days</th>
						<th style="width: 100px;">More than half of the days</th>
						<th style="width: 100px;">Nearly every day</th>
					</tr>
					<tr>
						<td>Feeling nervous, anxious or on edge</td>
						<td class="center"><input type="radio" id="q1-0" name="gad1" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q11[0])){ echo $q11[0];} ?>/></td>
						<td class="center"><input type="radio" id="q1-1" name="gad1" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q11[1])){ echo $q11[1];} ?>/></td>
						<td class="center"><input type="radio" id="q1-2" name="gad1" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q11[2])){ echo $q11[2];} ?> /></td>
						<td class="center"><input type="radio" id="q1-3" name="gad1" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q11[3])){ echo $q11[3];} ?>/></td>
					</tr>
					<tr>
						<td>Not being able to stop or control worrying</td>
						<td class="center"><input type="radio" id="q2-0" name="gad2" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q12[0])){ echo $q12[0];}?>/></td>
						<td class="center"><input type="radio" id="q2-1" name="gad2" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q12[1])){ echo $q12[1];}?>/></td>
						<td class="center"><input type="radio" id="q2-2" name="gad2" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q12[2])){ echo $q12[2];}?>/></td>
						<td class="center"><input type="radio" id="q2-3" name="gad2" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q12[3])){ echo $q12[3];}?>/></td>
					</tr>
					<tr>
						<td>Worrying too much about different things</td>
						<td class="center"><input type="radio" id="q3-0" name="gad3" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q13[0])){ echo $q13[0];}?>/></td>
						<td class="center"><input type="radio" id="q3-1" name="gad3" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q13[1])){ echo $q13[1];}?>/></td>
						<td class="center"><input type="radio" id="q3-2" name="gad3" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q13[2])){ echo $q13[2];}?>/></td>
						<td class="center"><input type="radio" id="q3-3" name="gad3" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q13[3])){ echo $q13[3];}?>/></td>
					</tr>
					<tr>
						<td>Trouble relaxing</td>
						<td class="center"><input type="radio" id="q4-0" name="gad4" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q14[0])){ echo $q14[0];}?>/></td>
						<td class="center"><input type="radio" id="q4-1" name="gad4" value="1" onclick="doRadioClick('gad', this);"  <?php if(isset($q14[1])){ echo $q14[1];}?>/></td>
						<td class="center"><input type="radio" id="q4-2" name="gad4" value="2" onclick="doRadioClick('gad', this);"  <?php if(isset($q14[2])){ echo $q14[3];}?>/></td>
						<td class="center"><input type="radio" id="q4-3" name="gad4" value="3" onclick="doRadioClick('gad', this);"  <?php if(isset($q14[3])){ echo $q14[4];}?>/></td>
					</tr>
					<tr>
						<td>Being so restless that it is hard to sit still</td>
						<td class="center"><input type="radio" id="q5-0" name="gad5" value="0" onclick="doRadioClick('gad', this);"  <?php if(isset($q15[0])){ echo $q15[0];}?>/></td>
						<td class="center"><input type="radio" id="q5-1" name="gad5" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q15[1])){ echo $q15[1];}?>/></td>
						<td class="center"><input type="radio" id="q5-2" name="gad5" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q15[2])){ echo $q15[2];}?>/></td>
						<td class="center"><input type="radio" id="q5-3" name="gad5" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q15[3])){ echo $q15[3];}?>/></td>
					</tr>
					<tr>
						<td>Becoming easily annoyed or irritable</td>
						<td class="center"><input type="radio" id="q6-0" name="gad6" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q16[0])){ echo $q16[0];}?>/></td>
						<td class="center"><input type="radio" id="q6-1" name="gad6" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q16[1])){ echo $q16[1];}?>/></td>
						<td class="center"><input type="radio" id="q6-2" name="gad6" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q16[2])){ echo $q16[2];}?>/></td>
						<td class="center"><input type="radio" id="q6-3" name="gad6" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q16[3])){ echo $q16[3];}?>/></td>
					</tr>
					<tr>
						<td>Feeling afraid as if something awful might happen</td>
						<td class="center"><input type="radio" id="q7-0" name="gad7" value="0" onclick="doRadioClick('gad', this);" <?php if(isset($q17[0])){ echo $q17[0];}?>/></td>
						<td class="center"><input type="radio" id="q7-1" name="gad7" value="1" onclick="doRadioClick('gad', this);" <?php if(isset($q17[1])){ echo $q17[1];}?>/></td>
						<td class="center"><input type="radio" id="q7-2" name="gad7" value="2" onclick="doRadioClick('gad', this);" <?php if(isset($q17[2])){ echo $q17[2];}?>/></td>
						<td class="center"><input type="radio" id="q7-3" name="gad7" value="3" onclick="doRadioClick('gad', this);" <?php if(isset($q17[3])){ echo $q17[3];}?>/></td>
					</tr>
				</table>
				<div class="error"></div>
				<br>
				<input class="btn btn-success" type="submit" value="Next >"/>
			</form>
			<?php #echo $debug;?>
		</div>
	</body>

</html>