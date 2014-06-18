	<link rel="stylesheet" href="../assets/neon//neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="../assets/neon//neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="../assets/neon//neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="../assets/neon//neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="../assets/neon//neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="../assets/neon//neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="../assets/FusionMaps/JSClass/FusionMaps.js"></script>
    <script language="JavaScript" src="../assets/FusionCharts/JSClass/FusionCharts.js"></script>
    
<div class="main-content" style="margin-top: 5%;margin-left: .3%;">
	<ol class="breadcrumb" class="navbar-fixed-top">
		<form id="customForm"  method="GET" action="" >
<div><strong> Date Range: </strong>&nbsp;<U><B><font color="#0000CC">Last Upload : Dec  - 2013</B></U>   |<small>  
      <a href="?filter=7" title=" Click to Filter View to Last 3 months Statistics">   Last 6 Months </a>  | <a href="?filter=1" title=" Click to Filter View to Last 3 months Statistics">   Last 3 Months </a> 
    |    <a onclick ="javascript:ShowHide('HiddenDiv')" href="javascript:;" title=" Click to Filter View based on Date Range you Specify"> Customize Dates</a></font></small>
</div>    
<div style="margin-left: 46%;margin-top: -1%;"> | <a href=?filter=8 title='Click to Filter View cumulative data'>   All  | </a><a href=?year=2013&filter=4 title='Click to Filter View to 2013'>   2013  | </a><a href=?year=2012&filter=4 title='Click to Filter View to 2012'>   2012  | </a></div>
<div style="margin-left:69%;margin-top: -1%">
           <a href =?year=2014&mwezi=1&filter=3 title='Click to Filter View to Jan, 2014'>Jan</a> | <a href =?year=2014&mwezi=2&filter=3 title='Click to Filter View to Feb, 2014'>Feb </a>| <a href =?year=2014&mwezi=3&filter=3 title='Click to Filter View to Mar, 2014'>Mar</a>  | <a href =?year=2014&mwezi=4&filter=3 title='Click to Filter View to Apr, 2014'>Apr</a>  | <a href =?year=2014&mwezi=5&filter=3 title='Click to Filter View to May, 2014'>May</a>  | <a href =?year=2014&mwezi=6&filter=3 title='Click to Filter View to Jun, 2014'>Jun</a>  | <a href =?year=2014&mwezi=7&filter=3 title='Click to Filter View to Jul, 2014'>Jul</a>  | <a href =?year=2014&mwezi=8&filter=3 title='Click to Filter View to Aug, 2014'>Aug</a>  | <a href =?year=2014&mwezi=9&filter=3 title='Click to Filter View to Sept, 2014'>Sept</a>  | <a href =?year=2014&mwezi=10&filter=3 title='Click to Filter View to Oct, 2014'>Oct</a>  | <a href =?year=2014&mwezi=11&filter=3 title='Click to Filter View to Nov, 2014'>Nov</a>  | <a href =?year=2014&mwezi=12&filter=3 title='Click to Filter View to Dec, 2014'>Dec</a></div>


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

<div class="row">
	<div class="col-sm-5">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						National Outcome For:
					<br />
						<small>2012 - 2013</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<div id="mapdiv"> 
				    <script type="text/javascript">
					   var map = new FusionMaps("../assets/FusionMaps/FCMap_KenyaCounty.swf", "mapdiv", "525", "375", "0", "0");
					   map.setDataURL("../assets/xml1/countymap.php");		   
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
						<small>Last Upload : Dec  - 2013</small>
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
		          var myChart = new FusionCharts("../assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "163", "0", "0");
		          myChart.setDataXML('<chart bgcolor="#FFFFFF" showBorder="0" ><set  isSliced="1" label="MTB Pos" color="00ACE8" value="1"/><set  label="MTB Neg" color="C295F2" value="0"/><set  label="RIF Resistant" color="ADFF2F" value="0"/></chart>');  
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
						<small>2012 - 2013</small>
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
					<td style="text-align:center">182</td>
					<td style="text-align:center">55</td>
					<td style="text-align:center">127</td>
					<td style="text-align:center">14</td>
					</tr>
					</tbody>
				</table> <br />
					<b>Cumulative View :  Last Upload : Dec  - 2013 </b>
					<table class="table table-bordered">
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
					<td style="text-align:center">1</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
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
						<small>Last Upload : Dec  - 2013</small>
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
				    var myChart = new FusionCharts("../assets/FusionCharts/Charts/Doughnut2D.swf", "myChartnat", "300", "132", "0", "0");
				    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"  pieSliceDepth="30" startingAngle="125"><set value="1" label="Above 15 Yrs" color="C295F2"/><set value="0" label="Btwn 5-15 Yrs" color="#ADFF2F"/><set value="0" label="Below 5 Yrs" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
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
						<small>Last Upload : Dec  - 2013</small>
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
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
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
						<small>2013</small>
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
				      var myChart = new FusionCharts("../assets/FusionCharts/Charts/MSLine.swf", "myChartId", "520", "300", "0", "0");
				    myChart.setDataURL("../xml1/nationaltrendline.php?mwaka=2013");
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
						<small>Last Upload : Dec  - 2013</small>
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
			      	var myChart = new FusionCharts("../assets/FusionCharts/Charts/Pie3D.swf", "myChartnat", "300", "130", "0", "0");
			    	myChart.setDataXML('<chart bgcolor="FFFFFF" showborder="0" palette="2" animation="1"  pieSliceDepth="30" startingAngle="125" ><set value="1" label="Male" color="C295F2"/><set value="0" label="Female" color="#ADFF2F"/><set value="0" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
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
						<small>Last Upload : Dec  - 2013</small>
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
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
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
						<small>Last Upload : Dec  - 2013</small>
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
      				var myChart = new FusionCharts("../assets/FusionCharts/Charts/Pie2D.swf", "myChartnat", "300", "132", "0", "0");
				    myChart.setDataXML('<chart  bgcolor="FFFFFF"   showborder="0"  palette="2" animation="1"   pieSliceDepth="30" startingAngle="125"> <set value="0" label="Positive" color="C295F2"/><set value="1" label="Negative" color="#ADFF2F"/><set value="0" label="Not specified" color="00ACE8"/><styles><definition><style type="font" name="CaptionFont" size="11" color="666666" /><style type="font" name="SubCaptionFont" bold="0" /></definition><application><apply toObject="caption" styles="CaptionFont" /><apply toObject="SubCaption" styles="SubCaptionFont" /></application></styles></chart>');
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
						<small>Last Upload : Dec  - 2013</small>
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
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
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
						<small>Last Upload : Dec  - 2013</small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			<div id="chartp"  align="center"> 
              <script type="text/javascript">
		      var myChart = new FusionCharts("../assets/FusionCharts/Charts/StackedColumn2D.swf", "myChartnat", "480", "300", "0", "0");
		      myChart.setDataXML('<chart palette="2" yAxisName="# of Patients"  showLabels="1" showvalues="0"  numberPrefix="" showSum="0" decimals="0" useRoundEdges="1" legendBorderAlpha="0" bgcolor="FFFFFF" showborder="0"><categories><category label="sputum smear-positive relapse" /><category label="sputum smear-negative relapse" /><category label="Return after defaulting" /><category label="Failure 1-st line treatment" /><category label="Failure re-treatment" /><category label="New Patients" /><category label="New case PTB" /><category label="MDR TB Contact" /><category label="Refugees SS+ve" /><category label="HCWs" /><category label="Hiv(+) & Smear(-)" /></categories><dataset seriesName="MTB Pos" color="AFD8F8" showValues="0"><set value="0" /><set value="0" /><set value="1" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /></dataset><dataset seriesName="Rif Resistant" color="F6BD0F" showValues="0"><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /><set value="0" /></dataset></chart>');
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
						<small>Last Upload : Dec  - 2013</small>
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
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">MTB +ve</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">1</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					</tr>
					<tr>
					<td style="text-align:center">Rif Resistant</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					<td style="text-align:center">0</td>
					</tr>
					</tbody>
					</table>
						
		</div>
		
	</div>

</div>
	
</div>
	
	




	

	<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
    <script src="../assets/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
	<script src="../assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="../assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="../assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="../assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="../assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="../assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="../assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="../assets/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	<script type="text/javascript">
		
		
	</script>
	
</body>
