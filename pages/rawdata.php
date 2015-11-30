<?php
if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');

// Table Name  
if (isset($args[1])) {
	$value = trim($args[1]);
	$search = array("'", '&', '<', '>');
	$replace = array("''", '&amp;', '&lt;', '&gt' );
	$tablename = dbstr_replace($search, $replace, $value);
} else {
	$tablename = "activity_log";
}

// Rows  
if (isset($args[2])) {
	if ($args[2] == "all") {
		$sqlrowlimit = $args[2];
		$sqllimitstatement = "";	
	}else {
		$sqlrowlimit = $args[2];	
		$sqllimitstatement = " limit " . $sqlrowlimit;
	}	
} else {
	$sqlrowlimit = '200';
	$sqllimitstatement = " limit " . $sqlrowlimit;
}

// database  
if (isset($args[3]) && (strtolower($args[3]) == "t") ) {
	$dbname= "sina_test";
	$dbnamestring = "[TEST]";
} else {
	$dbname= "sinasprite";
	$dbnamestring = "[LIVE]";
}

	$sql = 'select * from '. $dbname . '.' . $tablename. ' order by _rowid desc ' . $sqllimitstatement . ';' ;


	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if ($mysqli->connect_error) {
	    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	// Execute the Query
	$res = $mysqli->multi_query($sql);

	// Loop through the return data (if required)
	$result_set_id = 0;
	do {
	    if ($result = $mysqli->store_result()) {
	        $ary_results[$result_set_id] = $result;
	        // Increment the result set
	        $result_set_id++;
	    }
	} while ($mysqli->more_results() && $mysqli->next_result());

	// Get the data from the result set.
	if ($ary_results) {
		while ($row = $ary_results[0]->fetch_assoc()) {
			 $array[] = $row; 
		}
	} 

	if (count($array)<1 ){

		$tabledata =  "No Records";
	} else {
		$tabledata = array2table($array); // Will output a table of 600px width	
	}

	//Verify status and prepare output
	if ($mysqli->errno == 0) {
		// Success
	 	$dbStatus = "ok";
	 	$dbData = array("user_id" => $mysqli->insert_id, "client_id" => $client_id);
	} else {
		// Error
		$dbStatus = "err";
		$dbData = array("errno" => $mysqli->errno, "error" => $mysqli->error, "client_id" => $client_id);
	}


$additionalCSS .= <<<EOD
    <link href=  <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
    <link href="../../css/litesprite.css" rel="stylesheet" media="screen"/>
EOD;


$additionalJS.= <<<EOD

EOD;


$body .= <<<EOD
	{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
            <!-- Column 1 start -->
			<div class="backlink">
            	<a href="/reports">[ View all Reports ]</a>
            </div>
            <div class="pagetitle">
            	<h1>{$dbnamestring} Table Data: {$tablename} (rows limit: {$sqlrowlimit})</h1>
            </div>
            <div class="reporting" style="overflow: scroll;"> 
				{$tabledata}
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
