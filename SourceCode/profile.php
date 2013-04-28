<?php
	include('./sessions.php');
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
                <li class="active"><a href="#profile" data-toggle="tab" >Profile</a></li>
                <li><a href="#searchforjobs" data-toggle="tab">Search for Jobs</a></li>
                <li><a href="#searchforcomp" data-toggle="tab">Search for Companies</a></li>
                <li><a href="#logout" data-toggle="tab" onclick="logoutuser()" >Logout</a></li>
        </ul>
    </div>
    
    <div class="tab-content">
    	<div class="tab-pane active" id="profile">
        	<section class="row-fluid">
            	<div class="span11 offset1">
                	<div id="loginstatus">Login Status</div>
                </div>
            </section>        
        </div>
     	<div class="tab-pane active" id="searchforjobs">
        	<section class="row-fluid">
            	<div class="span11 offset1">
                	<div id="loginstatus">Login Status</div>
                </div>
            </section>        
        </div>
    	<div class="tab-pane active" id="searchforcomp">
        	<section class="row-fluid">
            	<div class="span11 offset1">
                	<div id="loginstatus">Login Status</div>
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
					document.getElementById("loginstatus").innerHTML="logged out successfully";
					window.location="index.php";
				}
				else if (state==false){
					
				}
			}
		}
	}
</script>

<?php

	$stat=logged_in();
	if ($stat){
		echo("here is the echo".getEmployeeID());
	}
	//echo ("document.getElementById(\"loginstatus\").innerHTML=\"loginstatus\"+".$stat);
	//echo("<script>
		//function status(){
			//document.getElementById('loginstatus').innerHTML='loginstatus'+".$stat.";	
		//}
		//window.onload=status;
?>
</body>
</html>