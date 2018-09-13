<?php
//Include authentication
//require("process/auth.php");

//Include database connection
require("./includes/connection.php");

//Include class Voting
require("./classes/Voting.php");
require("./admin/classes/Nominees.php");
require("./admin/classes/Position.php");
require("./admin/classes/Organization.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="homepage.php">Online Voting</a></h1>
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
	                          
	                          <li><a href="index.php">Logout</a></li>
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
                    <li class="current"><a href="voting_page.php"><i class="glyphicon glyphicon-ok"></i> Vote Candidates</a></li>
                    
                </ul>
             </div>
		  </div>
            
                        
        
<div class="voting-con">
        <div class="col-md-10">
            <div class="row">
      <div class="col-md-11">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <center><h4><b>List Of Nominees </b></h4></center><br><hr>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                    <?php
                    $readNominees = new Nominees();
                    $rtnReadNominees = $readNominees->READ_NOMINEE();
                    ?>
                    <?php if($rtnReadNominees) { ?>
                <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <?php
            if(isset($_POST['vote'])) {
                $org            = isset($_POST['course']);
                $candidate_id   = isset($_POST['nominee']);
                $voters_id      = isset($_POST['voters_id']);
                
                $insertVote = new Voting();
                $rtnInsertVote = $insertVote->VOTE_NOMINEE($org, $candidate_id ,$voters_id);
            }

            ?>
                    <tr>
                        <th>Course</th>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Action</th>
                    </tr>   
                    <?php while($rowNom = $rtnReadNominees->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowNom['course']; ?></td>
                        <td><?php echo $rowNom['name']; ?></td>
                        <td><?php echo $rowNom['stud_id']; ?></td>
                        <td><?php 
                    $validateVote = new Voting();
                    $rtnValVote = $validateVote->VALIDATE_VOTE($rowNom['course'],isset($_SESSION['id']));
                    ?>
                        <button type="submit" name="vote"
                                <?php if($rtnValVote->num_rows > 0) { ?>
                                <?php echo "class='btn btn-default disabled'>"; ?>
                                <?php } else { ?>
                                <?php echo "class='btn btn-info'>"; ?>
                                <?php } //End if ?>
                            Vote
                                
                                
                        </button>      
                        </td>
                    </tr>
                    
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadNominees->free(); ?>
                <?php } //end if ?>
            </div>
                </form>
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
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    
    <script src="./js/custom.js"></script>

</body>
</html>