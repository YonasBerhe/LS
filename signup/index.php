<?php 
require_once("../include/config.inc.php");
require_once("../include/mysqli.inc.php");
require_once("../include/utils.inc.php");

session_start();
if(!isset($_REQUEST['key'])) {
	header("Location: https://litesprite.com");
}
$_SESSION['client_key'] = $_REQUEST['key'];
$client_key =$_REQUEST['key'];
$email = "";
if(isset($_SESSION['email']) && strlen($_SESSION['email']) > 1) {
	$email = $_SESSION['email'];
} else {
	$sql = "SELECT player_email_address from litesprite.players as p where client_key =".sql_escape_string($client_key,1). " ;";
	$Result = execute_query($mysqli, $sql);
	if($Result && $row = $Result[0]->fetch_array()) {
		$email = $row[0];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Litesprite" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../survey/survey.css" media="screen" />
		<title>Sinasprite Tester NDA Agreement</title>
		<style type="text/css">
			td {
				border: 2px solid lightgray;
			}
			#terms_btn {
				background:#eee; 
			}

			#terms_btn:hover {
				border: 1px solid #b6d773;
			}

			#terms_btn:active {
				background:#b6d773;
			}
			input[type="submit"]{
				background:#447a2d;
			}
			input[type="submit"]:hover{
				border: 1px solid #b6d773;

			}
			input[type="submit"]:active{
				background:#28491b;
			}
		</style>
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../js/jquery.validate.min.js" type="text/javascript"></script> 
		<script src="../js/nda.js" type="text/javascript"></script> 
	</head>
	<body>
		<div class="header container">
			<div class="title">
				<img class="logo" src="http://litesprite.com/images/litesprite.png"/>
				<div class="titletext">Litesprite Sign-Up</div>
			</div>
		</div>
		<div class="wrapper container">
			<form action="nda_complete.php" method="post" name="nda" id="nda">
				<table style="width: 90%;">
					<tr>
						<td colspan="2">To get started, we’ll need the email, first and last of the Google Play 
						or iTunes account that is connected to the device you will use.</td>
					</tr>
					<tr>
						<td><b>Device:</b></td>
						<td id="device_td"><input type="radio" id="google" name="device" value="A"/>&nbsp;Google/Android.<input type="radio" id="ios" name="device" value="I"/>&nbsp;iOS. NOTE: Please download <a href="https://itunes.apple.com/us/app/testflight/id899247664?mt=8">Testflight</a>.</td>
					</tr>
					<tr>
						<td><b>E-mail:</b></td>
						<td><input type="email" id="deviceemail" name="deviceemail" value="" title="Please enter your Email associated with your device.<br/>"/></td>
					</tr>
					<tr>
						<td><b>First Name:</b></td>
						<td><input type="text" id="devicefirstname" name="devicefirstname" value="" title="Please enter your First Name associated with your device.<br/>"/></td>
					</tr>
					<tr>
						<td><b>Last Name:</b></td>
						<td><input type="text" id="devicelastname" name="devicelastname" value="" title="Please enter your Last Name associated with your device.<br/>"/></td>
					</tr>

					<tr style="border: 1px solid #b6d773; background: #e4f5c4; padding:20px; margin-bottom: 20px; text-align:left;">
						<th colspan="2" style="padding:10px;font-weight:normal;">
						<br>
						<p>If a health care provider has suggested that you use this software, that provider can receive reports of your usage of the game. 
						This includes:</p>
						<ul><li>Your responses to questionnaires throughout your usage of the game.</li>
						<li>Your entries in the “journal” section of the game, including information on the topic as well as the details of what you enter.</li>
						<li>Game usage data, including date and time of usage, duration, 
						and sections of the game that you utilized (for example, duration of meditation).</li></ul>

						<p>If want your provider to have access to these reports, Check the "YES" option below.</p>
						<p>If you do not wish for this information to be sent to your provider, you can still have full access to the game. 
						Simply check the "NO" option.</p>
						<br>
						</th>
					</tr>					
					<tr>
						<td style="width: 200px;"><b>Email Address:</b></td>
						<td>
						<p style="font-weight:bold;color:#447a2d;">Please use the same email you used to intially sign up.</p>
						<input type="email" id="emailaddress" name="emailaddress" text="<?=$email?>" value="<?=$email?>" title="Please enter your Email Address.<br/>"/>

						</td>
					</tr>
					<tr>
						<td><b>First Name:</b></td>
						<td><input type="text" id="firstname" name="firstname" value="" title="Please enter your First Name.<br/>"/></td>
					</tr>
					<tr>
						<td><b>Last Name:</b></td>
						<td><input type="text" id="lastname" name="lastname" value="" title="Please enter your Last Name.<br/>"/></td>
					</tr>

					<tr>
						<td colspan="2"><input type="radio" id="checkshareyes" name="checkshare" value="1" title="Provider Access Permission is Required..<br/>"/>&nbsp;YES, I want my provider to have access to this information.
						<span style="padding-left:4em;"><strong>Provider Name: </strong>
						
						<select name="provider" style="width:20em;">
							<option value="2" selected="selected">I'm signing up independently</option>
							<?php 
								$sql = "call getOrgs();";
								$Result = execute_query($mysqli, $sql);
								if($Result) {
									while($row = $Result[0]->fetch_assoc()) {
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
									}
								}
							?>
						</select>
						</span>
						</td>

					</tr>
<!-- 					<tr id="provider_tr">
						<td colspan="2" style="padding-left:6em;"><strong>Provider Name: </strong>
						
						<select name="provider" style="width:20em;">
							<option value="2" selected="selected">-</option>
							<?php 
								$sql = "call getOrgs();";
								$Result = execute_query($mysqli, $sql);
								if($Result) {
									while($row = $Result[0]->fetch_assoc()) {
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
									}
								}
							?>
						</select>
						</td>
					</tr> -->
					<tr>
						<td colspan="2" id="checkshare_td"><input type="radio" id="checkshareno" name="checkshare" value="0" required/>&nbsp;NO, I do not want my provider to have access to this information.</td>
					</tr>

				</table>
				<br>
				<p style="color:black;">We have to get some legal stuff out of the way so we can share our new ideas and concepts with you before we release publically. 
				This is a legal agreement between Litsprite Inc (“Litsprite”) and you (“You”). By clicking “I ACCEPT”, downloading, 
				using or providing feedback on Litesprite’s product (“Product”) you agree to these terms &amp conditions: </p>
				<div><button id="terms_btn" type="button" class="btn btn-deafult">
				Click to Show Terms &amp Conditions</button>
				</div>
				<div id="terms" style="width:90%;background:#e4f5c4"  class="well" hidden="true">
							<p style="letter-spacing: 1pt;">
							<b>THIS IS A LEGAL AGREEMENT BETWEEN LITESPRITE INC. ("LITESPRITE") AND YOU ("YOU").
							 BY CLICKING "I ACCEPT", DOWNLOADING, USING OR PROVIDING FEEDBACK ON LITESPRITE'S PRODUCT ("PRODUCT"), YOU AGREE TO THESE TERMS. </b></p>
							<p>1.&nbsp;&nbsp;You and Litesprite agree as follows:</br> 
							You agree: (a) to refrain from disclosing or distributing the Confidential Information to any third party for 
							five (5) years from the date of disclosure of the Confidential Information by Litesprite to You; 
							(b) to refrain from reproducing or summarizing the Confidential Information; and (c) to take reasonable security precautions, 
							at least as great as the precautions you take to protect your own confidential information, but no less than reasonable care,
						 	to keep confidential the Confidential Information. You,  however, may disclose 
						 	Confidential Information in accordance with a judicial or other governmental order, 
						 	provided You either (i) give Litesprite reasonable notice prior to such disclosure and allow Litesprite a reasonable 
						 	opportunity to seek a protective order or equivalent, or (ii) obtain written assurance from the applicable judicial 
						  	or governmental entity that it will afford the Confidential Information the highest level of protection afforded under applicable law or regulation.
						  	Confidential Information shall not include any information, however designated, that: 
						  	(i) is or subsequently becomes publicly available without Your breach of any obligation owed to Litesprite; 
						  	(ii) became known to You prior to Litesprite’s disclosure of such information to You pursuant to the terms of this Agreement; 
						  	(iii) became known to You from a source other than Litesprite other than by the breach of an obligation of confidentiality owed to Litesprite; 
						  	or (iv) is independently developed by You. For purposes of this paragraph, 
						  	"Confidential Information" means nonpublic information that Litesprite designates as being confidential or which,
						   	under the circumstances surrounding disclosure ought to be treated as confidential by Recipient. "Confidential Information" includes, 
						   	without limitation, information in tangible or intangible form relating to and/or including released or unreleased Litesprite software products, 
						   	the marketing or promotion of any Litesprite product, Litesprite's business policies or practices, 
						   	and information received from others that Litesprite is obligated to treat as confidential.</p>
							<p>2.&nbsp;&nbsp;You have no obligation to give Litesprite any suggestions, comments or other feedback ("Feedback") 
							relating to this Product. However, any Feedback you voluntarily provide may be used in Litesprite Products and related 
							specifications or other documentation. If You do give Litesprite Feedback on any version of this Product, 
							You agree: (a) Litesprite will own Your Feedback and may freely use, reproduce, license, distribute, 
							and otherwise commercialize Your Feedback in any Litesprite Product; and (b) You will not give Litesprite any Feedback that 
							(i) You have reason to believe is subject to any patent, copyright or other intellectual property claim or right of any third party; 
							or (ii) is subject to license terms which seek to require any Litesprite Product incorporating or derived from such Feedback, 
							or other Litesprite intellectual property, to be licensed to or otherwise shared with any third party.</p>
				</div>

				<input type="submit" value="I ACCEPT" class="btn btn-success" style='margin-left:0px;'/>
			</form>
		</div>
		<?#php echo $debug;?>
	</body>

</html>
