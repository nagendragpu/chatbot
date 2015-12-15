<?php
session_start();
$username = $_SESSION['username'];
include 'database.php';

 $result = mysqli_query($con,"SELECT * FROM logs where userid='$username' ORDER by id ASC");
 while ($extract = mysqli_fetch_assoc($result)) {

 	if(is_null($extract['endsessiontime']))
 	{
 	$id=$extract['q_id'];
 	$result1=mysqli_query($con,"select question from bot where id='$id'");
 	$q=mysqli_fetch_array($result1);
 	echo "<p style=' font-size: 13px;margin: 0 0 0.2rem 0;'>" .$q['question']. "</p>" . "<br/>" ."<p style=' font-size: 13px;margin: 0 0 0.2rem 0;'>" .$extract['user_reply'] . "</p>" .
 	 "<p style='font-size: 11px;color: #ccc;'>" 
 	 . $extract['userid'] ."<p>";
 }

}
?>