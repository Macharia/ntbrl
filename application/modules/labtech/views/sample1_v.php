<body class="page-body">

<div class="page-container">
		

<div class="sidebar-menu fixed" style="width: 245px;">
	
</div>	



<div class="main-content">

<div class="row">
	<div class="col-md-12">
		
		
		<div class="panel minimal minimal-gray">
			
			<div class="panel-heading">
				<div class="panel-title"><h4>Patient's Register </h4></div>
				
					<div class="col-sm-5" style="float: right">
						
						<div class="input-group">
						<label><strong><font color="red"></font>Search By Ip/No,Op/No or Referring Site Reg No: </strong></label>
						<input class="form-control" type="text" name="search" id="search" autocomplete="off"><label  for="field-1">  &nbsp;&nbsp; </label>
						<span class="input-group-btn"><input class="btn btn-primary" type="submit" id="btnsearch" name="btnsearch" value="Search" />
						</span>
						</div>
				
					</div>
				
			</div>
			
			<div class="panel-body" id="my-div me_1">
				
				<div class="panel panel-gradient" data-collapsed="0">
								
								<!-- panel head -->
								<div class="panel-heading">
									<div class="panel-title">Add New Patient</div>
									
									<div class="panel-options">
										<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
										<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
										<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
										<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
									</div>
								</div>
								
<?php 

	if ($this->session->flashdata('success_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-success">Patient details successfully saved <a href="<?php echo base_url('labtech/sample1'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>
	<?php					
	}

	?>
	<?php 

	if ($this->session->flashdata('error_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-warning">Could not enter data.Try Again<a href="<?php echo base_url('labtech/sample1'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>'
	<?php					
	}

	?>


								<!-- panel body -->
								<div class="panel-body">
									<?php
   if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
   ?>
					<form action="<?php echo base_url('labtech/sample1/get_upload_lab'); ?>" name="save" id="save" class="validate" method="post" role="form" >
					<div class="col-md-6">
						<input type="hidden" id="facility" name="facility" value="<?php echo  $this->session->userdata('mfl');?>"  />
						<label  for="field-1"><strong>Testing Facility:</strong></label>
						<input type="text"  value="<?php echo  $this->session->userdata('name');?>" class="form-control" readonly   />
			
					</div>
					
					<div class="col-md-6">
						<label  for="field-1"><strong><font color="red">*</font>Referred From(Facility):</strong></label>
						<select name="refacility" id="refacility" class="select2" data-allow-clear="true" data-placeholder="Select One Facility...">
						      <option></option>
						      <optgroup name="optrefacility" id="optrefacility" label="National Facilities">
						      
								      <option value="0"></option>
								      


								</optgroup>
						    </select>
					</div>
					
					<div class="clear"></div>
					<br />
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong>Lab No:</strong></label>
						<input type="text" class="form-control" name="labno" value="<?php echo @date("dmy_").$this->session->userdata('mfl')."_". $namba?>"  readonly />
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong><font color="red"></font>Op No:</strong></label>
						<input type="text" class="form-control" id="opno" name="opno" data-validate="number" placeholder="Op No" />
						</div>
					</div>
					
					<div class="col-md-3">	
						<div class="form-group">
					    <label  for="field-1"><strong><font color="red"></font>IP No:</strong></label>
						<input type="text" class="form-control" id="ipno" name="ipno" data-validate="number" placeholder="IP No" />
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong><font color="red"></font>Referring Site Reg No:</strong></label>
						<input type="text" class="form-control" id="regno" name="regno" data-validate="number" placeholder="Referring Site Reg no" />
						</div>
					</div>
					
					<div class="clear"></div>
					<br />
					
					<div class="col-md-4">
						<div class="form-group">
						<label  for="field-1"><strong><font color="red">*</font>Patient Name:</strong></label>
						<input type="text" name="name" id="name" data-validate="required,name"  class="form-control" placeholder="Patient Name">
						</div>
					</div>
					
					<div class="col-md-1">
						<div class="form-group">
						<label  for="field-1"><strong><font color="red">*</font>Age:</strong></label>
						<input type="text" data-validate="required" name="age" id="age" class="form-control" data-mask="99" placeholder="Age" />
						</div>
					</div>
					
					<div class="col-md-2">
						<label  for="field-1"><strong>  &nbsp;&nbsp; </strong></label>
						<select name="ageb" id="ageb" class="form-control">
				        <option value="1">Year(s)</option>
				        <option value="0">Month(s)</option>
				        </select>
					</div>
					
					<div class="col-md-2">
						<label  for="field-1"><strong><font color="red">*</font>Gender:</strong></label>
						<select name="sex" id="gender" class="form-control" data-first-option="false">
				        <option value="0">Select Gender</option>
				        <option value="Male">Male</option>
				        <option value="Female">Female</option>
				        </select>
					</div>
					
					<div class="col-md-3">
						<label  for="field-1"><strong>Date of Visit:</strong></label>
						<div class="input-group">
						<input type="text" name="date" data-validate="required" class="form-control datepicker" data-format="dd-M-yyyy"  data-end-date="d" placeholder="Select Date">
						<div class="input-group-addon">
						<a href="#">
						<i class="entypo-calendar"></i>
						</a>
						</div>
						</div>
					</div>
					<div class="clear"></div>
					<br />
					
					<div class="col-md-3">
						<label  for="field-1"><strong>Physical Address:</strong></label>
						<input type="text" name="address" id="address" class="form-control" placeholder="Physical Address">
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong><font color="red">*</font>Patient Mobile No:</strong></label>
						<input type="text" data-validate="required"  name="p_no" id="p_no" class="form-control" data-mask="9999999999" placeholder="Patient Mobile No" />
					    </div>
					</div>
					
					<div class="col-md-3">
					    <label  for="field-1"><strong><font color="red">*</font>Type of Patient:</strong></label>
						<select name="ptype" id="ptype"   class="form-control">
					      <option value="0">Type of Patient</option>
					      
				
					    </select>
					</div>
					
					<div class="col-md-3">
						<label  for="field-1"><strong><font color="red">*</font>Smear(+ve/-ve):</strong></label>
						<select name="smear" id="smear" class="form-control" >
				        <option value="0">Select Type</option>
				        <option value="Positive">Positive</option>
				        <option value="Negative">Negative</option>
						<option value="Not Done">Not Done</option>
				        </select>
					</div>
					
					<div class="clear"></div>
					<br />
					
					<div class="col-md-2">
						<label  for="field-1"><strong><font color="red">*</font>Hiv Status:</strong></label>
						<select name="hstatus" id="hstatus"  class="form-control" >
					      <option value="0">Select Status</option>
					      
					    </select>
					</div>
					
					<div class="col-md-3">
						<label  for="field-1"><strong><font color="red">*</font>Examination Required:</strong></label>
						<select name="exam" id="exam" class="form-control" >
					      
					    </select>
					</div>
					<div class="clear"></div>
					<br />
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong>DTLC Email :</strong></label>
						<input type="text"   class="form-control" name="d_email" id="d_email" data-validate="email" placeholder="DTLC Email" />
						</div>
					</div>
					
									
					<div class="col-md-3">
						<div class="form-group">
					    <label  for="field-1"><strong>Clinician Name:</strong></label>
						<input type="text" name="c_name" id="c_name"  class="form-control" placeholder="Clinician Name">
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong>Clinician Email:</strong></label>
						<input type="text" class="form-control" id="c_email" name="c_email" data-validate="email" placeholder="Clinician Email" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label  for="field-1"><strong>Clinician Mobile No:</strong></label>
						<input type="text" name="c_no" id="c_no" data-validate="required" value="2547"  class="form-control" data-mask="999999999999" placeholder="Clinician Mobile No" />
						</div>
					</div>
										
					<div class="clear"></div>
					<br />
					<div class="col-md-12" align="center">
					<button class="btn btn-success" type="submit" name="btnUpload" id="btnUpload">Save Details</button>
					<button class="btn" type="reset">Reset</button>
					</div>
					
					</form>
									
					</div>
					
				</div>
							
						
			</div>
			
		</div>
		
	</div>
			
</div>
</div>
</div>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
	


	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.inputmask.bundle.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap-tagsinput.min.js" id="script-resource-8"></script>
	
	
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/toastr.js" id="script-resource-7"></script>
<script type="text/javascript">
$(document).ready(function() {

$('#btnsearch').click(function() {
$("#save")[0].reset();
s = $('#search').val();
//alert(s);
  
        $.ajax({
        	 
                type: "POST",
                url: "fix.php",
                data: 'id=' + s,
                cache: false,
                dataType:"json",
                success: function(data) {
                	document.getElementById('search').value = "";
                	$.each(data,function(i,v){
                		$("#"+i).val(v)
                		
                	});
                   //alert(data);$('#searchpatient').show(); $('#result').html(data);
                    
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
				
				toastr.success("One Patient Found", "Search Response", opts);
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
				
				toastr.error("No patient Found", "Search Response", opts);
                }
            })
       
        }); // End of  keyup function

    }); // End of document.ready


 </script>

 <script type="text/javascript">
 
	 $(document).ready(function(){
	$.ajax({
        url:"<?php echo base_url();?>labtech/sample1/get_rstype_lab",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
        	//console.log(data);
            obj = jQuery.parseJSON(data);
            console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#ptype').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#ptype').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>labtech/sample1/get_rsexamination_lab",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#exam').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#exam').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>labtech/sample1/get_rshiv_lab",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#hstatus').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#hstatus').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>labtech/sample1/get_rsfacilitys_lab",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#refacility').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#refacility').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });

 }); // End of document.ready


 </script>   