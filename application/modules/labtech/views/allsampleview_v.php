<link rel="stylesheet" href="admin/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/neon-theme-min.css"  id="style-resource-6">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/neon-forms-min.css"  id="style-resource-7">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/custom-min.css"  id="style-resource-8">

	<script src="../../assets/js/jquery-1.11.0.min.js"></script>
<script>$.noConflict();</script>

	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="admin/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
     
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507087: Neon - Responsive Admin Template created by Laborator -->

<div class="main-content" style="">

	<div class="alert alert-success" style="margin-left: 20%;margin-right: 10%">
		Please note that the Email services is now available. However the SMS services is still unavailable. The problem is being resolved.Sorry for the inconveniences.
	</div>
	

<div class="row" style="margin-left: auto;margin-right: auto">
	<div class="col-md-9" style="float: right !important;margin-right: 0.25%;min-width: 1100px !important">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Sample Results With Patient Details 
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
	<?php			
	if ($this->session->flashdata('success_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-success">Email Sent Sucessfully <a href="<?php echo base_url('labtech/allsampleview'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>
	<?php					
	}

	?>
	<?php 

	if ($this->session->flashdata('error_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-warning">Email Not Sent<a href="<?php echo base_url('labtech/allsampleview'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>'
	<?php					
	}

	?>
			 <table class="table table-bordered datatable" id="table-1">
				<thead>
					<tr>
						
			            <th>Lab No</th>
			            <th>Patient Name</th>
			            <th>Referred Facility </th>
			            <th>Date Tested </th>
			            <th>MTB Result </th>
			            <th>MTB Rif </th>
			            <th >Actions</th>
			            <th >Actions</th>
			         </tr>
				</thead>
				<tbody>
				   <?php foreach($all as $row_rssample) { 
				     	$row_rssample['d']= @date('d-M-Y', strtotime($row_rssample['d'])); 
				    	$row_rssample['Start_Time']= date('d-M-Y', strtotime(	$row_rssample['Start_Time']));
						$row_rssample['End_Time']= date('d-M-Y', strtotime(	$row_rssample['End_Time']));
						$row_rssample['Expiration_Date']= date('d-M-Y', strtotime(	$row_rssample['Expiration_Date']));
						$row_rssample['Exported_Date']= date('d-M-Y', strtotime(	$row_rssample['Exported_Date']));
				   
				   if($row_rssample['ln']==''){
				   	    	
				   	    $row_rssample['ln']=$row_rssample['sid'];
				   	
				   }
				   if($row_rssample['a']==''){
				   	    	
				   	    $row_rssample['a']=$row_rssample['pid'];
				   	
				   }
				   ?>    
				   
				   
				     
						<tr class="odd gradeX">
						 
						
						<td> <?php echo $row_rssample['ln']; ?></td>
						<td> <?php echo $row_rssample['a']; ?></td>
						<td> <?php echo $row_rssample['c']; ?></td>
						<td> <?php echo $row_rssample['d']; ?></td> 
						<td> <?php echo $row_rssample['e']; ?></td>
						<td> <?php echo $row_rssample['f']; ?></td>
						
						
						
						<td>
							<!--<a title="View Full Profile"class="btn btn-info btn-sm btn-icon icon-left" <?php echo "href='patientview.php?id=" .urlencode($row_rssample['ID']) ."'";?>>
							<i class="entypo-info"></i>
							 &nbsp;
							</a>
							<a title="View GeneXpert Info" class="btn btn-default btn-sm btn-icon icon-left" <?php echo "href='machineview.php?id=" .urlencode($row_rssample['ID']) ."'";?>>
							<i class="entypo-monitor"></i>
							 &nbsp;
							</a>-->
							<a title="View Full Profile" class="btn btn-info btn-sm btn-icon icon-left" data-toggle="modal" data-target="#<?php echo $row_rssample['ID']; ?>" > 
							<i class="entypo-info"></i>
							 &nbsp;
							</a>
							<a title="Print Result"class="btn btn-blue btn-sm btn-icon icon-left" <?php echo "href='printresult.php?id=" .urlencode($row_rssample['ID']) ."'";?>>
							<i class="entypo-print"></i>
							 &nbsp;
							 </a>
												
						</td>
						
						<td>
                            <a data-toggle="modal" data-target="#email_<?php echo $row_rssample['ID']; ?>" ><img src="img/icons/email4.png" height="20" alt="Email" title="send Email"/></a>	
							<a data-toggle="modal" data-target="#sms_<?php echo $row_rssample['ID']; ?>" ><img src="img/icons/sms.png" height="20" alt="SMS" title="send SMS"/></a>
						</td> 
						 </tr>
						 <!-- Modal -->
							<div class="modal" id="<?php echo $row_rssample['ID']; ?>" tabindex="-1" role="dialog" style="width: 1000px;">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Patient Information</h4>
							      </div>
							      <div class="modal-body" style="width: 1200px; height: 150px">
							      	<div class="col-md-4">
							      	   <label for="field1">Lab No: </label> <?php echo $row_rssample['ln']; ?>
									 </div> 
									 <div class="col-md-4">
									  <label for="field1">Full Name: </label>
									  <?php echo $row_rssample['a']; ?>
									  </div>
									  <div class="col-md-4">
									  <label>Age: </label><?php echo $row_rssample['age']; ?>
									  </div>
									  <div class="col-md-4">
									  	<label>Gender: </label><?php echo $row_rssample['gender']; ?>
									  </div>
									  <div class="col-md-4">
									  	<label>Mobile No: </label><?php echo $row_rssample['mobile']; ?>
									  </div>
									  <div class="col-md-4"><label for="field3">Physical address: </label>
									    <?php echo $row_rssample['address']; ?>
									  </div>
									  <div class="col-md-4"><label for="field4">HIV Status: </label>
									  	<?php echo $row_rssample['h_status']; ?>
									  </div>
									 
									  <div class="col-md-4"><label for="field3">Type of patient: </label>
									  	<?php echo $row_rssample['pat_type']; ?>
									  </div>
									  <div class="col-md-4"><label for="field3">Clinician Name: </label>
									  	<?php echo $row_rssample['User']; ?>
									  </div>
									  
									  <div class="col-md-4"><label for="field3">Date of collection: </label>
									  	<?php echo $row_rssample['d']; ?>
									  </div>
									  <div class="col-md-4"><label for="field3">MTB Result: </label>
									  	<?php echo $row_rssample['e']; ?>
									  </div>
									   <div class="col-md-4"><label for="field3">MTB Rif Result: </label>
									   	<?php echo $row_rssample['f']; ?>
									   </div>
									  
							      </div>
							      <div class="modal-header">
							        <h4 class="modal-title" id="myModalLabel">Genexpert Information</h4>
							        
							      </div>
							       <div class="modal-body" style="width: 1000px; height: 150px">
							      	<div class="col-md-4">
							      	   <label for="field1">Test Status: </label> <?php echo $row_rssample['Status']; ?>
									 </div> 
									 <div class="col-md-4">
									  <label for="field1">Start Time: </label>
									  <?php echo $row_rssample['Start_Time'];?>
									  </div>
									  <div class="col-md-4">
									  <label>End Time:  </label><?php echo $row_rssample['End_Time']; ?>
									  </div>
									  
									  <div class="col-md-4">
									  	<label>Assay Version:  </label><?php echo $row_rssample['Assay_Version']; ?>
									  </div>
									  						 
									  <div class="col-md-4"><label for="field3">Cartridge S/N: </label>
									  	<?php echo $row_rssample['Cartridge_SN']; ?>
									  </div> 
									  <div class="col-md-4"><label for="field3">Expiration Date: </label>
									  	<?php echo 	$row_rssample['Expiration_Date'];?>
									  </div>
									  <div class="col-md-4"><label for="field3">Module Name: </label>
									  	<?php echo $row_rssample['Module_Name']; ?>
									  </div>
									  <div class="col-md-4"><label for="field3">Module S/N: </label>
									  	<?php echo $row_rssample['Module_SN']; ?>
									  </div>
									   <div class="col-md-4"><label for="field3">Instrument S/N: </label>
									   	<?php echo $row_rssample['Instrument_SN']; ?>
									   </div>
									   <div class="col-md-4"><label for="field3">S/W Version: </label>
									   	<?php echo $row_rssample['SW_Version']; ?>
									   </div>
									   <div class="col-md-4"><label for="field3">Exported Date: </label>
									   	<?php echo 	$row_rssample['Exported_Date'];?>
									   </div>
									  
							      </div>
							      <div class="modal-footer">
							        
							      </div>
							    </div>
							  </div>
							</div>
							
							<!-- Modal for sms -->
							<div class="modal fade" id="sms_<?php echo $row_rssample['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog">
								    <div class="modal-content" style="width: 500px">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title">Clinician Information</h4>
								      </div>
								      <div class="modal-body">
								       <div class="col-md-7"><label for="field3">Clinician Name: </label>
									  	<?php echo $row_rssample['c_name']; ?>
									  </div>
									   <div class="col-md-5"><label for="field3">Clinician No: </label>
									   	<?php echo $row_rssample['c_no']; ?>
									   </div>
								      </div>
								      <div class="modal-footer">
								        <a <?php echo "href='sendsms.php?id=" .urlencode($row_rssample['ID']) ."'";?>><button type="button" class="btn btn-primary">Send SMS</button></a>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      </div>
								    </div><!-- /.modal-content -->
								  </div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
						<!-- Modal for email -->
							<div class="modal fade" id="email_<?php echo $row_rssample['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog">
								    <div class="modal-content" style="width: 500px">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title">County Co-ordinator Information</h4>
								      </div>
								      <div class="modal-body">
								       
									   <div class="col-md-9"><label for="field3">CTLC Email: </label>
									   	<?php echo $row_rssample['c_email']; ?>
									   </div>
								      </div>
								      <div class="modal-footer">
								        <a <?php echo "href='sendemail.php?id=" .urlencode($row_rssample['ID']) ."'";?>><button type="button" class="btn btn-primary">Send Email</button></a>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      </div>
								    </div><!-- /.modal-content -->
								  </div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

			      <?php }  ?> 
			      
			        
						 </tbody>
			</table>

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
			</div>
		
		</div>
	
	</div>
</div>
	
<script type="text/javascript">
		
		function fnsms(num) {
			alert(num);
			//exit;
		var that = this;
		        $.ajax({
		        	 
		                type: "POST",
		                url: "<?php echo base_url("ajax_data/sendsms/get_sendsms_/id");?>",
		                data: 'id=' + num,
		                dataType: "json",
		                cache: false,
		                success: function(data) {
		                	
		                   var opts = {
							"closeButton": true,
							"debug": false,
							"positionClass": "toast-bottom-left",
							"onclick": null,
							"sdeDuration": "1000",
							"tihowDuration": "300",
							"himeOut": "10000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};
						
						 toastr.success(data.message, data.title, opts);
						 //window.location.href='allsampleview.php';
		                },
		                error: function () {
		                	
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
						
						toastr.success(data.message, data.title, opts);
		                }
		            })
		       
		        } // End of  sms function
		
		
 </script>
 <script type="text/javascript">

	function fnemail(num) {
			
		     $.ajax({
		        	 
		                type: "POST",
		                url: "<?php echo base_url("ajax_data/sendemail/get_email_/id");?>",
		                data: 'id=' + num,
		                dataType: "json",
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
							"himeOut": "10000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};
						
						 toastr.success(data.message, data.title, opts);
						 window.location.href='allsampleview.php';
		                },
		                error: function () {
		                	alert('error');
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
						
						toastr.success(data.message, data.title, opts);
						window.location.href='allsampleview.php';
		                }
		            })
		       
		        } // End of  email function
 </script>

	<link rel="stylesheet" href="admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="admin/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="admin/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="admin/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="admin/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="admin/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="admin/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="admin/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="admin/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="admin/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="admin/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="admin/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="admin/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	<script src="admin/neon/neon-x/assets/js/toastr.js" id="script-resource-7"></script>
	<script src="admin/neon/neon-x/assets/js/toastr.js" id="script-resource-7"></script>
	
	
</div>
</div>	
</body>
</html>