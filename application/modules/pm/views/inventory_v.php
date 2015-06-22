<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
	<script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507087: Neon - Responsive ../admin Template created by Laborator -->


<div class="main-content" style="margin-top: %;margin-left: .3%">

<div class="row">
	<div class="col-md-6">
		<div id="accordion-test-2" class="panel-group">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		  <a href="#collapseOne" data-parent="#accordion-test-2" data-toggle="collapse">Commodity Inventory - Graphical Representation 
					
	      </a>
		</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
		<div class="panel-body">
				<div id="invdiv"> 
				    <script type="text/javascript">
					   	var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Bar2D.swf", "myChartnat", "635", "670", "0", "0");
						myChart.setDataURL("<?php echo base_url(); ?>xml1/inv/get_inv_chart_");
			            myChart.render("invdiv");
					</script>
				</div><br />
				<div align="right">
					<p>
					<a>
					<span class="badge badge-success">&nbsp;&nbsp;&nbsp;</span>
					Inventory well balanced 
					</a>
					</p>
					<p>
					<a>
					<span class="badge badge-danger">&nbsp;&nbsp;&nbsp;</span>
					Cartridges about to expire(less than 90days)
					</a>
					</p>
					<p>
					<a>
					<span class="badge badge-warning">&nbsp;&nbsp;&nbsp;</span>
					Both or Either Cartridges or Falcon Tubes about to get finished(count below 50)
					</a>
					</p>
					
				</div>
				
			</div>
		</div>
		</div>
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a href="#collapseTwo" data-parent="#accordion-test-2" data-toggle="collapse"> Commodity Inventory - Table Representation 
					
					
	     </a>
		</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
		<div class="panel-body">
				
				<!-- <form role="form" class="form-horizontal form-groups-bordered">
	
					
					<div class="form-group">
						<label class="col-sm-4 control-label">Select One Commodity</label>
						
						<div class="col-sm-7">
							
							<div class="radio radio-replace">
								<input type="radio" id="rd-1" name="radio1" value="Cartridge" checked="checked" >
								<label>Cartridges</label>
							</div>
							
							<div class="radio radio-replace">
								<input type="radio" id="rd-2" name="radio1" value="Falcon Tubes" >
								<label>Falcon Tubes</label>
							</div>
													
						</div>
					</div>
					
					
					
				</form>
				<div id="result"></div> -->

				<table class="table table-striped" id="table_allocate">
							
				         <tbody>
					
			            	<tr>
				<?php echo $table; ?>

				</tr>
					       
					   
					    </tbody>
						</table>

						
			</div>
		</div>
		</div>
		
		</div>
</div>
	<!-- <div class="col-md-6">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Commodity Inventory.
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				<div id="invdiv"> 
				    <script type="text/javascript">
					   	var myChart = new FusionCharts("../FusionCharts/Charts/Bar2D.swf", "myChartnat", "635", "700", "0", "0");
						myChart.setDataURL("../xml1/inv.php");
			            myChart.render("invdiv");
					</script>
				</div><br />
				<div align="right">
					<p>
					<a>
					<span class="badge badge-success">&nbsp;&nbsp;&nbsp;</span>
					Inventory well balanced 
					</a>
					</p>
					<p>
					<a>
					<span class="badge badge-danger">&nbsp;&nbsp;&nbsp;</span>
					Cartridges about to expire
					</a>
					</p>
					<p>
					<a>
					<span class="badge badge-warning">&nbsp;&nbsp;&nbsp;</span>
					Cartridges about to get finished
					</a>
					</p>
				</div>
				
			</div>
		
		</div>
	
	</div> -->
	<div class="col-md-6">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Day (s) Since Last Upload.
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				<div id="invday"> 
				    <script type="text/javascript">
					   	var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Bar2D.swf", "myChartnat", "635", "795", "0", "0");
						myChart.setDataURL("<?php echo base_url(); ?>xml1/day/get_days_chart");
			            myChart.render("invday");
					</script>
				</div>
			</div>
		
		</div>
	
	</div>
</div>
	
<script type="text/javascript">
$(document).ready(function(){
    $('input:radio[name="radio"]').change(function() {
         
         s = ($(this).val());
                
        $.ajax({
        type: "POST",
        url: "getcomm.php",
		data: "id="+ s,
        async: true,
		cache: false,
        success: function(data) {
			  $('#result').html(data)   			    
			}
   
});  
        
    });
});
 </script>
  
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#table-1").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	
	
	
</div>

</body>
</html>