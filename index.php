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

// window.setInterval(function(){
// {
// var xmlhttp;
// if (window.XMLHttpRequest)
//   {// code for IE7+, Firefox, Chrome, Opera, Safari
//   xmlhttp=new XMLHttpRequest();
//   }
// else
//   {// code for IE6, IE5
//   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
// xmlhttp.onreadystatechange=function()
//   {
//   if (xmlhttp.readyState==4 && xmlhttp.status==200)
//     {
//     document.getElementById("chatlogs").innerHTML=xmlhttp.responseText;
//     }
//   }
// xmlhttp.open("GET","logs.php",true);
// xmlhttp.send();
// }, 5000);




$(document).ready(function(){
$("#submit").click(function(){
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

	$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});


	$(document).ready(function(e) {
		$.ajaxSetup({cache:false});
		setInterval(function() {$('#chatlogs').load('logs.php');}, 500);
	}); 
	</script>
</head>
<body>
<a href="logout.php">LOGOUT</a>
<form role="form" name="form1">
	<div class="container">
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - <?php echo $_SESSION['username'];?></h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>

                <div class="panel-body msg_container_base">
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                                <div class="messages msg_sent">
                                	<div id="chatlogs">
                                    </div>
                                </div>
                            
                        </div>
                    </div>                                      
                </div>

                <div class="panel-footer">
                    <div class="input-group">
                        <input  id="msg" name="msg5" placeholder="Write your message here..." />
                        <input type="hidden" id="win" name="win" value="1"></input>
                        <span class="input-group-btn">


<!-- id="btn-input" type="text" class="form-control input-sm chat_input" -->

                        <button class="btn btn-primary btn-sm" id="submit" >Send</button>
                        </span>
                    </div>
                </div>
    		</div>
        </div>
    </div>
</div>
</form>
</body>
</html>