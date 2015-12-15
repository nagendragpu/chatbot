<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

include 'database.php';

$result=mysqli_query($con,"SELECT * from user Where userid='$username' AND password='$password'") or die("Query Failed in login");

if ($result) {
	$res = mysqli_fetch_assoc($result);

	$_SESSION['username'] = $res['userid'];
	echo "<center>";
	echo "You are now Login. click <a href='index.php'>here</a>to go back to main chat window";
	echo "</center>";

	$query="INSERT INTO logs (userid,q_id,windowno)values('$username','1','1')";
	mysqli_query($con,$query);
	$_SESSION['id']=mysqli_insert_id($con);
	echo $_SESSION['id'];
	


} 
else{
	echo "<center>";
	echo "No User found. Please go <a href='index.php'>back</a> and enter the correct login.<br>";	
	echo "You may register a new account by clicking <a href='register.php'>here</a>";
	echo "</center>";
}
?>