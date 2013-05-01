<?php
	include('./sessions.php');
	include('./db.inc.php');
	if (!isset($_SESSION['type'])){
		header( 'Location: index.php' ) ;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////EMPLOYEE//////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	elseif (getUserType()=='employee') {
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
?>

<script>
	var Emp_Name;
	var Emp_Age;
	var Emp_DOB;
	var Emp_Address;
	var Emp_Major;
	var Emp_GradDate;
	var Emp_UniName;
	var Emp_InternJob;
	var Emp_PrefCity;
	var Emp_UName;
	var Emp_Pass;
	var Emp_Email;
	var Emp_OtherInfo;
		function setviewvalues(){
				   document.getElementById('viewname').innerHTML=Emp_Name;
				   document.getElementById('viewage').innerHTML=Emp_Age;
				   document.getElementById('viewdob').innerHTML=Emp_DOB;
				   document.getElementById('viewaddress').innerHTML=Emp_Address;
				   document.getElementById('viewuni').innerHTML=Emp_UniName;
				   document.getElementById('viewmajor').innerHTML=Emp_Major;
				   document.getElementById('viewcity').innerHTML=Emp_PrefCity;
				   document.getElementById('viewgdate').innerHTML=Emp_GradDate;
				   document.getElementById('viewlookingfor').innerHTML=Emp_InternJob;
				   document.getElementById('viewuname').innerHTML=Emp_UName;
				   document.getElementById('viewemail').innerHTML=Emp_Email;
				   document.getElementById('viewinfo').innerHTML=Emp_OtherInfo;
				}
		function seteditvalues(){
				   document.getElementById('empName').value=Emp_Name;
				   document.getElementById('empAge').value=Emp_Age;
				   document.getElementById('empDOB').value=Emp_DOB;
				   document.getElementById('empAddress').value=Emp_Address;
				   document.getElementById('empUni').value=Emp_UniName;
				   document.getElementById('empMajor').value=Emp_Major;
				   document.getElementById('empCity').value=Emp_Major;
				   document.getElementById('empGDate').value=Emp_GradDate;
				   document.getElementById('empLookingFor').value=Emp_InternJob;
				   document.getElementById('empUName').value=Emp_UName;
				   document.getElementById('empPass').value=Emp_Pass;
				   document.getElementById('empEmail').value=Emp_Email;
				   document.getElementById('empInfo').value=Emp_OtherInfo;

		}
</script>
<?php
	echo ("<script> function viewprofile(){
		var userid=getID();"); ?>
	<?php 
		$empid=getEmployeeID();
		$query=mysql_query("SELECT * FROM `employee` WHERE `Emp_ID`='".$empid."'");
		$info = mysql_fetch_array($query);
		echo ("
				Emp_Name='".$info['Emp_Name']."';
				Emp_Age='".$info['Emp_Age']."';
				Emp_DOB='".$info['Emp_DOB']."';
				Emp_Address='".$info['Emp_Address']."';
				Emp_UniName='".$info['Emp_UniName']."';
				Emp_Major='".$info['Emp_Major']."';
				Emp_GradDate='".$info['Emp_GradDate']."';
				Emp_InternJob='".$info['Emp_InternJob']."';
				Emp_PrefCity='".$info['Emp_PrefCity']."';
				Emp_UName='".$info['Emp_UName']."';
				Emp_Email='".$info['Emp_Email']."';
				Emp_OtherInfo='".$info['Emp_OtherInfo']."';
				setviewvalues();
		}
		window.onload=viewprofile;
	</script>
		");
?>
	<div class="container-fluid">
	
		<div class="row-fluid">
			<header class="span12 hero-unit ">
				<h1>Angry Bosses! A Job Portal </h1>
			</header>
		</div>

		<div class="row-fluid">
			<ul class=" nav nav-tabs" id="profiletabs">
					<li class="active"><a href="#myprofile" data-toggle="tab" onclick="setviewvalues()" >My Profile</a></li>
					<li><a href="#editprofile" data-toggle="tab" onclick="seteditvalues()" >Edit Profile</a></li>
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
						<div id="viewname"> </div>
						<label><b>Employee Age</b></label>
						<div id="viewage"> </div>
						<label><b>Employee DOB</b></label>
						<div id="viewdob"> </div>
						<label><b>Employee Address</b></label>
						<div id="viewaddress"> </div>
						<label><b>University Name</b></label>
						<div id="viewuni"> </div>
						<label><b>Employee Major</b></label>
						<div id="viewmajor"> </div>
						<label><b>Graduation Date</b></label>
						<div id="viewgdate"> </div>
						<label><b>Preferred City</b></label>
						<div id="viewcity"> </div>
						<label><b>Looking for</b></label>
						<div id="viewlookingfor"> </div>
						<label><b>User Name</b></label>
						<div id="viewuname"> </div>
						<label><b>Email Address</b></label>
						<div id="viewemail"> </div>
						<label><b>Other Information</b></label>
						<div id="viewinfo"> </div>
					</div>
				</section>        
			</div>
			<div class="tab-pane" id="editprofile">
				<section class="row-fluid">
					<div class="span11 offset1">
						<div id="employeeform" style="margin-top:25px" >
							<div class="span12" >
								<label><b>Employee Name</b></label>
								<input class="input-xlarge" id="empName" type="text"  placeholder="Employee Name">
								<label><b>Employee Age</b></label>
								<input class="input-small" id="empAge" type="number"  placeholder="Age">
								<label><b>Employee DOB</b></label>
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
	function searchdept(){

	}
	function searchcmp(){

	}
	function setvalues(name,age,dob,address,uni,major,city,gdate,lookingfor,uname,pass,email,info){
		Emp_Name=name;
		Emp_Age=age;
		Emp_DOB=dob;
		Emp_Address=address;
		Emp_Major=major;
		Emp_GradDate=gdate;
		Emp_UniName=uni;
		Emp_InternJob=lookingfor;
		Emp_PrefCity=city;
		Emp_UName=uname;
		Emp_Pass=pass;
		Emp_Email=email;
		Emp_OtherInfo=info;
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

				 //  		
				});
				   setvalues(empname,empage,empdob,empaddress,empuni,empmajor,empcity,empgdate,emplookingfor,empuname,emppass,empemail,empinfo);
				   setviewvalues();
				   seteditvalues();		
			document.getElementById("updatestatus").innerHTML = "Record updated successfully";
			}
		}
			//updateprofile();
			//window.location.reload(true);
	}
</script>

</body>
</html>
<?php
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////EMPLOYER//////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif (getUserType()=="employer"){
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
<script>
	var Cmp_Name;
	var Cmp_About;
	var Cmp_UName;
	var Cmp_Pass;
	var Cmp_Email;
	var Cmp_OtherInfo;
		function setviewvalues(){
				   document.getElementById('viewname').innerHTML=Cmp_Name;
				   document.getElementById('viewabout').innerHTML=Cmp_About;
				   document.getElementById('viewuname').innerHTML=Cmp_UName;
				   document.getElementById('viewemail').innerHTML=Cmp_Email;
				   document.getElementById('viewinfo').innerHTML=Cmp_OtherInfo;
				}
		function seteditvalues(){
				   document.getElementById('cmpName').value=Cmp_Name;
				   document.getElementById('cmpAbout').value=Cmp_About;
				   document.getElementById('cmpUName').value=Cmp_UName;
				   document.getElementById('cmpPass').value=Cmp_Pass;
				   document.getElementById('cmpEmail').value=Cmp_Email;
				   document.getElementById('cmpInfo').value=Cmp_OtherInfo;

		}
</script>
<?php
	echo ("<script> function viewprofile(){
		var userid=getID();"); ?>
	<?php 
		$cmpid=getEmployerID();
		$query=mysql_query("SELECT * FROM `employeer` WHERE `Cmp_ID`='".$cmpid."'");
		$info = mysql_fetch_array($query);
		echo ("
				   Cmp_Name='".$info['Cmp_Name']."';
				   Cmp_About='".$info['Cmp_About']."';
				   Cmp_UName='".$info['Cmp_UName']."';
				   Cmp_Email='".$info['Cmp_Pass']."';
				   Cmp_OtherInfo='".$info['Cmp_OtherInfo']."';
				   setviewvalues();
		}
		window.onload=viewprofile;
	</script>
		");
?>
	<div class="container-fluid">
	
		<div class="row-fluid">
			<header class="span12 hero-unit ">
				<h1>Angry Bosses! A Job Portal </h1>
			</header>
		</div>

	<div class="row-fluid">
		<ul class=" nav nav-tabs" id="profiletabs">
				<li class="active"><a href="#myprofile" data-toggle="tab" onclick="setviewvalues()" >My Profile</a></li>
				<li><a href="#editprofile" data-toggle="tab" onclick="seteditvalues()" >Edit Profile</a></li>
				<li><a href="#searchforjobs" data-toggle="tab" onclick="searchdept()">Search for Jobs</a></li>
				<li><a href="#searchforcomp" data-toggle="tab" onclick="searchcmp()">Search for Companies</a></li>
				<li><a href="#logout" data-toggle="tab" onclick="logoutuser()" >Logout</a></li>
		</ul>
	</div>
	
	<div class="tab-content">
		<div class="tab-pane active" id="myprofile">
			<section class="row-fluid">
				<div class="span11 offset1">
	            	<label><b>Company Name</b></label>
	            	<div id="viewname"></div>
	                <label><b>About</b></label>
	                <div id="viewabout"></div>
	                <label><b>User Name</b></label>
	                <div id="viewuname"></div>
	                <label><b>Email Address</b></label>
	                <div id="viewemail"></div>
	                <label><b>Other Information</b></label>
	                <div id="viewinfo"></div>
	            </div>
			</section>        
		</div>
		<div class="tab-pane" id="editprofile">
			<section class="row-fluid">
				<div class="span11 offset1">
                    <div id="employeerform" style="margin-top:25px" >
                    	<div class="span12">
                        	<label><b>Company Name</b></label>
                            <input class="input-xlarge" id="cmpName" type="text"  placeholder="Comany Name">
                            <label><b>About</b></label>
                            <textarea id="cmpAbout" placeholder="About" class="span6" rows="6"></textarea>
                            <label><b>User Name</b></label>
                            <input class="input-medium" id="cmpUName" type="text" placeholder="User Name">
                            <label><b>Password</b></label>
                            <input class="input-medium" id="cmpPass" type="password" placeholder="Password">
                            <label><b>Email Address</b></label>
                            <input class="input-large" id="cmpEmail" type="email" placeholder="Email Address">
                            <label><b>Other Information</b></label>
                            <textarea id="cmpInfo" placeholder="Other Information" rows="6" class="span6"></textarea>
                        </div>
                        <div class="row-fluid">
                        	<div class="span2"> <button  type="button" class="btn btn-primary" id="newcbutton"  data-loading-text="Processing..." onClick="updateSubmit()">Update</button></div>
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
		return <?php echo ("'".getEmployerID()."'"); ?>;
	}
	function getUserType(){
		return <?php echo ("'".getUserType()."'"); ?>;	
	}
	function searchdept(){

	}
	function searchcmp(){

	}
	function setvalues(name,about,uname,pass,email,info){
		Cmp_Name=name;
		Cmp_About=about;
		Cmp_UName=uname;
		Cmp_Pass=pass;
		Cmp_Email=email;
		Cmp_OtherInfo=info;
	}
	function updateSubmit(){
		var cmpname=document.getElementById("cmpName").value;
		var cmpabout=document.getElementById("cmpAbout").value;
		var cmpuname=document.getElementById("cmpUName").value;
		var cmppass=document.getElementById("cmpPass").value;
		var cmpemail=document.getElementById("cmpEmail").value;
		var cmpinfo=document.getElementById("cmpInfo").value;
		var data='name='+cmpname+'&about='+cmpabout+'&uname='+cmpuname+'&pass='+cmppass+'&email='+cmpemail+'&info='+cmpinfo;
		var request =  get_XmlHttp();
		request.open("POST", "updateprofile.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
		document.getElementById("updatestatus").innerHTML = data;
		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				$.getJSON("updateprofile.php", function(data) {
					document.getElementById("cmpName").value=data.cmpname;
					document.getElementById("cmpAbout").value=data.about;
					document.getElementById("cmpUName").value=data.uname;
					document.getElementById("cmpPass").value=data.pass;
					document.getElementById("cmpEmail").value=data.email;
					document.getElementById("cmpInfo").value=data.otherinfo;				
				});
				setvalues(cmpname,cmpabout,cmpuname,cmppass,cmpemail,cmpinfo);
				setviewvalues();
				seteditvalues();
				document.getElementById("updatestatus").innerHTML = "Record updated successfully";
			}
		}
			//updateprofile();
			//window.location.reload(true);
	}
</script>
</body>
</html>
<?php
}
?>