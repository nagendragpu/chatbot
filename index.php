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


    function get_messages() {
    $.ajax({
    url: 'logs.php',
    method: 'GET',
    success: function(data) {
      $('#chatlogs').html(data);
      $(".panel-body").animate({ scrollTop: $(document).height()}, "fast");
    //         return false;
    }
  });
}
 setInterval(get_messages, 500);
	</script>
</head>
<body>





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
                        <div id="chatlogs">   </div>
                     </ul>
                </div>


                <div class="panel-footer">
                    <div class="input-group">
                        <input id="msg" name="msg5" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <input type="hidden" id="win" name="win" value="1"></input>
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="submit">
                                Send</button>
                        </span>
                    </div>
                </div>

            </div>

        </div>
         
    </div>

</div>


</form>
<a href="logout.php">LOGOUT</a>
</body>
</html>