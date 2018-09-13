<?php
//include ("./includes/time.php");
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
<style>
body{
    text-align: center;
  font-family: sans-serif;
  font-weight: 100;
}
h1{
  color: black;
  font-weight: 100;
  font-size: 40px;
  margin: 40px 0px 20px;
}
 #clockdiv{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 20px;
}
#clockdiv > div{
    padding: 10px;
    border-radius: 3px;
    background: darkred;
    display: inline-block;
}
#clockdiv div > span{
    padding: 15px;
    border-radius: 3px;
    background: black;
    display: inline-block;
}
smalltext{
    padding-top: 5px;
    font-size: 16px;
}
</style>
  </head>
    <body>
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
                        
                      
                    </div>
                        
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    
                </form>
                <h3>Time Remaining</h3>
<div id="clockdiv">
  <div>
    <span class="days" id="day"></span>
    <div class="smalltext">Days</div>
  </div>
  <div>
    <span class="hours" id="hour"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes" id="minute"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds" id="second"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>
 
<p id="demo"></p>
            <script>
 
var deadline = new Date("sep 14, 2018 17:00:00").getTime();

var x = setInterval(function() {
 
var now = new Date().getTime();
var t = deadline - now;
var days = Math.floor(t / (1000 * 60 * 60 * 24));
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((t % (1000 * 60)) / 1000);
document.getElementById("day").innerHTML =days ;
document.getElementById("hour").innerHTML =hours;
document.getElementById("minute").innerHTML = minutes; 
document.getElementById("second").innerHTML =seconds; 
if (t < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "<h2>TIME UP</h2>";
        document.getElementById("day").innerHTML ='0';
        document.getElementById("hour").innerHTML ='0';
        document.getElementById("minute").innerHTML ='0' ; 
        document.getElementById("second").innerHTML = '0'; }
}, 1000);
</script>
                                </div>
        </div>
    </div>
</div>
    </div>
    </div>
        </body>
</html>

