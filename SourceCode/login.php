<?php
include('./db.inc.php');
if (isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['type'])) {
	#echo ("Login called");
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	$logintype = $_POST['type'];
	#echo ($logintype);
	if ($logintype=="employee"){
		echo ("Logging in as Employee");
		$query1=mysql_query("SELECT `Emp_ID` FROM `employee` WHERE `Emp_UName`='".$username."' AND `Emp_Pass`='".$password."'");
		if (mysql_fetch_array($query1)){
			echo ("Valid Login as Employee");
		}
		else{
			echo ("Invalid Login as Employee");
		}
	}
	else if ($logintype=="employeer"){
		echo ("Logging in as Employee");
		$query1=mysql_query("SELECT `Cmp_ID` FROM `employeer` WHERE `Cmp_UName`='".$username."' AND `Cmp_Pass`='".$password."'");
		if (mysql_fetch_array($query1)){
			echo ("Valid Login as Employeer");
		}
		else{
			echo ("Invalid Login as Employeer");
		}	
	}
}

?>