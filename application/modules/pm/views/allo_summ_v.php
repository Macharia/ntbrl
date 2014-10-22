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
	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
  <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
   
    <style type="text/css" title="currentStyle">
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/demo_page.css";
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/jquery.dataTables.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src=" <?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.dataTables.js"></script>


   

<div class="main-content" style="margin-top: 6%;margin-left: .3%">
	 
<div class="row">
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Allocation Reports
						<br />
						<small><?php echo @date('Y'); ?></small>
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				<!--use php for report.php-->
					<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>

	</head>
<body>
	
	
					
			        <table class='table table-striped'>
					<form name="generate" class="form-control" method="POST" action="<?php echo base_url("mpdf/rep_all");?>" >
			        <tr>
					<th>
					 County:
					</th>
					 
					<td style="text-align:left" >  
					<select name="county" id="county" class="form-control">
			        <option value="0">All Counties</option>
			       <!--  <option value><?php  ?></option> -->
					?>
			        </select>
			        </td>
			        </tr>
			        <tr>
					<th colspan='2' width=auto>&nbsp;</th>
					</tr>
					<tr>
				    <th> Facility:
					</th> 
					<td style="text-align:left" >  
					<select name="facility" id="facility" class="form-control">
			        <option value="0">All Facilities</option>
			       <!--  <option value><?php  ?></option> -->
					?>
			        </select>
					<td style="text-align:left">
					
			        <div class="result" id="result"></div>
			        </td>	
					<tr>
					<th colspan='2' width=auto>&nbsp;</th>
					</tr>
					<tr>
			  		<th>    
			        Periods: 
			    	</th>
					    <td style="text-align:left">
					    	<input type="radio" name="period" id="1" class="radioBtn" value="Monthly">
						    <label>Monthly</label>
						    <input type="radio" name="period" id="2" class="radioBtn" value="Quarterly" >
						    <label>Quarterly</label>
						    <input type="radio" name="period" id="3" class="radioBtn" value="Yearly">
						    <label>Yearly</label>
						        
						    
						    
					<div  align="center" class="my-div me_1" style="DISPLAY: none" >
			            Month:<select name="monthly" class="form-control">
						<option value = "">Select Month</option>
						<option value = "1">January</option>
						<option value = "2">February</option>
						<option value = "3">March</option>
						<option value = "4">April</option>
						<option value = "5">May</option>
						<option value = "6">June</option>
						<option value = "7">July</option>
						<option value = "8">August</option>
						<option value = "9">September</option>
						<option value = "10">October</option>
						<option value = "11">November</option>
						<option value = "12">December</option>
					    </select><br>
					     Year:
						<select name="monthyear" class="form-control"><option value="0">Select year</option>
<option value="2014">2014</option>
</select>			    </div>
			    
			    
			    <div  align="center" class="my-div me_2" style="DISPLAY: none" >
			     Month:<select name="quarterly" class="form-control">
						<option value = "">Select Quarter</option>
						<option value = "1">January-March</option>
						<option value = "2">April-June</option>
						<option value = "3">July-October</option>
						<option value = "4">November-December</option>
					   </select>
			               <br>
			     Year:<select name="quarteryear" class="form-control"><option value="0">Select year</option>
<option value="2014">2014</option>
</select>			    </div>
			    <div  align="center" class="my-div me_3" style="DISPLAY: none" >
					Year:<select name="yearly" class="form-control"><option value="0">Select year</option>
<option value="2014">2014</option>
</select>			    </div>
			
			     	    
			</td>  
				
			</tr>
						
			<tr>
			<th style='background-color:#FFFFFF' colspan='2' width=auto>&nbsp;</th>
			</tr>
			<tr class='odd'>
			<td colspan="2">
			  <div id="submit" align="center">
			  	<input type="submit" class="btn btn-green" name="generate" value="Generate Report"   />&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-default" name="reset" value="Reset Fields" onclick="window.location.reload()" />
			    </div>
			</td>
			</tr>
			</form></table>
          
			
			
			 

<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
        url:"<?php echo base_url();?>pm/allo_summ/get_allo_report_json_",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            console.log(obj);

			            $.each(obj, function(k, v) {
						    
						    if (k == "aaData"){
						    	$.each(v, function(k, v){
						    	// console.log(v);
						    	$('#county').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						});
        }
    });
     $('.radioBtn').click(function(){
         
         var div_id = $(this).attr('id');
         $('.my-div').hide(); 
         $('.me_'+div_id).show();   
     }); 
     
	 $("#county").change(function () {
	 	//var cid='';
     if($("#county option:selected").val() == 0 ){
         $('#facility').hide();
     } else if ($("#county option:selected").val() > 0){
        $('#facility').show();
       var cid=$("#county option:selected").val();
         	      //alert(cid); 

         	       $.post("<?php echo base_url();?>pm/allo_summ/get_ajax_all_json_", 
    { d : cid },
    function(data) {

    var	obj = jQuery.parseJSON(data);
    	//console.log(obj);
$('#facility').empty();

    	$.each(obj, function(k, v){

    		if(k == "aaData"){

    			$.each(v, function(k, v){

    				 //console.log(v);
    	//alert(obj);

    	$('#facility').append('<option value='+v["0"]+'>'+v['1']+'</option>');
    });
                
    }
    return v; 
			});
    });        
     }


     });
 
   

});


 </script>
			

<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-9"></script>
	<script type="text/javascript">
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>
	
</body>
</html>
			</div>
		</div>

	</div>

	<div align="center" class="col-sm-9">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						National Catridge Reporting/Allocation Summary
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				
				<!--use php for allocationsummary1.php-->

<style type="text/css" title="currentStyle">
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/demo_page.css";
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/jquery.dataTables.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.js"></script>

<script type="text/javascript" language="javascript" src=" <?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
			
/* Formating function for row details */

 
$(document).ready(function() {
	
	function fnFormatDetails ( oTable, nTr )
{ 
    var aData = oTable.fnGetData( nTr );
    var res='';
	//location.href = '#?id='+aData[1];
        $.ajax({
        type: "POST",
        url: "<?php echo base_url("ajax_data/allo/get_allo_json_/id");?>",
		data: "id="+aData[1],
        async: true,
		cache: false,
        success: function(data) {
			     res=data;
			     oTable.fnOpen(nTr,res,'r');
			    
			}
   
});  
 return res;
	
}
	
    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">';
    nCloneTd.className = "center";
     
    $('#example thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );
     
    $('#example tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );
     
    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#example').dataTable( {
       "bJQueryUI":true,
       "sAjaxSource": "allo_summ/get_allo_summ_json_", 
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]
    });
     
    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#example tbody td img').live('click', function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );			
			
</script>

 
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
								
									       
						<tr class="odd gradeX">
						 
						
						<td style="text-align: center"> </td>
						<td style="text-align: center"> </td>
						<td style="text-align: center"> </td>
						<td style="text-align: center">  </td>
						<td style="text-align: center">  </td> 
						 </tr>
						            
						
						      
						         
								
							</tbody>
						</table>
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
