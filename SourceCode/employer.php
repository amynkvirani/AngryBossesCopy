<?php
	Class Employer{
		
		public $companyID;
		public $name;
		public $about;
		public $departments;
		public $universityName;
		public $password;
		public $email;
		public $otherInformation;
		
		// please double check that i used employer instead of employee
		// ALSO double check that i used the correct syntax at all times..
		
		
		/*
			how to use in pages:
			1). include in PHP File
			$id = getEmployerID();
			$thisEmployer = new Employer();
			
			$thisEmployer->constructFromDB($id);
			
			then you can access any info in the following manner:
			
			e.g
			$thisEmployer->companyID
			$thisEmployer->searchEmployee($departmentID);
			
			also,
			in order to add a new employer to the system...use the following method
			
			$newEmployer = new Employer();
			$newEmployer->addEmployer(....attributes here..);
			
			
			
			
		*/
		function constructFromDB($id)
		{
			//enter SQL statement to go through db and update all
			$query = "SELECT * FROM employeer WHERE Cmp_ID = " . $id;
			$result_set = mysql_query($query);
			
			while($results = mysql_fetch_array($result_set))
			{
				$name = $results['Cmp_Name'];
				$about = $results['Cmp_About'];
				$universityName = $results['Cmp_UName'];
				$Cmp_Email = $results['Cmp_Email'];
				$otherInformation = $results['Cmp_OtherInfo'];
			}
		}
		
		
		
		function searchEmployee($id) // takes in department ID and returns employees belonging to the department
		{
			$query = "SELECT * FROM `dept_emp` WHERE `Dept_ID` = '".$id."'";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			
			$resultsArray=array();
			
			while($allResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $allResults['Emp_ID'];
			}
			return $resultsArray;
		}
		
		
		function editProfile($cName,$cAbout,$cDepartments, $cDepartmentSize, $cUniversityName,$cPassword,$cEmail,$cOtherInformation)
		{
			//void function
			$name = $cName;
			$about = $cAbout;
			$departments = $cDepartments;
			$universityName = $cUniversityName;
			$password = $cPassword;
			$emailAdd = cEmail;
			$otherInformation = $cOtherInformation;
			$this->updateEmployer();
			$this->updateDepartments();
		}
		
		function addEmployer($cName,$cAbout,$cUniversityName,$cPassword,$cEmail,$cOtherInformation)
		{	// adds a new employer to the system, and sets the current employer object equal to the newly added employer ...
			$name = $cName;
			$about = $cAbout;
			$departments = $cDepartments;
			$universityName = $cUniversityName;
			$password = $cPassword;
			$emailAdd = cEmail;
			$otherInformation = $cOtherInformation;
			$companyID = $this->addNewEmployer();
			
		}
		
		function addNewEmployer()
		{
			$query = "INSERT INTO `employeer` (`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`)
						VALUES ('$name','$about','$universityName','$password','$emailAdd','$otherInformation')";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			
			$query = "SELECT `Emp_ID` from employeer where `Cmp_Email`='" .$emailAdd . "'";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			
			while($allResults = mysql_fetch_array($result_set))
			{
				return $allResults['Cmp_ID'];
			}
		}
		
		function updateEmployer()
		{
			$query = "UPDATE `employeer`
			
			SET
			
			`Cmp_Name` = '$name',
			`Cmp_About` = '$about',
			`Cmp_UName` = '$universityName',
			`Cmp_Email` = '$emailAdd',
			`Cmp_OtherInfo` = '$otherInformation'
			WHERE
			`Cmp_ID` = '$companyID'";

			$result_set = mysql_query($query);
			confirm_query($result_set);
		}
		

		function getAllInformation()
		{
			//returns an array
			return array($companyID, $name, $about, $departments,$universityName,$email,$otherInformation);
		}
		
		function getAllMyOpenings()
		{
			$query = "SELECT * FROM job_openings WHERE Cmp_ID = " . $companyID;
			$result_set = mysql_query($query);
			confirm_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch results from here
		}
		
		function getJobOpeningInfo($id)
		{
			$query = "SELECT * FROM job_openings WHERE Job_ID = "  . $id;
			$result_set = mysql_query($query); 
			confirm_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}
		
		function getJobApplications($jobID)
		{
			$query = "SELECT * FROM applications WHERE Job_ID = ". $jobID;
			$result_set = mysql_query($query);
			confirm_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}
		
		function getApplication($applicationID)
		{
			$query = "SELECT * FROM applications WHERE App_ID = " . $applicationID;
			$result_set = mysql_query($query);
			confirm_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}
		
		function addJobOpening($title,$detail,$location,$requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)
		{
			$query = "INSERT INTO job_openings (Cmp_ID, Job_Location, Job_Requirements, Job_Open, Job_ODate, Job_CDate,
			Job_Duration, Job_Type,Job_Salary, Job_OtherInfo)
						VALUES ($companyID, $location, $requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)";
			$result_set = mysql_query($query);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}
		
		function editJobOpening($jobID, $title,$detail,$location,$requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)
		{
			
			$query = "UPDATE job_openings
			
			SET
			
			Cmp_ID = $companyID,
			Job_Location = $location,
			Job_Requirements= $requirements,
			Job_Open = $open,
			Job_ODate = $openDate,
			Job_CDate = $closeDate,
			Job_Duration = $duration,
			Job_Type = $type,
			Job_Salary = $salary,
			Job_OtherInfo = $otherInfo
			WHERE
			Job_ID = $jobID";
			
			$result_set = mysql_query($query);
			confirm_query($result_set);
			
		}

	}
?>
