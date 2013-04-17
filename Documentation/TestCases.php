<?php

	/*
		functions such as addEmployer, addEmployee, employeeLogin, employerLogin, addCompany, addJob, searchEmployee, searchCompany, searchJob are assumed to exist -
		add functions basically represent CRUD functions.
		The connections between the HTML pages and PHP Pages containing these functions (e.g on form submission) would be tested manually.
	*/
	//testing employee signup / creation
	
	
	
	
	$name = "nameTest";
	$phone = "1";
	$address = "54 Address A Block DEFGHI.";
	$emailAdd = "email@email.com";
	$location_city = "Lahore";
	$description = "random";
	$password = "password";
	
	$countBeforeEntries = count_total_employee_entries();
	
	/*
		assuming there exist functions such that:
		addEmployee(name, username, password, phone, city,location_city, description);
	*/
	
	//testing employee creation
	for($i = 0; $i < 50;$i++)
	{
		addEmployee($name + $i,$username + $i,$password + $i,$phone * $i , $i + $emailAdd, $address + $i, $location_city + $i, $description + $i);
		
	}
	
	if((count_total_employee_entries() - $countBeforeEntries) == 50)
	{
		echo "Employee Creation Test Passed";
	}
	else
	{
		echo "Employee Creation test failed. Some Employees were not created.";
	}
	
	//testing employee search (a use case of employer)
	
	$searchCounter = 0;
	for($i = 0; $i < 50; $i++)
	{
		
		$username = "username" + $i;
		//testing search function
		$searchedEmployee[] = getEmployeeByUserName($username); // i.e the function returns an array
		
		if(
		($searchedEmployee['name'] == $name + $i)
		&&
		($searchedEmployee['phone'] == $phone * $i)
		&&
		($searchedEmployee['city'] == $city + $i)
		&&
		($searchedEmployee['emailAdd'] == $i + $emailAdd)
		&&
		
		(searchedEmployee['address'] == $address + $i)
		&&
		
		(searchedEmployee['location_city'] == $location_city + $i)
		&&
		($searchedEmployee['description'] == $description + $i)
		)
		{
			$searchCounter++;
		}
		
		
	}
	if($searchCounter == 50)
	{
		echo "Search Tests Passed.";
	}
	
	//testing login
	$loginCount = 0;
	for(int $i = 0; $i < 50; $i++)
	{
		$username = "username" + $i;
		$password = "password" + $i;
		
		$x = employeeLogin($username,$password);
		if($x)
		{
			loginCount++;
		}
		
	}
	if(loginCount == 50)
	{
		echo "Employee Login Test Successful." ;
		
	} else 
	{
		echo "Employee Login Test Failed.";
	}
	
	
	
	echo "Starting Employer Tests";
	
	
	//testing employer signup / creation
	
	$name = "nameTest";
	$phone = "1";
	$address = "54 Address A Block DEFGHI.";
	$location_city = "Lahore";
	$description = "random";
	$password = "password";
	$emailAdd = "email@email.com";
	
	$countBeforeEntries = count_total_employer_entries();
	
	/*
		assuming there exist functions such that:
		addEmployer(name, username, password, phone, city,location_city, description);
	*/
	
	//testing employer creation
	for(i = 0; i < 50;i++)
	{
		addEmployer($name + $i,$username + $i,$password + $i,$phone * $i ,$address + $i, $i + $emailAdd ,  $location_city + $i, $description + $i);
		
	}
	
	if((count_total_employer_entries() - $countBeforeEntries) == 50)
	{
		echo "Employer Creation Test Passed";
	}
	else
	{
		echo "Employer Creation test failed. Some Employers were not created.";
	}
	
	
	$companyName = "company";
	$city = $location_city;
	$country = "country"
	
	$countBeforeEntries = count_total_companies();
	
	//Testing company creation
	
	
	
	
	
	
	for($i = 0; $i < 50; $i++)
	{
		addCompany($i /* this is a dummy user id*/,$companyName + $i, $description + $i, $address + $i, $city + $i, $country + $i);
		
	}
	
	if((count_total_companies() - $countBeforeEntries) == 50)
	{
		echo "Company Creation Test Passed";
	}
	else
	{
		echo "Company Creation test failed. Some companies were not created.";
	}
	
	
	//Testing Job Creation
	
	
	//we will be hard coding this company in database for testing
	$companyID = 1;
	
	
	$countBeforeEntries = count_total_jobs($companyID);
	$jobName = "job";
	
	$jobDescription = "desc";
	$jobPhone = 1323;
	$jobEmail = "job@job.com";
	$jobAddress = "jobAddress" ;
	$jobCity = "city";
	$jobCountry = "country";
	
	
	
	for($i = 0; $i < 50;$i++)
	{
		addJob($companyID,$jobName + $i, $jobDescription,$jobPhone * $i, $jobEmail + $i, $jobAddress + $i, $jobCity + $i, $jobCountry + $i);
	}
	
	if(count_total_jobs($companyID) - $countBeforeEntries == 50)
	{
		echo "Jobs creation Test Successfully Passed";
	}
	else
	{
		echo "Jobs creation Test failed.";
	}
	
	
	
	
	
	
	
	//testing company search (a use case of employee)
	
	$searchCounter = 0;
	for($i = 0; $i < 50; $i++)
	{
		
		$companyQuery = "company" + $i;
		//testing search function
		$searchedCompany[] = getCompanyByName($companyQuery);
		//$companyName + $i, $description + $i, $address + $i, $city + $i, $country + $i
		if(
		($searchedCompany['name'] == $companyQuery)
		&&
		($searchedCompany['description'] == $address + $i)
		&&
		(searchedCompany['city'] == $city + $i)
		&&
		(searchedCompany['country'] == $country + $i)
		&&
		($searchedCompany['description'] == $description + $i)
		)
		{
			$searchCounter++;
		}
		
		
	}
	if($searchCounter == 50)
	{
		echo "Company Search Tests have Passed.";
	}
	else 
	{
		"Company Search Test Failed.";
	}
	
	
	//testing job search (a use case of employee)
	
	$searchCounter = 0;
	//$jobName + $i, $jobDescription,$jobPhone * $i, $jobEmail + $i, $jobAddress + $i, $jobCity + $i, $jobCountry + $i
	
	
	
	
	for($i = 0; $i < 50; $i++)
	{
		
		
		//testing search function
		$searchedJob[] = getJobByName($jobName + $i);
		//$companyName + $i, $description + $i, $address + $i, $city + $i, $country + $i
		if(
		($searchedJob['name'] == $jobName)
		&&
		($searchedJob['companyID'] == 1)
		&&
		($searchedJob['address'] == $jobAddress + $i)
		&&
		($searchedJob['phone'] == $jobPhone * $i)
		&&
		(searchedJob['city'] == $jobCity + $i)
		&&
		(searchedJob['country'] == $jobCountry + $i)
		&&
		($searchedJob['description'] == $jobDescription + $i)
		)
		{
			$searchCounter++;
		}
		
		
	}
	if($searchCounter == 50)
	{
		echo "Job Search Tests have been Passed.";
	}
	
	
	
	
	
	
	//testing employer login
	$loginCount = 0;
	for($i = 0; $i < 50; $i++)
	{
		$username = "username" + $i;
		$password = "password" + $i;
		
		$x = employerLogin($username,$password);
		//assuming $x is the return boolean - true if validated, false if not.
		if($x)
		{
			loginCount++;
		}
		
	}
	if(loginCount == 50)
	{
		echo "Employer Login Test Successful." ;
		
	} else 
	{
		echo "Employer Login Test Failed.";
	}
	
	
	
	
	
	
	
	//Testing Job Applications
	
	$countBeforeEntries = count_total_jobApps($jobID);
	$empUserID = 1;
	$appDescription = "desc";
	
	
	$jobID = 3; // randomly hard coded job
	
	for($i = 0; $i < 50;$i++)
	{
		addApp($empUserID * $i, $appDescription + $i, $jobID);
	}
	
	if((count_total_jobApps($jobID) - $countBeforeEntries) == 50)
	{
		echo "Job Application Test Successfully Passed";
	}
	else
	{
		echo "Job Application Test unfortunately failed.";
	}
	
	$searchCount = 0;
	
	for($i = 0; $i < 50;$i++)
	{
		viewJobApp[] = searchJobAppByDescription($appDescription + $i);
		
		
			if(
			(viewJobApp['employeeID'] == $empUserID * $i)
			&&
			(viewJobApp['description'] == $appDescription + $i)
			&&
			
			(viewJobApp['jobID'] == 3)
			)
			{
				$searchCount++;
			}
		
	}
	
	if($searchCount == 50)
	{
		echo "View Job Application Test Passed";
	}
	else
	{
		echo "View Job Application Test unfortunately Failed.";
	}
	
	
	
	
	
	


?>