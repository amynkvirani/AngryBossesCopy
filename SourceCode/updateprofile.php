<?php
include('./db.inc.php');
include('./sessions.php');
echo ("request received");
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['dob']) && isset($_POST['address']) && isset($_POST['uni']) && isset($_POST['major']) && isset($_POST['gdate']) && isset($_POST['city']) && isset($_POST['lookingfor']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['info'])) {
	$name=$_POST['name'];
	$age=$_POST['age'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$uni=$_POST['uni'];
	$major=$_POST['major'];
	$gdate=$_POST['gdate'];
	$city=$_POST['city'];
	$lookingfor=$_POST['lookingfor'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$info=$_POST['info'];
	#$q="INSERT INTO `employee`(`Emp_Name`, `Emp_Age`, `Emp_DOB`, `Emp_Address`, `Emp_UniName`, `Emp_Major`, `Emp_GradDate`, `Emp_PrefCity`, `Emp_InternJob`, `Emp_UName`, `Emp_Pass`, `Emp_Email`, `Emp_OtherInfo`) VALUES ('$name','$age','$dob','$address','$uni','$major','gdate','city','lookingfor','uname','pass','email','info')";
	//echo $q;
	$query1=mysql_query("UPDATE `employee` SET `Emp_Name`='".$name."',`Emp_Age`='".$age."',`Emp_DOB`='".$dob."',`Emp_Address`='".$address."',`Emp_UniName`='".$uni."',`Emp_Major`='".$major."',`Emp_GradDate`='".$gdate."',`Emp_PrefCity`='".$city."',`Emp_InternJob`='".$lookingfor."',`Emp_UName`='".$uname."',`Emp_Pass`='".$pass."',`Emp_Email`='".$email."',`Emp_OtherInfo`='".$info."' WHERE `Emp_ID`='".getEmployeeID()."'");
	if (!$query1){
		die('Could not enter data: ' . mysql_error());	
	}
	echo json_encode(array("name" => "$name", "age" => "$age", "dob" => "$dob", "address" => "$address", "uni" => "$uni", "major" => "$major", "gdate" => "$gdate", "city" => "$city", "lookingfor" => "$lookingfor", "uname" => "$uname", "pass" => "$pass", "email" => "$email", "info" => "$info"));
	#echo ("Record updated successfully");	
	#echo($name.$age.$dob.$address.$uni.$major.$gdate.$city.$lookingfor.$uname.$pass.$email.$info.$size.$depemp0);
}
elseif (isset($_POST['name']) && isset($_POST['about']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['info'])) {
	$name=$_POST['name'];
	$about=$_POST['about'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$info=$_POST['info'];

	$query1=mysql_query("UPDATE `employeer` SET `Cmp_Name`='".$name."',`Cmp_About`='".$about."',`Cmp_UName`='".$uname."',`Cmp_Pass`='".$pass."',`Cmp_Email`='".$email."',`Cmp_OtherInfo`='".$info."' WHERE `Cmp_ID`='".getEmployerID()."'");
	if (!$query1){
		die('Could not enter data: ' . mysql_error());	
	}
	echo json_encode(array("name" => "$name", "about" => "$about", "uname" => "$uname", "pass" => "$pass", "email" => "$email", "info" => "$info"));
}
?>