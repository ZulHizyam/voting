<?php

require("../includes/connection.php");
require("../includes/navigation.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Online Voting System</title>
      
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  </head>
  <body>
                               
           
      
  	<div class="col-md-10">
    <div class="row">
        <div class="col-md-11">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
<center><h1>Vote Statistic</h1></center>
<div id="donut-example"></div>
<div id="legend" class="donut-legend"></div>
    <script>
    var Data= [
    {label: "Voted", value: 350},
    {label: "Not Vote", value: 650},
  ];
 var total = 1000;
var browsersChart = Morris.Donut({
  element: 'donut-example',
  data: Data,
  formatter: function (value, data) { 
  	return Math.floor(value/total*100) + '%'; 
  }
});

        </script>
                            </div>
            </div>
        </div>
        </div>
      </div>
     

  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="vendors/morris/morris.css">


    <script src="../vendors/jquery.knob.js"></script>
    <script src="../vendors/raphael-min.js"></script>
    <script src="../vendors/morris/morris.min.js"></script>

    <!-- <script src="../vendors/flot/jquery.flot.js"></script> -->
    <script src="../vendors/flot/jquery.flot.categories.js"></script>
    <script src="../vendors/flot/jquery.flot.pie.js"></script>
    <script src="../vendors/flot/jquery.flot.time.js"></script>
    <script src="../vendors/flot/jquery.flot.stack.js"></script>
    <script src="../vendors/flot/jquery.flot.resize.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/stats.js"></script>
  </body>
</html>