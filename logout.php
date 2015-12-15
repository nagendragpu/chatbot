<?php
session_start();
$user = $_SESSION['username'];
include 'database.php';
date_default_timezone_set("Asia/Kolkata");


$date=date('Y-d-m G:i:s');

$sql = "UPDATE logs SET endsessiontime='$date' WHERE `userid`='$user'"; 
  mysqli_query($con,$sql) or die("some problem in truncate");






// $sql = "select * from $userlog";
//     $result = mysql_query($sql) or die("Selection Error ");
// $filename=$userlog."_log.csv";
//     $fp = fopen($filename, 'w');

//     while($row = mysql_fetch_assoc($result))
//     {
//         fputcsv($fp, $row);
//     }
    
//     fclose($fp);

// echo "Complete Record saves as CSV in file: <b style=\"color:red;\">$filename</b>";


	


//   mysql_query("UPDATE bot SET $userlog = 0");

  //$query="TRUNCATE table logs";
//mysqli_query($con,$query) or die("some problem in truncate");
//  mysql_query("DROP TABLE $userlog") or die("some problem in drop");
// mysql_query("ALTER TABLE bot DROP $userlog;") or die("some problem in drop");



 
    $_SESSION=array();
    $_SESSION['id']="";
    session_regenerate_id(); 
    session_destroy();
echo "You have been logged out. Click <a href='index.php'> here to log again</a>";


echo $date;
?>