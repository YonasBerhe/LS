<?php
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

$email_data="";

$total = 0;

	$sql = "CALL getEmailJoin();";
	//echo $sql.'<br/>';
	$Result = execute_query($mysqli, $sql);	
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {

$emailaddress = $row['emailaddress'];
$ipaddress = $row['ipaddress'];
$user_agent = $row['user_agent'];
$emailjoin_timestamp = $row['emailjoin_timestamp'];


$email_data .= <<<EOD
	<tr>
		<td class="left"><b><a href="mailto:{$emailaddress}">{$emailaddress}</a></b></td>
		<td class="center">{$ipaddress}</td>
		<td class="center" style="font-size: 8pt;">{$user_agent}</td>
		<td class="center">{$emailjoin_timestamp}</td>
	</tr>
EOD;
//totals 
$total++;
		}
	}

$email_body .= <<<EOD
	<div class="reporting"> 
		<table width="1000px">
		<tr>
			<th class="left"><b>Email Address</b></th>
			<th class="center"><b>IP Address</b></th>
			<th class="center"><b>Browser Data</b></th>
			<th class="center"><b>Timestamp</b></th>
		</tr>
		{$email_data}
		</table>
	</div>
	<div class="reportlegend"> 
		<table width="400px">
			<tr>						
				<td colspan="1">Total: {$total}</td>
			</tr>
		</table>
	</div>	
EOD;



$additionalCSS .= <<<EOD
 
EOD;


$additionalJS .= <<<EOD

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
            	<h1>Email Signup from Website (Newest First)</h1>
            </div>
			{$email_body}

            <!-- Column 1 end -->
        </div>
    </div>
    {$footer}
EOD;

?>
