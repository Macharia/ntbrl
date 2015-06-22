<body class="page-body">

<div class="page-container">
		
<div class="sidebar-menu fixed" style="width: 245px;">
	<ul id="main-menu" style="margin-top: 52%;">
		   <li style="font-size: 10px;">
		      <a href="samp1.php"><i class="entypo-user-add"></i><span>Add Patient Details</span></a>
		   </li>
		   <li style="font-size: 10px;">
		      <a href="worksheet.php"><i class="entypo-docs"></i><span>View Worksheet</span><span class="badge badge-info">8</span></a>
		   </li>
		  <!-- <li style="font-size: 10px;">
			  <a href="csv_upload.php"><i class="entypo-upload"></i><span>Upload Result File</span><span class="badge badge-info"></span></a>
		  </li> -->

		   <li style="font-size: 10px;">
			 <a href="changePass.php"><i class="entypo-user"></i><span>Change Password</span></a>
		   </li>
		   <li style="font-size: 10px;">
			 <a href="DLTLD SYSTEM USER GUIDE.pdf" target="blank"><i class="entypo-map"></i><span>User Manual</span></a>
		   </li>
	</ul>
</div>	

<div class="main-content">

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Sample(s) with Pending GeneXpert Details
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
			 <table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
        <th>Lab No </th>
        <th>Patient Name</th>
        <th>Age </th>
        <th>Gender</th>
        <th>Type of patient</th>
        <th>Smear(+ve/-ve)</th>
        <th>Date of Visit</th>
        <!--<th style="text-align: center;">Actions</th>-->
        
        
        </tr>
	</thead>
	<tbody>
   		
        </tbody>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$("#table-1").dataTable({
			"processing": true,
			"serverSide": true,
			"sAjaxSource": "sampleview/get_gxdetails_json	",
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
			</div>
		
		</div>
	
	</div>
</div>
	


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	