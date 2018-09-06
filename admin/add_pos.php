<?php
require ("../includes/connection.php");
require("./classes/Position.php");

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
                    <li class="current"><a href="add_pos.php"><i class="glyphicon glyphicon-user"></i> Add Position</a></li>
                    <li><a href="add_candidates.php"><i class="glyphicon glyphicon-user"></i> Add Candidates</a></li>
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
            <center><h4><b>Add Position</b></h4></center><br>
            <?php

            if(isset($_POST['submit'])) {
                $pos = trim($_POST['position']);
                $insertPos = new Position();
                $rtnInsertPos = $insertPos->INSERT_POS($pos);
            }
            ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <div class="form-group-sm">
                    <label for="position">Position</label>
                    <input required type="text" name="position" class="form-control">
                </div><hr>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>
        </div>
        </div>

     <?php
        $readPos = new Position();
        $rtnReadPos = $readPos->READ_POS();
        ?>
        
  				<div class="col-md-5">
                    <div class="row">
                    
  					<div class="content-box-large">
		  				<div class="panel-heading">
                         <center><h4><b>List Of Positions</b></h4></center><br>
            <div class="table-responsive">
                <?php if($rtnReadPos) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>

                        <th>Position</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                    <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowPos['pos']; ?></td>
                        <td><a href="http://localhost/latest/admin/edit_pos.php?id=<?php echo $rowPos['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="http://localhost/latest/admin/delete_pos.php?id=<?php echo $rowPos['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadPos->free(); ?>
                <?php } //End if ?>
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
    </body>
</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../js/custom.js"></script>
<?php
//Close database connection
$db->close();