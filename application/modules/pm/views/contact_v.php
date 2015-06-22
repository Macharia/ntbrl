<!DOCTYPE html>
<html lang="en">
	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    
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
        url: "<?php echo base_url("ajax_data/conta/get_contact/id");?>",
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
        "sAjaxSource": "contact/get_contact", 
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
<div class="main-content">
	 
<div class="row">
	<div class="col-sm-11" style="margin-top: 1.5%;margin-left: 4%;">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						GeneXpert Sites Contact Persons
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				
				<table  class="display" id="example" >
					<thead>
						<tr>
							
				            <th style="text-align: center" >MFL Code </th>
				            <th style="text-align: center" >Facility Name</th>
				            <th style="text-align: center" >District</th>
				            <th style="text-align: center" >County</th>
				            				            
				         </tr>
					</thead>
					<tbody>
						
							 
						
					</tbody>
				</table>					
		</div>
		</div>
	</div>
	
</div>
	
</div>
	
	




	

	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
    <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	<script type="text/javascript">
		
		
	</script>
	
</body>
</html>