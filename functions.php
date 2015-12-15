<?php


function check($id,$userlog){

$status=0;
	$result=mysql_query("SELECT msg FROM $userlog where id='$id'");
	while($extract = mysql_fetch_array($result)){
		$search=$extract['msg'];
	}	
	$pieces=explode(" ", $search);
	$len=count($pieces);
	$result=mysql_query("SELECT * FROM bot");
	while ($extract = mysql_fetch_array($result)) {
		for ($i=0; $i<$len ; $i++) { 
			if ($pieces[$i] == $extract['key'] && $extract['$userlog'] == 0) {
				mysql_query("INSERT INTO $userlog (username,msg) VALUES ('Customer','$extract[question]')");
				mysql_query("UPDATE bot SET $userlog = '1' WHERE id = '$extract[id]'");
				$status=1;
				break 2;
			}
		}	
	}	
	if ($status == 0) {
		$result = mysql_query("SELECT * FROM bot");
		while ($extract=mysql_fetch_array($result) ) {
			if ($extract['$userlog'] == 0) {
				mysql_query("INSERT INTO $userlog (username,msg) VALUES ('Customer','$extract[question]')");
				mysql_query("UPDATE bot SET $userlog = '1' WHERE id = '$extract[id]'");
				break;
			}
		}
	}






}







?>
