<?php 
require_once("../include/config.inc.php");
require_once("../include/mysqli.inc.php");
require_once("../include/utils.inc.php");
require_once("../include/phpmailer/class.phpmailer.php");

$now = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
//pull everyone from the db who hasn't completed nda sign 
$sql = "call getNDANotDoneTest();";

$ndas = execute_query($mysqli, $sql);
//for ea if time since intial sign up > 2 days && < 3 days 
//|| time > 5 days < 6 days send reminder send reminder email
if($ndas){
	// for($i=0; $i< sizeof($ndas); $i++){
	$nda_row = $ndas[0]->fetch_assoc();
	while($nda_row) {
		//echo $nda_row['time'];
		//$nda_row = $ndas[$i];
		// $date = date_create($nda_row['time']);

		$interval= time_diff($nda_row["time"], $now);
		$int_val = intval($interval->format('%a'));
		if(($int_val == 2) || ($int_val == 5)){
			echo 'missing nda: ' . $nda_row['key'] . ', ' . $nda_row['email'] . ', ' . $nda_row['time'] 
			 	. ", diff = " . $interval->format('%R%a days') . '<br>';
			//send email
			sendReminder(getSocksMailer(), $nda_row['email'], 'nda');
		}
		$nda_row = $ndas[0]->fetch_assoc();

	}
}
//pull everyone from the db who hasn't completed survey
$sql = "call getSurveyNotDoneTest();";
$surveys = execute_query($mysqli, $sql);
//for ea if time since intial sign up > 2 days && < 3 days || time > 5 days < 6 days send reminder email
if($surveys){
	$sur_row = $surveys[0]->fetch_assoc();
	while($sur_row) {
		$interval= time_diff($sur_row["time"], $now);
		$int_val = intval($interval->format('%a'));
		if($int_val == 2 || $int_val == 5){
			echo 'missing survey: ' . $sur_row['key'] . ', ' . $sur_row['email'] . ', ' . $sur_row['time'] 
				. ", diff = " . $interval->format('%R%a days') . '<br>';
			//send email
			sendReminder(getSocksMailer(), $sur_row['email'], 'survey', $key);
		}

		$sur_row = $surveys[0]->fetch_assoc();
	}	
}

function sendReminder($mail, $address, $type, $key) {
	$mail->AddAddress($address);
	if ($type == 'survey') {
		//add survey body
	} else if ($type == 'nda') {
		//add nda body
	}

	//$mail->SendMail();
}

#Diference between the sql time stamp string and $now, the recently created datetime
function time_diff($timestamp, $now) {
	$timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
	$interval = $timestamp->diff($now);
	// echo $interval->format('%R%a days');
	return $interval;
}

?>