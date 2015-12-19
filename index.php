<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
	<form name="form2" action="login.php" method="post"> 
	<table border="1" align="center">
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="login"></td>
		</tr>
		<tr>
			<td colspan="2"><a href="register.php"> Register here to get an account</a></td>
		</tr>
	</table>

	</form>
<?php
exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chatbot</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="design.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
	
	<script type="text/javascript">



$(document).ready(function(){
$("#submit1").click(function(){
var msg = $("#msg").val();
var id=form1.win.value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'msg1='+ msg +'&id1='+ id;
if(msg=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
form1.msg5.value="";
$.ajax({
type: "POST",
url: "insert.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
}
});
}
return false;
});
});


// For window2
$(document).ready(function(){
$("#submit2").click(function(){
var msg = $("#msg2").val();
var id=form2.win.value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'msg1='+ msg +'&id1='+ id;
if(msg=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
form2.msg6.value="";
$.ajax({
type: "POST",
url: "insert.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
}
});
}
return false;
});
});

//window 3
$(document).ready(function(){
$("#submit3").click(function(){
var msg = $("#msg3").val();
var id=form3.win.value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'msg1='+ msg +'&id1='+ id;
if(msg=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
form3.msg7.value="";
$.ajax({
type: "POST",
url: "insert.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
}
});
}
return false;
});
});


    function get_messages() {
     var win1='win1='+ 1;
     var win2='win2='+ 2;
     var win3='win3='+ 3;

    $.ajax({
    url: 'logs.php',
    method: 'POST',
    data: win1,
    success: function(data) {
      $('#chatlogs1').html(data);
      $(".panel-body").animate({ scrollTop: $(document).height()}, "fast");
    //         return false;
    }
  });

    //window2
      $.ajax({
    url: 'logs2.php',
    method: 'POST',
    data: win2,
    success: function(data) {
      $('#chatlogs2').html(data);
      $(".panel-body").animate({ scrollTop: $(document).height()}, "fast");
    //         return false;
    }
  });

          //window3
 $.ajax({
    url: 'logs3.php',
    method: 'POST',
    data: win3,
    success: function(data) {
      $('#chatlogs3').html(data);
      $(".panel-body").animate({ scrollTop: $(document).height()}, "fast");
    //         return false;
    }
  });



      
}



 setInterval(get_messages, 500);
	</script>
</head>
<body>




<!-- *************************************window 1 ***************************************** -->
<form role="form" name="form1">
 <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat - <?php echo $_SESSION['username'];?>
                </div>

                <div class="panel-body">
                     <ul class="chat" >
                        <div id="chatlogs1">   </div>
                     </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="msg" name="msg5" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <input type="hidden" id="win" name="win" value="1"></input>
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="submit1">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</form>

<!-- *************************************window 2 ***************************************** -->

<form role="form" name="form2">   
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                </div>
                <div class="panel-body">
                    <ul class="chat">
                         <div id="chatlogs2">   </div>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="msg2" name="msg6" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <input type="hidden" id="win" name="win" value="2"></input>

                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="submit2">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</form>


<!-- *************************************window 3 ***************************************** -->

<form role="form" name="form3">   
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                </div>
                <div class="panel-body">
                    <ul class="chat">
                         <div id="chatlogs3">   </div>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="msg3" name="msg7" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <input type="hidden" id="win" name="win" value="3"></input>

                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="submit3">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</form>

<a href="logout.php">LOGOUT</a>
</body>
</html>