<?php
session_start();
$user = $_SESSION['username'];
include 'database.php';
date_default_timezone_set("Asia/Kolkata");


$date=date('Y-d-m G:i:s');

$sql = "UPDATE logs SET endsessiontime='$date' WHERE `userid`='$user'"; 
  mysqli_query($con,$sql);
     $filename=$user."_log.csv";
     $sql1 = "select l.userid,b.question,l.user_reply,l.sessionstarttime,l.endsessiontime from bot b,logs l where l.q_id=b.id and userid='$user'";
     $result = mysqli_query($con,$sql1) or die("Selection Error ");
     $file="C:\wamp\www\/".$user."_log.csv";
     $fp = fopen($file, 'w');

      while($row = mysqli_fetch_assoc($result))
     {
         fputcsv($fp, $row);
     }
    
   fclose($fp);

 echo "Complete Record saved  as CSV in file: <b style=\"color:red;\">$filename</b>";


	

 
    $_SESSION=array();
    $_SESSION['id']="";
    $_SESSION['id2']="";
    session_regenerate_id(); 
    session_destroy();
echo "You have been logged out. Click <a href='index.php'> here to log again</a>";


echo $date;
?>