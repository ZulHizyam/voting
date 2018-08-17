<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Organization
require("./classes/Organization.php");

//Include Navbar
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
      
      
      <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                if(isset($_GET['id'])) {
                    $org_id = trim($_GET['id']);

                    echo "<div class='alert alert-danger'>Are you sure you want to delete selected course? <a href='http://localhost/latest/admin/del_org.php?del_id=$org_id'>Yes</a> | <a href='http://localhost/latest/admin/add_pos_org.php'>No</a></div>";
                }


                if(isset($_GET['del_id'])) {
                    $id_to_del = $_GET['del_id'];

                    $delOrg = new Organization();
                    $rtnDelOrg = $delOrg->DELETE_ORG($id_to_del);
                }
                ?>
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
    