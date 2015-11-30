<?php
require_once('../../include/config.inc.php');
require_once('../../include/mysqli.inc.php');
require_once('../../include/utils.inc.php');
header('Content-Type: application/json');
$json = "[";
$sql = '';
if(isset($_REQUEST['id'])) {
	$sql = 'CALL rptAnxiety('.sql_escape_string($_REQUEST['id'],1).');';
} else {
	$sql = 'CALL rptAnxietyOverview();';
}

$Result = execute_query($mysqli, $sql);
if($Result) {
	$row = $Result[0]->fetch_assoc();
	$json .= '{';
	$json .= '"type": "'.$row['anxiety_type'].'", ';
	$json .= '"rating": '.$row['anxiety_rating'].',';
	$json .= '"manageable": '.$row['anxiety_manageable'].', ';
	$json .= '"created": "'.$row['anxiety_added'].'"';
	$json .= '}';
	while ($row = $Result[0]->fetch_assoc()) {
		$json .= ', {';
		$json .= '"type": "'.$row['anxiety_type'].'", ';
		$json .= '"rating": '.$row['anxiety_rating'].',';
		$json .= '"manageable": '.$row['anxiety_manageable'].', ';
		$json .= '"created": "'.$row['anxiety_added'].'"';
		$json .= '}';
	}
}
$json .= ']';

echo $json;