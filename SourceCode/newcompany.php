<?php

include('./db.inc.php');
include('./employer.php');

if (isset($_POST['compname']) && isset($_POST['abt']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['emailid']) && isset($_POST['info'])) {
    $compname = $_POST['compname'];             // get data
	$abt = $_POST['abt'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$emailid = $_POST['emailid'];
	$info = $_POST['info'];
	$newEmployer = new Employer();
	$newEmployer->addEmployer($compname,$abt,$uname,$pass,$emailid,$info);
	//$q="INSERT INTO `employeer`(`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`) VALUES ('$compname','$abt','$uname','$pass','$emailid','$info')";
	//echo $q;
	#$query1=mysql_query("INSERT INTO `employeer`(`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`) VALUES ('$compname','$abt','$uname','$pass','$emailid','$info')");
	#if (!$query1){
	#	die('Could not enter data: ' . mysql_error());	
	#}
	$query2=mysql_query("SELECT `Cmp_ID` FROM `employeer` WHERE `Cmp_Name`='".$compname."'");
	if (!$query2){
		die('Could not enter data: ' . mysql_error());
	}
	$dep = mysql_fetch_array($query2);
	$comp_ID=$dep['Cmp_ID'];
	$numdept = $_POST['size'];
	$alldept='';
	for ($i=0;$i<$numdept;$i++){
		$id='depcmp'.$i;
		$alldept=$_POST[$id];	
		$query3=mysql_query("SELECT `Dept_ID` FROM `departments` WHERE `Dept_Name` = '".$alldept."'");
		$dep_ID= mysql_fetch_array($query3);
		$dep_ID=$dep_ID['Dept_ID'];
		$query4=mysql_query("INSERT INTO `dept_cmp`(`Dept_ID`, `Cmp_ID`) VALUES ('$dep_ID','$comp_ID')");
	}
	echo ("true");
	//echo ($comp_ID);
	//echo $compname.$abt.$uname.$pass.$emailid.$info.$numdept.$alldept;
}
?> 