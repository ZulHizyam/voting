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
                    <li class="current"><a href="add_candidates.php"><i class="glyphicon glyphicon-user"></i> Add Candidates</a></li>
                    <li><a href="add_voters.php"><i class="glyphicon glyphicon-user"></i> Add Voters</a></li>
                    <li><a href="vote_result.php"><i class="glyphicon glyphicon-ok"></i> Vote Result</a></li>
                </ul>
             </div>
		  </div>

    <script>
        function getPos(val) {
            $.ajax({
                type: "POST",
                url: "get_pos.php",
                data: 'course='+val,
                success: function(data) {
                    $("#pos-list").html(data);
                }
            });
        }
    </script>
</head>
<body>






<div class="col-md-10">
    <div class="row">
        <div class="col-md-11">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <?php
            if(isset($_POST['update'])) {
                $course     = trim($_POST['course']);
                $pos        = trim($_POST['position']);
                $name       = trim($_POST['name']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);
                $nominee_id = trim($_POST['nom_id']);

                $updateNominee = new Nominees();
                $rtnUpdateNominee = $updateNominee->UPDATE_NOMINEE($course, $pos, $name, $year, $stud_id, $nominee_id);

            }
            ?>
            <h4>Edit Nominee</h4><hr>

            <?php
            if(isset($_GET['id'])) {
                $nom_id = trim($_GET['id']);

                $editNominee = new Nominees();
                $rtnEditNominee = $editNominee->EDIT_NOMINEE($nom_id);
            }
            ?>

            <?php if($rtnEditNominee) { ?>
                <?php while($rowNominee = $rtnEditNominee->fetch_assoc()) { ?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                    <?php
                    $readOrg = new Organization();
                    $rtnReadOrg = $readOrg->READ_ORG();
                    ?>
                    <div class="form-group-sm">
                        <label for="course">Course</label>
                        <?php if($rtnReadOrg) { ?>
                            <select required name="course" class="form-control" id="org-list" onchange="getPos(this.value);">
                                <option value="<?php echo $rowNominee['course']; ?>"><?php echo $rowNominee['course']; ?></option>
                                <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                    <option value="<?php echo $rowOrg['course']; ?>"><?php echo $rowOrg['course']; ?></option>
                                <?php } //End while ?>
                            </select>
                            <?php $rtnReadOrg->free(); ?>
                        <?php } //End if ?>
                    </div>
                    <div class="form-group-sm">
                        <label for="position">Position</label>
                        <select required name="position" class="form-control" id="pos-list">
                            <option value="<?php echo $rowNominee['pos']; ?>"><?php echo $rowNominee['pos']; ?></option>
                        </select>
                    </div>
                    <div class="form-group-sm">
                        <label for="name">Name</label>
                        <input required type="text" name="name" class="form-control" value="<?php echo $rowNominee['name']; ?>">
                    </div>
                    <div class="form-group-sm">
                        <label for="year">Year</label>
                        <select required name="year" class="form-control">
                            <option value="<?php echo $rowNominee['year']; ?>"><?php echo $rowNominee['year']; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group-sm">
                        <label for="stud_id">Student ID</label>
                        <input required type="text" name="stud_id" class="form-control" value="<?php echo $rowNominee['stud_id']; ?>">
                    </div>
                    <hr/>
                    <div class="form-group-sm">
                        <input type="hidden" name="nom_id" value="<?php echo $rowNominee['id']; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </div>
                </form>
                <?php } //End while ?>
                <?php $rtnEditNominee->free(); ?>
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