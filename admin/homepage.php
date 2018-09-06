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

  </head>
  <body>
  	<div class="col-md-10">
    <div class="row">
        <div class="col-md-11">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
                                <center><h1>Vote Statistic</h1></center>
                                <div style="width: 90%;"></div>
<canvas id="lineChart" height="130" width=""></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="../js/main.js"></script>
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