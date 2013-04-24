<?php
include('./db.inc.php');
echo ("request received");
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['dob']) && isset($_POST['address']) && isset($_POST['uni']) && isset($_POST['major']) && isset($_POST['gdate']) && isset($_POST['city']) && isset($_POST['lookingfor']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['info']) && isset($_POST['size']) && isset($_POST['depemp0'])) {
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
	$size=$_POST['size'];
	$depemp0=$_POST['depemp0'];
	#$q="INSERT INTO `employee`(`Emp_Name`, `Emp_Age`, `Emp_DOB`, `Emp_Address`, `Emp_UniName`, `Emp_Major`, `Emp_GradDate`, `Emp_PrefCity`, `Emp_InternJob`, `Emp_UName`, `Emp_Pass`, `Emp_Email`, `Emp_OtherInfo`) VALUES ('$name','$age','$dob','$address','$uni','$major','gdate','city','lookingfor','uname','pass','email','info')";
	//echo $q;
	$query1=mysql_query("INSERT INTO `employee`(`Emp_Name`, `Emp_Age`, `Emp_DOB`, `Emp_Address`, `Emp_UniName`, `Emp_Major`, `Emp_GradDate`, `Emp_PrefCity`, `Emp_InternJob`, `Emp_UName`, `Emp_Pass`, `Emp_Email`, `Emp_OtherInfo`) VALUES ('$name','$age','$dob','$address','$uni','$major','$gdate','$city','$lookingfor','$uname','$pass','$email','$info')");
	if (!$query1){
		die('Could not enter data: ' . mysql_error());	
	}
	$query2=mysql_query("SELECT `Emp_ID` FROM `employee` WHERE `Emp_Name`='".$name."'");
	if (!$query2){
		die('Could not enter data: ' . mysql_error());
	}
	$dep = mysql_fetch_array($query2);
	$emp_ID=$dep['Emp_ID'];
	$numdept = $_POST['size'];
	$alldept='';
	for ($i=0;$i<$numdept;$i++){
		$id='depemp'.$i;
		$alldept=$_POST[$id];	
		$query3=mysql_query("SELECT `Dept_ID` FROM `departments` WHERE `Dept_Name` = '".$alldept."'");
		$dep_ID= mysql_fetch_array($query3);
		$dep_ID=$dep_ID['Dept_ID'];
		$query4=mysql_query("INSERT INTO `dept_emp`(`Dept_ID`, `Emp_ID`) VALUES ('$dep_ID','$emp_ID')");
	}
	echo ("Record added successfully");	
	#echo($name.$age.$dob.$address.$uni.$major.$gdate.$city.$lookingfor.$uname.$pass.$email.$info.$size.$depemp0);
}
?>