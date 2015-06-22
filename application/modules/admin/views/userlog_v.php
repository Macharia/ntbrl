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
        url: "<?php echo base_url("ajax_data/user/get_user_/id");?>",
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
       "bJQueryUI":true, "aoColumnDefs": [
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

<body class="page-body page-fade" style="font-size: 12px;">

<div class="col-md-6"  style="width: auto;">
		
		<ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
			<li class="active"><a href="#home" data-toggle="tab">View Users</a></li>
			<li><a href="#profile" data-toggle="tab">Add User</a></li>
			
		</ul>
		
		<div class="tab-content" style="width: auto">
		<?php 

	if ($this->session->flashdata('success_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-success">successfull <a href="<?php echo base_url('admin/userlog'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>
	<?php					
	}
	?>
			<div class="tab-pane active" id="home" style="width: 950px">
				<table class="table table-bordered" id="example">
						<thead>
							<tr>
								
								<th>User ID </th>
					            <!-- <th>Full Name</th>-->
					            <th>UserName</th>
					            <th>User Category</th>
					            <th>Status</th> 
					            <th>Action</th>             
					        </tr>
						</thead>
						<tbody>
							
								 <?php foreach($user as $row_rsUser) {
								  
								?> 
							<tr>
							
								

							      <td><?php echo $row_rsUser['id']; ?></td>
					              <!-- <td><?php echo $row_rsUser['nm']; ?></td>-->
					              <td><?php echo $row_rsUser['un']; ?></td>
					              <td><?php echo $row_rsUser['gp']; ?></td>
					              <td>
					              	<?php
					              		if($row_rsUser['ac'] == 1) {										
											echo '<div class="label label-success">Active</div>';
										} else if($row_rsUser['ac'] == 0) { 
										 	echo '<div class="label label-warning">Disabled</div>';
										}
					              	?>
					              </td>
					              <td>
					                   <?php if($row_rsUser['ac'] == 1) {										
										echo '<a href="activation?id='.$row_rsUser['id'].'&st='.$row_rsUser['ac'].'"><button class="btn btn-gold" id="deact" type="button" title="Deactivate Account"><i class="entypo-cancel"></i></button></a>';
										} else if($row_rsUser['ac'] == 0) { 
										echo '<a href="activation?id='.$row_rsUser['id'].'&st='.$row_rsUser['ac'].'"><button class="btn btn-green" id="act" type="button" title="Activate Account"><i class="entypo-check"></i></button></a>';
										 }     ?>
									    <a href="<?php echo base_url(); ?>admin/deleteUser?id=<?php echo $row_rsUser['id']; ?>"><button class="btn btn-red" type="button" title="Delete User/Account"><i class="entypo-trash"></i></button></a>
													
										<a href="<?php echo base_url(); ?>admin/resetUser?id=<?php echo $row_rsUser['id']; ?>"><button class="btn btn-blue" type="button" title="Reset User/Account"><i class="entypo-pencil"></i></button></a>
								  </td>   
					         </tr>
					                <?php }  ?>
					    </tbody>
					</table>
            </div>
			<div class="tab-pane" id="profile" style="width: auto" >
			<?php 

	if ($this->session->flashdata('success_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-success">User successfully added <a href="<?php echo base_url('admin/userlog'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>
	<?php					
	}

	?>
	<?php 

	if ($this->session->flashdata('error_message', TRUE)) {
		?>
		 <div style="text-align: center;width: 250px;" class="alert alert-warning">Could not enter data.Try Again<a href="<?php echo base_url('admin/userlog'); ?>" data-rel="close" style="float: right;"><i class="entypo-cancel"></i></a></div>'
	<?php					
	}

	?>
			 <form action="<?php echo base_url('admin/userlog/get_add_user'); ?>" name="save" method="post">
			      <table class="table table-striped" style="width: auto;">
			      
			       <tr>
			       <th style="text-align: center;"><font size="1.4">Name</font></th>
			       <td style="text-align: center;"><input type="text" class="form-control" name="name" id="name" size="30" required /> </td>
			       <th style="text-align: center;"><font size="1.4">Category</font></th>
			       <td style="text-align: center;">
			       	<select name="category" id="category"  class="form-control" >
			      <option value="0">Select Usergroup</option>
			      
			      
			    </select>
			    
			    <input type="hidden" name="fname" id="fname" />
			    <input type="hidden" name="mfl" id="mfl"  />
			       </td>
			       </tr>
			       <tr>
				   <th  colspan='4' >&nbsp;</th>
				   </tr>	
			       <tr>
			       <th style="text-align: center;" colspan="1"><font size="1.4">Facility</font></th>
			
			<td style="text-align:center;" colspan="3">
			    <select name="facility" id="facility"  class="form-control" >
			      <option value="0"> <font size="1.4">Select Facility</font></option>
			      
			    </select></td>
			       </tr>
			       <tr>
					<th  colspan='4' >&nbsp;</th>
					</tr>	
			       <tr>
			       <th style="text-align: center;" colspan='1'><font size="1.4">Username</font></th>
			       <td style="text-align: left;" colspan='3'><input type="text" class="form-control"  name="username" id="username"  size="25"  required autocomplete="off"  /></td>
			       </tr>
			       <tr>
					<th  colspan='4' >&nbsp;</th>
					</tr>	
			       <tr>
			       <th style="text-align: center;"><font size="1.4">Password</font></th>
			       <td style="text-align: center;"><input type="password" class="form-control" name="password" id="password" required  /></td>
			       
			       <th style="text-align: center;"><font size="1.4">Repeat Password </font></th>
			       <td style="text-align: center;"><input type="password" class="form-control" name="password1" id="password1" a required  /></td>
			       </tr>
			       <tr>
					<th  colspan='4' >&nbsp;</th>
					</tr>	
			       <tr>
			       
			        <td colspan="4" >
			        <div align="center">
			        <button class="btn btn-success btn-icon icon-left" type="submit" name="btnsave">Add User<i class="entypo-user-add"></i></button>
			        <input type="reset" name="button2" id="button2" value="Reset" class="btn btn-default"     />
			        </div>
			        </td>
			        </tr>
			      </table>
			    <input type="hidden" name="MM_insert" value="save"  />
			  </form>
					
			</div>
			
		</div>
		
		
	</div>
<script type="text/javascript">
// jQuery(window).load(function()
// {
// 	$("#table-2").dataTable({
// 		"sPaginationType": "bootstrap",
// 		"sDom": "t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
// 		"bStateSave": false,
// 		"iDisplayLength": 8,
// 		"aoColumns": [
// 			{ "bSortable": false },
// 			null,
// 			null,
// 			null,
// 			null
// 		]
// 	});
	
// 	$(".dataTables_wrapper select").select2({
// 		minimumResultsForSearch: -1
// 	});
	
// 	// Highlighted rows
// 	$("#table-2 tbody input[type=checkbox]").each(function(i, el)
// 	{
// 		var $this = $(el),
// 			$p = $this.closest('tr');
		
// 		$(el).on('change', function()
// 		{
// 			var is_checked = $this.is(':checked');
			
// 			$p[is_checked ? 'addClass' : 'removeClass']('highlight');
// 		});
// 	});
	
// 	// Replace Checboxes
// 	$(".pagination a").click(function(ev)
// 	{
// 		replaceCheckboxes();
// 	});
// });
	
// // Sample Function to add new row
// var giCount = 1;

// function fnClickAddRow() 
// {
// 	$('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount+".2", giCount+".3", giCount+".4", giCount+".5" ]);
	
// 	replaceCheckboxes(); // because there is checkbox, replace it
	
// 	giCount++;
// }
</script>
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#act1").click(function(ev)
		{
			ev.preventDefault();
			
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

			toastr.success("Account has been Activated.",null, opts);
		});
		
		
		$("#deact1").click(function(ev)
		{
			ev.preventDefault();
			
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
			
			toastr.warning("Account has been deactivated.", null, opts);
		});
	});
</script>
<script type="text/javascript">
 
	 $(document).ready(function(){
	$.ajax({
        url:"<?php echo base_url();?>admin/userlog/get_usergp",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
        	//console.log(data);
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#category').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	 console.log(v);

						    	$('#category').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    $.ajax({
        url:"<?php echo base_url();?>admin/userlog/get_facility",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);

			            $.each(obj, function(k, v) {

			            	$('#facility').show();
						    
						    if (k == "aaData"){

						    	$.each(v, function(k, v){
						    	// console.log(v);

						    	$('#facility').append ('<option value='+v["0"]+'>'+v['1']+'</option>');	
						    	});
						    	
						    }
						    return v;
						});
        }
    });
    
    

 }); // End of document.ready


 </script>   


 	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/toastr.js" id="script-resource-7"></script>
	<script src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/ui/jquery.ui.dialog.js"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
		
</body>
</html>