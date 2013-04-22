<?php

include('./db.inc.php');

// if data are received via POST, with index of 'test'
if (isset($_POST['compname']) && isset($_POST['abt']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['emailid']) && isset($_POST['info'])) {
    $compname = $_POST['compname'];             // get data
	$abt = $_POST['abt'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$emailid = $_POST['emailid'];
	$info = $_POST['info'];
	$q="INSERT INTO `employeer`(`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`) VALUES ('$compname','$abt','$uname','$pass','$emailid','$info')";
	//echo $q;
	$query1=mysql_query("INSERT INTO `employeer`(`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`) VALUES ('$compname','$abt','$uname','$pass','$emailid','$info')");
	if (!$query1){
		die('Could not enter data: ' . mysql_error());	
	}
	$numdept = $_POST['size'];
	$alldept='';
	for ($i=0;$i<$numdept;$i++){
		$id='depcmp'.$i;
		$alldept=$alldept.$_POST[$id];	
	}
	echo "Entered data successfully\n";
	//echo $compname.$abt.$uname.$pass.$emailid.$info.$numdept.$alldept;
}
?> 