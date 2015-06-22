	<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="../assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507087: Neon - Responsive ../assets Template created by Laborator -->


<div class="main-content" style="margin-top: %;margin-left: .3%">

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-gradient" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Mapping of all facilities in the country
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				


			<script>


				$(document).ready(function() {
    			$('#table-1').dataTable( {
    				
     			   "processing": true,
      				  "serverSide": true,
        				"sAjaxSource": "facility/get_facility_json_",
        				"oLanguage": {

												"sLengthMenu": "Page length: _MENU_",
												"sSearch": "Filter:",
												"sZeroRecords": "No records found"
													}

        					
    				} );
				} );







			</script>
				<!--table-->			

				



				
				
				<table class="table table-bordered datatable" id="table-1">
				<thead>
				
				<tr class="odd gradeX"><th><small>MFL Code</small></th><th><small>Facility</small></th><th><small>District</small></th><th><small>County</small></th><th><small>Province</small></th></thead> <tbody>


				<td align="left"><small></small></td>
				<td align="left" ><small></small></td>
				<td align="left" ><small></small></td>
				<td align="left" ><small></small></td>
				<td align="left" ><small></small></td></tr>


				
				

				</tbody></table>

			</div>
		
		</div>
	
	</div>
</div>
	


	<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">

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
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>