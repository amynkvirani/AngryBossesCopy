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
	<script>
        window.onload=makeList;
    </script>
</head>
<body>
<div class="container-fluid">

	<div class="row-fluid">
    	<header class="span12 hero-unit ">
        	<h1>Angry Bosses! A Job Portal </h1>
        </header>
    </div>
    
    <div class="row-fluid">
        <ul class=" nav nav-tabs" id="loginsignuptabs">
                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                <li><a href="#signup" data-toggle="tab">Sign Up</a></li>
        </ul>
    </div>
    
    <div class="tab-content">

        <div class="tab-pane active" id="login">
        	<section class="row-fluid">
            	<div class="span11 offset1">
                    <form>
                        <fieldset>
                            <legend>Log In!</legend>
                            <label id="uName">User Name</label>
                            <input class="input-xxlarge" id="loginuname" type="text">
                            <label id="pass">Password</label>
                            <input class="input-xxlarge" id="loginpass" type="password">
                          	<label id="login">Login as: </label>
                            <select required id="loginas">
                                <option selected value="employee">Employee</option>
                                <option value="employeer">Employeer</option>
                            </select>
                        </fieldset>
                    </form>
            	</div>
            </section>
        </div>
        
        <div class="tab-pane" id="signup">
            <div class="row-fluid">
            	<div class="span11 offset1">
               		<legend>Sign Up!</legend>
                    <div class="btn-group" data-toggle="buttons-radio">
                    	<button id="type_employeer" type="button" class="btn btn-small active" onClick="radioEmployeer()">Empoyeer</button>
                    	<button id="type_employee" type="button" class="btn btn-small" onClick="radioEmployee()" >Employee</button>
                    </div>
                    <br>
                    <div id="employeerform" style="margin-top:25px">
                    	<div class="span12">
                        	<label><b>Company Name</b></label>
                            <input class="input-xlarge" id="newcmpName" type="text"  placeholder="Comany Name">
                            <label><b>About</b></label>
                            <textarea id="newcAbout" placeholder="About" class="span6" rows="6"></textarea>
                            <label><b>Number of Departments</b></label>
                            <input class="input-small" id="newcNDept" type="number" onchange="makeList()" value="1" min="1" max="10" >
                            <label><b>Departments</b></label>
                            <div class="row-fluid"  >
                            <div class="span3" id="deptdrop">
                            	<script>
									function makeList(){
										var totaldept=document.getElementById("newcNDept").value;
										manydeptlist(totaldept);
									}
									window.onload=makeList;
                                </script>
                                </div>
                            </div>
                            <label><b>User Name</b></label>
                            <input class="input-large" id="newcuname" type="text" placeholder="User Name">
                            <label><b>Password</b></label>
                            <input class="input-large" id="newcpass" type="password" placeholder="Password">
                            <label><b>Email Address</b></label>
                            <input class="input-large" id="newcemail" type="email" placeholder="Email Address">
                            <label><b>Other Information</b></label>
                            <textarea id="cmpAbout" placeholder="Other Information" rows="6" class="span6"></textarea>
                        </div>
                        
                    </div>
                    
                    <div id="employeeform" style="margin-top:25px">
                    </div>
            	
                </div>
            </div>       
        </div>
    </div>
</div>
<script>
	function onedeptlist(idname){
		
		var opt="<option selected value='employee'>Employee</option><option value='employeer'><?php echo('Employeer')?></option>";
		document.getElementById("deptdrop").innerHTML=document.getElementById("deptdrop").innerHTML+("<select class='span12' required id='"+idname+"'>"+opt+"</select>");
	}
	function manydeptlist(count){
		$(document.getElementById("deptdrop")).empty();
		for (var i=0;i<count;i++)
		{ 
			onedeptlist("deptlist"+i);
		}
	}
	function makeList(){
		var totaldept=document.getElementById("newcNDept").value;
		manydeptlist(totaldept);
	}
</script>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
