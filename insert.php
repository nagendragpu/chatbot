<?php
session_start();
$username = $_SESSION['username'];
$msg2 = $_POST['msg1'];
$sid=$_SESSION['id'];

if(isset($_SESSION['id2'])){
	$sid2=$_SESSION['id2'];
}

if(isset($_SESSION['id3'])){
	$sid3=$_SESSION['id3'];
}

$windowno=$_POST['id1'];
// $msg=mysql_real_escape_string($msg);
include 'database.php';


 // $result=mysql_query("select q_id from logs where user_reply IS NULL and userid='$username'") or die("failde");
// echo $result;
if($windowno==1)
{

		$query="UPDATE logs SET user_reply='$msg2' WHERE userid='$username' and id='$sid' and endsessiontime IS NULL and windowno='$windowno'";
		mysqli_query($con,$query) or die("Update not");

		$search=$msg2;
		$pieces=explode(" ", $search);
		$len=count($pieces);
		$status=0;
		$result=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno')");
			while ($extract = mysqli_fetch_array($result)) {
				for ($i=0; $i<$len ; $i++) { 
					if ($pieces[$i] == $extract['key']) {
						mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id']=mysqli_insert_id($con);
						$status=1;
						break 2;
		}}}

		$row_count=mysqli_query($con,"select id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno'");
		$check=mysqli_num_rows($row_count);
		if($check==3)
		{
			$query="INSERT INTO logs (userid,q_id,windowno)values('$username','1','2')";
			mysqli_query($con,$query);
			$_SESSION['id2']=mysqli_insert_id($con);
		}
		if($status==0)
		{
		   $result1=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL)");
		   	while ($extract = mysqli_fetch_array($result1)) {
			   mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id']=mysqli_insert_id($con);
		 		break;
		 }
		}

}elseif ($windowno==2) {

$query="UPDATE logs SET user_reply='$msg2' WHERE userid='$username' and id='$sid2' and endsessiontime IS NULL";
		mysqli_query($con,$query) or die("Update not");

		$search=$msg2;
		$pieces=explode(" ", $search);
		$len=count($pieces);
		$status=0;
		$result=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno')");
			while ($extract = mysqli_fetch_array($result)) {
				for ($i=0; $i<$len ; $i++) { 
					if ($pieces[$i] == $extract['key']) {
						mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id2']=mysqli_insert_id($con);
						$status=1;
						break 2;
		}}}


		$row_count=mysqli_query($con,"select id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno'");
		$check=mysqli_num_rows($row_count);
		if($check==3)
		{
			$query="INSERT INTO logs (userid,q_id,windowno)values('$username','1','3')";
			mysqli_query($con,$query);
			$_SESSION['id3']=mysqli_insert_id($con);
		}


		if($status==0)
		{
		   $result1=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno')");
		   	while ($extract = mysqli_fetch_array($result1)) {
			   mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id2']=mysqli_insert_id($con);
		 		break;
		 }
		}

}elseif ($windowno==3) {

$query="UPDATE logs SET user_reply='$msg2' WHERE userid='$username' and id='$sid3' and endsessiontime IS NULL";
		mysqli_query($con,$query) or die("Update not");

		$search=$msg2;
		$pieces=explode(" ", $search);
		$len=count($pieces);
		$status=0;
		$result=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno')");
			while ($extract = mysqli_fetch_array($result)) {
				for ($i=0; $i<$len ; $i++) { 
					if ($pieces[$i] == $extract['key']) {
						mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id3']=mysqli_insert_id($con);
						$status=1;
						break 2;
		}}}


		if($status==0)
		{
		   $result1=mysqli_query($con,"select * from bot where id NOT IN (select q_id from logs where userid='$username' and endsessiontime IS NULL and windowno='$windowno')");
		   	while ($extract = mysqli_fetch_array($result1)) {
			   mysqli_query($con,"INSERT INTO logs(userid,q_id,windowno) VALUES ('$username','$extract[id]','$windowno')");
						$_SESSION['id3']=mysqli_insert_id($con);
		 		break;
		 }
		}





}








?>