<!DOCTYPE html>
<html lang="en">

	<!-- Mirrored from demo.neontheme.com/frontend/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Oct 2014 07:44:33 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>DLTLD</title>
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon" />
	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/neon.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
    <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
   
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.11.0.min.js"></script>
<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="http://demo.neontheme.com/assets/frontend/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
	<!-- TS1412235722: Neon - Responsive Admin Template created by Laborator -->
</head>


<body>

<div class="wrap">
	<div class="site-header-container container">
		<div class="row">
	
			<div class="col-md-12">
				<section class="site-logo">
				 
						<style>
							IMG.displayed {
							    display: block;
							    margin-left: auto;
							    margin-right: auto;
							    padding-top: 0; 
							    max-width: 100%;
 							    height: auto;
 							    vertical-align: middle;
							    }
						</style>
						
						<span>
						<div class="displayed">
							
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="img-responsive" alt="logo" />
								</a>
							
						</div>
						</span>
				</section>	
					
			</div>	
			
			
		</div>

	<div class="row">
	
		<div class="col-md-12">
			
			<header class="site-header">
				
			
				<span><strong><?php echo @date("l, d F Y");?> <br />  <span class="quiet">Welcome : </span></strong>
								
								<div class="btn-group">
									
								  <button class="btn dropdown-toggle btn-blue" data-toggle="dropdown"><?php echo  $this->session->userdata('name');?></button>
									  
								
								</div><!-- /btn-group -->
								
							
						</span>
				
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li>
							<a href="<?php echo base_url('pm/overall'); ?>"><i class="entypo-home"></i><span>Home</span></a>
						</li>
						
						<li>
							<a href="<?php echo base_url(). "pm/countyfmap"; ?>"><i class="entypo-layout"></i><span>County View</span></a>
						</li>
						<!--<li>
							<a href="../assessmentSummary/section2.php"><i class="entypo-newspaper"></i><span>Assessment</span></a>
						</li> -->
						<li>
							<a href="<?php echo base_url(). "pm/facility"; ?> "><i class="entypo-menu"></i><span>Facilities</span></a>
						</li>
						<?php if ($this->session->userdata('cat')!=6) {?>
						<li>
							<a >
								<i class="entypo-bag"></i><span>Allocation</span>
							</a>
							
							<ul>
								<li>
									<a href="<?php echo base_url(). "pm/allocation"; ?>"><span>View Allocation</span></a>
								</li>
								<li>
									<a  href="<?php echo base_url(). "pm/allo_summ"; ?>"><span>Allocation Summary</span></a>
							    </li>
							</ul>
						</li>
						 <?php } ?>
						 <li>
							<a href="<?php echo base_url('pm/inventory'); ?>"><i class="entypo-newspaper"></i><span>Inventory</span></a>
						</li>
						 <li>
							<a href="<?php echo base_url('pm/contact'); ?>"><i class="entypo-chat"></i><span>Contacts</span></a>
						</li>
						<li>
							<a>
								<i class="entypo-logout"></i><span>Settings </span>
							</a>
							<ul>
									    <li><a href="<?php echo base_url(). "pm/changePass"; ?>" id="reset">Change Password</a></li>
									    <li><a href="<?php echo base_url(). "logout/logout"; ?>" id="logout">Logout</a></li>
						    </ul>
						</li>
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>
				
			</header>
			<hr>
		</div>
		
	</div>
	
</div>

</div>	



	<script src="<?php echo base_url(); ?>assets/frontend/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/joinable.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/resizeable.js" id="script-resource-4"></script>
	
	<script src="<?php echo base_url(); ?>assets/frontend/js/neon-custom.js" id="script-resource-6"></script>
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
	
</body>

<!-- Mirrored from demo.neontheme.com/frontend/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Oct 2014 07:45:08 GMT -->
</html>



