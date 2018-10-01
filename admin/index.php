<?php
//Start session
session_start();

unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_NAME']);
unset($_SESSION['ADMIN_EMAIL']);
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


<div class="col-md-10">
    <div class="row">
        <div class="col-md-5 col-md-offset-5">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
            <div class="login-con">
                
      
                <?php
                if(isset($_SESSION['ERROR_MSG_ARR']) && is_array($_SESSION['ERROR_MSG_ARR']) && count($_SESSION['ERROR_MSG_ARR']) > 0) {
                    foreach($_SESSION['ERROR_MSG_ARR'] as $msg) {
                        echo "<div class='alert alert-danger'>";
                        echo $msg;
                        echo "</div>";
                    }
                    unset($_SESSION['ERROR_MSG_ARR']);
                }
                ?>
                <h3>Administrator Log-in</h3><hr>
                <form method="post" action="process/login.php" role="form">
                    <div class="form-group has-feedback">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-danger">
                    </div>
                    <a href='forgotPassword.php'>Forgot Password</a>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
</body>
</html>