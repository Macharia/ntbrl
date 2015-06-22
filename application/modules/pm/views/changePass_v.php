<body class="page-body">

<div class="page-container">






<div class="row">
	<div class="col-md-9">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					 Change Login Password to the System. 
				</div>
				
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
		 <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Password Updated!</strong></div>
	<?php					
	}

	?>
	<?php 

	if ($this->session->flashdata('error_message', TRUE)) {
		?>
		 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>
	  <strong>Wrong Old Password!</strong> </div>
	<?php					
	}

	?>			






			<div class="panel-body">
				 
			  
<?php echo validation_errors();?>
<div class="ncontent">

<?php echo form_open(base_url() . 'pm/changePass/get_pm_changePass'); ?>
<table class="table table-bordered">

<tbody>

<tr>
<td><small><?php echo "Old Password:";?></small></td>
<td><?php echo form_password('opassword');?></td>

</tr>
<tr>
<td><small><?php echo "New Password:";?></small></td>
<td><?php echo form_password('npassword');?></td>

</tr>
<tr>
<td><small><?php echo "Confirm Password:";?></small></td>
<td><?php echo form_password('cpassword');?></td>
</tr>
</tbody>
</table>
&nbsp;&nbsp;<div id="some"style="position:relative;">
<button type="submit" class="btn btn-success"><i class=" icon-ok-sign icon-white"></i>&nbsp;Update Password</button>
<button type="reset" class="btn btn-default"><i class=" icon-ok-sign icon-white"></i>&nbsp;Reset Fields</button>
<?php

echo form_close();

?>
</div>
				
			</div>
		
		</div>
	
	</div>
	

	


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

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
		