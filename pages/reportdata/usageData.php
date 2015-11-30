<?php
require_once('../../include/config.inc.php');
require_once('../../include/mysqli.inc.php');
require_once('../../include/utils.inc.php');
header('Content-Type: application/json');
$json = "[";
$sql = "CALL rptUsageTimeline();";
//echo $sql;
$Result = execute_query($mysqli, $sql);
if($Result) {
	$row = $Result[0]->fetch_assoc();
	$json .= 
	'[{"client_key": "'.$row['client_key'].'" },{"week":0.5,'.'"usage":'.$row['activityw1a'].'}, '
	.'{"week":1,'.'"usage":'.$row['activityw1b'].'}, '
	.'{"week":2,'.'"usage":' . $row['activityw2'].'}, '
	.'{"week":3,'.'"usage":' . $row['activityw3'].'}, '
	.'{"week":4,'.'"usage":'. $row['activityw4'].'}, '
	.'{"week":5,'.'"usage":' . $row['activityw5'].'}, '
	.'{"week":6,'.'"usage":'. $row['activityw6'].'}, '
	.'{"week":7,'.'"usage":'. $row['activityw7'].'}, '
	.'{"week":8,'.'"usage":'. $row['activityw8'].'}, '
	.'{"week":9,'.'"usage":'. $row['activityw9'].'}, '
	.'{"week":10,'.'"usage":'. $row['activityw10'].'}, '
	.'{"week":11,'.'"usage":'. $row['activityw11'].'}, '
	.'{"week":12,'.'"usage":'. $row['activityw12'].'}]';
	while ($row = $Result[0]->fetch_assoc()) {
		$json .= 
		',[{"client_key": "'.$row['client_key'].'" },{"week":0.5,'.'"usage":'.$row['activityw1a'].'}, '
		.'{"week":1,'.'"usage":'.$row['activityw1b'].'}, '
		.'{"week":2,'.'"usage":' . $row['activityw2'].'}, '
		.'{"week":3,'.'"usage":' . $row['activityw3'].'}, '
		.'{"week":4,'.'"usage":'. $row['activityw4'].'}, '
		.'{"week":5,'.'"usage":' . $row['activityw5'].'}, '
		.'{"week":6,'.'"usage":'. $row['activityw6'].'}, '
		.'{"week":7,'.'"usage":'. $row['activityw7'].'}, '
		.'{"week":8,'.'"usage":'. $row['activityw8'].'}, '
		.'{"week":9,'.'"usage":'. $row['activityw9'].'}, '
		.'{"week":10,'.'"usage":'. $row['activityw10'].'}, '
		.'{"week":11,'.'"usage":'. $row['activityw11'].'}, '
		.'{"week":12,'.'"usage":'. $row['activityw12'].'}]';
	}
	$json .="]";
	
	echo $json;
	//var_dump(json_decode($json));
}

?>