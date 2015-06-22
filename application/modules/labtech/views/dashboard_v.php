<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
	<script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionMaps/JSClass/FusionMaps.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507087: Neon - Responsive Admin Template created by Laborator -->

<body class="page-body">

<div class="page-container">

<div class="main-content" >
	<div class="row">
	<ol class="breadcrumb" class="navbar-fixed-top">
		<form id="customForm"  method="POST" action="" >
<div><strong> Date Range: </strong>&nbsp;<U><B><font color="#0000CC"><?php echo $title; ?></B></U>   |<small>  
<?php

// if (isset($_GET['id'])){
// 		 $_SESSION['cid'] = $_GET['id'];
// 		 $countyID =  $_SESSION['cid'];
// 	}

   if ($filter==1)//LAST 3 MONTHS
    {
    echo "<a href=".base_url()."labtech/dashboard/index/?filter=0' title=' Click to Filter View to Last Submission Statistics'>   Last Upload </a> | 
          <a href=".base_url()."labtech/dashboard/index/?filter=7' title=' Click to Filter View to Last 6 months Statistics'>   Last 6 Months </a>";           
    }
    elseif ($filter==7)//LAST 6 MONTHS
    {
    echo "<a href=".base_url()."labtech/dashboard/index/?filter=0' title='Click to Filter View to Last Submission Statistics'>   Last Upload</a>  |
          <a href=".base_url()."labtech/dashboard/index/?filter=0' title='Click to Filter View to Last 3 months Statistics'>   Last 3 Months </a>"; 

    }
    elseif (($filter==2) || isset($_GET['submitform']))// customized  
    {

    echo "<a href=".base_url()."labtech/dashboard/index/?filter=0' title='Click to Filter View to Last Submission Statistics'>   Last Upload </a>  |
          <a href=".base_url()."labtech/dashboard/index/?filter=7' title='Click to Filter View to Last 6 months Statistics'>   Last 6 Months </a> |
          <a href=".base_url()."labtech/dashboard/index/?filter=1' title='Click to Filter View to Last 3 months Statistics'>   Last 3 Months </a> ";

    }
    elseif (($filter==4) || ($filter==3)) //month/year filter
    {
    echo "<a href=".base_url()."labtech/dashboard/index/?filter=0' title='Click to Filter View to Last Submission Statistics'>   Last Upload </a> |
          <a href=".base_url()."labtech/dashboard/index/?filter=7' title='Click to Filter View to Last 6 months Statistics'>   Last 6 Months </a>  |
          <a href=".base_url()."labtech/dashboard/index/?filter=1' title='Click to Filter View to Last 3 months Statistics'>   Last 3 Months </a> ";

    }
    elseif (($filter==0) ||($filter=='') || ($filter==8)) //Lst submitted//all
    {

     echo "<a href=".base_url()."labtech/dashboard/index/?filter=7' title=' Click to Filter View to Last 3 months Statistics'>   Last 6 Months </a>  | 
           <a href=".base_url()."labtech/dashboard/index/?filter=1' title=' Click to Filter View to Last 3 months Statistics'>   Last 3 Months </a> ";
   
    }
?>|    
<a onclick ="javascript:ShowHide('HiddenDiv')" href="javascript:;' title='Click to Filter View based on Date Range you Specify"> Customize Dates</a></font></small>
<class="label label-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
 	| 
	        <?php
                $year = $maxY;
                $twoless = $minY;

                echo "<a href=".base_url()."labtech/dashboard/index/?filter=8' title='Click to Filter View cumulative data'>   All  | </a>";
                for ($year; $year >= $twoless; $year--) 
                {
                    echo "<a href=".base_url()."labtech/dashboard/index/?year=$year&filter=4' title='Click to Filter View to $year'>   $year  | </a>";
                }

            ?>

<class="label label-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
             <?php 

             if(isset($_GET['year']))
          {
          	$year = $_GET['year'];
          }
          else{
                            $year = @date('Y');
                        }
                  echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=1&filter=3' title='Click to Filter View to Jan, $year'>Jan</a>"; ?>  |
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=2&filter=3' title='Click to Filter View to Feb, $year'>Feb</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=3&filter=3' title='Click to Filter View to Mar, $year'>Mar</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=4&filter=3' title='Click to Filter View to Apr, $year'>Apr</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=5&filter=3' title='Click to Filter View to May, $year'>May</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=6&filter=3' title='Click to Filter View to Jun, $year'>Jun</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=7&filter=3' title='Click to Filter View to Jul, $year'>Jul</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=8&filter=3' title='Click to Filter View to Aug, $year'>Aug</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=9&filter=3' title='Click to Filter View to Sept, $year'>Sept</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=10&filter=3' title='Click to Filter View to Oct, $year'>Oct</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=11&filter=3' title='Click to Filter View to Nov, $year'>Nov</a>"; ?>  | 
            <?php echo "<a href =".base_url()."labtech/dashboard/index/?year=$year&mwezi=12&filter=3' title='Click to Filter View to Dec, $year'>Dec</a>"; ?>
<span class="label label-default">&nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>

<div class="mid" id="HiddenDiv" style="DISPLAY: none" >
	
<div>From:<label style="margin-left: 15%">To:</label></div>
<div class="col-md-2">
<input class="form-control datepicker" type="text" data-format="yyyy-mm-dd" id="fromfilter" name="fromfilter" size="18"  />
</div>

<div class="col-md-2">
<input class="form-control datepicker" type="text" data-format="yyyy-mm-dd" id="tofilter" name="tofilter" size="18" />
</div>
<input type="submit" id="submitform" name="submitform" value="Filter" class="btn btn-green"/>
</div>


</form>
</ol>
</div>
<div class="row">
	<div class="col-md-7">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Cumulative Data
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
			
			<?php foreach($TTF as $row) { ?>
                         <table class="table table-responsive">
                         	<thead>
							<tr>
							<td style="text-align:center">Total Tests</td>
							<td style="text-align:center">MTB +ve</td>
							<td style="text-align:center">MTB -ve</td>
							<td style="text-align:center">RIF Resistant</td>
							<td style="text-align:center">Errors</td>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td style="text-align:center"><?php echo $row['tt'] ;?></td>
							<td style="text-align:center"><?php echo $row['mtb']  ;?></td>
							<td style="text-align:center"><?php echo $row['neg'] ;?></td>
							<td style="text-align:center"><?php echo $row['rif'] ;?></td>
							<td style="text-align:center"><?php echo $row['err'] ;?></td>
							</tr>
							</tbody>
						</table>
						<?php }?>
			</div>

		</div>
	
	</div>
	<div class="col-md-5">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Test Result By Outcome
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<?php foreach($TTF as $row) { ?>

			<div class="panel-body">
			   <div id="chartnatw"  align="center"> </div>
			   	<?php if (($row['mtb']==0) and ($row['neg']==0) and ($row['rif']==0)) { ?> 
						
					<script type="text/javascript">
					var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Doughnut2D.swf?ChartNoDataText=No data to display", "myChartnat", "300", "163", "0", "0");
					myChart.setDataXML("<chart></chart>");
		            myChart.render("chartnatw");
				    </script>		
						
					<?php } else { ?>
		         <script type="text/javascript">
		          var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "200", "0", "0");
		          myChart.setDataXML('<chart bgcolor="#FFFFFF" showBorder="0" ><set  isSliced="1" label="MTB Pos" color="00ACE8" value="<?php echo $row['tt']; ?>"/><set  label="MTB Neg" color="C295F2" value="<?php echo $row['mtb']; ?>"/><set  label="RIF Resistant" color="ADFF2F" value="<?php echo $row['neg'];?>"/></chart>');  
		          myChart.render("chartnatw");
		         </script>
		         <?php } ?> 
		      
			</div>

		</div>
	<?php }?>
	</div>
	<div class="col-md-4">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Test Result By Age
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<?php foreach($TTF as $row) { ?>
			<div class="panel-body">
			    <div id="chartnat1"  align="center"></div>
					<?php if (($row['abv']==0) and ($row['blw']==0) and ($row['male']==0)) { ?> 
						
					<script type="text/javascript">
					var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Doughnut2D.swf?ChartNoDataText=No data to display", "myChartnat", "300", "163", "0", "0");
					myChart.setDataXML("<chart></chart>");
		            myChart.render("chartnat1");
				    </script>		
						
					<?php  } else { ?>  
		         <script type="text/javascript">
		     		var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Doughnut2D.swf", "myChartnat", "272", "160", "0", "0");
		    		myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"  pieSliceDepth="30" startingAngle="125"><set value="<?php echo $row['abv']; ?>" label="Above 15 Yrs" color="C295F2"/><set value="<?php echo $row['btwn']; ?>" label="Btwn 5-15 Yrs" color="#ADFF2F"/><set value="<?php echo $row['blw']; ?>" label="Below 5 Yrs" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
		    		myChart.render("chartnat1");
			     </script> 
				 <?php } ?>

			</div>

		</div>
	<?php } ?>

	</div>
	<div class="col-md-4">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Test Result By Gender
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<?php foreach($TTF as $row) { ?>
			<div class="panel-body">
			    <div id="chartnat2"  align="center"></div>
			    	<?php if (($row['female']==0) and ($row['notsp']==0) and ($row['hpos']==0)) { ?> 
						
					<script type="text/javascript">
					var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Pie3D.swf?ChartNoDataText=No data to display", "myChartnat", "300", "163", "0", "0");
					myChart.setDataXML("<chart></chart>");
		            myChart.render("chartnat2");
				    </script>		
						
					<?php } else { ?>  
			         <script type="text/javascript">
			     	 var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Pie3D.swf", "myChartnat", "272", "160", "0", "0");
			    	 myChart.setDataXML('<chart bgcolor="FFFFFF" showborder="0" palette="2" animation="1"  pieSliceDepth="30" startingAngle="125" ><set value="<?php echo $row['male']; ?>" label="Male" color="C295F2"/><set value="<?php echo $row['female']; ?>" label="Female" color="#ADFF2F"/><set value="<?php echo $row['notsp']; ?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
			    	 myChart.render("chartnat2");
			    	 </script> 
			        <?php } ?>

			</div>

		</div>
	<?php } ?>
	</div>
	<div class="col-md-4">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Test Result By Hiv Status
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<?php foreach($TTF as $row) { ?>
			<div class="panel-body">
			    <div id="chartnat3"  align="center"> </div>
			    	<?php if (($row['hpos']==0) and ($row['hneg']==0) and ($row['hnotdone']==0)) { ?> 
						
					<script type="text/javascript">
					var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Pie2D.swf?ChartNoDataText=No data to display", "myChartnat", "300", "163", "0", "0");
					myChart.setDataXML("<chart></chart>");
		            myChart.render("chartnat3");
				    </script>		
						
					<?php } else { ?>  
			    
	                 <script type="text/javascript">
	      			 var myChart = new FusionCharts("<?php echo base_url();?>assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "272", "160", "0", "0");
	   				 myChart.setDataXML('<chart  bgcolor="FFFFFF"  showborder="0"  palette="2" animation="1"   pieSliceDepth="30" startingAngle="125"> <set value="<?php echo $row['hpos']; ?>" label="Positive" color="C295F2"/><set value="<?php echo $row['hneg']; ?>" label="Negative" color="#ADFF2F"/><set value="<?php echo $row['hnotdone']; ?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
	    			 myChart.render("chartnat3");
	                 </script> 
	               <?php } ?>

				</div>


			</div>
<?php } ?>
		</div>
	
	</div>
	</div>
	<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Sample Mapping
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">


			<table class="table table-bordered" id="example" width="100%">
						<thead>
								<tr>
									
						            <th style="text-align: center" >County ID </th>
						            <th style="text-align: center" >County Name</th>
						            <th style="text-align: center" >Reporting Period</th>
						            <th style="text-align: center" >Allocated / Total Facilities</th>
						            <th style="text-align: center" >Total Allocations </th>
						            
						         </tr>
							</thead>
							<tbody>
													         
								
							</tbody>
						</table>


	<script type="text/javascript">

			$(document).ready(function() {
    			$('#example').dataTable( {
     			   "processing": true,
      				  "serverSide": true,
        				"sAjaxSource": "dashboard/get_samplemap_json",
        				 "sPaginationType": "bootstrap",
        				   "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        				   	  "bStateSave": true	
        				

        					
    				} );
				} );

			</script>
                      
			</div>

		</div>
	
	</div>
</div>
	


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet"type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

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
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
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