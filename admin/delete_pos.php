<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Position
require("classes/Position.php");

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
            <div class="col-md-4 col-md-offset-4">
                <?php
                if(isset($_GET['id'])) {
                    $pos_id = trim($_GET['id']);

                    echo "<div class='alert alert-danger'>Are you sure you want to delete selected position? <a href='http://localhost/latest/admin/delete_pos.php?del_id=$pos_id'>Yes</a> | <a href='http://localhost/latest/admin/add_pos.php'>No</a></div>";
                }


                if(isset($_GET['del_id'])) {
                    $id_to_del = $_GET['del_id'];

                    $delPos = new Position();
                    $rtnDelPos = $delPos->DELETE_POS($id_to_del);
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