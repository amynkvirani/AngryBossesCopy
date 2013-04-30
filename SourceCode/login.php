<?php
include('./db.inc.php');
include('./sessions.php');
if (isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['type'])) {
	#echo ("Login called");
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	$logintype = $_POST['type'];
	#echo ($logintype);
	if ($logintype=="employee"){
		//echo ("Logging in as Employee");
		$query1=mysql_query("SELECT `Emp_ID` FROM `employee` WHERE `Emp_UName`='".$username."' AND `Emp_Pass`='".$password."'");
		
		if ($id=mysql_fetch_array($query1)){
			$id=$id['Emp_ID'];
			createSessionEmployee($id,$username);
			echo ("true");
		}
		else{
			echo ("false");
		}
	}
	else if ($logintype=="employeer"){
		//echo ("Logging in as Employeer");
		$query1=mysql_query("SELECT `Cmp_ID` FROM `employeer` WHERE `Cmp_UName`='".$username."' AND `Cmp_Pass`='".$password."'");
		if ($id=mysql_fetch_array($query1)){
			$id=$id['Cmp_ID'];
			createSessionEmployeer($id,$username);
			echo ("true");
			header('Location: profile.php');
		}
		else{
			echo ("false");
		}	
	}
}

?>