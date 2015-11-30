var json_data;

$(document).ready(function() {
	$.ajax({
	  type: "GET",
	  dataType: "json",
	  url: "usageData.php", //Relative or absolute path to response.php file
	  success: function(data){
	    json_data = data;
	  },
	  error: function(err, f){
	  	console.log("error");
	    console.log(err);
	  }
	}).done(function() {
		var data = getAverages(json_data, avg);
		var lineGen = d3.svg.line()
					.x(function (d) {
						return xScale(d.week);
					})
					.y(function (d) {
						return yScale(d.usage);
					});
	    createGraph(data, "Sinasprite Average Usage Over Time", "Week", "Usage", lineGen);

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
		for (var j = 0; j < data[i].length; j++) {
			avg[j].usage += data[i][j].usage;
		}
	}

	//divide them
	for (i = 0; i < avg.length; i++) {
		avg[i].usage /= data.length;
	}
	return avg;
	//return avg;
}

function createGraph(data, title, xName, yName, lineGen) {
	var graph = d3.select('#graph'),
	MARGINS = {top:80, right:80, bottom:80, left:80},
	WIDTH = 1000,
	HEIGHT = 600,
	//FIND MAX and MIN
	xScale = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right])
				.domain([0,12]),
	yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom])
				.domain([0,25]),
	//create axis using scale
	xAxis = d3.svg.axis().scale(xScale),
	yAxis = d3.svg.axis().scale(yScale).orient("left");
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
	    .attr("y", HEIGHT - (MARGINS.bottom / 2))
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
	    .attr("y", MARGINS.left / 2)
	    .attr("dy", ".75em")
	    .attr("transform", "rotate(-90)")
	    .text(yName);

	// var lineGen = d3.svg.line()
	// 				.x(function (d) {
	// 					return xScale(d.week);
	// 				})
	// 				.y(function (d) {
	// 					return yScale(d.usage);
	// 				});
	//draw line
	graph.append("svg:path")
			.attr("d", lineGen(data))
			.attr("stroke", "green")
			.attr("stroke-width", 2)
			.attr("fill", "none");
	//append title
	graph.append("text")
		.attr("class", "title")
		.attr("text-anchor", "middle")
		.attr("x", WIDTH / 2)
		.attr("y", MARGINS.top)
		.text("Sinasprite 12 Week Average Usage Timeline");

}
