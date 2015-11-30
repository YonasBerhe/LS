<?php
require_once('../../include/config.inc.php');
require_once('../../include/mysqli.inc.php');
require_once('../../include/utils.inc.php');
header('Content-Type: application/json');
$json = "[";


if(isset($_REQUEST['id'])) {
	$sql = 'CALL getSceneUsage("'.$_REQUEST['id'].'");';
} else {
	$sql = 'CALL getSceneUsageAll();';
}


$Result = execute_query($mysqli, $sql);
if($Result) {
	$row = $Result[0]->fetch_assoc();
	//"client" : "' . $row['client_id'] . '", '.'
	$json .= '{"time" : "' . $row['time'] . '",'
				.'"activity" : "' . $row['activity_code']
			.'"}';

	while ($row = $Result[0]->fetch_assoc()) {
	$json .= ', {"time" : "' . $row['time'] . '",'
				.'"activity" : "' . $row['activity_code']
			.'"}';
	}
}

$json .= "]";

echo $json;
?>