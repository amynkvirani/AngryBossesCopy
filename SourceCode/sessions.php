<?php


session_start();
function logged_in(){ // returns boolean value
return isset($_SESSION['type']);
}

//employeeSessions
function createSessionEmployee($employeeID, $employeeUsername)
{ // creates a session if Employee is logged in -> use on login page
  $_SESSION['employeeID'] = $employeeID;
	$_SESSION['employeeUsername'] = $employeeUsername;
	$_SESSION['type'] = "employee";
}

function getEmployeeID()
{ // returns employeeID
	return $_SESSION['employeeID'];
}

function getEmployeeUsername()
{	// returns employee's username
	return $_SESSION['employeeUsername'];
}

//employer Sessions
function createSessionEmployer($employerID, $employerUsername)
{	// creates a session for employer
	$_SESSION['employerID'] = $employeeID;
	$_SESSION['employerUsername'] = $employeeUsername;
	$_SESSION['type'] = "employer";
}
function getEmployerID()
{	// returns employer ID
	return $_SESSION['employerID'];
}

function getEmployerUsername()
{	// returns employer's username
	return $_SESSION['employerUsername'];
}


function logout(){ // destroys the current session

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
