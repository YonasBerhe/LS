<?php 
require_once("../include/config.inc.php");
require_once("../include/mysqli.inc.php");
require_once("../include/utils.inc.php");

session_start();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Litesprite" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../pages/info.css" media="screen" />
		<title>Sinasprite FAQ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	</head>
	<body>
		<div class="header">
		<div class="title">
		<img class="logo" src="http://litesprite.com/images/litesprite.png"/>
		<div class="titletext">Sinasprite Beta Test Frequently Asked Questions</div>
	</div>
</div>
		<div class="wrapper">
		<br>
	<table>
		<tr>
			<th><i>Principal Investigator:</i></th>
			<th>Dr. Mirene Winsberg</th>
		</tr>
		<tr>
			<th><i>Study Coordinator:</i></th>
			<th>Naveen Janarthanan<br/></th>
		</tr>
		<tr>
			<th>Contact Info:</th>
			<th><a href="mailto:socks@litesprite.com" title="socks@litesprite.com">socks@litesprite.com</a></th>
		</tr>
	</table>
	<br>
<p>We have created a game called Sinasprite designed to reduce symptoms of self-reported stress, anxiety, and depression. Please read the information below and ask questions about anything you do not understand before deciding whether to take part in this study.<br/></p>
<!-- <p><u><b><font color="green">Why are we doing this study?<br/></font></b></u></p>
<p>The purpose of the study is to learn about how people use a computerized game designed for adults to improve symptoms of stress, anxiety, or depression. The game is played on an Android smartphone and is made for adults who have mild levels of stress or symptoms of depression or anxiety. We are hoping to learn how much people with these conditions use the game and whether they enjoy using the game and think it helps improve mood and reduce symptoms.<br/></p>
<p><u><b><font color="green">We would like you to join this research study!<br/></font></b></u></p>
<p>You are being invited to take part in this 12 week study because you are an adult over the age of 18 and you want to improve your mood.<br/></p>
<p><u><b><font color="green">What procedures are part of this study?<br/></font></b></u></p>
<p>If you agree to be in this study, you will be in the study for 12 weeks. You will be asked to download a game onto your smartphone and play it when you feel stressed, anxious, or depressed and answer questions about whether the game helps you feel better. You will receive instructions to help you download and use the game. You will not be told how much you should use the game but you will be asked to tell us what you think of the game while you are in the study. We will ask you to answer questions about the game after you have the game for 6 weeks and 12 weeks. We will also ask you to answer questions about how you are feeling and your mood. You will be asked to answer these questions three times during the study: on the day you are given the game, 6 weeks after you get the game, and 12 weeks after you get the game at the end of the study.<br/></p>
<p>The surveys will take about 15 minutes to complete each time you are asked to fill them out. This means we will ask you to take a total of 45 minutes for the surveys during the 12 weeks you are in the study.<br/></p>
<p>If any of the questions make you uncomfortable you can skip them. You can also take a break if you get tired when you are answering survey questions and re-start at a later time or speak with the study coordinator.<br/></p>
<p><u><b><font color="green">How is my data stored and who has access?<br/></font></b></u></p>
<p>We use randomly generated unique ID codes to identify users. Any information you enter can not be traced to you personally. There is one master list that secures the user information separately from application data.<br/></p>
<p><u><b><font color="green">How will my data be used?<br/></font></b></u></p>
<p>We will look at individual and group level trends. We may publish or publicity share the results but we will not disclose the names of the study participants.<br/></p>
<p><u><b><font color="green">What progress report will I get?<br/></font></b></u></p>
<p>We can provide you of a log of all the data you entered.<br/></p>
<p><u><b><font color="green">What are the risks?<br/></font></b></u></p>
<p>The likelihood of harm as a result of your participation in this study is very low. You may become distressed or fatigued when answering questions about how you are feeling. You may find that particular questions make you uncomfortable, but you are not required to answer all of the questions. If this occurs, you can take a break from completing the questions and re-start at a later time, or, if distress continues, you can speak with the study coordinator. If something in this research makes you uncomfortable or upset, you have the right to stop taking part in this research at any time.<br/></p>
<p>Although major depression is highly unlikely to be caused by the study, severe depression may be detected with study activities. If this occurs at any time, we will have the study PI get in touch with you right away to discuss how you are feeling and provide you with the help that you need. If the investigator notes that you are distressed or anxious about your participation in this research, you will be referred to your own medical provider for further assistance.<br/></p>
<p><u><b><font color="green">What are the benefits?<br/></font></b></u></p>
<p>You may benefit from this study because your participation may increase self-management behaviors, including cognitive and behavioral stress management coping skills. Depression may be detected and this may facilitate treatment. If the study is effective, the wider use of the Sinasprite game could benefit other individuals who experience stress, anxiety, or depression to improve their symptoms. However, no benefit can be guaranteed.<br/></p>
<p><u><b><font color="green">Your rights<br/></font></b></u></p>
<p>We will keep your surveys confidential. If you have questions or concerns about this study, please email <a href="mailto:socks@litesprite.com">socks@litesprite.com</a>.<br/></p> -->


<p><u><b><font color="green">What is Sinasprite?<br/></font></b></u></p>
<p>Sinasprite is our game that helps people manage stress, anxiety, and depression.<br/></p>
<p><u><b><font color="green">Sinasprite sounds cool!  Can I volunteer to be a beta tester?<br/></font></b></u></p>
<p>We love beta testers!  If you would like to participate in our Beta, please make sure that you are 18 years or older, English-speaking, and in possession of a personal phone or tablet for use during the study (note: we don’t yet support the Nook).  If you are using an iPhone or iPad, your device must be running at least iOS 8.<br/></p>
<p><u><b><font color="green">What is the time commitment for participating in your Beta?<br/></font></b></u></p>
<p>The time commitment includes a 15-minute pre-screening questionnaire, a 6-week app pilot study, a 10-minute questionnaire after 6 weeks, and a 10-minute questionnaire after 12 weeks.<br/></p>
<p><u><b><font color="green">What will I receive for my participation?<br/></font></b></u></p>
<p>Beta testers will get free access to a 6-week program that teaches proven stress management techniques, free access to an on-demand self-help tool, and a progress report at the end of the study.
<br/></p>
<p><u><b><font color="green">I signed up for the beta test.  Where do I go from here? <br/></font></b></u></p>
<p>Once you have completed the sign-up form and pre-study survey, check your email for an invitation to join a Google group or a download invite from the iTunes store.  You can download the app through the link on the invite.  If you are using iOS, make sure that you have Testflight installed before downloading the app.
<br/></p>
<p><u><b><font color="green">What is Testflight? <br/></font></b></u></p>
<p>Testflight is an app that allows users to install and beta test apps.  It can be found on the App Store <a href="https://itunes.apple.com/us/app/testflight/id899247664?mt=8">here.</a><br/></p>
<p><u><b><font color="green"> I’ve checked my inbox, but I can’t find my invite.  Where could it be?<br/></font></b></u></p>
<p>Check your spam folder for any lost invites.  If the invite still isn’t there, please let us know!<br/></p>
<p><u><b><font color="green">I have my invite, but Sinasprite still isn’t downloading.  What’s wrong? <br/></font></b></u></p>
<p>Make sure that your device is signed into the same Google or Apple account that you provided to us.  If the problem persists, please contact us.<br/></p>
<p><u><b><font color="green">I’m downloading Sinasprite on my iPhone, but the little download circle is hanging.  What do I do? <br/></font></b></u></p>
<p>If Testflight hangs, exit Testflight and see if there is a Sinasprite icon on your phone.  If there is, try to launch Sinasprite.  Sinasprite could be properly installed even if Testflight is hanging.<br/></p>
<p><u><b><font color="green">I’ve successfully downloaded Sinasprite.  How can I start playing the game? <br/></font></b></u></p>
<p>Just enter your group and client codes, and you’re set!<br/></p>
<p><u><b><font color="green">I have typed in my group and client codes, but nothing happens when I click “Enter.”  What can I do? <br/></font></b></u></p>
<p>The buttons are a little sticky, so you may have to tap the “Enter” key lightly or hit it a couple times to continue.<br/></p>
<p><u><b><font color="green">Some of my friends want to beta test Sinasprite as well.  Where should I direct them? <br/></font></b></u></p>
<p>Tell them to contact <a href="mailto:socks@litesprite.com">socks@litesprite.com</a>!
<br/></p>


		</div>
		<div id="footer">
		<p class="", align="center">Copyright &copy; <a href="http://www.litesprite.com">Litesprite.com</a></p>
		</div>
		<?php echo $debug;?>
	</body>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="../js/jquery.validate.min.js" type="text/javascript"></script> 
</html>
