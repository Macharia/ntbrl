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

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/neon.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	
    <script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
   
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/frontend/js/jquery-1.11.0.min.js"></script>

	
    <script>$.noConflict();</script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="http
	<!-- TS1387507089: Neon - Responsive assets Template created by Laborator -->
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
									<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="displayed" />
								</a>
							
						</div>
						</span>
				</section>	
					
			</div>	
			
			
		</div>

	<div class="row">
	
		<div class="col-md-12">
			
			<header class="site-header">
				
			
				<span><strong><?php echo @date("l, d F Y");?> <br />
					  <span class="quiet">Welcome : </span></strong>
						<div class="label label-info">
							<?php echo  $this->session->userdata('name')."[".$this->session->userdata('facility')."]";?> 
						</div>
				</span>
				
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<?php if ($reportedpreviousmonth>0) { ?>
						<li>
							<a href="<?php echo base_url('labtech/index'); ?>"><i class="entypo-home"></i><span>Home</span></a>
						</li>
						<li>
							<a >
								<i class="entypo-bag"></i><span>Samples</span>
							</a>
							
							<ul style="width: 100%">
								<li>
									<a href="<?php echo base_url('labtech/sampleview'); ?>"><span><i class="entypo-suitcase"></i></span><span>Sample List</span><span class="badge badge-info" style="float: right;" ><?php echo $notup ;?></span></a>
								</li>
								<li>
									<a href="<?php echo base_url('labtech/allsampleview'); ?>"><span><i class="entypo-suitcase"></i></span><span>Complete Records</span><span class="badge badge-success" style="float: right;" ><?php echo $complete ;?></span></a>
							    </li>
							    <li>
									<a href="<?php echo base_url('labtech/sampleErr'); ?>"><span><i class="entypo-suitcase"></i></span><span>Error Records</span><span class="badge badge-danger" style="float: right;"><?php echo $errors ;?></span></a>
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

									if ( ($todaysdate==$displayDate) and ($totalrow==0))
									    {
							               echo '<li><a href="<?php echo base_url(); ?>submitconsumptionreport?month='.$currentmonth.'&year='.$currentyear.'"><i class="entypo-list-add"></i><span>Consumption Reporting</span></a></li>';
							            }
								      
							        ?>
								</ul>
						</li>		
					     
					     <li>
							<a href="<?php echo base_url('labtech/summ'); ?>"><i class="entypo-menu"></i><span>Reports</span></a>
						</li>
					    <?php }  else { ?>
					    <li>
							<a href="<?php echo base_url('labtech/pendings'); ?>"><i class="entypo-home"></i><span>Home</span></a>
						</li>
					     <?php } ?>
						<li style="float: right">
							<a href="<?php echo base_url(). 'logout/logout'; ?>">
								Log Out <i class="entypo-logout right"></i>
							</a>
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



	<script src="<?php echo base_url(); ?>assets/frontend/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/joinable.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/resizeable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/neon-slider.js" id="script-resource-5"></script>
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


</html>
 