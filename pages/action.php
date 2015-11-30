<?php
require_once("../include/config.inc.php");
require_once('../include/mysqli.inc.php');
require_once("../include/utils.inc.php");
require_once("../include/phpmailer/class.phpmailer.php");
require_once('../include/header.php');
require_once('../include/footer.php');

//NON secured Page - NO login required

if (strlen($args[1]))  {
    // If there is an action
	$sql = "CALL get_ls_ActionDetails ('".$args[1]."');";
	$Result = execute_query($mysqli, $sql);
	//echo $sql;

	if ($Result) {
		
		while ($row = $Result[0]->fetch_assoc()) {
			$action_type_id = $row['action_type_id'];
			$action_type = $row['action_type'];
			$action_user_key = $row['user_key'];
			$action_user_email_address = $row['user_email_address'];
			$action_code = $row['action_code'];
		}
		
		switch 	($action_type_id) {
			case 1: //password reset
				$action_body .= '<form name="pwdreset" method="post" action="/actionhandler.php">';
				$action_body .= '<table cellpadding="2" cellspacing="1" border="0" style="background: #fff; margin: auto;" width="500">'; 
				$action_body .=  '<td  colspan="3" style="background: #eee; padding: 10px; color: #333; text-align: center;"><b>Request a Password Reset</b></td>';
				//$action_body .=  '<tr><td class="action_field" colspan="3"><b>Password Reset<b></td></tr>';
				$action_body .=  '<tr><td class="action_field" colspan="3">';
				$action_body .=  '<ul><li>Password must be a minimum of 8 characters</li>';
				$action_body .=  '<li>Password must contain letters (upper case and / or lower case</li>';
				$action_body .=  '<li>Password must contain Numbers <br>and / or Special Characters (! @ # $ % &, etc.)</li>';
				$action_body .=  '<li>Password entries must match (the page will show "Match!").</li></ul>';
				$action_body .=  '</td></tr>';
				$action_body .=  '<tr><td class="action_field" width="200">New Password:</td><td class="action_field" width="150"><input type="password" id="password1" name="password1" value="" onkeyup="testpassword(\'password1\', \'pwd1span\');"></td><td class="action_field" width="150" align="center"><div id="pwd1span" name="pwd1span" width="100%"></div></td></tr>';
				$action_body .=  '<tr><td class="action_field">New Password (Confirm):</td><td class="action_field"><input type="password" id="password2" name="password2" value="" onkeyup="comparepassword(\'password1\', \'password2\', \'pwd2span\', \'pwdSubmit\');"></td><td class="action_field" width="150" align="center"><div id="pwd2span" name="pwd2span" style="width:100%px;"></div></td></tr>';
				$action_body .=  '<tr><td class="action_field" colspan="3"><input type="submit" name="submit" id="pwdSubmit" name="pwdSubmit" style="float:right; margin: 0px 0px 0px 0px;" value="Change Password" disabled>';
				$action_body .=  '<input type="hidden" id="action_type_id" name="action_type_id" value="'.$action_type_id.'">';
				$action_body .=  '<input type="hidden" id="action_type" name="action_type" value="'.$action_type.'">';
				$action_body .=  '<input type="hidden" id="action_user_key" name="action_user_key" value="'.$action_user_key.'">';
				$action_body .=  '<input type="hidden" id="action_user_email_address" name="action_user_email_address" value="'.$action_user_email_address.'">';
				$action_body .=  '<input type="hidden" id="action_code" name="action_code" value="'.$action_code.'">';			
				$action_body .=  '</td></tr>';
		    	$action_body .= '</table>';
		    	$action_body .= '</form>';
	        break;
			}
	}
} else {
	//Not a valid user.
	header( 'Location: '.$homeurl  );
}

$additionalCSS .= <<<EOD
    <link href="https://{$domain}/css/skeleton.css" rel="stylesheet" media="screen">
EOD;


$additionalJS.= <<<EOD
	<script type='text/javascript' src="/js/action.js"></script>
EOD;


	
	
$body .= <<<EOD
{$header}
    <div class="colmask fullpage">
        <div class="col1 center">
		<!-- Column 1 start -->	
			{$action_body}
		<!-- Column 1 end -->
		</div>
	</div>
{$footer}
	

EOD;

$auxcss .= <<<EOD


/*

Light Green : bdc6a9;
Dark Green : 7c8f5b;
Light Grey : ccc;
Dark Grey  : 666;

*/

.action_field {
	color: #000;
	text-align: left;
	background: #fafafa;
	font-family: Arial;
	font-size: 12pt;
	padding: 2px;
	}

.action_field ul{
	    width: 460px;
	    margin:	0px 10px;
	    padding: 10px;
	}

#pwd1span {
	font-size: 10pt;
	line-height: 16pt;
	font-weight: 700;
}

#pwd2span {
	font-size: 10pt;
	line-height: 16pt;
	font-weight: 700;
}

EOD;

?>