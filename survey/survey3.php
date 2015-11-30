<?php 
require_once("../include/config.survey.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");

	session_start();
	// validate permissions
	if (strlen($_SESSION['client_id']) < 1) {
		header('Location: index.php');		
	} 

include 'include/header.php';
include 'include/debug.php';


	if ($_SESSION['survey_id'] > 1) {
		$link = '<a href="survey2a.php"><- back</a>';
	} else {
		$link = '<br><a href="survey2.php" class="btn btn-success">< back</a>';
	}
$sql = "call getClientSurveyCSE(" . sql_escape_string($_SESSION['client_survey_header_id'], 0) . ", " . sql_escape_string($_SESSION['client_id'], 1) . ");";
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		$hasresults = false;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = true;
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
			


		}
		if($hasresults) {
			$q1[$cse1] = 'checked';
			$q2[$cse2] = 'checked';
			$q3[$cse3] = 'checked';
			$q4[$cse4] = 'checked';
			$q5[$cse5] = 'checked';
			$q6[$cse6] = 'checked';
			$q7[$cse7] = 'checked';
			$q8[$cse8] = 'checked';
			$q9[$cse9] = 'checked';
			$q10[$cse10] = 'checked';
			$q11[$cse11] = 'checked';
			$q12[$cse12] = 'checked';
			$q13[$cse13] = 'checked';
			$q14[$cse14] = 'checked';
			$q15[$cse15] = 'checked';
			$q16[$cse16] = 'checked';
			$q17[$cse17] = 'checked';
			$q18[$cse18] = 'checked';
			$q19[$cse19] = 'checked';
			$q20[$cse20] = 'checked';
			$q21[$cse21] = 'checked';
			$q22[$cse22] = 'checked';
			$q23[$cse23] = 'checked';
			$q24[$cse24] = 'checked';
			$q25[$cse25] = 'checked';
			$q26[$cse26] = 'checked';
		}
	}


// $titles = ["Keep from getting down in the dumps.", "Talk positively to yourself.", "Sort out what can be changed, and what can not be changed.",
// 			"Get emotional support from friends and family"]

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
			<?php echo $link ?>
			
			<h1>Coping Self-Efficacy Scale <span class="pageNum">(page 4 of 4)</span></h1>
			<p>Keep going - you’re almost done! This is the last assessment.
			 We’ll ask this information again at 6 and 12-week points to generate your progress report and tell you how you are doing.</p>
			<form action="survey4.php" method="post">
			<p>For each of the following items, write a number from 0 – 10, using the scale below.</p>
			<p>When things aren’t going well for you, or when you’re having problems, how confident or certain are you that you can do the following:</p>
			<form action="survey7.php" method="post">
				<table border="1" cellpadding="2" cellspacing="0">
					<tr>
						<th></th>
						<th class="left" colspan="3">Cannot do at all</th>
						<th class="center" colspan="4">Moderately certain can do</th>
						<th class="right" colspan="3">Certain can do</th>
					</tr>
					<tr>
						<td class="left"></td>
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

						<td class="left">Keep from getting down in the dumps.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q1[$i])) {
								echo '<td class="center"><input type="radio" id="q1-'.$i.'" name="cse1" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q1[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q1-'.$i.'" name="cse1" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
					<td class="left">Talk positively to yourself.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q2[$i])) {
								echo '<td class="center"><input type="radio" id="q2-'.$i.'" name="cse2" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q2[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q2-'.$i.'" name="cse2" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Sort out what can be changed, and what can not be changed.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q3[$i])) {
								echo '<td class="center"><input type="radio" id="q3-'.$i.'" name="cse3" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q3[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q3-'.$i.'" name="cse3" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Get emotional support from friends and family.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q4[$i])) {
								echo '<td class="center"><input type="radio" id="q4-'.$i.'" name="cse4" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q4[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q4-'.$i.'" name="cse4" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Find solutions to your most difficult problems.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q5[$i])) {
								echo '<td class="center"><input type="radio" id="q5-'.$i.'" name="cse5" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q5[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q5-'.$i.'" name="cse5" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Break an upsetting problem down into smaller parts.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q6[$i])) {
								echo '<td class="center"><input type="radio" id="q6-'.$i.'" name="cse6" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q6[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q6-'.$i.'" name="cse6" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Leave options open when things get stressful.</td>
						<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q7[$i])) {
								echo '<td class="center"><input type="radio" id="q7-'.$i.'" name="cse7" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q7[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q7-'.$i.'" name="cse7" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Make a plan of action and follow it when confronted with a problem.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q8[$i])) {
								echo '<td class="center"><input type="radio" id="q8-'.$i.'" name="cse8" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q8[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q8-'.$i.'" name="cse8" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Develop new hobbies or recreations.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q9[$i])) {
								echo '<td class="center"><input type="radio" id="q9-'.$i.'" name="cse9" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q9[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q9-'.$i.'" name="cse9" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Take your mind off unpleasant thoughts.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q10[$i])) {
								echo '<td class="center"><input type="radio" id="q10-'.$i.'" name="cse10" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q10[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q10-'.$i.'" name="cse10" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Look for something good in a negative situation.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q11[$i])) {
								echo '<td class="center"><input type="radio" id="q11-'.$i.'" name="cse11" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q11[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q11-'.$i.'" name="cse11" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Keep from feeling sad.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q12[$i])) {
								echo '<td class="center"><input type="radio" id="q12-'.$i.'" name="cse12" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q12[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q12-'.$i.'" name="cse12" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">See things from the other person’s point of view during a heated argument.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q13[$i])) {
								echo '<td class="center"><input type="radio" id="q13-'.$i.'" name="cse13" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q13[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q13-'.$i.'" name="cse13" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Try other solutions to your problems if your first solutions don’t work.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q14[$i])) {
								echo '<td class="center"><input type="radio" id="q14-'.$i.'" name="cse14" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q14[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q14-'.$i.'" name="cse14" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Stop yourself from being upset by unpleasant thoughts.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q15[$i])) {
								echo '<td class="center"><input type="radio" id="q15-'.$i.'" name="cse15" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q15[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q15-'.$i.'" name="cse15" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Make new friends.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q16[$i])) {
								echo '<td class="center"><input type="radio" id="q16-'.$i.'" name="cse16" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q16[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q16-'.$i.'" name="cse16" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Get friends to help you with the things you need.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q17[$i])) {
								echo '<td class="center"><input type="radio" id="q17-'.$i.'" name="cse17" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q17[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q17-'.$i.'" name="cse17" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Do something positive for yourself when you are feeling discouraged.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q18[$i])) {
								echo '<td class="center"><input type="radio" id="q18-'.$i.'" name="cse18" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q18[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q18-'.$i.'" name="cse18" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Make unpleasant thoughts go away.</td>
						<?php
						for ($i=1; $i <= 10; $i++){
							if(isset($q19[$i])) {
								echo '<td class="center"><input type="radio" id="q19-'.$i.'" name="cse19" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q19[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q19-'.$i.'" name="cse19" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						} 
						?>
					</tr>
					<tr>
						<td class="left">Think about one part of the problem at a time.</td>

						<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q20[$i])) {
								echo '<td class="center"><input type="radio" id="q20-'.$i.'" name="cse20" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q20[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q20-'.$i.'" name="cse20" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						} 
						?>
					</tr>
					<tr>
						<td class="left">Visualize a pleasant activity or place.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q21[$i])) {
								echo '<td class="center"><input type="radio" id="q21-'.$i.'" name="cse21" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q21[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q21-'.$i.'" name="cse21" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						} 
					?>
					</tr>
					<tr>
						<td class="left">Keep yourself from feeling lonely.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q22[$i])) {
								echo '<td class="center"><input type="radio" id="q22-'.$i.'" name="cse22" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q22[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q22-'.$i.'" name="cse22" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Pray or meditate.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q23[$i])) {
								echo '<td class="center"><input type="radio" id="q23-'.$i.'" name="cse23" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q23[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q23-'.$i.'" name="cse23" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Get emotional support from community organizations or resources.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q24[$i])) {
								echo '<td class="center"><input type="radio" id="q24-'.$i.'" name="cse24" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q24[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q24-'.$i.'" name="cse24" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Stand your ground and fight for what you want.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q25[$i])) {
								echo '<td class="center"><input type="radio" id="q25-'.$i.'" name="cse25" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q25[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q25-'.$i.'" name="cse25" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						}
					?>
					</tr>
					<tr>
						<td class="left">Resist the impulse to act hastily when under pressure.</td>
					<?php 
						for ($i=1; $i <= 10; $i++){
							if(isset($q26[$i])) {
								echo '<td class="center"><input type="radio" id="q26-'.$i.'" name="cse26" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"'.$q26[$i].'/></td>';
							} else {
								echo '<td class="center"><input type="radio" id="q26-'.$i.'" name="cse26" value="'.$i.'" onclick="doRadioClick(\'cse\', this);"/></td>';
							}
						} 
					?>
					</tr>
				</table>
				<br>
				<input class="btn btn-success" type="submit" value="Next >"/>
			</form>
			<?php # echo $debug;?>
		</div>
	</body>
</html>