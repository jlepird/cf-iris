<!DOCTYPE html> 

<html> 
<head>
<link rel="stylesheet" href="./include/uswds-0.14.0/css/uswds.min.css">
<link rel="stylesheet" href="./include/dc.css">
<script type="text/javascript" src="./include/d3.js"></script>
<script type="text/javascript" src="./include/crossfilter.js"></script>
<script type="text/javascript" src="./include/dc.js"></script>
</head>
<body>
<script src="./include/uswds-0.14.0/js/uswds.min.js"></script>


<h1> Hello, world! </h1>

<div id = "species"> </div>
<div id = "petalL"> </div>



<script type="text/javascript">
	d3.csv("./iris.csv", function(data){

		var iris = crossfilter(data);

		var species = iris.dimension(function(d){
			return d.Species;
		});

		var speciesGroup = species.group();

		dc.pieChart("#species")
		  .width(200)
		  .height(200)
		  .dimension(species)
		  .group(speciesGroup);

	    var petalL = iris.dimension(function(d){
	    	console.log(d["Petal.Length"]);
	    	return d["Petal.Length"];
	    });
	    var petalLGroup = petalL.group();

		dc.rowChart("#petalL")
		  .width(400)
		  .height(400)
		  .dimension(petalL)
		  .group(petalLGroup);

		dc.renderAll();
	});
</script>

</body>
</html>