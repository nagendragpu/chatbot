<?php
if (isset($_POST['submit'])) {
	
	$con = mysql_connect('localhost','root','');
 
	mysql_select_db('chatbox',$con);

	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$pword1 = $_POST['password1'];
	if ($pword != $pword1) {
		echo "Password do not match. <br>";
	}
	else{
		$checklist = mysql_query("SELECT username FROM users Where username='$uname'");
		if (mysql_num_rows($checklist)) {
			echo "Username already exist, please select different username<br>";
			}
		else{
			mysql_query("INSERT INTO users (username,password) VALUES ('$uname','$pword')");
			echo "You have been successfully registered. Click <a href='index.php'>here</a> to go to start chat<br>";
			}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<form name="form3" action="register.php" method="post">
<table border="1" align="center" width="40%">
<tr>
	<td>Enter Your Username: </td><td><input type="text" name="username"></td>
</tr>
	
<tr>
	<td>Enter Your Password: </td><td><input type="password" name="password"></td>
</tr>

<tr>
	<td>Repeat Your Password: </td><td><input type="password" name="password1"></td>
</tr>

<tr>
	<td colspan="2"><input type="submit" name="submit" value="Register"></td>
</tr>
</table>
</form>
</body>
</html>