<?php 
require_once("include/config.inc.php");
require_once('include/mysqli.inc.php');
require_once("include/utils.inc.php");
require_once('include/header.php');
require_once('include/footer.php');


$total = 0;
// echo isset($_SESSION['user_key'])."<br/>";
// echo strlen($_SESSION['user_key'])."<br/>";

if ((isset($_SESSION['user_key']) == false) || (strlen($_SESSION['user_key']) < 1)) {
	header('Location: /login');
}

if (strlen($args[1]) < 1) {
    $survey_id = 1;
} else {
    $survey_id = $args[1];
}
	//Validate the user
	$sql = "CALL rptUsageTimeline();";
	//echo $sql.'<br/>';
	 
	$Result = execute_query($mysqli, $sql);		
	if ($Result) {
		while ($row = $Result[0]->fetch_assoc()) {
			$client_key = $row['client_key'];
			$gender = $row['gender'];
			$age = $row['age'];
			$startdate = $row['startdate'];			
			$week6date = $row['week6date'] ;
			$activityw1a = $row['activityw1a'];
			$date1a = $row['date1a'];
			$activityw1b = $row['activityw1b'];
			$date1b = $row['date1b'];
			$activityw2 = $row['activityw2'];
			$date2 = $row['date2'];
			$activityw3 = $row['activityw3'];
			$date3 = $row['date3'];
			$activityw4 = $row['activityw4'];
			$date4 = $row['date4'];
			$activityw5 = $row['activityw5'];
			$date5 = $row['date5'];
			$activityw6  = $row['activityw6'];
			$date6 = $row['date6'];
			$activityw7 = $row['activityw7'];
			$date7 = $row['date7'];
			$activityw8 = $row['activityw8'];
			$date8 = $row['date8'];
			$activityw9 = $row['activityw9'];
			$date9 = $row['date9'];
			$activityw10 = $row['activityw10'];
			$date10 = $row['date10'];
			$activityw11 = $row['activityw11'];
			$date11 = $row['date11'];
			$activityw12 = $row['activityw12'];
			$date12 = $row['date12'];
			$activityextended = $row['activityextended'];
			$currenttime = $row['currenttime'];
			$total = $row['total'];
			$maxextended =  $row['maxextended'];
			$device = '';
			if($row['device'] == 'A') {
				$device = 'Android';
			} else if ($row['device'] == 'I') {
				$device = 'iOS';
			}
			
$date6x = date_create($date6 );
$maxextendedx = date_create($maxextended);
$interval = date_diff($date6x, $maxextendedx);
$interval = $interval->format('%R%a days');

$date12x = date_create($date12);
$interval12 = date_diff($date12x, $maxextendedx);
$interval12 = $interval12->format('%R%a days');

$report_data .= <<<EOD
	<tr>
		<td class="left" style="width: 80px;">{$client_key}</td>
		<td class="center" style="width: 80px;">{$gender}</td>
		<td class="center" style="width: 60px;">{$age}</td>
		<td class="center" style="width: 60px;">{$device}</td>
		<td class="center" style="width: 100px;">{$startdate}</td>
		<td class="center">{$date1a}</td>
		<td class="center">{$date1b}</td>
		<td class="center">{$date2}</td>
		<td class="center">{$date3}</td>
		<td class="center">{$date4}</td>
		<td class="center">{$date5}</td>
		<td class="center">{$date6}</td>
		<td class="center">{$date7}</td>
		<td class="center">{$date8}</td>
		<td class="center">{$date9}</td>
		<td class="center">{$date10}</td>
		<td class="center">{$date11}</td>		
		<td class="center">{$date12}</td>
		<td class="center">{$currenttime}</td>
		<td colspan="1"></td>
		<td class="center">{$maxextended}</td>
	</tr>
	<tr>
		<td colspan="5"></td>
		<td class="center">{$activityw1a}</td>
		<td class="center">{$activityw1b}</td>
		<td class="center">{$activityw2}</td>
		<td class="center">{$activityw3}</td>
		<td class="center">{$activityw4}</td>
		<td class="center">{$activityw5}</td>
		<td class="center">{$activityw6}</td>
		<td class="center">{$activityw7}</td>
		<td class="center">{$activityw8}</td>
		<td class="center">{$activityw9}</td>
		<td class="center">{$activityw10}</td>
		<td class="center">{$activityw11}</td>
		<td class="center">{$activityw12}</td>
		<td class="center">{$activityextended}</td>
		<td class="center">{$total}</td>
		<td class="center">{$interval}<br>{$interval12}</td>
	</tr>
EOD;
						$total++;
		}
	}

$additionalCSS .= <<<EOD
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"/>   
EOD;


$additionalJS.= <<<EOD
	<script src="http://d3js.org/d3.v3.js"></script>
    <script type='text/javascript' src="../js/reports.js"></script>
EOD;

$body .= <<<EOD
    <style type="text/css" id="css">
      body, .colmask .fullpage, .col1 .center,.fullpage .col1, .reporting, .reporting table, .colmask {
      	overflow-x: visible;
      	width: auto;
      	left:auto;
      }
		.axis path {
			fill:none;
			stroke:#777;
			shape-rendering: crispEdges;
		}
		.axis text {
			font-family: Lato;
    		font-size: 13px;
		}
    </style>
	{$header}
	
	<div class="center">
	   <div class="backlink">
			<a href="/reports">[ View all Reports ]</a>
		</div>
		<div class="pagetitle">
		    <h1>Sinasprite Pilot Usage Timeline</h1>
		</div>
	</div>
    <div class="colmask fullpage" >
        <div class="col1 center">
            <!-- Column 1 start -->
 			
            <ul class="nav nav-tabs"> 
				<li role="presentation" class="active"><a href="#">Table</a></li>
				<li role="presentation"><a href="#">Graphs</a></li>
			</ul>
            <div class="reporting"> 
				<table class="smalltext" id="table">
	                <tr>
	                    <td colspan="30" class="titlerow">Usage timeline by player. (All Meditation, Oracle, Journal, Gallery Activities)</td>
	                </tr>
					<tr>
						<th>Client Key</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Device</th>
						<th>Start</th>
						<th>3rd Day</th>
						<th>Week 1</th>
						<th>Week 2</th>
						<th>Week 3</th>
						<th>Week 4</th>
						<th>Week 5</th>
						<th>Week 6</th>
						<th>Week 7</th>
						<th>Week 8</th>
						<th>Week 9</th>
						<th>Week 10</th>
						<th>Week 11</th>
						<th>Week 12</th>
						<th>Today</th>
						<th>Total</th>
						<th>Last Used</th>
						
					</tr>
				{$report_data}
				</table>
				<div id="graph-div">
					<div class="container panel panel-success">
						<div class="panel-heading"> <h4 class="panel-title">Graphs Settings</h4></div>
						  <div class="panel-body">
						  	<label>Add and Remove Graphs</label> <br><br>
							<input type="text" id="client_key" name="client_key" maxlength="10" placeholder="client key" width=10> 
							<button class="btn btn-default" id="add-graph">Add</button>
							<button class="btn btn-default" id="remove">Remove Selected</button>
							<button class="btn btn-default active" id="show-average">Show Average</button>
							<br><br>
							<div class="alert alert-danger" role="alert" hidden="true" id="key-invalid" style="padding:2px; margin: auto; width:20em;">Invalid Client Key</div>
							<div id="current-graphs" style="">
							</div>
						</div>
					</div>
					<svg id="graph" width="1000" height="600"></svg>

				</div>
			</div>
            <!-- Column 1 end -->
        </div>
    </div>
    <div class="colmask fullpage" id="graph">
    </div>
    {$footer}
EOD;

?>