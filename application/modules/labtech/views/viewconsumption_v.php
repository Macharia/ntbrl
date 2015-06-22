<body class="page-body">

<div class="page-container">
		
<div class="sidebar-menu fixed" style="width: 245px;">
	
</div>	

<div class="main-content">

<div class="row">
	
	<div class="col-md-12">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo  $this->session->userdata('name');?> Consumption Report
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
						
			            <th style="text-align:center">Beginning Balance </th>
			            <th style="text-align:center">Quantity Received (From Partners)</th>
			            <th style="text-align:center">Quantity Used</th>
			            <th style="text-align:center">Losses (Maybe destroyed)</th>
			            <th style="text-align:center">Positives (Received from other sources)</th>
			            <th style="text-align:center">Negatives (Issued Out) </th>
			            <th style="text-align:center">Ending Balance</th>
			            <th style="text-align:center">Quantity Requested</th>
			            <th style="text-align:center">Quantity Allocated</th>
			            <th style="text-align:center">Reporting Period</th>
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
			"sAjaxSource": "viewconsumption/get_consumptionreport_json	",
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		// $(".dataTables_wrapper select").select2({
		// 	minimumResultsForSearch: -1
		// });
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
		<script type="text/javascript">
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>