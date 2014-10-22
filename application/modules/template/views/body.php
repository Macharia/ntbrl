 <style type="text/css">

#broke {
float: left;
width: 50%; 
}

#sere {
clear: both;
}

#trans {
float: left;
width: 50%; 
}

#st {
float: left;
width: 47.5%; 
}
</style>
<html lang="en">
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
	<!--<script src="<?php echo base_url(); ?>assets/scripts/jquery-1.11.1.min.js"></script>-->
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionMaps/JSClass/FusionMaps.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
    
<div class="main-content" style="margin-top: 5%;margin-left: .3%;">
	<ol class="breadcrumb" class="navbar-fixed-top">
		<form id="customForm" name="myform"  method="POST" action="" >
<div><strong> Date Range: </strong>&nbsp;<U><B><font color="#0000CC"><span id="filter_title" class="changeable_title"><?php echo $title;?></span></B></U>   |<small>  

<?php

	if ($filter==1) // Last 3 Months
 
 	{?>	
 		<a href="<?php echo base_url().'pm/overall/index/'; ?>?filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/overall/index/'; ?>?filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> 
       
<?php 
    }
    elseif ($filter==7) // Last 6 Months
    {
    ?> 
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 
        
<?php 
    }
    elseif (($filter==2) || isset($_GET['submitform']))// customized  
    {
    ?>	
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 
      
   <?php   
    }

    elseif (($filter==4) || ($filter==3)) //month/year filter
    {
    ?>

    <a href="<?php echo base_url().'pm/overall/index/';?>?filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
      <a href="<?php echo base_url().'pm/overall/index/';?>?filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 	
    <?php
    }

    elseif (($filter==0) ||($filter=='') || ($filter==8)) //Last submitted//all

    {
    ?>
     <a href="<?php echo base_url().'pm/overall/index/'; ?>?filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
    <a href="<?php echo base_url().'pm/overall/index/'; ?>?filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a>
    <?php
}

?>|  <a onclick="toggle_visibility('HiddenDiv')" href="javascript:;" title=" Click to Filter View based on Date Range you Specify"> Customize Dates</a></font></small>
    	
</div>    
<div style="margin-left: 46%;margin-top: -1%;"> | <?php

				$year = $maxY;
				$twoless = $minY;



				echo "<a href=".base_url()."pm/overall/index/?filter=8 title='Click to Filter View cumulative data'>   All  | </a>";
				for ($year; $year >=$twoless; $year--){

					echo "<a href=".base_url()."pm/overall/index/?year=$year&filter=4 title='Click to Filter View to $year'>   $year  | </a>";
				}
				


				?>

</div>




<div style="margin-left:69%;margin-top: -1%">
          
          <?php
          if(isset($_GET['year']))
          {
          	$year = $_GET['year'];
          }
          else{
                            $year = @date('Y');
                        }
            echo "<a href = ".base_url()."pm/overall/index/?year=$year&mwezi=1&filter=3 title='Click to Filter View to Jan, 2014'>Jan</a>";
            ?>

            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=2&filter=3 title='Click to Filter View to Feb, 2014'>Feb </a>";

            ?>

            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=3&filter=3 title='Click to Filter View to Mar, 2014'>Mar</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=4&filter=3 title='Click to Filter View to Apr, 2014'>Apr</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=5&filter=3 title='Click to Filter View to May, 2014'>May</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=6&filter=3 title='Click to Filter View to Jun, 2014'>Jun</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=7&filter=3 title='Click to Filter View to Jul, 2014'>Jul</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=8&filter=3 title='Click to Filter View to Aug, 2014'>Aug</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=9&filter=3 title='Click to Filter View to Sept, 2014'>Sept</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=10&filter=3 title='Click to Filter View to Oct, 2014'>Oct</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=11&filter=3 title='Click to Filter View to Nov, 2014'>Nov</a>";
            ?>
            |<?php

            echo "<a href =".base_url()."pm/overall/index/?year=$year&mwezi=12&filter=3 title='Click to Filter View to Dec, 2014'>Dec</a>";
            ?>



           </div>



<div class="mid" id="HiddenDiv" style="DISPLAY: none" >
	
<div>From:<label style="margin-left: 15%">To:</label></div>
<div class="col-md-2">
<input class="form-control datepicker" type="text" data-format="yyyy-mm-dd" id="fromfilter" name="fromfilter" size="18"  />
</div>
<div id = "me"></div>
<div class="col-md-2">
<input class="form-control datepicker" type="text" data-format="yyyy-mm-dd" id="tofilter" name="tofilter" size="18" />
</div>
<input type="submit" id="submitform" name="submitform" value="Filter" class="btn btn-green"/>
</div>


</form>
</ol>



<div class="row">
	<div class="col-sm-5">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						National Outcome For:
					<br />
						<small><?php echo $minY ?> - <?php echo $maxY?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="mapdiv"> 
				 //    <script type="text/javascript">
					//    var map = new FusionMaps("../assets/FusionMaps/FCMap_KenyaCounty.swf", "mapdiv", "525", "375", "0", "0");
					//    map.setDataURL("../xml1/countymap.php");		   
					//    map.render("mapdiv");
					// </script>
					 <script type="text/javascript">
						   var map = new FusionMaps("<?php echo base_url();?>assets/FusionMaps/FCMap_KenyaCounty.swf", "mapdiv", "525", "375", "0", "0");
						   map.setDataURL("<?php echo base_url();?>xml1/countymap/get_national_outcome_chart_");	   
						   map.render("mapdiv");
						 </script>
				</div>
			</div>
		</div>

	</div>
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						National Tests Outcome
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="chartnatw"  align="center"> 
		         <script type="text/javascript">
		          var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "163", "0", "0");
		          myChart.setDataXML('<chart bgcolor="#FFFFFF" showBorder="0" ><set  isSliced="1" label="MTB Pos" color="00ACE8" value="<?php echo $this->MTBpositive; ?>"/><set  label="MTB Neg" color="C295F2" value="<?php echo $this->MTBnegative; ?>"/><set  label="RIF Resistant" color="ADFF2F" value="<?php echo $this->rifRes;?>"/></chart>');  
		          myChart.render("chartnatw");
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
						National Statistics From The Year:
						<br />
						<small><?php echo $minY; ?> - <?php echo $maxY; ?></small>
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
					<td style="text-align:center">Total Tests</td>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">MTB -ve</td>
					<td style="text-align:center">RIF Resistant</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"><?php echo $this->total ?></td>
					<td style="text-align:center"><?php echo $this->mtb ?></td>
					<td style="text-align:center"><?php echo $this->notb ?></td>
					<td style="text-align:center"><?php echo $this->rif ?></td>
					</tr>
					</tbody>
				</table> <br />
					<b class="changeable_title">Cumulative View :  <?php echo $title; ?> </b>
					<table class="table table-bordered">
					<thead>
					<tr>
					<td style="text-align:center">Total Tests</td>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">MTB -ve</td>
					<td style="text-align:center">RIF Resistant</td>
					<td style="text-align:center">Error</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"><?php  echo $this->totaltt ?></td>
					<td style="text-align:center"><?php  echo $this->MTBpositive ?></td>
					<td style="text-align:center"><?php  echo $this->MTBnegative ?></td>
					<td style="text-align:center"><?php  echo $this->rifRes ?></td>
					<td style="text-align:center"><?php  echo $this->err ?></td>

					</tr>
					</tbody>
			   </table>
			
		</div>

	</div>
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Tests By Age
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="chartnat1"  align="center"> 
			        <script type="text/javascript">
				    var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Doughnut2D.swf", "myChartnat", "300", "132", "0", "0");
				    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"  pieSliceDepth="30" startingAngle="125"><set value="<?php echo $this->ageAbove; ?>" label="Above 15 Yrs" color="C295F2"/><set value="<?php echo $this->ageBtwn; ?>" label="Btwn 5-15 Yrs" color="#ADFF2F"/><set value="<?php echo $this->ageBelow; ?>" label="Below 5 Yrs" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
				    myChart.render("chartnat1");
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
						Summary By Age
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
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
					<td  style="text-align:center"><5 Yrs</td>
					<td  style="text-align:center">Btwn 5-15 Yrs</td>
					<td  style="text-align:center">>15 Yrs</td>
					</tr>
					</thead>
					<tbody>
					<tr>

					<td style="text-align:center"># Tests</td>
					<td style="text-align:center"><?php echo $this->tnat['totalbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalabove'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo $this->tnat['mtbbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbabove'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo $this->tnat['rifbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifabove'] ;?></td>
					</tr>
					</tbody>
				</table>
			
		</div>

	</div>
	
</div>


<br />

<div class="row">
	
	<div class="col-sm-5">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Testing Trends For: 
					<br />
						<small><?php echo $this->currentyear; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="chartdivtre"> 
				   <script type="text/javascript">
				      var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/MSLine.swf", "myChartId", "520", "300", "0", "0");
				    myChart.setDataURL("<?php echo base_url(); ?>xml1/nationaltrendline/get_national_trendline_chart_?mwaka=<?php echo $currentyear; ?>");
				    myChart.render("chartdivtre");
				    
				   </script> 
				</div>
			</div>
		</div>

	</div>
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
					 Tests by Gender
						<br />
						<small class="changeable_title"><?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="chartnat2"  align="center"> 
			        <script type="text/javascript">
			      	var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Pie3D.swf", "myChartnat", "300", "130", "0", "0");
			    	myChart.setDataXML('<chart bgcolor="FFFFFF" showborder="0" palette="2" animation="1"  pieSliceDepth="30" startingAngle="125" ><set value="<?php echo $this->male; ?>" label="Male" color="C295F2"/><set value="<?php echo $this->female; ?>" label="Female" color="#ADFF2F"/><set value="<?php echo $this->notSp; ?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
			    	myChart.render("chartnat2");
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
						Summary By Gender
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
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
					<td  style="text-align:center">Male</td>
					<td  style="text-align:center">Female</td>
					<td  style="text-align:center">Not specified</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"># Tests</td>
					<td style="text-align:center"><?php echo $this->tnat['totalMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalFemale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalNotsp'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo $this->tnat['mtbMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbFemale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbNotsp'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo $this->tnat['rifMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifFemale'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifNotsp'] ;?></td>
					</tr>
					</tbody>
					</table> 
		</div>

	</div>
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Tests By Hiv Status
						<br />
						<small class="changeable_title"><?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="chartnat3"  align="center"> 
         			<script type="text/javascript">
      				var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "132", "0", "0");
				    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"   pieSliceDepth="30" startingAngle="125"> <set value="<?php echo $this->hstatusPos ;?>" label="Positive" color="C295F2"/><set value="<?php echo $this->hstatusNeg ;?>" label="Negative" color="#ADFF2F"/><set value="<?php echo $this->hstatusNoTest ;?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
				    myChart.render("chartnat3");
				    
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
						Summary By Hiv Status
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
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
					<td  style="text-align:center">+ve</td>
					<td  style="text-align:center">-ve</td>
					<td  style="text-align:center">Not specified</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"># Tests</td>
					<td style="text-align:center"><?php echo $this->tnat['totalPos'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalNeg'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['totalNA'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo $this->tnat['mtbPos'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbNeg'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['mtbNA'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo $this->tnat['rifPos'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifNeg'] ;?></td>
					<td style="text-align:center"><?php echo $this->tnat['rifNA'] ;?></td>
					</tr>
					</tbody>
				</table>
			
		</div>

	</div>
	
</div>

<br />
<div class="row">
	
	<div class="col-sm-5">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Outcome By Patient Categories
						<br />
						<small class="changeable_title"> <?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<div id="chartp"  align="center"> 
              <script type="text/javascript">
		      var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/StackedColumn2D.swf", "myChartnat", "480", "300", "0", "0");
		      myChart.setDataXML('<chart palette="2" yAxisName="# of Patients"  showLabels="1" showvalues="0"  numberPrefix="" showSum="0" decimals="0" useRoundEdges="1" legendBorderAlpha="0" bgcolor="FFFFFF" showborder="0"><categories><category label="sputum smear-positive relapse" /><category label="sputum smear-negative relapse" /><category label="Return after defaulting" /><category label="Failure 1-st line treatment" /><category label="Failure re-treatment" /><category label="New Patients" /><category label="New case PTB" /><category label="MDR TB Contact" /><category label="Refugees SS+ve" /><category label="HCWs" /><category label="Hiv(+) & Smear(-)" /></categories><dataset seriesName="MTB Pos" color="AFD8F8" showValues="0"><set value="<?php echo $this->mtbsputumpos; ?>" /><set value="<?php echo $this->mtbsputumneg; ?>" /><set value="<?php echo $this->mtbReturn; ?>" /><set value="<?php echo $this->mtbFailure; ?>" /><set value="<?php echo $this->mtbFailureRt; ?>" /><set value="<?php echo $this->mtbNP; ?>" /><set value="<?php echo $this->mtbNewcase; ?>" /><set value="<?php echo $this->mtbContact; ?>" /><set value="<?php echo $this->mtbRef; ?>" /><set value="<?php echo $this->mtbHCWs; ?>" /><set value="<?php echo $this->mtbHivSmear; ?>" /></dataset><dataset seriesName="Rif Resistant" color="F6BD0F" showValues="0"><set value="<?php echo $this->rifsputumpos; ?>" /><set value="<?php echo $this->rifsputumneg; ?>" /><set value="<?php echo $this->rifReturn; ?>" /><set value="<?php echo $this->rifFailure; ?>" /><set value="<?php echo $this->rifFailureRt; ?>" /><set value="<?php echo $this->rifNP; ?>" /><set value="<?php echo $this->rifNewcase; ?>" /><set value="<?php echo $this->rifContact; ?>" /><set value="<?php echo $this->rifRef; ?>" /><set value="<?php echo $this->rifHCWs; ?>" /><set value="<?php echo $this->rifHivSmear; ?>" /></dataset></chart>');
		      myChart.render("chartp");
		      </script> 
			  </div>

		</div>
		
	</div>

	<div class="col-sm-7">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Summary By patient Categories
						<br />
						<small class="changeable_title"><?php echo $title; ?></small>
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
					<td style="text-align:center">sputum smear (+) relapse</td>
					<td style="text-align:center">sputum smear (-) relapse</td>
					<td style="text-align:center">Return after defaulting</td>
					<td style="text-align:center">Failure 1st line treatment</td>
					<td style="text-align:center">Failure re-treatment</td>
					<td style="text-align:center">New Patients</td>
					<td style="text-align:center">New case PTB</td>
					<td style="text-align:center">MDR TB Contact</td>
					<td style="text-align:center">Refugees SS+ve</td>
					<td style="text-align:center">HCWs</td>
					<td style="text-align:center">Hiv (+) & Smear (-)</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"> Tests</td>
					<td style="text-align:center"><?php echo @$this->tnat['totalsputumpos'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalsputumneg'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalReturn'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalFailure'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalFailureRt'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalNP'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalNewcase'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalContact'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalRef'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalHCWs'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['totalHivSmear'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbsputumpos'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbsputumneg'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbReturn'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbFailure'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbFailureRt'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbNP'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbNewcase'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbContact'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbRef'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbHCWs'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['mtbHivSmear'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo @$this->tnat['rifsputumpos'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifsputumneg'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifReturn'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifFailure'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifFailureRt'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifNP'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifNewcase'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifContact'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifRef'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifHCWs'] ;?></td>
					<td style="text-align:center"><?php echo @$this->tnat['rifHivSmear'] ;?></td>
					</tr>
					</tbody>
					</table>
						
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
   function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
   }
</script>

<script type="text/javascript">
    $(function(){
    	//on submit of filter
    	$("#customForm").on("submit",function(event){
            //get all form data into json array
            filterForm =$(this).serialize();
            //console.log(filterForm)
            //post data to url
            url="<?php echo base_url().'pm/overall/header_var';?>";
            var from = $("#fromfilter").val();
            var to = $("#tofilter").val();
            var request =$.ajax({
            					url:url,
            					data:{fromfilter:from,tofilter:to,myform:""},
        						type:"post",
        						dataType:"json"
            					});
           		request.done(function(msg){
           			var title = msg.title;
           			//console.log(title);
           			usmanov(msg);
           			$(".changeable_title").text(title);

           			 //alert("success");
           		});
           		request.fail(function(jqXHR, textStatus, errorThrown){
       				alert("Error :"+jqXHR.responseText)
           		});
           
            event.preventDefault();
		});
    });

 function usmanov(my_data)
 {
 	filter = my_data.filter;
 	fromdate = my_data.fromdate;
 	currentmonth= my_data.currentmonth;
 	currentyear = my_data.currentyear;
 	todate = my_data.todate;
 	tofilter = my_data.tofilter;
 	fromfilter = my_data.fromfilter;
 	// console.log(filter);
 	// console.log(fromdate);
 	// console.log(currentmonth);
 	// console.log(currentyear);
 	// console.log(todate);
 	// console.log(tofilter);
 	// console.log(fromfilter);

 	url="<?php echo base_url().'pm/overall/totalTestsNational/"+filter+"/"+fromdate+"/"+currentmonth+"/"+currentyear+"/"+todate+"/"+tofilter+"/"+fromfilter+"/';?>";
 	var request =$.ajax({
            					url:url,
            					//data:{fromfilter:from,tofilter:to,myform:""},
        						type:"post",
        						//dataType:"json"
            					});
 	request.done(function(response){
           			
           			// alert(response);
           		});
 }
</script>




