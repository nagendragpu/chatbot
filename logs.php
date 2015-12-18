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
 
echo "<li class='left clearfix'><span class='chat-img pull-left'>
                            <img src='http://placehold.it/50/55C1E7/fff&text=U' alt='User Avatar' class='img-circle' />
                        </span>
                            <div class='chat-body clearfix'>
                                <div class='header'>
                                    <strong class='primary-font'>Customer Bot</strong> <small class='pull-right text-muted'>
                                        <span class='glyphicon glyphicon-time'></span>12 mins ago</small>
                                </div>
                                <p>
                                    ".$q['question']."
                                </p>
                            </div>
                        </li>";
            
            if(!is_null($extract['user_reply'])){
            
            echo "<li class='right clearfix'><span class='chat-img pull-right'>
                            <img src='http://placehold.it/50/FA6F57/fff&text=ME' alt='User Avatar' class='img-circle' />
                        </span>
                            <div class='chat-body clearfix'>
                                <div class='header'>
                                    <small class='text-muted'><span class='glyphicon glyphicon-time'></span>13 mins ago</small>
                                    <strong class='pull-right primary-font'>".$extract['userid']."</strong>
                                </div>
                                <p>
                                    ".$extract['user_reply']."
                                </p>
                            </div>
                        </li>";

            }

 }

}
?>


