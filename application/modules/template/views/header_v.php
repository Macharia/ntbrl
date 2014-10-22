<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>DLTLD</title>
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507089: Neon - Responsive Admin Template created by Laborator -->
</head>
<div  class="navbar-fixed-top" style=" 1.5%;float: left;background-color: #FFFFFF">
	<table>
		<tr>
			<td><strong><?php echo @date("l, d F Y");?> <br />  <span class="quiet">Welcome : </span></strong>
				
				<div class="btn-group">
					
  <button class="btn dropdown-toggle btn-blue" data-toggle="dropdown"><?php echo  $this->session->userdata('name');?> <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="changePass.php" id="reset">Change Password</a></li>
    
    <li><a href='<?php echo base_url(). "logout/logout"; ?> 'id="logout">Logout</a></li>
    
    
  </ul>
</div><!-- /btn-group -->
				</div>
				
			</td>
			<td ><img style="margin-left: 25%;" src="<?php echo base_url('assets/images/logo.png'); ?>   " class="img-responsive" alt="logo"/></td>
		</tr>
	</table>	
 
</div>

<body style =  "z-index: 100" class="page-body" >

<div class="page-container horizontal-menu">
	
	<header class="navbar navbar-fixed-top" style="margin-top: 5%;z-index: 100"><!-- set fixed position by adding class "navbar-fixed-top" -->
	
	
	<div class="navbar-inner">
	
		<!-- logo -->
		<div class="navbar-brand">
			
		</div>
		
		
		<!-- main menu -->
<ul class="navbar-nav">
	<li>
		<a href="<?php echo base_url('pm/overall'); ?>"><i class="entypo-home"></i><span>Home</span></a>
	</li>

	<li>
		<a href='<?php echo base_url(). "pm/countyfmap"; ?> '><i class="entypo-layout"></i><span>County View</span></a>
	</li>

	<!--<li>
		<a href="<?php echo base_url(); ?>assessmentSummary/section2.php"><i class="entypo-newspaper"></i><span>Assessment</span></a>
	</li> -->

	<li>
		<a href='<?php echo base_url(). "pm/facility"; ?> '><i class="entypo-menu"></i><span>Facilities</span></a>
	</li>
   <?php //if ($category!=6) {?>
	<li>
		<a href=""><i class="entypo-bag"></i><span>Allocation</span></a>
		
		<ul>
		<li>
			<a href='<?php echo base_url(). "pm/allocation"; ?> '><span>View Allocation</span><span class="badge badge-success">3</span></a>
		</li>
		<li>
			<a href='<?php echo base_url(). "pm/allo_summ"; ?> '><span>Allocation Summary</span></a>
	    </li>
		</ul>

    </li>
    <?php //} ?>
    <li>
		<a href="<?php echo base_url('pm/referral'); ?>"><i class="entypo-newspaper"></i><span>Referral Mapping</span></a>
	</li>

<li>
		<a href="<?php echo base_url('pm/inventory'); ?>"><i class="entypo-newspaper"></i><span>Inventory</span></a>
	</li>
</ul>
						
		
		<!-- notifications and other links -->
		<ul class="nav navbar-right pull-right">
			
			
			<li style="float: right">
				<a href='<?php echo base_url(). "logout/logout"; ?> '>
					Log Out <i class="entypo-logout right"></i>
				</a>
			</li>
			
		</ul>

	</div>
</div>	
</header>
<style type="text/css">

#broke {
float: left;
width: 50%;	
}

#sere {
clear: both;
}

#trans {
float: left;
width: 50%;	
}

#st {
float: left;
width: 47.5%;	
}

</style>


<script type="text/javascript">
var tname =/^[A-Za-z0-9 ]{3,200}$/;
var uname =/^[0-9 ]{3,20}$/;

function validate(){
	
   var oname = document.getElementById('oname').value;
   var ename = document.getElementById('ename').value;
   var broker = document.getElementById('broker').value;
    var str1= document.getElementById('date4').value;
    var str2= document.getElementById('date5').value;
	
var m1=str1.substring(5,7); 
var m2=str2.substring(5,7); 
var dt1=str1.substring(8,10); 
var dt2=str2.substring(8,10); 
var y1=str1.substring(0,4);
var y2=str2.substring(0,4);


var errors = [];
var minlength=6;
	


if(dt2 > dt1){
alert("Date of Price Cannot be Greater than Date of Stamp");
return false;
	
}

if(m2 > m1){
alert("Month of Price Cannot be Greater than Month of Stamp");
return false;
	
}

if(y2 > y1){
alert("Year of Price Cannot be Greater than Year of Stamp");
return false;
	
}
	
	
 if(broker=="0"){
	 alert("No Broker Name");
	 return false;
	 }

   if(str1=="0000-00-00"){
	  alert("No Date of Stamp"); 
	return false; 
 
   } 
      if(str2=="0000-00-00"){
	  alert("No Date of Price"); 
	return false; 
 
   } 	
   
 if (!tname.test(oname)) {
  errors[errors.length] = "No / Invalid Transferor name .";
 } 
 if (!tname.test(ename)) {
  errors[errors.length] = "No / Invalid Transferee name .";
 } 
 
 if (errors.length > 0) {
  reportErrors(errors);
  return false;
 }

return true;
}

function reportErrors(errors){
 var msg = "Please Enter Valid Data...\n";
 for (var i = 0; i<errors.length; i++) {
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
}

 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	var YAP = document.getElementById("rat");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
			YAP.style.display = "block";
		text.innerHTML = "SEARCH";
  	}
	else {
		ele.style.display = "block";
		YAP.style.display = "none";
		text.innerHTML = "SEARCH";
	}
} 


/*function ShowHide(divId)
{
if(document.getElementById(divId).style.display == 'none')
{
document.getElementById(divId).style.display='block';
}
else
{
document.getElementById(divId).style.display = 'none';
}
}
*/






</script>
