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



  
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
   
  <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
  <script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
   
    <style type="text/css" title="currentStyle">
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/demo_page.css";
@import "<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/css/jquery.dataTables.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src=" <?php echo base_url(); ?>assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.dataTables.js"></script>





<script type="text/javascript" charset="utf-8">

$(document).ready(function() {
  
  
  function fnFormatDetails ( oTable, nTr )
{ 
    var aData = oTable.fnGetData( nTr );
    var res='';
  //location.href = '#?id='+aData[1];
        $.ajax({
        type: "POST",
       url: "<?php echo base_url("ajax_data/test/get_test_json_/id");?>",
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
    nCloneTd.innerHTML = '<img src="<?php echo base_url(); ?>../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">';
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
       "processing": true,
       "serverSide": true,
       "bJQueryUI":true, 
       "sAjaxSource": "referral/get_referral_json_", 
       "aaSorting": [[1, 'asc']],
       "bPaginate":true,
       "pagingType": "full_numbers",
       "iDisplayLength": 10,
        "oLanguage": {

                        "sLengthMenu": "Page length: _MENU_",
                        "sSearch": "Filter:",
                        "sZeroRecords": "No records found"
                          }
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



        // $(document).ready(function() {
        //   $('#example1').dataTable( {
        //      "processing": true,
        //         "serverSide": true,
        //         "sAjaxSource": "referral/get_referral_json_"
        //     } );
        // } );







      </script>


<div class="main-content" style="margin-top: 6%;margin-left: 10%">
   
<div class="row">
  <div align="center" class="col-sm-9">
    
    <div class="panel panel-gradient">
      <div class="panel-heading">
        <div class="panel-title">
          <h4>
            GeneXpert Sites In The County
          </h4>
        </div>
        
        <div class="panel-options">
          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
          <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
      </div>
    
      <div class="panel-body no-padding">
     

     <!-- <td colspan="4" align="center"> No Data to Display </td></tr> -->
     
     <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
     
     <thead><tr class="odd gradeX"><th>Mfl</th><th>Facility</th></thead> <tbody>


     <td align="left"></td>
     <td align="left"></td></tr>
     
     </tbody></table>









            
    </div>
    </div>
  </div>
  
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/select2/select2.css"  id="style-resource-2">
    <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/bootstrap-datepicker.js" id="script-resource-11"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/select2/select2.min.js" id="script-resource-9"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-10"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-11"></script>
  <script src="<?php echo base_url(); ?>admin/neon/neon-x/assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-12"></script>
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