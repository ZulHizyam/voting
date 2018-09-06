<?php
$db=mysqli_connect("localhost","root","","ovs")or die("err in connection");
$ch = $_REQUEST['vote'];
$csql = "select * from votes";
$row = mysqli_query($db,$csql)or die("err in connection");
$data = mysqli_fetch_assoc($row);
 if($ch=='course') {
 	$sql = "update vote set option1=".($data['course']+1);
	$res = $data['option1']+1;
 } else if($ch=='option2') {
 	$sql = "update vote set option2=".($data['option2']+1);
	$res = $data['option2']+1;
 } else if($ch=='option3') {
 	$sql = "update vote set option3=".($data['option3']+1);
 	$res = $data['option3']+1;
 }
 mysqli_query($db,$sql)or die("err in query");
 echo $res;
?>