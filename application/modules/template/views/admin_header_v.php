<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>DLTLD | Dashboard</title>
    <link rel="icon" type="text/css" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css"charset=" " href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/FusionCharts/Contents/Style.css" type="text/css" />
<script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387506872: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body page-fade">

<div class="page-container">	
	
<div class="sidebar-menu">
	
		<header class="logo-env">
		
		<!-- logo -->
		<div class="logo">
			<a href="<?php echo base_url('admin/index'); ?>">
				<img src="<?php echo base_url('assets/images/logo3.png'); ?>" class="img-responsive" alt="Responsive image"/>
			</a>
		</div>
		
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>
						
		
		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>
		
	</header>
		
<ul id="main-menu" class="">
								
	<li>
			<a href="<?php echo base_url('admin/index'); ?>"><i class="entypo-gauge"></i><span>Dashboard</span></a>
	
	</li>

	<li>
		<a href=""><i class="entypo-user"></i><span>Users</span></a>
		

		<ul>
		<li>
			<a href="<?php echo base_url('admin/userlog'); ?>"><span>Add/View Users</span></a>
		</li>

		<li>
			<a href="<?php echo base_url('admin/usergp'); ?>"><span>Add/View UserGroups</span></a>
		</li>

		</ul>

    </li>

	

	<li>
		<a href=""><i class="entypo-bag"></i><span>Extra</span><span class="badge badge-info badge-roundless">New Items</span></a>
		

		<ul>
		<li>
			<a href=""><span>County</span><span class="badge badge-success">47</span></a>
		
			<ul>
				<li>
					<a href="<?php echo base_url('admin/addfacility'); ?>"><span>Facilities</span></a>
			    </li>
			    
           </ul>

       </li>

		
		<li>
			<a href=""><span>GeneXpert Sites</span></a>
		

			<ul>
			<li>
					<a href=""><span>GeneXpert Sites</span></a>
			</li>

			</ul>

</li>

		<li>
			<a href=""><span>Change Password</span></a>
		</li>

		

		</ul>

</li>

</ul>
			
		
</div>	
	<div class="main-content" style="margin-top: -1%">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
			<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="img-responsive" />
				</a>
		    </li>
		
		</ul>
	</div>
	
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
			<li>
				<?php
					date_default_timezone_set('Europe/Moscow');
					
					$script_tz = date_default_timezone_get();
?>
<?php echo "<b>". @date("l, d F Y");?> <li class="sep"></li> Welcome <img src="<?php echo base_url('assets/images/icons/users.png'); ?>" height="15" /><?php echo  $this->session->userdata('name');?> 
		
			</li>
					
			<li class="sep"></li><br>
			
			<li style="float: right"><a href="<?php echo base_url(). "logout/logout"; ?>">Log Out <i class="entypo-logout right"></i></a></li>
		</ul>
		
	</div>
	
</div>

<hr />