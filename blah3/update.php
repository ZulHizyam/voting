<html>
<head>
<title>update voting</title>
</head>
<body>
<center><img src="logo.png" width="300" height="70" /><br><br></center>

<form method="post" action="update.php" enctype="multipart/form-data">
<table align="center" border="10" width="900">
    <tr>
      <td align="center" colspan="5" bgcolor="yellow">
	  <h1>Insert Your Opinion Poll</h1>
	  </td>
    </tr>		  
    <tr>
	 <td><b>Opinion Question<b>
	 </td>
	 <td>
	 <input style="height:40px;" type="text" name="question" size="60">
	 </td>
    </tr>
    <tr>
	<td><b>Option 1<b></td>
	<td><input type="text" name="op1" size="30"></td>
                                 
	</tr>
    <tr>
	<td><b>Option 2</td>
	<td><input type="text" name="op2" size="30"></td>
    </tr>
    <tr>
	<td><b>Option 3</td>
	<td><input type="text" name="op3" size="30"></td>
                                 
	</tr>
	<tr><br>
	<td align="center" colspan="5">
	<input type="submit" name="submit" value="Insert">
	</td> 
	</tr>
		
</table>
</form>			
</body>
</html>


<?php 
	
 $con = mysqli_connect("localhost","root","","poll")or die("err in db");
 
 if (isset($_POST['submit'])){

	$question=$_POST['question'];
    $option1=$_POST['op1'];
    $option2=$_POST['op2'];
    $option3=$_POST['op3'];
    $count=0;
    $update_query = "update opinion set op_title='$question', op_1='$option1', op_2='$option2', op_3='$option3' ";
    $update_query1 = "update vote set  bjp='$count', congress='$count', other='$count' ";
	$run1=mysqli_query($con,$update_query1);
	if(mysqli_query($con,$update_query)){
	echo "<script>window.open('index.php?updated= ads has been updated','_self')</script>";
	}
	}
	
?>