<div class="row">
		
			<div class="col-sm-6">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Add New Group</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<div class="panel-body">
						
							<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Usergroup</label>
							<div class="col-sm-5">
							<input name="usergroup" id="usergroup" class="form-control" type="text" placeholder="usergroup">
							</div>
							<button class="btn btn-success" type="button" id="btnsave" name="btnsave" >Save Group</button>
							</div>
						
					</div>	
				</div>
				
			</div>
		
			<div class="col-sm-6">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Existing User Group/Current Number of Users</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
						
					<div class="panel-body no-padding">
				<?php foreach($stats as $rows1) { ?>	
				<?php $class=array("primary"=>"1","info"=>"2","danger"=>"3","success"=>"4","warning"=>"5"); ?>
								<li class="list-group-item">
									<span class="badge badge-<?php  echo array_rand($class,1); ?>"><?php echo $rows1['b']; ?></span>
									<?php echo $rows1['a']; ?>
								</li>
					<?php }?>			
			</div>
				</div>
				
			</div>
			
		</div>
			
									
			
<script type="text/javascript">
$(document).ready(function() {

$('#btnsave').click(function() {
s = $('#usergroup').val();
//alert(s);

        $.ajax({
        	 
                type: "POST",
                url: "<?php echo base_url("ajax_data/usergroup/get_usergroup_/id");?>",
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



	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

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
	<script src="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/toastr.js" id="script-resource-7"></script>
		
</body>
</html>