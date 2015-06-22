<!DOCTYPE html>
<html lang="en">
	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">
    <script language="JavaScript" src="../FusionCharts/FusionCharts.js"></script>
	<script src=".<?php echo base_url(); ?>assets/neon//neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
		$(document).ready( function (){
			  
		  $("#facility").change(function(){
		  $('#facilityname').val($('option:selected', $(this)).val());
		 
		});
		});
	</script>
   
<div class="main-content" style="margin-top: 1%;margin-left: 1%">
	<div class="row">
		
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $testdonethismonth; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>Tests Done</h3>
			<p>this month.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-basket"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $remainingcarts; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Remaining Cartridges</h3>
			<p>so far from the inventory.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-calendar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $expdate; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>Remaining Days</h3>
			<p>to cartridges expiration.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-volume"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $remainingtubes; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			
			<h3>Remaining F.Tubes</h3>
			<p>so far from the inventory..</p>
		</div>
		
	</div>
</div> 
<div class="row">
<form id="customForm"  method="GET" action="" f>
 <table border="0" class="table table-condensed" style="width: 700px;  margin-left: auto;  margin-right: auto; " >
  	<tr>
  		<td align="center"><span class="label label-default">Select Facility</span></td>
  		 <td align="left">
  		 	
  			<select name="facility" id="facility" class="form-control">
		    <?php foreach ($f as $row_rsFinC) {
		    	 	?>
		    <option value="<?php echo $row_rsFinC['a'];?>"> <?php echo $row_rsFinC['b'];?></option>
			<?php } ;?>
		   </select> 
		    
		   
		</td>
  		
  		<td align="left"><span class="label label-default">Select year</span></td>
  			<td align="left">
			<?php
				$years = range ($maxyear,$minyear); 
				
				// Make the years pull-down menu.
				echo '<select  class="form-control" name="year">';
			
					foreach ($years as $value)
				 	{
						echo "<option value=\"$value\">$value</option>\n";
					}
					
				echo '</select>';
		   
		  ?>
		</td>
  		<td>
  			<input type="submit"  value="Filter" class="btn btn-green"/>
  		</td>
  	</tr>
  </table></form>

  
	<div class="col-sm-6">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Test Trends for Year: <?php echo $maxyear; ?> 
						<br />
						<small><?php echo $FacID.' | '.$fname; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				
			<div id="charttrend"  align="center"> </div><?php $kad="year=".$maxyear."%26fid=".$FacID; ?> 
         		<script type="text/javascript">
      			var myChart = new FusionCharts("MSLine", "myChartId", "650", "300");
			    myChart.setXMLUrl("<?php echo base_url(); ?>/xml1/facilitytrendline/get_facilitytrendline_chart?<?php echo $kad ?>");
			    myChart.render("charttrend");
			    
			   </script> 
			
          </div>
		</div>
		
	</div>
	<div class="col-sm-6">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						GeneXpert Performance [<?php echo $module[0] ;?>]
						<br />
						<small>Tests Done: <?php echo $module[1] ;?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				
			<div id="chartperfomance"  align="center"> 
         		<script type="text/javascript">
	      			var myChart = new FusionCharts("StackedColumn2D", "myChartId", "650", "300");
				    myChart.setXMLUrl("<?php echo base_url(); ?>/xml1/geneperfomance.php<?php echo "?fid=".$FacID;?>");
				    myChart.render("chartperfomance");
			    </script> 
			</div>
			
            </div>
		</div>
	</div>
</div>	
</div>


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
    <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
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
		
		
	</script>
	
</body>
</html>