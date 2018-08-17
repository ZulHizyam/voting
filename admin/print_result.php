<?php

//Include authentication
//require("process/auth.php");

//Include database connection
require("../includes/connection.php");

//Include class Organization
require("classes/Organization.php");

//Include class Position
require("classes/Position.php");

//Include class Nominees
require("classes/Nominees.php");

//Include Navbar
require("../includes/navigation.php");

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Result</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>





<div class="container">
    <div class="row">

        
                <div class="logo-title">

                    <table>
                        <tr>
                            <td><img src="../assets/img/LOGO%20JTM.png" style="width:90px;height:110px;"></td>
                            <td><br/>
                                <p style="text-align: left;">
                                    <b>INSTITUT LATIHAN PERINDUSTRIAN KUALA LUMPUR</b><br />
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php
                $readPos = new Position();
                $rtnReadPos = $readPos->READ_POS_BY_ORG($org);
                ?>

                <?php if($rtnReadPos) { ?>

                    <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>

                        <?php
                        $readNomOrgPos = new Nominees();
                        $rtnReadNomOrgPos = $readNomOrgPos->READ_NOM_BY_ORG_POS($org, $rowPos['pos']);
                        ?>

                        <div class="table-responsive">
                            <?php if($rtnReadNomOrgPos) { ?>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Votes</th>
                                    </tr>
                                    <?php while($rowCountVotes = $rtnReadNomOrgPos->fetch_assoc()) { ?>




                                        <?php
                                        $countVotes = new Nominees();
                                        $rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id'])
                                        ?>
                                        <tr>
                                            <td style="width: 20%;"><?php echo $rowCountVotes['id']; ?></td>
                                            <td style="width: 70%;"><?php echo $rowCountVotes['name']; ?></td>
                                            <td style="width: 10%;"><?php echo $rtnCountVotes->num_rows; ?></td>
                                        </tr>





                                    <?php } //End while ?>
                                </table>
                                <?php $rtnReadNomOrgPos->free(); } //End if ?>
                        </div>

                    <?php } //End while ?>

                    <?php $rtnReadPos->free(); } //End if ?>

            
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