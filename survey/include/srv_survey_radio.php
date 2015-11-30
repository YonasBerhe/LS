<?php 
require_once("../../include/config.survey.php");
require_once('mysqli.inc.php');
require_once("utils.inc.php");

	switch ($_REQUEST['table']) {
		case 'baseline':
			$sql = "update client_survey_baseline set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'pmph':
			$sql = "update client_survey_pmph set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'phq':
			$sql = "update client_survey_phq set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'gad':
			$sql = "update client_survey_gad set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'cse':
			$sql = "update client_survey_cse set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'lsq':
			$sql = "update client_survey_lsq set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
		case 'pss':
			$sql = "update client_survey_pss set " . str_replace("'", "''", $_REQUEST['question']) . "  = " . sql_escape_string($_REQUEST['value'], 1) . " where client_id = ".sql_escape_string($_SESSION['client_id'], 1)." and client_survey_header_id = ".sql_escape_string($_SESSION['client_survey_header_id'], 0).";";	
			break;
	}

	if (strlen($sql) < 1) {
		exit;
	} else {
		echo $sql;
	}
	 
	$Result = execute_query($mysqli, $sql);
	if ($Result) {
		$rowcount =	0;
		while ($row = $Result[0]->fetch_assoc()) {
			$hasresults = 1;
		}
	}

?>