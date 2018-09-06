<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Organization
require("./classes/Organization.php");

//Include class Position
require("./classes/Position.php");

//Include class Nominees
require("./classes/Nominees.php");



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
    <div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Online Voting</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.php">Profile</a></li>
	                          <li><a href="../admin">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="homepage.php"><i class="glyphicon glyphicon-home"></i> Homepage</a></li>
                    <li><a href="add_pos_org.php"><i class="glyphicon glyphicon-list"></i> List Of Course</a></li>
                    <li><a href="add_pos.php"><i class="glyphicon glyphicon-user"></i> Add Position</a></li>
                    <li><a href="add_candidates.php"><i class="glyphicon glyphicon-user"></i> Add Candidates</a></li>
                    <li><a href="add_voters.php"><i class="glyphicon glyphicon-user"></i> Add Voters</a></li>
                    <li class="current"><a href="vote_result.php"><i class="glyphicon glyphicon-ok"></i> Vote Result</a></li>
                </ul>
             </div>
		  </div>
<body>
    <div class="col-md-10">
                <div class="row">
  				<div class="col-md-11">
  					<div class="content-box-large">
		  				<div class="panel-heading">
                            <center><h4><b>Vote Result</b></h4></center><br>
                        <?php
                        $readNom = new Nominees();
                        $rtnReadNom = $readNom->READ_NOMINEE();
                        ?>

                        <div class="table-responsive">
                            <?php if($rtnReadNom) { ?>
                            <table class="table table-condensed table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                                <?php while($rowCountVotes = $rtnReadNom->fetch_assoc()) { ?>




                                    <?php
                                    $countVotes = new Nominees();
                                    $rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id'])
                                    ?>
                                    <tr>
                                        <td style="width: 20%;"><?php echo $rowCountVotes['id']; ?></td>
                                        <td style="width: 60%;"><?php echo $rowCountVotes['name']; ?></td>
                                        <td style="width: 10%;"><?php echo $rtnCountVotes->num_rows; ?></td>
                                    </tr>





                                <?php } //End while ?>
                            </table>
                            <?php $rtnReadNom->free(); } //End if ?>
                        </div>

    

        







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../js/custom.js"></script>

</body>
</html>