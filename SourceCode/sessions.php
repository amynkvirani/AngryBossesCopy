<?php

session_start();

function logged_in(){
return isset($_SESSION['type']);
}

//employeeSessions
function createSessionEmployee($employeeID, $employeeUsername)
{
  $_SESSION['employeeID'] = $employeeID;
	$_SESSION['employeeUsername'] = $employeeUsername;
	$_SESSION['type'] = "employee";
}

function getEmployeeID()
{
	return $_SESSION['employeeID'];
}

function getEmployeeUsername()
{
	return $_SESSION['employeeUsername'];
}

//employer Sessions
function createSessionEmployer($employerID, $employerUsername)
{
	$_SESSION['employerID'] = $employeeID;
	$_SESSION['employerUsername'] = $employeeUsername;
	$_SESSION['type'] = "employer";
}
function getEmployerID()
{
	return $_SESSION['employerID'];
}

function getEmployerUsername()
{
	return $_SESSION['employerUsername'];
}


function logout(){

	//2. unset all the session vars
	$_SESSION = array();

	//3. destroy sesscookie
	if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), '', time()-42000, '/');
	}

	//4. destroy the session
	session_destroy();

	//redirect_to("");
	//uncomment above line and add redirect to whatever page you want to in case of redirecting to another page

}
 


?>
