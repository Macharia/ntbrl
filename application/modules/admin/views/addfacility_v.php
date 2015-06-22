

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


<div class="row">
	<div class="col-sm-12">
	
		<div class="panel panel-primary" id="charts_env">
		
			<div class="panel-heading">
				
				<div class="panel-title">Add New Facility</div>
			</div>
	
			<div class="panel-body">

<?php 

	if ($this->session->flashdata('success_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-success">Facility Details Successfully Saved <a href="<?php echo base_url('admin/addfacility'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>
	<?php					
	}

	?>
	<?php 

	if ($this->session->flashdata('error_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-warning">An Error Occurred.Please Try Again<a href="<?php echo base_url('admin/addfacility'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>'
	<?php					
	}

	?>
				
				<form action="<?php echo base_url('admin/addfacility/get_upload_facility'); ?>" name="save" id="save" class="validate" method="post" role="form">
			    <div class="col-md-4">
					<div class="form-group">
					<label>Mfl Code:</label>
			    	<input type="text" name="code" id="code" data-validate="required"  class="form-control" data-mask="999999" >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>Facility Name:</label>	
				    <input class="form-control" type="text" name="fname" id="fname" data-validate="required">
				    </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>Type of Facility:</label>	
					<select class="form-control" name="ftype" id="ftype" data-first-option="false" >
					<option value="0">Type of Facility</option>
					
							      
					
					</select>
					</div>
				</div>
				<div class="clear"></div>
				<br>
				<div class="col-md-4">
					<div class="form-group">
					<label>Type of Ownership:</label>	
					<select class="form-control" name="owner" id="owner" data-first-option="false">
					<option value="0">Type of Ownership</option>
					
					
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>County:</label>	
					<select class="form-control" name="county" id="county" data-first-option="false">
					<option value="0">All counties</option>
					
					
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>District:</label>	
					<div name="district" id="district">  </div>
					</div>
				</div>
				<div class="clear"></div>
				<br>
				<div class="col-md-4">
					<div class="form-group">
					<label>Person In Charge:</label>	
					<input class="form-control" type="text" name="incharge">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>Telephone:</label>	
					<input type="text" name="tel" data-validate="required"  class="form-control" data-mask="9999999999">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label>Email:</label>	
					<input class="form-control" type="text" name="email" data-validate="email">
					</div>
				</div>
				<div class="clear"></div>
				<br>
				<div align="center">
					<button class="btn btn-success" type="submit" name="btnUpload" id="btnUpload">Save Details</button>
					<input type="reset" name="reset" class="btn btn-default"/>
				</div>
			</form>
			</div>				
		</div>	

	</div>

</div>

<br />

	

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">

	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/selectboxit/jquery.selectBoxIt.min.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/jquery.inputmask.bundle.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/bootstrap-tagsinput.min.js" id="script-resource-8"></script>
	

 <script type="text/javascript">
 
	 $(document).ready(function(){
	$.ajax({
        url:"<?php echo base_url();?>admin/addfacility/get_facility",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
        	//console.log(data);
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#ftype').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	 console.log(v);

						    	$('#ftype').append ('<option value='+v["0"]+'>'+v['0']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>admin/addfacility/get_owner",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#owner').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#owner').append ('<option value='+v["0"]+'>'+v['0']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>admin/addfacility/get_county",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#county').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#county').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    

 }); // End of document.ready


 </script>   

</body>
</html>