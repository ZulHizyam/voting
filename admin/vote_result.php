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

//Include Navbar
require("../includes/navigation.php");

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
    <div class="col-md-10">
                <div class="row">
  				<div class="col-md-11">
  					<div class="content-box-large">
		  				<div class="panel-heading">
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