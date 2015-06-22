

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


<div class="row">
<?php foreach($info as $rows) { ?>
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $rows['users'] ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Registered Users</h3>
			<p>so far in our website.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			 <div class="num" data-start="0" data-end="70" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>GeneXpert Sites</h3>
			<p>in the country.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $rows['log'] ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>Access Logs</h3>
			<p>attempted today.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $rows['facilities'] ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			
			<h3>Registered Facilities</h3>
			<p>in the country.</p>
		</div>
		
	</div>
	<?php }?>
</div>

<br />

<div class="row">
	<div class="col-sm-8">
	
		<div class="panel panel-primary" id="charts_env">
		
			<div class="panel-heading">
				<div class="panel-title">Site Login / Logout Stats</div>
				
				
			</div>
	
			<div class="panel-body">
			   <div id="chartdivtrendd"  align="center"> 
				 <script type="text/javascript">
				    var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/MSLine.swf", "myChartId", "520", "300", "0", "0");
				    myChart.setDataURL("<?php echo base_url(); ?>xml1/logtrend/get_logtrend_chart?fid=<?php echo $this->FacID; ?>");
				    myChart.render("chartdivtrendd");
				 </script> 
								
			</div>

				</div>				
		</div>	

	</div>

	<div class="col-sm-4">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Real Time Stats
						<br />
						<small>current system users</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">

			<?php foreach($stats as $rows1) { ?>
				<?php $class=array("primary"=>"1","info"=>"2","danger"=>"3","success"=>"4","warning"=>"5");  ?>
								<li class="list-group-item">
									<span class="badge badge-<?php  echo array_rand($class,1); ?>"><?php echo $rows1['b']; ?></span>
									<?php echo $rows1['a']; ?>
								</li>
						
					<?php }?>		
			</div>
		</div>

	</div>
</div>


<br />

<div class="row">
	
	
	<div class="col-sm-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Recent System Logs</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<table class="table table-bordered" id="table-1">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Position</th>
						<th>Activity</th>
						<th>Time of Activity</th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach($logs as $rows) { ?>
					<tr>
						<td><label class="cb-wrapper">
<input id="chk-2" type="checkbox">
<div class="checked"></div>
</label></td>
						<td><?php echo $rows['b']; ?></td>
						<td><?php echo $rows['d']; ?></td>
						<td><?php echo $rows['c']; ?></td>
						<td><?php echo $rows['e']; ?></td>
					</tr>

					<?php }?>
					
				</tbody>
			</table>
		</div>
		
	</div>
	
</div>

<br />


<script type="text/javascript">
	// Code used to add Todo Tasks
	jQuery(document).ready(function($)
	{
		var $todo_tasks = $("#todo_tasks");
		
		$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
		{
			if(ev.keyCode == 13)
			{
				ev.preventDefault();
				
				if($.trim($(this).val()).length)
				{
					var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
					$(this).val('');
					
					$todo_entry.appendTo($todo_tasks.find('.todo-list'));
					$todo_entry.hide().slideDown('fast');
					replaceCheckboxes();
				}
			}
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
	
	
</body>
</html>