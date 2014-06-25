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


<script type="text/javascript">
var tname =/^[A-Za-z0-9 ]{3,200}$/;
var uname =/^[0-9 ]{3,20}$/;

function validate(){
  
   var oname = document.getElementById('oname').value;
   var ename = document.getElementById('ename').value;
   var broker = document.getElementById('broker').value;
    var str1= document.getElementById('date4').value;
    var str2= document.getElementById('date5').value;
  
var m1=str1.substring(5,7); 
var m2=str2.substring(5,7); 
var dt1=str1.substring(8,10); 
var dt2=str2.substring(8,10); 
var y1=str1.substring(0,4);
var y2=str2.substring(0,4);


var errors = [];
var minlength=6;
  


if(dt2 > dt1){
alert("Date of Price Cannot be Greater than Date of Stamp");
return false;
  
}

if(m2 > m1){
alert("Month of Price Cannot be Greater than Month of Stamp");
return false;
  
}

if(y2 > y1){
alert("Year of Price Cannot be Greater than Year of Stamp");
return false;
  
}
  
  
 if(broker=="0"){
   alert("No Broker Name");
   return false;
   }

   if(str1=="0000-00-00"){
    alert("No Date of Stamp"); 
  return false; 
 
   } 
      if(str2=="0000-00-00"){
    alert("No Date of Price"); 
  return false; 
 
   }  
   
 if (!tname.test(oname)) {
  errors[errors.length] = "No / Invalid Transferor name .";
 } 
 if (!tname.test(ename)) {
  errors[errors.length] = "No / Invalid Transferee name .";
 } 
 
 if (errors.length > 0) {
  reportErrors(errors);
  return false;
 }

return true;
}

function reportErrors(errors){
 var msg = "Please Enter Valid Data...\n";
 for (var i = 0; i<errors.length; i++) {
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
}
</script>
<script language="javascript"> 
function toggle() {
  var ele = document.getElementById("toggleText");
  var text = document.getElementById("displayText");
  var YAP = document.getElementById("rat");
  if(ele.style.display == "block") {
        ele.style.display = "none";
      YAP.style.display = "block";
    text.innerHTML = "SEARCH";
    }
  else {
    ele.style.display = "block";
    YAP.style.display = "none";
    text.innerHTML = "SEARCH";
  }
} 
</script>
     <script language="JavaScript">
function ShowHide(divId)
{
if(document.getElementById(divId).style.display == 'none')
{
document.getElementById(divId).style.display='block';
}
else
{
document.getElementById(divId).style.display = 'none';
}
}
</script>

  
  <link rel="stylesheet" href="../assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
  <link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
  <link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
  <link rel="stylesheet" href="../assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
  <link rel="stylesheet" href="../assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

  <script src="../assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>
    
    <style type="text/css" title="currentStyle">
@import "../assets/jquery-ui-1.10.3/demos/DataTables/media/css/demo_page.css";
@import "../assets/jquery-ui-1.10.3/demos/DataTables/media/css/jquery.dataTables.css";
</style>
<script type="text/javascript" language="javascript" src="../assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src=" ../assets/jquery-ui-1.10.3/demos/DataTables/media/js/jquery.dataTables.js"></script>
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
       url: "../assets/ajax_data/test.php",
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
    nCloneTd.innerHTML = '<img src="../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">';
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
            this.src = "../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );      
      
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
        <?php
        echo $dyn_table3;
        ?>  
            
    </div>
    </div>
  </div>
  
</div>
