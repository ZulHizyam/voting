<html>
<head>	
<title>Poll system  in php using jquery and ajax - coderglass</title>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#update').click(function(){
	 	vote = $('#vote:checked').val();
		
 		$.ajax({
			type:'post',
			data:{vote:vote},
			url:"add.php",
			success:function(data){
			inc = data;
			$('.'+vote).html(inc);
 			}
		});	
	  
	});
});
</script>
</head>
<body>
<center>
<br>
<img src="logo.png" width="300" height="70" />
<h1>Poll System in php using jquery and ajax</h1>
<h3>To update Voting  Question: 
<a  style="text-decoration: none;" href="update.php"><b>CLICK HERE</b>
</a>
</h3>

<?php
$db = mysqli_connect("localhost","root","","poll")or die("err in db");
$csql = "select * from vote";
$row = mysqli_query($db,$csql)or die("err in connection");
$data = mysqli_fetch_assoc($row);

$csql1 = "select * from opinion";
$row1 = mysqli_query($db,$csql1)or die("err in connection");
$data1 = mysqli_fetch_assoc($row1);

?>
<form method="post">
<hr>
<h2><?=$data1['op_title']?></h2>
<br>
<input type="radio" name="vote" id="vote" value="option1" />
<b><?=$data1['op_1']?></b> 
(<span class="option1"><?=$data['option1']?></span>) &nbsp;&nbsp;
<input type="radio" name="vote"  id="vote" value="option2" />
<b><?=$data1['op_2']?></b>
(<span class="option2"><?=$data['option2']?></span>) &nbsp;&nbsp;
<input type="radio" name="vote"  id="vote" value="option3" />
<b><?=$data1['op_3']?></b>
(<span class="option3"><?=$data['option3']?></span>)<br><br>
<input   type="button" value="Vote" name="update"  id="update" />
<hr>
</form> 
<h3>&copy;www.coderglass.com  (Designed by Varun Singh)</h3>
</center>
</body>
</html>