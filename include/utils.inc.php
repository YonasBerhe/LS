<?php

/************************************************************************************************************* 
** func: execute_query($mysqli, $query)
** help: 	$mysqli - existing connection or blank if there isn't one
**			$query - SQL query to be executed
** use:	used to execute a query and return an array of resultsets
**************************************************************************************************************/
function execute_query($mysqli, $query) {
	$bcloseconnection = false;
	// did we get passed a valid connection (i.e. did the calling function already make the connection to the db for us?)
	if (!isset($mysqli)) {
		//echo '<br>execute_query: opening db connection';
			$bcloseconnection = true;
			// Connect to the database
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);			
	
			// check connection
			if (mysqli_connect_errno()) {
			    log_error(sprintf("sql_execute: Connect failed: %s\n", mysqli_connect_error()));
			    return false;
			}
		}
		//echo '<br>query='.$query;
		// execute the query
	    if ($mysqli->multi_query($query)) {
	        // Setup an incrementing count of the result set;
	        $result_set_id = 0;
	        do {
	            if ($result = $mysqli->store_result()) {
	    
	                $ary_results[$result_set_id] = $result;
	    
		            // Increment the result set
		            $result_set_id++;
	            }
	        } while ($mysqli->more_results() && $mysqli->next_result());
	        // need to check if we got any resultsets back into the array...if not, the query was probably still valid so return TRUE
	        if (!is_array($ary_results))
	        	return true;
	    }
		else {
			
			echo $mysqli->error;
			//log_error(sprintf("sql_execute: the query '%s' failed to execute due to the following error: '%s'", $query, $mysqli->error));
			return false;		
		}
		
		// if we had to open the connection, then close it
		if ($bcloseconnection) {
		//echo '<br>execute_query: closing db connection';
			$mysqli->close();
		}

	return $ary_results;	
	}

function sql_escape_string($value, $is_str=1) {

	//Trim the whitespace
	$value = trim($value);
	$search = array("'", '&', '<', '>');
	$replace = array("''", '&amp;', '&lt;', '&gt' );
	
	$curr_search = array("'", '&', '<', '>', '$', ',');
	$curr_replace = array('', '', '', '', '', '');
	
	
	if (strlen($value) > 0) {
	    // If magic quotes are enabled
	    if (get_magic_quotes_gpc()) {
	        // Strip any slashes that already exist within the string
	        $value = stripslashes($value);
	    }
	    // Return the escaped string
	    switch ($is_str) {
	    	case 0: // Integer
	    		if (is_numeric($value)) {
					return $value;
	    		} else {
	    			return 0;
	    		}
	    		break;
	    	case 1: // html-friendly string -- DEFAULT
	    		return "'".dbstr_replace($search, $replace, $value)."'";
	    		break;
	    	case 2: // clean string
	    		return "'".dbstr_replace($curr_search, $curr_replace, $value)."'";
	    		break;
		}
	} else {
		return 'NULL';
	}
}

function doubleSalt($toHash,$username){ 
	$password = str_split($toHash,(strlen($toHash)/2)+1); 
	$hash = hash('md5', $username.$password[0].'oYqnFIqw5o8Wpu8aLHHC'.$password[1]); 
return $hash; 
} 

function dbstr_replace($search, $replace, $subject) {
    return strtr( $subject, array_combine($search, $replace) );
	}


function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip=$_SERVER['HTTP_CLIENT_IP'];
    	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
      	$ip=$_SERVER['REMOTE_ADDR'];
		}
    return $ip;
}


function docalcfunc ($tmpInt1, $tmpInt2) {
	
	if (strlen($tmpInt2) > 0) {
		$tmpVal = $tmpInt1 - $tmpInt2;
		if ($tmpVal >= 0) {
			$tmpVal = '<span class="delpos">['.$tmpVal.']</span>';
		} else {
			$tmpVal = '<span class="delneg">[('.$tmpVal.')]</span>';
		}
	} else {
		$tmpVal = '[0]';
	}

	return $tmpVal;
}

function docalcfunchigher ($tmpInt1, $tmpInt2) {
	
	if (strlen($tmpInt2) > 0) {
		$tmpVal = $tmpInt2 - $tmpInt1;
		if ($tmpVal >= 0) {
			$tmpVal = '<span class="delpos">['.$tmpVal.']</span>';
		} else {
			$tmpVal = '<span class="delneg">[('.$tmpVal.')]</span>';
		}
	} else {
		$tmpVal = '[0]';
	}

	return $tmpVal;
}

function evalYN($val) {
	switch ($val) {
		case NULL:
			$tmpval = "-";
			break;
		case 0:
			$tmpval = "No";
			break;
		case 1:
			$tmpval = "Yes";
			break;
	}
	return $tmpval;
}

function eval5($val) {
	switch ($val) {
		case NULL:
			$tmpval = "-";
			break;
		case 1:
			$tmpval = "Used in the Past";
			break;
		case 2:
			$tmpval = "Use Currently";
			break;
		case 99:
			$tmpval = "N/A";
			break;
	}
	return $tmpval;
}

function eval2($val) {
	switch ($val) {
		case NULL:
			$tmpval = "-";
			break;
		case 0:
			$tmpval = "N";
			break;
		case 1:
			$tmpval = "Y";
			break;
		case 99:
			$tmpval = "?";
			break;
	}
	return $tmpval;
}

function array2table($arr) {
   $count = count($arr);
   $a2t = "";
   if($count > 0){
       reset($arr);
       $num = count(current($arr));
       $a2t .= "<table align=\"center\" border=\"1\"cellpadding=\"5\" cellspacing=\"0\">\n";
       $a2t .= "<tr>\n";
       foreach(current($arr) as $key => $value){
           $a2t .= "<th>";
           $a2t .= $key."&nbsp;";
           $a2t .= "</th>\n";   
           }   
       $a2t .= "</tr>\n";
       while ($curr_row = current($arr)) {
           $a2t .= "<tr>\n";
           $col = 1;
           while (false !== ($curr_field = current($curr_row))) {
               $a2t .= "<td>";
               $a2t .= $curr_field."&nbsp;";
               $a2t .= "</td>\n";
               next($curr_row);
               $col++;
               }
           while($col <= $num){
               $a2t .= "<td>&nbsp;</td>\n";
               $col++;       
           }
           $a2t .= "</tr>\n";
           next($arr);
           }
       $a2t .= "</table>\n";
       }

       return $a2t;
   }

?>