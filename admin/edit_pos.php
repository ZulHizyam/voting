<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Organization
require("./classes/Organization.php");

//Include class Position
require("./classes/Position.php");

//Include Navbar
require("../includes/navigation.php");

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
    </head>
    <body>

    


    <div class="container">
        <div class="row">
            <div class="col-md-9">
	  					<div class="content-box-large">
			  				<div class="panel-heading">

                <?php
                if(isset($_POST['update'])) {
                    $position       = trim($_POST['position']);
                    $position_id    = trim($_POST['pos_id']);

                    $updatePos = new Position();
                    $rtnUpdatePos = $updatePos->UPDATE_POS($position, $position_id);
                }
                ?>

                <center><h4><b>Edit Positions</b></h4></center><br>

                <?php
                if(isset($_GET['id'])) {
                    $pos_id = trim($_GET['id']);

                    $editPos = new Position();
                    $rtnEditPos = $editPos->EDIT_POS($pos_id);
                }
                ?>

                <?php if($rtnEditPos) { ?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                    <?php while($rowEditPos = $rtnEditPos->fetch_assoc()) { ?>
                    <div class="form-group-sm">
                        <label for="position">Position</label>
                        <input required type="text" name="position" value="<?php echo $rowEditPos['pos']; ?>" class="form-control">
                    </div><br>
                    
                    <div class="form-group-sm">
                        <input type="hidden" name="pos_id" value="<?php echo $rowEditPos['id']; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </div>
                    <?php } //End while ?>
                </form>
                <?php $rtnEditPos->free(); ?>
                <?php } //End if ?>
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