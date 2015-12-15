<?php
session_start();
$username = $_SESSION['username'];
$msg2 = $_POST['msg1'];
$sid=$_SESSION['id'];
$windowno=$_POST['id1'];
// $msg=mysql_real_escape_string($msg);
include 'database.php';


 // $result=mysql_query("select q_id from logs where user_reply IS NULL and userid='$username'") or die("failde");
// echo $result;

 $query="UPDATE logs SET user_reply='$msg2' WHERE userid='$username' and id='$sid' and endsessiontime IS NULL";
mysqli_query($con,$query) or die("Update not");

$search=$msg2;
$pieces=explode(" ", $search);
$len=count($pieces);
$status=0;
$result=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL)");
	while ($extract = mysqli_fetch_array($result)) {
		for ($i=0; $i<$len ; $i++) { 
			if ($pieces[$i] == $extract['key']) {
				mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
				$_SESSION['id']=mysqli_insert_id($con);
				$status=1;
				break 2;
}}}


if($status==0)
{
   $result1=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL)");
   	while ($extract = mysqli_fetch_array($result1)) {
	   mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
				$_SESSION['id']=mysqli_insert_id($con);
 		break;
 }
}










?>