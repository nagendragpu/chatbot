<?php
$con = mysqli_connect('localhost','bot','bot','chatbox');
//mysql_select_db('chatbox',$con);

// Test Connection
if (mysqli_connect_errno()) {
	die ("Database Connection Failed: " .
		mysqli_connect_errno() .
		" (" . mysqli_connect_errno() . ")"
	);
} 
?>