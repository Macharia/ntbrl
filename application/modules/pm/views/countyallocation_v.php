<style type="text/css">

.center{
	align: center;
}
.left{
	align:left;
}
.right{
	align:right;
}
#table-1 tbody>tr>td{
	text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
      
      

<div class="main-content" style="margin-top: 6%;margin-left: .3%">
 
<div class="row">


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
</head>
<body>

	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						 County Reporting
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
		
				<table class="table table-striped" id="table_allocate">
							<!-- <thead>
							<tr >
								<td style="font-weight: bold;"> Counties</td>
								<td style="font-weight: bold;">Reported / Total(Facilities)</td>
							</tr>
						</thead> -->
				         <tbody>
					
			            	<tr>



				 <?php echo $table ?>
				 
				 			</tr>
					       
					   
					    </tbody>
						</table>


			
		</div>

	</div>



	<div class="col-sm-9">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Genexpert County Allocation : <?php echo $countyName ?> County
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                 <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				<table class="table table-bordered" id="table-1">
						<thead>
							<tr>
								
					            <th style="text-align: center">Mfl</th>
					            <th style="text-align: center">Facility Name</th>
					            <th style="text-align: center">District</th>
					            <th style="text-align: center">Period</th>
					            <th style="text-align: center">Quantity Received</th>
					            <th style="text-align: center">Quantity Issued(From KEMSA)</th>
					            <th style="text-align: center">Quantity Consumed</th> 
					            <th style="text-align: center">End Month Physical Count</th>
					            <th style="text-align: center">Quantity Requested For Re-Supply</th>
					            <th style="text-align: center">Quantity Allocated</th>
					            
					            <th style="text-align: center">Status</th>
					         </tr>
					         
						</thead>
						<tbody>
							
					      
								<script type="text/javascript" charset="utf-8">


								$(document).ready(function() {


									jQuery.fn.dataTableExt.oSort['usdate-asc']  = function(a,b) {
												alert('sadasda');
											    var usDatea = $(a).text().split('/'); 
											    var usDateb = $(b).text().split('/'); 

											    var x = (usDatea[2] + usDatea[0] + usDatea[1]) * 1;
											    var y = (usDateb[2] + usDateb[0] + usDateb[1]) * 1;

											    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
											};

									jQuery.fn.dataTableExt.oSort['usdate-desc'] = function(a,b) {
											    var usDatea = $(a).text().split('/'); 
											    var usDateb = $(b).text().split('/'); 

											    var x = (usDatea[2] + usDatea[0] + usDatea[1]) * 1;
											    var y = (usDateb[2] + usDateb[0] + usDateb[1]) * 1;

											    return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
											};





										$('#table-1').dataTable( {
										"bprocessing": true,
										"serverSide": true,
										"bJQueryUI" : true,

										"sAjaxSource": "<?php echo base_url().'pm/countyallocation/get_county_allocation_json_?id='.$countyID;?>",
										"aoColumns": [
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","sType":"usdate","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										{"sClass" : "center","bSortable":"true"},
										],

										"oLanguage": {

												"sLengthMenu": "Page length: _MENU_",
												"sSearch": "Filter:",
												"sZeroRecords": "No records found"
													}
						
										} );





							} );







      									</script>
				        <script type="text/javascript">
$(document).ready(function() {

$('#btnsave').click(function() {
s = $('#allocation').val();
//alert(s);

        $.ajax({
        	 
                type: "POST",
                url: "../ajax_data/usergroup.php",
                data: 'id=' + s,
                cache: false,
                success: function(data) {
                    alert(data);
                    
                   var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": "toast-bottom-left",
					"onclick": null,
					"sdeDuration": "1000",
					"tihowDuration": "300",
					"himeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
				
				toastr.success("Group successfully added", "Save Response", opts);
                },
                error: function () {
                	document.getElementById('search').value = "";
                    var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": "toast-bottom-left",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
				
				toastr.error("Could not enter data.Try Again", "Save Response", opts);
                }
            })
       
        }); // End of  keyup function

    }); // End of document.ready

 </script>
								       
						</tbody>
					</table>
					</div>


	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-9"></script>
	
</body>
</html>	 

	
	

