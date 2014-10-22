<!DOCTYPE html>
<html lang="en">
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionMaps/JSClass/FusionMaps.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/FusionCharts/JSClass/FusionCharts.js"></script>
    
<div class="main-content" style="margin-top: 5%;margin-left: .3%;">
	<ol class="breadcrumb" class="navbar-fixed-top">
		<form id="customForm" name="myform" method="POST" action="" >
<div><strong> Date Range: </strong>&nbsp;<U><B><font color="#0000CC"><?php echo $title;?></B></U>   |<small>  

<?php

	if(isset($_GET['id'])){
		$this->session->unset_userdata('cid');
		$this->session->set_userdata('cid', $_GET['id']);
		$countyID = $this->session->userdata('cid');
//		var_dump($countyID); die();

	}

	if ($filter==1) // Last 3 Months
 
 	{?>	
 		<a href="<?php echo base_url(); ?>pm/countyview/index/?id=<?php echo $countyID; ?>&filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url(); ?>pm/countyview/index/?id=<?php echo $countyID; ?>&filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> 
       
<?php 
    }
    elseif ($filter==7) // Last 6 Months
    {
    ?> 
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 
        
<?php 
    }
    elseif (($filter==2) || isset($_GET['submitform']))// customized  
    {
    ?>	
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 
      
   <?php   
    }

    elseif (($filter==4) || ($filter==3)) //month/year filter
    {
    ?>

    <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=0" title=" Click to Filter View to Last Submission Statistics"> Last Upload </a> |
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
      <a href="<?php echo base_url().'pm/countyview/index/';?>?id=<?php echo $countyID; ?>&filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 	
    <?php
    }

    elseif (($filter==0) ||($filter=='') || ($filter==8)) //Last submitted//all

    {
    ?>
     <a href="<?php echo base_url().'pm/countyview/index/'; ?>?id=<?php echo $countyID; ?>&filter=7" title=" Click to Filter View to Last 6 months Statistics"> Last 6 Months </a> |
    <a href="<?php echo base_url().'pm/countyview/index/'; ?>?id=<?php echo $countyID; ?>&filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a>
    <?php
}

?>|  <a onclick="toggle_visibility('HiddenDiv')" href="javascript:;" title=" Click to Filter View based on Date Range you Specify"> Customize Dates</a></font></small>
    	
</div>    
<div style="margin-left: 46%;margin-top: -1%;"> | <?php

				$year = $maxY;
				$twoless = $minY;
				

				echo "<a href=".base_url()."pm/countyview/index/?id=$countyID&filter=8 title='Click to Filter View cumulative data'>   All  | </a>";
				for ($year; $year >=$twoless; $year--){

					echo "<a href=".base_url()."pm/countyview/index/?id=$countyID&year=$year&filter=4 title='Click to Filter View to $year'>   $year  | </a>";
				}
				


				?>

</div>




<div style="margin-left:69%;margin-top: -1%">
          
          <?php

          if(isset($_GET['year']))
          {
          	$year = $_GET['year'];
          }
          
          		else {
                            $year = @date('Y');
                        }

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=1&filter=3; title='Click to Filter View to Jan, 2014'>Jan</a>";
            ?>

            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=2&filter=3; title='Click to Filter View to Feb, 2014'>Feb </a>";

            ?>

            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=3&filter=3; title='Click to Filter View to Mar, 2014'>Mar</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=4&filter=3; title='Click to Filter View to Apr, 2014'>Apr</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=5&filter=3; title='Click to Filter View to May, 2014'>May</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=6&filter=3; title='Click to Filter View to Jun, 2014'>Jun</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=7&filter=3; title='Click to Filter View to Jul, 2014'>Jul</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=8&filter=3; title='Click to Filter View to Aug, 2014'>Aug</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=9&filter=3; title='Click to Filter View to Sept, 2014'>Sept</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=10&filter=3; title='Click to Filter View to Oct, 2014'>Oct</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=11&filter=3; title='Click to Filter View to Nov, 2014'>Nov</a>";
            ?>
            |<?php

            echo "<a href = ".base_url()."pm/countyview/index/?id=$countyID&year=$year&mwezi=12&filter=3; title='Click to Filter View to Dec, 2014'>Dec</a>";
            ?>



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
	<?php if ($this->errormsg !="")
	{?> 

	   <div class="alert alert-danger" style="text-align: center;width: 320px;"><?php 
				
		               echo  $this->errormsg;
		
				?></div>
				<?php } else
						{ ?>

 						<h2 align="center"><?php echo $this->countyname; ?> County Summaries</h2>

 				<?php } ?>		
				<hr />
<div class="row">
	<div class="col-sm-5">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Testing Trends for:
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
				<div id="chartdivtre"><?php $kad="id=".$countyID."&mwaka=".$this->currentyear; ?> 				   
				<script type="text/javascript">
				    
				    var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/MSLine.swf", "myChartId", "525", "345", "0", "0");
				    myChart.setDataURL("<?php echo base_url(); ?>xml1/countytrendline/get_county_trendline_chart_?<?php echo $kad; ?>");
				    myChart.render("chartdivtre");
				    
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
						Summary By Age:
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
					<td  style="text-align:center">#</td>
					<td  style="text-align:center"><5 Yrs</td>
					<td  style="text-align:center">Btwn 5-15 Yrs</td>
					<td  style="text-align:center">>15 Yrs</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align:center"># Tests</td>
					<td style="text-align:center"><?php echo $this->TTC['totalbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['totalbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['totalabove'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo $this->TTC['mtbbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['mtbbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['mtbabove'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo $this->TTC['rifbelow'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['rifbtwn'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['rifabove'] ;?></td>
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
						<small><?php echo $title; ?></small>
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
    var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Doughnut2D.swf", "myChartnat", "300", "133", "0", "0");
    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"  pieSliceDepth="30" startingAngle="125"><set value="<?php echo $this->ageAboveC; ?>" label="Above 15 Yrs" color="C295F2"/><set value="<?php echo $this->ageBtwnC; ?>" label="Btwn 5-15 Yrs" color="#ADFF2F"/><set value="<?php echo $this->ageBelowC; ?>" label="Below 5 Yrs" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
    myChart.render("chartnat1");
    
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
						Tests By Gender
						<br />
						<small><?php echo $title; ?></small>
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
			   var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Pie3D.swf", "myChartnat", "300", "133", "0", "0");
			   myChart.setDataXML('<chart bgcolor="FFFFFF" showborder="0" palette="2" animation="1"  pieSliceDepth="30" startingAngle="125" ><set value="<?php echo $this->maleC; ?>" label="Male" color="C295F2"/><set value="<?php echo $this->femaleC; ?>" label="Female" color="#ADFF2F"/><set value="<?php echo $this->notSpC; ?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
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
						<small><?php echo $title; ?></small>
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
					<td style="text-align:center"><?php echo $this->TTC['totalMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['totalFemale'];?></td>
					<td style="text-align:center"><?php echo $this->TTC['totalNotsp'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo $this->TTC['mtbMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['mtbFemale'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['mtbNotsp'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo $this->TTC['rifMale'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['rifFemale'] ;?></td>
					<td style="text-align:center"><?php echo $this->TTC['rifNotsp'] ;?></td>
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
						Cumulative Data Since The Year
					<br />
						<small><?php echo $minY; ?> - <?php echo $maxY; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<table class="table table-condensed">
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
			<td style="text-align:center"><?php echo $this->TTC['total'] ;?></td>
			<td style="text-align:center"><?php echo $this->TTC['mtb']  ;?></td>
			<td style="text-align:center"><?php echo $this->TTC['neg'] ;?></td>
			<td style="text-align:center"><?php echo $this->TTC['rif'] ;?></td>
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
						<small><?php echo $title; ?></small>
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
      			var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "140", "0", "0");
			    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"   pieSliceDepth="30" startingAngle="125"> <set value="<?php echo $this->hstatusPosC ;?>" label="Positive" color="C295F2"/><set value="<?php echo $this->hstatusNegC ;?>" label="Negative" color="#ADFF2F"/><set value="<?php echo $this->hstatusNoTestC ;?>" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
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
						<small><?php echo $title; ?></small>
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
					<td style="text-align:center"><?php echo@$this->TTC['totalNotsp'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['totalPos'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['totalNeg'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo@$this->TTC['mtbNotsp'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['mtbPos'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['mtbNeg'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo@$this->TTC['rifNotsp'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['rifPos'] ;?></td>
					<td style="text-align:center"><?php echo@$this->TTC['rifNeg'] ;?></td>
					</tr>
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
						<small><?php echo $title; ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<div id="chartp"  align="center"> 
	         	<script type="text/javascript">
	      		var myChart = new FusionCharts("<?php echo base_url(); ?>assets/FusionCharts/Charts/StackedColumn2D.swf", "myChartnat", "500", "300", "0", "0");
	     	 	myChart.setDataXML('<chart palette="2" yAxisName="# of Patients"  showLabels="1" showvalues="0"  numberPrefix="" showSum="0" decimals="0" useRoundEdges="1" legendBorderAlpha="0" bgcolor="FFFFFF" showborder="0"><categories><category label="sputum smear-positive relapse" /><category label="sputum smear-negative relapse" /><category label="Return after defaulting" /><category label="Failure 1-st line treatment" /><category label="Failure re-treatment" /><category label="New Patients" /><category label="New case PTB" /><category label="MDR TB Contact" /><category label="Refugees SS+ve" /><category label="HCWs" /><category label="Hiv(+) & Smear(-)" /></categories><dataset seriesName="MTB Pos" color="AFD8F8" showValues="0"><set value="<?php echo $this->mtbsputumposC; ?>" /><set value="<?php echo $this->mtbsputumnegC; ?>" /><set value="<?php echo $this->mtbReturnC; ?>" /><set value="<?php echo $this->mtbFailureC; ?>" /><set value="<?php echo $this->mtbFailureRtC; ?>" /><set value="<?php echo $this->mtbNPC; ?>" /><set value="<?php echo $this->mtbNewcaseC; ?>" /><set value="<?php echo $this->mtbContactC; ?>" /><set value="<?php echo $this->mtbRefC; ?>" /><set value="<?php echo $this->mtbHCWsC; ?>" /><set value="<?php echo $this->mtbHivSmearC; ?>" /></dataset><dataset seriesName="Rif Resistant" color="F6BD0F" showValues="0"><set value="<?php echo $this->rifsputumposC; ?>" /><set value="<?php echo $this->rifsputumnegC; ?>" /><set value="<?php echo $this->rifReturnC; ?>" /><set value="<?php echo $this->rifFailureC; ?>" /><set value="<?php echo $this->rifFailureRtC; ?>" /><set value="<?php echo $this->rifNPC; ?>" /><set value="<?php echo $this->rifNewcaseC; ?>" /><set value="<?php echo $this->rifContactC; ?>" /><set value="<?php echo $this->rifRefC; ?>" /><set value="<?php echo $this->rifHCWsC; ?>" /><set value="<?php echo $this->rifHivSmearC; ?>" /></dataset></chart>');
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
						<small><?php echo $title; ?></small>
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
					<td style="text-align:center"><?php echo @$this->TTC['totalsputumpos'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalsputumneg'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalReturn'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalFailure'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalFailureRt'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalNP'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalNewcase'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalContact'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalRef'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalHCWs'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['totalHivSmear'] ;?></td>

					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbsputumpos'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbsputumneg'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbReturn'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbFailure'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbFailureRt'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbNP'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbNewcase'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbContact'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbRef'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbHCWs'] ;?></td>
					<td style="text-align:center"><?php echo @$this->TTC['mtbHivSmear'] ;?></td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center"><?php echo @$this->TTC['rifsputumpos'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifsputumneg'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifReturn'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifFailure'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifFailureRt'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifNP'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifNewcase'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifContact'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifRef'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifHCWs'] ; ?></td>
					<td style="text-align:center"><?php echo @$this->TTC['rifHivSmear'] ; ?></td>
					</tr>
					</tbody>
					</table>
						
		</div>
		
	</div>

</div>
<div class="row">
	<div class="col-sm-7">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						GeneXpert Sites In The County
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<table class="table table-striped">
				<thead>



				<?php

				if($this->r>0)
				
				{
				 ?>	

				 <tr>
					<th style="text-align:center;">Mfl Code</th>
					<th style="text-align:center;">Facility Name</th>
					<th style="text-align:center;">District</th>
					<th style="text-align:center;">GeneXpert Serial No.</th>
					</thead>

				<?php do {?>
				
				<tbody>
					<tr>
					<td style="text-align:center"><?php echo $this->r[0]['a']; ?></td>
				    <td style="text-align:center"><?php echo $this->r[0]['b']; ?></td>
				    <td style="text-align:center"><?php echo $this->r[0]['c']; ?></td>
				    <td style="text-align:center"><?php echo $this->r[0]['d']; ?></td>
					</tr>

				<?php	}

					while ($this->r);

					} else

					{
						echo '<div class="alert alert-warning">There are no GeneXpert Sites in ' .$countyname. ' County</div>';
   					}  ?>


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
		
		
	</script>

	<script type="text/javascript">
   function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
   }
</script>