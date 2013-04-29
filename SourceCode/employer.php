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
		
		function construct($id)
		{
			//enter SQL statement to go through db and update all
			$query = "SELECT * FROM employeer WHERE Cmp_ID = " . $id;
			$result_set = mysql_query($query);
			
			while($results = mysql_fetch_array($result_set))
			{
				$name = $results[''];
			}
		}
		
		
		function editProfile($cName,$cAbout,$cDepartments,$cUniversityName,$cPassword,$cEmail,$cOtherInformation)
		{
			//void function
			$name = $cName;
			$about = $cAbout;
			$departments = $cDepartments;
			$universityName = $cUniversityName;
			$password = $cPassword;
			$email = cEmail;
			$otherInformation = $cOtherInformation;
			update();
		}
		
		function getAllInformation()
		{
			//returns an array
			return array($companyID, $name, $about, $departments,$universityName,$password,$email,$otherInformation);
		}
		
		function getAllMyOpenings()
		{
			$query = "SELECT * FROM job_openings WHERE Cmp_ID = " . $companyID;
			$result_set = mysql_query($query);
			
			return $result_set; // use mysql_fetch_array($result_set) to fetch results from here
		}
		
		function getJobOpeningInfo($id)
		{
			$query = "SELECT * FROM job_openings WHERE Job_ID = "  . $id;
			$result_set = mysql_query($query);
		}
		
		function getJobApplications($jobID)
		{
			$query = "SELECT * FROM applications WHERE Job_ID = ". $jobID;
			$result_set = mysql_query($query);
		}
		
		function getApplication($applicationID)
		{
			$query = "SELECT * FROM applications WHERE App_ID = " . $applicationID;
			$result_set = mysql_query($query);
		}
		
		function addJobOpening($title,$detail,$location,$requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)
		{
			
			$query = "INSERT INTO job_openings (Cmp_ID, Job_Location, Job_Requirements, Job_Open, Job_ODate, Job_CDate,
			Job_Duration, Job_Type,Job_Salary, Job_OtherInfo)
						VALUES ($companyID, $location, $requirements,$open,$openDate,$closeDate,$duration,$type,$salary,$otherInfo)";
			
			$result_set = mysql_query($query);
			
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
			
		}

	}
?>
