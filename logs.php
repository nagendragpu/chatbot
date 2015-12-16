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
 
echo"<div class='row msg_container base_receive'>
				<div class='col-md-2 col-xs-2 avatar'>
                            <img src='Avatar.jpg' class=' img-responsive '>
                 </div>
	 	    	<div class='col-md-10 col-xs-10'>
	 	   			<div class='messages msg_receive'>
	 	   				<p>".$q['question']."</p> 
	 	   				<p style='font-size:10px; color:blue; text-align:left'> BOT</p>
	 	   			</div>
	 	   		</div>
	 	   		 
	 		</div>";
	 		
	 		if(!is_null($extract['user_reply'])){
	 		echo"
	 		<div class='row msg_container base_sent'>
	            <div class='col-md-10 col-xs-10'>
	                <div class='messages msg_sent'> 
	                            <p>".$extract['user_reply']. "</p>
	                            <p style='font-size:10px; color:blue; text-align:right'> ".$extract['userid']."</p>
	                             
	                </div>
	            </div>

	            <div class='col-md-2 col-xs-2 avatar'>
	                <img src='Avatar.jpg' class=' img-responsive '>
	            </div>";
	        }
	            echo"
            </div>";

 }

}
?>