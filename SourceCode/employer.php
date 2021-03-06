<?php
	include('./db.inc.php');
	Class Employer{

		public $companyID;
		public $name;
		public $about;
		public $departments;
		public $UName;
		public $password;
		public $emailAdd;
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
			$this->companyID = $id;
			while($results = mysql_fetch_array($result_set))
			{
				$this->name = $results['Cmp_Name'];
				$this->about = $results['Cmp_About'];
				$this->UName = $results['Cmp_UName'];
				$this->Cmp_Email = $results['Cmp_Email'];
				$this->otherInformation = $results['Cmp_OtherInfo'];
			}
		}



		function searchEmployee($deptID) // takes in department ID and returns employees belonging to the department
		{
			$query = "SELECT * FROM `departments` WHERE `Dept_Name` = '$deptName'";
			$result_set = mysql_query($query);
			$result = mysql_fetch_array($result_set);
			
			$deptID = $result['Dept_ID'];
			
			$query = "SELECT * FROM `dept_emp` WHERE `Dept_ID` = '".$deptID."'";
			$result_set = mysql_query($query);
			//confim_query($result_set);

			$resultsArray=array();

			while($allResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $allResults['Emp_ID'];
			}
			return $resultsArray;
		}


		//function editProfile($cName,$cAbout,$cDepartments, $cDepartmentSize, $cUName,$cPassword,$cEmail,$cOtherInformation)
		//for change later
		function editProfile($cName,$cAbout, $cUName,$cPassword,$cEmail,$cOtherInformation)
		{
			//void function
			$this->name = $cName;
			$this->about = $cAbout;
			//$departments = $cDepartments;
			$this->UName = $cUName;
			$this->password = $cPassword;
			$this->emailAdd = $cEmail;
			$this->otherInformation = $cOtherInformation;
			$this->updateEmployer();
			//$this->updateDepartments();
		}

		function addEmployer($cName,$cAbout,$cUName,$cPassword,$cEmail,$cOtherInformation)
		{	// adds a new employer to the system, and sets the current employer object equal to the newly added employer ...
			$this->name = $cName;
			$this->about = $cAbout;
			//$departments = $cDepartments;
			$this->UName = $cUName;
			$this->password = $cPassword;
			$this->emailAdd = $cEmail;
			$this->otherInformation = $cOtherInformation;
			$this->companyID = $this->addNewEmployer();

		}

		function addNewEmployer()
		{
			$query = "INSERT INTO `employeer` (`Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`)
						VALUES ('$this->name','$this->about','$this->UName','$this->password','$this->emailAdd','$this->otherInformation')";
			$result_set = mysql_query($query);
			////confim_query($result_set);

			$query = "SELECT `Cmp_ID` from employeer where `Cmp_Email`='" .$this->emailAdd . "'";
			$result_set = mysql_query($query);
			////confim_query($result_set);

			while($allResults = mysql_fetch_array($result_set))
			{
				return $allResults['Cmp_ID'];
			}
		}

		function updateEmployer()
		{
			$query = "UPDATE `employeer`
			
			SET
			
			`Cmp_Name` = '".$this->name."',
			`Cmp_About` = '".$this->about."',
			`Cmp_UName` = '".$this->UName."',
			`Cmp_Email` = '".$this->emailAdd."',
			`Cmp_OtherInfo` = '".$this->otherInformation."'
			WHERE
			`Cmp_ID` = '".$this->companyID."'";

			$result_set = mysql_query($query);
			//confim_query($result_set);
		}


		function getAllInformation()
		{
			//returns an array
			return array($companyID, $name, $about, $departments,$UName,$email,$otherInformation);
		}

		function getAllMyOpenings()
		{
			$query = "SELECT * FROM job_openings WHERE Cmp_ID = '$this->companyID'";
			$result_set = mysql_query($query);
			//confim_query($result_set);
			
				$resultsArray=array();

			while($allResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $allResults['Job_ID'];
			}
			return $resultsArray; // use while loop to traverse the return array..returns single array.
		}

		function getJobOpeningInfo($id)
		{
			$query = "SELECT * FROM job_openings WHERE Job_ID = '$id'";
			$result_set = mysql_query($query); 
			//confim_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}

		function getJobApplications($jobID)
		{
		
			$query = "SELECT * FROM applications WHERE Job_ID = '$jobID'";
			$result_set = mysql_query($query);
			//confim_query($result_set);
			
			$resultsArray=array();

			while($allResults = mysql_fetch_array($result_set))
			{
				$resultsArray[] = $allResults['Emp_ID'];
			}
			return $resultsArray; // returns all employer id's
		}

		function getApplication($applicationID)
		{
			$query = "SELECT * FROM applications WHERE App_ID = '$applicationID'";
			$result_set = mysql_query($query);
			//confim_query($result_set);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}

		function addJobOpening($title,$detail,$location,$requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)
		{
			$query = "INSERT INTO job_openings (Cmp_ID, Job_Location, Job_Requirements, Job_Open, Job_ODate, Job_CDate,
			Job_Duration, Job_Type,Job_Salary, Job_OtherInfo)
						VALUES ('$this->companyID', '$location', '$requirements','$open','$openDate','$closeDate','$duration','$type','$salary','$otherInfo')";
			$result_set = mysql_query($query);
			return $result_set; // use mysql_fetch_array($result_set) to fetch return results..
		}

		function editJobOpening($jobID, $title,$detail,$location,$requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)
		{

			$query = "UPDATE job_openings
			
			SET
			
			Cmp_ID = '$this->companyID',
			Job_Location = '$location',
			Job_Requirements= '$requirements',
			Job_Open = '$open',
			Job_ODate = '$openDate',
			Job_CDate = '$closeDate',
			Job_Duration = '$duration',
			Job_Type = '$type',
			Job_Salary = '$salary',
			Job_OtherInfo = '$otherInfo'
			WHERE
			Job_ID = '$jobID'";

			$result_set = mysql_query($query);
			//confim_query($result_set);

		}

	}
?>
