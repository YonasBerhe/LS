var json_data,
	COLOR = ["orange", "blue", "red", "purple", "yellow"],
	MARGINS = {top:40, right:40, bottom:40, left:40},
	WIDTH = 1000,
	HEIGHT = 600,
 	XRANGE = new Range(0,12),
	YRANGE = new Range(0,25),
	graphs = 0,
	GRAPH_LIMIT = 20,
	maxY = 0
	INVALID_KEY = "Client Key Invalid",
	LIMIT_REACHED = "Graph limit reached, please remove a graph to add a new one";

$(document).ready(function() {
	//$('#graph').attr("display", "none");
	$('#graph-div').prop("hidden", true);
	$(".nav-tabs > li").click( function (e) {
		$(".nav-tabs > li ").removeClass("active");
		$(e.target).parent().addClass("active");
		//console.log($(e.target).text());
		if($(e.target).text() === 'Table') {
			$("#table").prop("hidden", false);
			$('#graph-div').prop("hidden", true);
			//$('#graph').attr("display", "none");
		} else if($(e.target).text() === 'Graphs') {
			$("#table").prop("hidden", true);
			$('#graph-div').prop("hidden", false);
			//$('#graph').removeAttr("display");
		}
	});

	$('#remove').click(function (e) {
		var checked = $('#current-graphs > div > input:checked');
		for (var i = 0; i < checked.length; i++) {
			var key = checked.val().trim(); 
			console.log('key: ' + key);
			$(checked[i]).parent().remove();
			d3.select('#graph-'+key).remove();
			graphs--;
		}
	});

	$('#show-average').click(function (e){
		if($(e.target).hasClass('active')){
			$(e.target).removeClass('active');
			$("#average").attr("display", "none");
		} else {		
			$(e.target).addClass('active');
			$("#average").removeAttr("display");
		}
		$(e.target).blur();
	});

	$('#add-graph').click(function (e) {
		$("#key-invalid").prop('hidden', true);
		var key = $("#client_key").val().trim();
		var index = getClientIndex(key);

		//console.log("index:" + index);
		if( index > -1) {
			if(graphs < GRAPH_LIMIT){
				var color = randColor();
				var line = createLine(XRANGE, YRANGE, WIDTH, HEIGHT, MARGINS, color, "week", "usage");
				var d = json_data[index];
				d = d.slice(1,d.length);
				console.log(d);
				appendLine(d3.select('#graph'), key, line, d);
				$("#current-graphs").append('<div id="'+key+'"><input type="checkbox" value="'+key+'"> '+ key+ ' <div class="color-sq" style="background-color:'+color+'"></div></div>');
				graphs ++;
			} else {
				$("#key-invalid").text(LIMIT_REACHED);
				$("#key-invalid").prop('hidden', false);
			}
		} else {
			$("#key-invalid").text(INVALID_KEY);
			$("#key-invalid").prop('hidden', false);
		}
	});

	$.ajax({
	  type: "GET",
	  dataType: "json",
	  url: "./pages/reportdata/usageData.php", //Relative or absolute path to response.php file
	  success: function(data){
	    json_data = data;
	  },
	  error: function(err, f){
	  	console.log("error");
	    console.log(err);
	  }
	}).done(function() {
		var data = getAverages(json_data);
		var line = createLine(XRANGE, YRANGE, WIDTH, HEIGHT, MARGINS, "green", "week", "usage");
		createGraph(data, "Sinasprite Usage Over First 12 Weeks", "Week", "Usage", 
	    	HEIGHT, WIDTH, MARGINS, line);
	});

});



function getAverages(data) {
	var avg = [
		{week:0.5, usage:0},
		{week:1, usage:0},
		{week:2, usage:0},
		{week:3, usage:0},
		{week:4, usage:0},
		{week:5, usage:0},
		{week:6, usage:0},
		{week:7, usage:0},
		{week:8, usage:0},
		{week:9, usage:0},
		{week:10, usage:0},
		{week:11, usage:0},
		{week:12, usage:0}
	];

	//add them up
	for (var i = 0; i < data.length; i++) {
		//console.log(i);
		// data[i][0] is the client key
		for (var j = 1; j < data[i].length; j++) {
			//console.log(""+ avg[j-1].usage + " += " + data[i][j].usage);
			if(data[i][j].usage > maxY) maxY = data[i][j].usage;
			avg[j-1].usage += data[i][j].usage;
		}
	}

	//divide them
	for (i = 0; i < avg.length; i++) {
		//console.log(avg[i].usage +" /= " +data.length);
		avg[i].usage /= data.length;
	}
	YRANGE = new Range(0, maxY);
	return avg;
	//return avg;
}

//returns index of data for a client key, or -1 if it doesn't exist
function getClientIndex(key) {
	//console.log("key = " + key);
	for(var i = 0; i < json_data.length; i++) {
		//console.log (''+json_data[i][0].client_key);
		if(json_data[i][0].client_key === key) {
			return i;
		}
	}
	return -1;
}

function createGraph(data, title, xName, yName, HEIGHT, WIDTH, MARGINS, line) {
	$("#graph").prop("width", WIDTH);
	$("#graph").prop("height", HEIGHT);
	var graph = d3.select('#graph'),

	//FIND MAX and MIN

	//create axis using scale
	xAxis = d3.svg.axis().scale(line.xScale),
	yAxis = d3.svg.axis().scale(line.yScale).orient("left");
	//append x axis to graph
	graph.append("svg:g")
			.attr("class","axis")
			.attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
			.call(xAxis);
	//append x axis label
	graph.append("text")
	    .attr("class", "x label")
	    .attr("text-anchor", "middle")
	    .attr("x", WIDTH / 2)
	    .attr("y", HEIGHT)
	    .text(xName);
	//append y axis to graph
	graph.append("svg:g")
			.attr("class","axis")
			.attr("transform", "translate("+(MARGINS.left)+",0)")
			.call(yAxis);
	//append y axis label
	graph.append("text")
	    .attr("class", "y label")
	    .attr("text-anchor", "middle")
	    .attr("x", HEIGHT / 2 * -1)
	    .attr("y", 0)
	    .attr("dy", ".75em")
	    .attr("transform", "rotate(-90)")
	    .text(yName);
	//draw line
	graph.append("svg:path")
			.attr("d", line.lineGen(data))
			.attr("stroke", "green")
			.attr("id", "average")
			.attr("stroke-width", 2)
			.attr("fill", "none");
	//append title
	graph.append("text")
		.attr("class", "title")
		.attr("text-anchor", "middle")
		.attr("x", WIDTH / 2)
		.attr("y", MARGINS.top)
		.text(title);

}

// attach a line to a existing graph
function appendLine(graph, ID, line, data) {
	graph.append("svg:path")
		.attr("d", line.lineGen(data))
		.attr("id", "graph-"+ID)
		.attr("stroke", line.color)
		.attr("stroke-width", 2)
		.attr("fill", "none");
}

function Range (min, max) {
	this.min = min;
	this.max = max;	
}

/**
 * generate / store all info pertaining to a specific line 
**/
function createLine (xRange, yRange, WIDTH, HEIGHT, MARGINS, color, xName, yName) {
	var line = {};
	line.xScale = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right])
				.domain([xRange.min, xRange.max]);
	line.yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom])
					.domain([yRange.min, yRange.max]);
	line.xName = xName;
	line.yName = yName;
	line.lineGen = d3.svg.line()
					.x(function (d) {
						return line.xScale(d[xName]);
					})
					.y(function (d) {
						return line.yScale(d[yName]);
					});
	line.color = color;
	console.log(line);
	return line;
}



function createPie() {
}
	
function randColor() {
	var r = Math.floor(Math.random() * 256),
	g = Math.floor(Math.random() * 256),
	b = Math.floor(Math.random() * 256);
	return "rgb(" + r + "," + g + "," + b + ")";
}