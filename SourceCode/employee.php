<?php
include('./db.inc.php');
  class Employee
	{
		public $empID;
		public $name;
		public $age;
		public $dateOfBirth;
		public $address;
		public $universityName;
		public $courses;
		public $major;
		public $gradDate;
		public $interestDepartment;
		public $prefCity;
		public $internshipJob;
		public $cv;
		public $username;
		public $password;
		public $emailAddress;
		public $otherInfo;
			
			
		function constructFromDB($id)
		{
			$query = "SELECT * FROM employeer WHERE 'Emp_ID' = " . $id;
			$result_set = mysql_query($query);
			$this->empID = $id;
			while($results = mysql_fetch_array($result_set))
			{
				$this->name = $results['Emp_Name'];
				$this->age = $results['Emp_Age'];
				$this->dateOfBirth = $results['Emp_DOB'];
				$this->address = $results['Emp_Address'];
				$this->universityName = $results['Emp_UniName'];
				$this->courses = $results['Emp_Courses'];
				$this->major = $results['ECmp_Major'];
				$this->gradDate = $results['Emp_GradDate'];
				//$this->interestDepartment = $results['Emp_IntAread'];
				$this->prefCity = $results['Emp_PrefCity'];
				$this->internshipJob = $results['Emp_InternJob'];
				//$this->cv = $results['Emp_CV'];
				$this->username = $results['Emp_UName'];
				$this->password = $results['Emp_Pass'];
				$this->emailAddress = $results['Emp_Email'];
				$this->otherInformation = $results['Emp_OtherInfo'];
			}
		}
		//function addEmployee($nName, $nAge, $nDOB, $nAddress , $nUniversity, $nCourses, $nMajor, $nGradDate, $nIntDept, $nPrefCity, $nIntJob, $nCV,
		//	$nUsername, $nPassword, $nEmailAddress, $nOtherInfo)
		function addEmployee($nName, $nAge, $nDOB, $nAddress , $nUniversity, $nMajor, $nGradDate, $nPrefCity, $nIntJob,	$nUsername, $nPassword, $nEmailAddress, $nOtherInfo)		
		{
			$this->name = $nName;
			$this->age = $nAge;
			$this->dateOfBirth = $nDOB;
			$this->address = $nAddress;
			$this->universityName = $nUniversity;
			//$this->courses = $nCourses;
			$this->major = $nMajor;
			$this->gradDate = $nGradDate;
			//$this->interestDepartment = $nIntDept;
			$this->prefCity = $nPrefCity;
			$this->internshipJob =$nIntJob;
			//$this->cv = $nCV;
			$this->username = $nUsername;
			$this->password = $nPassword;
			$this->emailAddress = $nEmailAddress;
			$this->otherInfo = $nOtherInfo;
			
			$this->empID = $this->addNewEmployee();
		}
		
		function addNewEmployee()
		{
			$query = "INSERT INTO `employee` (`Emp_Name`, `Emp_Age`, `Emp_DOB`, `Emp_Address`, `Emp_UniName`, `Emp_Courses`, `Emp_Major`, `Emp_GradDate`,
			`Emp_IntAread`, `Emp_PrefCity`, `Emp_InternJob`, `Emp_CV`, `Emp_UName`, `Emp_Pass`, `Emp_Email`, `Emp_OtherInfo`)
						
						VALUES ('$this->name','$this->age','$this->dateOfBirth','$this->address','$this->universityName','$this->courses', '$this->major','$this->gradDate','$this->interestDepartment',
							'$this->prefCity','$this->internshipJob','$this->cv', '$this->username','$this->password','$this->emailAddress', '$this->otherInfo'
						)";
			$result_set = mysql_query($query);
			//confirm_query($result_set);
			
			$query = "SELECT `Emp_ID` from employee where `Emp_Email`='" .$this->emailAddress . "'";
			$result_set = mysql_query($query);
			//confirm_query($result_set);
			
			while($allResults = mysql_fetch_array($result_set))
			{
				return $allResults['Emp_ID'];
			}
		}
		
		function editProfile($nName, $nAge, $nDOB, $nAddress , $nUniversity, $nMajor, $nGradDate, $nPrefCity, $nIntJob,	$nOtherInfo)
		//function editProfile($nName, $nAge, $nDOB, $nAddress , $nUniversity, $nCourses, $nMajor, $nGradDate, $nIntDept, $nPrefCity, $nIntJob, $nCV,
		//	$nOtherInfo)
		{
		
			//void function
			$this->name = $nName;
			$this->age = $nAge;
			$this->dateOfBirth = $nDOB;
			$this->address = $nAddress;
			$this->universityName = $nUniversity;
			//$this->courses = $nCourses;
			$this->major = $nMajor;
			$this->gradDate = $nGradDate;
			//$this->interestDepartment = $nIntDept;
			$this->prefCity = $nPrefCity;
			$this->internshipJob =$nIntJob;
			//$this->cv = $nCV;
			
			$this->otherInfo = $nOtherInfo;
		
			$this->updateEmployee();
		
		}
		
		function updateEmployee()
		{
			$query = "UPDATE `employee`
			
			SET
			
			`Emp_Name` = '$this->name',
			`Emp_Age`= '$this->age',
			`Emp_DOB` = '$this->dateOfBirth',
			`Emp_Address` = '$this->address',
			`Emp_UniName` = '$this->universityName',
			`Emp_Courses` = '$this->courses', 
			`Emp_Major` = '$this->major',
			`Emp_GradDate` = '$this->gradDate',
			`Emp_IntAread` = '$this->interestDepartment',
			`Emp_PrefCity` = '$this->prefCity',
			`Emp_InternJob` = '$this->internshipJob',
			`Emp_CV` = '$this->cv',
			`Emp_OtherInfo` = '$this->otherInfo'
			
			
			WHERE
			`Emp_ID` = '$this->empID'";
			
			$resultsArray = array();
			$result_set = mysql_query($query);
			if ($result_set==true){
			while ($myResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $myResults['Job_ID'];
				$resultsArray[] = $myResults['Job_Title'];
				$resultsArray[] = $myResults['Job_Detail'];
				$resultsArray[] = $myResults['Cmp_ID'];
				$resultsArray[] = $myResults['Job_Location'];
				$resultsArray[] = $myResults['Job_Detail'];
				$resultsArray[] = $myResults['Job_Open'];
				$resultsArray[] = $myResults['Job_ODate'];
				$resultsArray[] = $myResults['Job_CDate'];
				$resultsArray[] = $myResults['Job_Duration'];
				$resultsArray[] = $myResults['Job_Type'];
				$resultsArray[] = $myResults['Job_Salary'];
				$resultsArray[] = $myResults['Job_OtherInfo'];
			}
			return $resultsArray; //use $resultsArray[0]..[1]..[2].. etc. to access values
			}
			else{
			}
		}
		
			function getJobOpeningInfo($id)
		{
			$query = "SELECT * FROM job_openings WHERE Job_ID = "  . $id;
			$result_set = mysql_query($query); 
			//confirm_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}
		
			function searchJobs($deptName) // takes in department names and returns jobs related to that
		{ // to be edited
			$query = "SELECT * FROM `departments` WHERE `Dept_Name` = '$deptName'";
			$result_set = mysql_query($query);
			$result = mysql_fetch_array($result_set);
			
			$deptID = $result['Dept_ID'];
		
			$query = "SELECT * FROM `job_openings` WHERE `Dept_ID` = '".$deptID."'";
			$result_set = mysql_query($query);
			
			
			//confirm_query($result_set);
			
			$resultsArray=array();
			
			while($allResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $allResults['Job_ID'];
			}
			return $resultsArray; // returns all the relevant jobID(s), use the getJobOpeningInfo in a while loop to fetch specific job info...
									//use $resultsArray[0]..[1]..[2].. etc. to access values
		}
		
			function searchCompanies($deptName)
			{
			
				$query = "SELECT * FROM `departments` WHERE `Dept_Name` = '$deptName'";
				$result_set = mysql_query($query);
				$result = mysql_fetch_array($result_set);
			
				$deptID = $result['Dept_ID'];
				$query = "SELECT * FROM `dept_cmp` WHERE `Dept_ID` = '".$deptID."'";
				$result_set = mysql_query($query);
				
				
				//confirm_query($result_set);
				
				$resultsArray=array();
				
				while($allResults = mysql_fetch_array($result_set))
				{
					$resultsArray[] = $allResults['Cmp_ID'];
				}
				return $resultsArray; // returns all the companyID(s), use the getJobOpeningInfo in a while loop to fetch specific job info...
										//use $resultsArray[0]..[1]..[2].. etc. to access values
			}
			
			function getCompanyInfo($companyID)
			{
				$query = "SELECT * FROM `employeer` WHERE `Cmp_ID` = '$companyID'";
				$results_set = mysql_query($query);
				
				$resultsArray = array();
				while($allResults = mysql_fetch_array($results_set))
				{
					$resultsArray[] = $allResults['Cmp_ID'];
					$resultsArray[] = $allResults['Cmp_Name'];
					$resultsArray[] = $allResults['Cmp_About'];
					$resultsArray[] = $allResults['Cmp_UName'];
					$resultsArray[] = $allResults['Cmp_Pass'];
					$resultsArray[] = $allResults['Cmp_CmpEmail'];
					$resultsArray[] = $allResults['Cmp_OtherInfo'];
					
				}
				
				return $resultsArray;
				// returns company info -> use arr[0]..[1] to access values
			}
			
			function applyForJob($jobID)
			{
					$query = "INSERT INTO `applications` (`Job_ID`,`Emp_ID`)
							
							VALUES ('$jobID', '$this->empID')";
				$result_set = mysql_query($query);
			}
		
	}
?>
