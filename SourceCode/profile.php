<?php
	include('./sessions.php');
	include('./db.inc.php');
	if (!isset($_SESSION['type'])){
		header( 'Location: index.php' ) ;
	}
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Angry Bosses: A Job Portal!</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<!-- HTML5 shim for IE backward compatibility -->
	<!--[if lt IE9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
		</script>
	<![endif]-->
</head>
<body>
	<div class="container-fluid">
	
		<div class="row-fluid">
			<header class="span12 hero-unit ">
				<h1>Angry Bosses! A Job Portal </h1>
			</header>
		</div>

	<div class="row-fluid">
		<ul class=" nav nav-tabs" id="profiletabs">
				<li class="active"><a href="#myprofile" data-toggle="tab" onclick="viewprofile()" >My Profile</a></li>
				<li><a href="#editprofile" data-toggle="tab" onclick="updateprofile()" >Edit Profile</a></li>
				<li><a href="#searchforjobs" data-toggle="tab" onclick="searchdept()">Search for Jobs</a></li>
				<li><a href="#searchforcomp" data-toggle="tab" onclick="searchcmp()">Search for Companies</a></li>
				<li><a href="#logout" data-toggle="tab" onclick="logoutuser()" >Logout</a></li>
		</ul>
	</div>
	
	<div class="tab-content">
		<div class="tab-pane active" id="myprofile">
			<section class="row-fluid">
				<div class="span11 offset1">
					<label><b>Employee Name</b></label>
					
				</div>
			</section>        
		</div>
		<div class="tab-pane active" id="editprofile">
			<section class="row-fluid">
				<div class="span11 offset1">
					<div id="employeeform" style="margin-top:25px" >
						<div class="span12" >
							<label><b>Employee Name</b></label>
							<input class="input-xlarge" id="empName" type="text"  placeholder="Employee Name">
							<label><b>Employee Age</b></label>
							<input class="input-small" id="empAge" type="number"  placeholder="Age">
							<label><b>Employee Name</b></label>
							<input class="input-large" id="empDOB" type="date"  placeholder="Employee DOB">
							<label><b>Employee Address</b></label>
							<textarea id="empAddress" placeholder="Employee Address" class="span6" rows="6"></textarea>
							<label><b>University Name</b></label>
							<input class="input-xlarge" id="empUni" type="text" placeholder="University Name" >
							<label><b>Employee Major</b></label>
							<input class="input-large" id="empMajor" type="text" placeholder="Employee Major" >
							<label><b>Graduation Date</b></label>
							<input class="input-xlarge" id="empGDate" type="date">
							<label><b>Preferred City</b></label>
							<input class="input-medium" id="empCity" type="text" placeholder="Preferred City" >
							<label><b>Looking for</b></label>
							<select class="span1" required id="empLookingFor">
								<option value="Internship">Internship</option>
								<option value="Job">Job</option>
							</select>
							<label><b>User Name</b></label>
							<input class="input-medium" id="empUName" type="text" placeholder="User Name">
							<label><b>Password</b></label>
							<input class="input-medium" id="empPass" type="password" placeholder="Password">
							<label><b>Email Address</b></label>
							<input class="input-large" id="empEmail" type="email" placeholder="Email Address">
							<label><b>Other Information</b></label>
							<textarea id="empInfo" placeholder="Other Information" rows="6" class="span6"></textarea>
						</div>
						<div class="row-fluid">
						  <div class="span2"> <button  type="button" class="btn btn-primary" id="newebutton"  data-loading-text="Processing..." onClick="updateSubmit()">Update</button></div>
						  <div class="span3 offset2" id="updatestatus"></div>
						</div>                    
					</div>                	
				</div>
			</section>        
		</div>
		<div class="tab-pane active" id="searchforjobs">
			<section class="row-fluid">
				<div class="span11 offset1">
					
				</div>
			</section>        
		</div>
		<div class="tab-pane active" id="searchforcomp">
			<section class="row-fluid">
				<div class="span11 offset1">
					
				</div>
			</section>        
		</div>   
	</div>
	
	</div>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spin.js"></script>
<script>
	
	function get_XmlHttp() {
	  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
	  var xmlHttp = null;
	
	  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
		xmlHttp = new XMLHttpRequest();
	  }
	  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  return xmlHttp;
	}
	
	function logoutuser(){
		var request = get_XmlHttp();
		request.open("POST","logout.php",true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send('logout=1');
		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				var state=request.responseText;
				if (state==true){
					window.location="index.php";
				}
				else if (state==false){
					
				}
			}
		}
	}
	function getID(){
		return <?php echo ("'".getEmployeeID()."'"); ?>;
	}
	function getUserType(){
		return <?php echo ("'".getUserType()."'"); ?>;	
	}
	function viewprofile(){
		document.getElementById("employeerform").style.display="none";
		document.getElementById("employeeform").style.display="block";
	}
	function searchdept(){

	}
	function searchcmp(){

	}
	function updateSubmit(){
		var empname=document.getElementById("empName").value;
		var empage=document.getElementById("empAge").value;
		var empdob=document.getElementById("empDOB").value;	
		var empaddress=document.getElementById("empAddress").value;
		var empuni=document.getElementById("empUni").value;
		var empmajor=document.getElementById("empMajor").value;
		var empgdate=document.getElementById("empGDate").value;
		var empcity=document.getElementById("empCity").value;
		var emplookingfor=document.getElementById("empLookingFor").value;
		var empuname=document.getElementById("empUName").value;
		var emppass=document.getElementById("empPass").value;
		var empemail=document.getElementById("empEmail").value;
		var empinfo=document.getElementById("empInfo").value;
		var data='name='+empname+'&age='+empage+'&dob='+empdob+'&address='+empaddress+'&uni='+empuni+'&major='+empmajor+'&gdate='+empgdate+'&city='+empcity+'&lookingfor='+emplookingfor+'&uname='+empuname+'&pass='+emppass+'&email='+empemail+'&info='+empinfo;
		var request =  get_XmlHttp();
		request.open("POST", "updateprofile.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				$.getJSON("updateprofile.php", function(data) {
				   document.getElementById('empName').value=data.name;
				   document.getElementById('empAge').value=data.age;
				   document.getElementById('empDOB').value=data.dob;
				   document.getElementById('empAddress').value=data.address;
				   document.getElementById('empUni').value=data.uni;
				   document.getElementById('empMajor').value=data.major;
				   document.getElementById('empCity').value=data.city;
				   document.getElementById('empGDate').value=data.gdate;
				   document.getElementById('empLookingFor').value=data.lookingfor;
				   document.getElementById('empUName').value=data.uname;
				   document.getElementById('empPass').value=data.pass;
				   document.getElementById('empEmail').value=data.email;
				   document.getElementById('empInfo').value=data.info;				
				});
			document.getElementById("updatestatus").innerHTML = "Record updated successfully";
			}
		}
			//updateprofile();
			//window.location.reload(true);
	}
</script>
<?php
	echo ("<script> function updateprofile(){
		var usertype=getUserType();
		if (usertype=='employee'){
			var userid=getID();");
?>
		<?php	
			$query=mysql_query("SELECT * FROM `employee` WHERE `Emp_ID`='".getEmployeeID()."'");
			$info = mysql_fetch_array($query, MYSQL_ASSOC);
		?>
		<?php
			echo ("document.getElementById('empName').value='".$info['Emp_Name']."';
				   document.getElementById('empAge').value='".$info['Emp_Age']."';
				   document.getElementById('empDOB').value='".$info['Emp_DOB']."';
				   document.getElementById('empAddress').value='".$info['Emp_Address']."';
				   document.getElementById('empUni').value='".$info['Emp_UniName']."';
				   document.getElementById('empMajor').value='".$info['Emp_Major']."';
				   document.getElementById('empCity').value='".$info['Emp_PrefCity']."';
				   document.getElementById('empGDate').value='".$info['Emp_GradDate']."';
				   document.getElementById('empLookingFor').value='".$info['Emp_InternJob']."';
				   document.getElementById('empUName').value='".$info['Emp_UName']."';
				   document.getElementById('empPass').value='".$info['Emp_Pass']."';
				   document.getElementById('empEmail').value='".$info['Emp_Email']."';
				   document.getElementById('empInfo').value='".$info['Emp_OtherInfo']."';

		}
		else if (usertype=='employer'){

		}
	}
	window.onload=updateprofile;
</script>
");
?>
</body>
</html>
<?php
}
?>