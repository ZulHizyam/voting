<?php
//Start session
session_start();

unset($_SESSION['ID']);
unset($_SESSION['NAME']);
unset($_SESSION['COURSE']);
unset($_SESSION['YEAR']);
unset($_SESSION['STUD_ID']);
unset($_SESSION['PASS']);

?>
<html>
  <head>
    <title>Online Voting System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="./css/styles.css" rel="stylesheet">

  </head>
<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-5">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <div class="login-con">
                <h3>Student Log-in</h3><hr>
                <?php
                if(isset($_SESSION['ERROR_MSG_ARRAY']) && is_array($_SESSION['ERROR_MSG_ARRAY']) && COUNT($_SESSION['ERROR_MSG_ARRAY']) > 0) {
                    foreach($_SESSION['ERROR_MSG_ARRAY'] as $msg) {
                        echo "<div class='alert alert-danger'>";
                        echo $msg;
                        echo "</div>";
                    }
                    unset($_SESSION['ERROR_MSG_ARRAY']);
                }
                ?>
                <form method="post" action="process/login.php" role="form">
                    <div class="form-group has-warning has-feedback">
                        <label for="stud_id">Student ID</label>
                        <input type="text" name="stud_id" id="stud_id" class="form-control" autocomplete="off">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <br><br>
                        <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                        
                    </div>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
