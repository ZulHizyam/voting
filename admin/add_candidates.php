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
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
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
<body><div class="header">
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
	                          <li><a href="profile.html">Profile</a></li>
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





<div class="col-md-10">
<div class="row">
      <div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <center><h4><b>Add Nominees</b></h4></center><br>
            <?php
            if(isset($_POST['submit'])) {
                $course     = trim($_POST['course']);
                $pos        = trim($_POST['position']);
                $name       = trim($_POST['name']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);

                $insertNominee = new Nominees();
                $rtnInsertNominee = $insertNominee->INSERT_NOMINEE($course, $pos, $name, $year, $stud_id);
            }
            ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <?php
                $readOrg = new Organization();
                $rtnReadOrg = $readOrg->READ_ORG();
                ?>
                
                <div class="form-group-sm">
                    <label for="course">Course</label>
                    <?php if($rtnReadOrg) { ?>
                        <select required name="course" class="form-control" id="org-list" onchange="getPos(this.value);">
                            <option value="">*****Select Course*****</option>
                            <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                <option value="<?php echo $rowOrg['course']; ?>"><?php echo $rowOrg['course']; ?></option>
                            <?php } //End while ?>
                        </select>
                        <?php $rtnReadOrg->free(); ?>
                    <?php } //End if ?>
                </div>
                <?php
                $readPos = new Position();
                $rtnReadPos = $readPos->READ_POS();
                ?>
                <div class="form-group-sm">
                    <label for="position">Position</label>
                    <select required name="position" class="form-control" id="org-list" onchange="getPos(this.value);">
                            <option value="">*****Select Position*****</option>
                            <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                                <option value="<?php echo $rowPos['pos']; ?>"><?php echo $rowPos['pos']; ?></option>
                            <?php } //End while ?>
                        </select>
                        <?php $rtnReadPos->free(); ?>
                </div>
                <div class="form-group-sm">
                    <label for="name">Name</label>
                    <input required type="text" name="name" class="form-control" placeholder="LName, FName MI.">
                </div>
                <div class="form-group-sm">
                    <label for="year">Year</label>
                    <select required name="year" class="form-control">
                        <option value="">*****Select Year*****</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="stud_id">Student ID</label>
                    <input required type="text" name="stud_id" class="form-control">
                </div>
                <hr/>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>
          </div>
    
    

        <?php
        $readNominees = new Nominees();
        $rtnReadNominees = $readNominees->READ_NOMINEE();
        ?>
        <div class="row">
      <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <center><h4><b>List Of Nominees </b></h4></center><br><hr>
            <div class="table-responsive">
                <?php if($rtnReadNominees) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Course</th>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Student ID</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                    <?php while($rowNom = $rtnReadNominees->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowNom['course']; ?></td>
                        <td><?php echo $rowNom['pos']; ?></td>
                        <td><?php echo $rowNom['name']; ?></td>
                        <td><?php echo $rowNom['year']; ?></td>
                        <td><?php echo $rowNom['stud_id']; ?></td>
                        <td><a href="http://localhost/latest/admin/edit_nominee.php?id=<?php echo $rowNom['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="http://localhost/latest/admin/delete_nominee.php?id=<?php echo $rowNom['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadNominees->free(); ?>
                <?php } //end if ?>
            </div>
        </div>
    </div>
</div>
    </div>
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
<?php
//Close database connection
$db->close();