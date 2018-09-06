<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Voters
require("./classes/Voters.php");



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
<body>
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
                    <li class ="current"><a href="add_voters.php"><i class="glyphicon glyphicon-user"></i> Add Voters</a></li>
                    <li><a href="vote_result.php"><i class="glyphicon glyphicon-ok"></i> Vote Result</a></li>
                </ul>
             </div>
		  </div>






<div class="col-md-10">
      <div class="row">
      <div class="col-md-6 col-md-offset-2">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <?php
            if(isset($_POST['update'])) {
                $name       = trim($_POST['name']);
                $course     = trim($_POST['course']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);
                $voter_id   = trim($_POST['voter_id']);

                $updateVoter = new Voters();
                $rtnUpdateVoter = $updateVoter->UPDATE_VOTER($name, $course, $year, $stud_id, $voter_id);

            }
            ?>
            <h4>Edit Voter</h4><hr>
            <?php
            if(isset($_GET['id'])) {
                $id = trim($_GET['id']);

                $editVoter = new Voters();
                $rtnEditVoter = $editVoter->EDIT_VOTER($id);
            }
            ?>

            <?php if($rtnEditVoter) { ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <?php while($rowVoter = $rtnEditVoter->fetch_assoc()) { ?>
                <div class="form-group-sm">
                    <label for="name">Name</label>
                    <input required type="text" name="name" class="form-control" placeholder="LName, FName MI." value="<?php echo $rowVoter['name']; ?>">
                </div>
                <div class="form-group-sm">
                    <label for="course">Course</label>
                    <select required name="course" class="form-control">
                        <option value="<?php echo $rowVoter['course']; ?>"><?php echo $rowVoter['course']; ?></option>
                        <option value="TKS">TKS</option>
                        
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="year">Year</label>
                    <select required name="year" class="form-control">
                        <option value="<?php echo $rowVoter['year']; ?>"><?php echo $rowVoter['year']; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="stud_id">Student ID </label>
                    <input required type="text" name="stud_id" class="form-control" value="<?php echo $rowVoter['stud_id']; ?>">
                </div><hr>
                <div class="form-group-sm">
                    <input type="hidden" name="voter_id" value="<?php echo $rowVoter['id']; ?>">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
                <?php } //End while ?>
            </form>
                <?php $rtnEditVoter->free(); ?>
            <?php } //End if ?>
        </div>
    </div>
</div>
    </div>
    </div>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../js/custom.js"></script>

</body>
</html>