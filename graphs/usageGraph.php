<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/litesprite.css" media="screen" />
	<style type="text/css" id="css">
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
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://d3js.org/d3.v3.js"></script>
	<script type='text/javascript' src="./script.js"></script>

</head>
<body>

	<div class="container">
		<div id="json"></div>
		<svg id="graph" width="1000" height="600"></svg>
	</div>


</body>
</html>