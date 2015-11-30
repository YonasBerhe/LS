<?php

$home_current = null;

if (isset($args[0])) {
	switch ($args[0]) {
		case '':
			$home_current = "focus";
			break;

		case 'reports':
			$reports_current = "focus";
			break;
		
		case 'alerts':
			$alerts_current = "focus";
			break;

		case 'positions':
			$positions_current = "focus";
			break;

		case 'watchlists':
			$watchlists_current = "focus";
			break;

		case 'faq':
			$faq_current = "focus";
			break;

		case 'about':
			$about_current = "focus";
			break;

		case 'contact':
			$contact_current = "focus";
			break;
		
		case 'chat':
			$chat_current = "focus";
			break;

		default:
			break;
	}
} else {
	$home_current = "focus";
}

if (isset($_SESSION['user_key'])) {
//members
$header_public = <<<EOD
	<ul class="header_public_ul">
		<li class="header_public_li">
			<a href="/reports" class="nav{$home_current}">Home</a>
		</li>
		<li class="header_public_li">
			<a href="/reports" class="nav{$reports_current}">Reports</a>
		</li>
		<li class="header_public_li_last">
			<a href="/logout.php" class="nav{$contact_current}">Log Out</a>
		</li>
	</ul>

EOD;
} else {
//public
$header_public = <<<EOD
	<ul class="header_public_ul">
		<li class="header_public_li_last">
			<a href="/" class="nav{$home_current}">Litesprite.com</a>
		</li>
	</ul>

EOD;
}

session_start();
if(isset($_SESSION["user_first_name"])){
	$user_first_name = $_SESSION["user_first_name"];
} else {
	$user_first_name = '';
}
if(isset($_SESSION['organization_name'])) {
	$organization_name = $_SESSION['organization_name'];
} else {
	$organization_name = '';
}
#$header .=
$header = <<<EOD
<div class="topbar">

	<div id="header_user">{$organization_name} : {$user_first_name}</div>
	<div id="header_public">{$header_public}</div>
</div>
<div id="header">
	<div class="title">
		<img class="logo" src="https://litesprite.com/images/litesprite.png"/>
		<div class="titletext">Litesprite Reporting System</div>
	</div>
</div>

EOD;
?>