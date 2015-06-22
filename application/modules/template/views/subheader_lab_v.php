<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon assets Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>DLTLD | Lab</title>
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionMaps/JSClass/FusionMaps.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="http
	<!-- TS1387507089: Neon - Responsive assets Template created by Laborator -->
</head>
	
<div  class="navbar-fixed-top" style=" 1.5%;float: left;background-color: #FFFFFF">
	<table>
		<tr>
			<td><strong><?php echo @date("l, d F Y");?> <br />  <span class="quiet">Welcome : </span></strong>
				
				<div class="btn-group">
					
  <button class="btn dropdown-toggle btn-blue" data-toggle="dropdown"><?php echo  $this->session->userdata('name');?> <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('labtech/changePass'); ?>" id="reset">Change Password</a></li>
    
    <li><a href='<?php echo base_url(). "logout/logout"; ?> 'id="logout">Logout</a></li>
    
    
  </ul>
</div><!-- /btn-group -->
				</div>
				
			</td>
			<td ><img style="margin-left: 25%;" src="<?php echo base_url('assets/images/logo.png'); ?>   " class="img-responsive" alt="logo"/></td>
		</tr>
	</table>	
 
</div>
           
<body class="page-body" >

<div class="page-container horizontal-menu" style="background-color: #FFFFFF;">
	
	<header class="navbar navbar-fixed-top" style="margin-top: 5%"><!-- set fixed position by adding class "navbar-fixed-top" -->
	
	
	<div class="navbar-inner">
	
		<!-- logo -->
		<div class="navbar-brand">
			
		</div>
		
		
		<!-- main menu -->
<ul class="navbar-nav" style="margin-left: 15%">
	<?php if ($reportedpreviousmonth>0) { ?>
	<li>
		<a href="<?php echo base_url('labtech/index'); ?>"><i class="entypo-home"></i><span>Home</span></a>
	</li>
    <li>
	  <a href="#"><span><i class="entypo-suitcase"></i></span><span>Samples</span></a>
		<ul>
			<li>
				<a href="<?php echo base_url('labtech/sampleview'); ?>"><span><i class="entypo-suitcase"></i></span><span>Sample List</span><span class="badge badge-info"><?php echo $notup; ?></span></a>
			</li>
			<li>
				<a href="<?php echo base_url('labtech/allsampleview'); ?>"><span><i class="entypo-suitcase"></i></span><span>Complete Records</span><span class="badge badge-success"><?php echo $complete ;?></span></a>
		    </li>
		    <li>
				<a href="<?php echo base_url('labtech/sampleErr'); ?>"><span><i class="entypo-suitcase"></i></span><span>Error Records</span><span class="badge badge-danger"><?php echo $errors ;?></span></a>
		    </li>
		</ul>
    </li>
	<li>
		<a href="<?php echo base_url('labtech/dashboard'); ?>"><i class="entypo-gauge"></i><span>Dashboard</span></a>
	</li>

	<li>
		<a href="<?php echo base_url('labtech/facility'); ?>"><i class="entypo-vcard"></i><span>Facilities</span></a>
	</li>
	
	<li>
		<a href="#"><i class="entypo-list-add"></i><span>Consumption Report</span></a>
	
			<ul>
				<li>
					<a href="<?php echo base_url('labtech/viewconsumption'); ?>"><i class="entypo-list-add"></i><span>View Consumption</span></a>
				</li>
				<?php 
				$currentmonth=@date("m");
				$todaysdate=@strtotime(@date("Y-m-d"));
				//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)));
				if ( ($todaysdate===$displayDate) and ($totalrow==0))
				    {
		               echo '<li><a href="submitconsumptionreport.php?month='.$currentmonth.'&year='.$currentyear.'"><i class="entypo-list-add"></i><span>Consumption Reporting</span></a></li>';
		            }
			      
		        ?>
			</ul>
	</li>		
     
     <li>
		<a href="<?php echo base_url('labtech/summ'); ?>"><i class="entypo-menu"></i><span>Reports</span></a>
	</li>
    <?php }  else { ?>
    <li>
		<a href="pendings.php"><i class="entypo-home"></i><span>Home</span></a>
	</li>
     <?php } ?>
	
</ul>
						
		
		<!-- notifications and other links -->
		<ul class="nav navbar-right pull-right">
			
			
			<li style="float: right">
				<a href="<?php echo base_url(). 'logout/logout'; ?>">
					Log Out <i class="entypo-logout right"></i>
				</a>
			</li>
			
		</ul>

	</div>
	

<div class="page-container">
		

</header>
 <script language="JavaScript">
function ShowHide(divId)
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
</script>