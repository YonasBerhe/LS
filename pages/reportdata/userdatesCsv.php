<?php
require_once('../../include/config.inc.php');
require_once('../../include/mysqli.inc.php');
require_once('../../include/utils.inc.php');
header('Content-Type: text/plain');


if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}


$email_data = '';
$email_body = '';
$total = 0;
	echo 'client key, six week, twelve week, sinasprite start, email\n';
	$sql = "CALL getBasicInfo();";
	$Result = execute_query($mysqli, $sql);	
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$key = $row['key'];
			$email = $row['email'];
			$lname = $row['lname'];
			$fname = $row['fname'];
			$nda_time = $row['ndatime'];
			if($nda_time) {
				$nda_time = date_create_from_format('Y-m-d H:i:s', $nda_time)->format('m-d-Y');
			}

			$device = '';
			if($row['device'] == 'A') {
				$device = "Android";
			} else if ($row['device'] == 'I') {
				$device = 'iOS';
			}
			$survey_time = $row['surveytime'];
			if($survey_time) {
				$survey_time = date_create_from_format('Y-m-d H:i:s', $survey_time)->format('m-d-Y');
			}
			//$survey_time = date_create_from_format('Y-m-d H:i:s', $row['surveytime'])->format('m-d-Y');
			$sina_time = $row['sinatime'];
			
			$six_week = '';
			$twelve_week = '';
			if($sina_time) {
				$temp_time = date_create_from_format('Y-m-d H:i:s', $sina_time);
				$six_week = $temp_time->modify('+'. 6 .'weeks')->format('m-d-Y');
				$twelve_week = $temp_time->modify('+'. 6 .'weeks')->format('m-d-Y');
				$sina_time =date_create_from_format('Y-m-d H:i:s', $sina_time)->format('m-d-Y');;
			}
			echo $key.', '.$six_week.', '.$twelve_week.', '.$email.'\n'
		}
	}