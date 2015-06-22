	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-9"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507087: Neon - Responsive Admin Template created by Laborator -->

<body class="page-body">

<div class="page-container">
		

<div class="sidebar-menu fixed" style="width: 245px;">
	
</div>	
	

<div class="main-content" style="">
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
	
	<!--<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			
			<h3>Subscribers</h3>
			<p>on our site right now.</p>
		</div>
		
	</div>-->
</div>
<div class="row">
	
	<div class="col-sm-8">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Test Trends for Year: 
						<br />
						<small>2014</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				
			<div id="chartdivtrendd"  align="center"> 
         		<script type="text/javascript">
				      var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/MSLine.swf", "myChartId", "520", "300", "0", "0");
				    myChart.setDataURL("<?php echo base_url(); ?>xml1/facilitytrendline/get_facilitytrendline_chart?fid=<?php echo $this->FacID; ?>");
				    myChart.render("chartdivtrendd");
				    
				   </script> 
			</div>
          </div>
		</div>
		
	</div>
 
  
  <div class="col-md-4">
		<blockquote class="blockquote-gold">
			<p>
				<strong>Today's worksheet-<?php echo "<b>". @date("l, d F Y")."</b>";?></strong>
			</p>
			<p>
				<small>
              There are <?php echo "[".$todayswork."]" ;?> sample(s) that have been processed today. 
               <?php if (($todayswork)>0){ echo "Click <strong><a href='mpdf/worksheet.php?id=$this->FacID'><font color='#000000' >HERE </font></a></strong> to view the samples."; }  ?><strong>
             </small>
            </p>
            </blockquote>
  </div>
  
  <div class="col-md-4">
		
			
		<blockquote class="blockquote-green">
			<p>
				<strong>Updated Samples</strong>
			</p>
			<p>
				<small><?php echo "[".$complete."]" ;?> sample(s) ha(s/ve) been updated.Click <strong><a href="<?php echo base_url('labtech/allsampleview'); ?>">HERE</a></strong> to view.
             </small>
             </p>
        </blockquote>
  </div>
  <div class="col-md-4">
		
			
		<blockquote class="blockquote-danger">
			<p>
				<strong>Samples with Errors</strong>
			</p>
			<p>
				<small><?php echo "[".$errors."]" ;?> sample(s) ha(s/ve) been updated and Resulted with <strong>ERRORS</strong>.Click <strong><a href="<?php echo base_url('labtech/sampleErr'); ?>">HERE</a></strong> to view.
             </small>
             </p>
        </blockquote>
  </div>
  
</div>
<!--<div class="row">
   <table class="table table-bordered">
  	<tr>
  		<td align="center"><strong>Genexpert Serial Number : </strong> <div class="label label-info">708008 </div></td>
  		
  		<td align="center"><strong>Number of Tests Done : </strong><div class="label label-success"> 6</div></td>
  		
  	</tr>
  </table> 

</div>
<div class="row">
	
	<div class="col-sm-8">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						GeneXpert Performance
						<br />
						<small>2014</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				
			<div id="chartdivperfomance"  align="center"> 
         		<script type="text/javascript">
      			var myChart = new FusionCharts("FusionCharts/Charts/StackedColumn2D.swf", "myChartId", "650", "280", "0", "0");
			    myChart.setDataURL("xml1/geneperfomance.php?fid=14947");
			    myChart.render("chartdivperfomance");
			    
			   </script> 
			</div>
          </div>
		</div>
		
	</div>
	<div class="col-sm-4">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Summary Per Module
						<br />
						<small>Last Upload : Jun  - 2014</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			
				<table class="table table-striped">
					<thead>
					<tr>
					<td  style="text-align:center">#</td>
					<td  style="text-align:center">A1</td>
					<td  style="text-align:center">A2</td>
					<td  style="text-align:center">A3</td>
					<td  style="text-align:center">A4</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"># of Tests</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">3</td>
					<td style="text-align:center">1</td>
					</tr>
					<tr>
					<td style="text-align:center"># of Errors</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">% of Errors</td>
					<td style="text-align:center">0%</td>
					<td style="text-align:center">0%</td>
					<td style="text-align:center">33.3%</td>
					<td style="text-align:center">0%</td>
					</tr>
					</tbody>
					</table> 
		</div>

	</div>
</div>