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

	<script src="../assets/neon//neon-x/assets/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="../assets/FusionMaps/JSClass/FusionMaps.js"></script>
       

<div class="main-content" style="margin-top: 6%;margin-left: .3%">
	 
<div class="row">


<link rel="stylesheet" href="../assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="../assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">

	<script src="../assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>

	</head>
<body>
<!--include ca.php-->
	<div class="col-sm-3">

		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Genexpert County Allocation
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
		
			<div class="panel-body no-padding">
				<table class="table table-striped">
							<thead>
							<tr >
								<td style="font-weight: bold;"> Counties</td>
								<td style="font-weight: bold;">Reported / Total(Facilities)</td>
							</tr>
						</thead>
				         <tbody>
					
						       
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=31">Baringo</a></td>
			                <td style="text-align: center"> 0 / 203</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=37">Bomet</a></td>
			                <td style="text-align: center"> 0 / 127</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=40">Bungoma</a></td>
			                <td style="text-align: center"> 0 / 156</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=41">Busia</a></td>
			                <td style="text-align: center"> 0 / 87</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=29">Elgeyo Marakwet</a></td>
			                <td style="text-align: center"> 0 / 124</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=15">Embu</a></td>
			                <td style="text-align: center"> 0 / 157</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=8">Garissa</a></td>
			                <td style="text-align: center"> 0 / 146</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=44">Homa Bay</a></td>
			                <td style="text-align: center"> 0 / 207</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=12">Isiolo</a></td>
			                <td style="text-align: center"> 0 / 47</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=35">Kajiado</a></td>
			                <td style="text-align: center"> 0 / 289</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=38">Kakamega</a></td>
			                <td style="text-align: center"> 0 / 248</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=36">Kericho</a></td>
			                <td style="text-align: center"> 0 / 194</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=23">Kiambu</a></td>
			                <td style="text-align: center"> 0 / 474</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=4">Kilifi</a></td>
			                <td style="text-align: center"> 0 / 241</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=21">Kirinyaga</a></td>
			                <td style="text-align: center"> 0 / 236</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=46">Kisii</a></td>
			                <td style="text-align: center"> 0 / 135</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=43">Kisumu</a></td>
			                <td style="text-align: center"> 0 / 170</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=16">Kitui</a></td>
			                <td style="text-align: center"> 0 / 342</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=3">Kwale</a></td>
			                <td style="text-align: center"> 0 / 99</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=32">Laikipia</a></td>
			                <td style="text-align: center"> 0 / 95</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=6">Lamu</a></td>
			                <td style="text-align: center"> 0 / 45</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=17">Machakos</a></td>
			                <td style="text-align: center"> 0 / 329</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=18">Makueni</a></td>
			                <td style="text-align: center"> 0 / 210</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=10">Mandera</a></td>
			                <td style="text-align: center"> 0 / 84</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=11">Marsabit</a></td>
			                <td style="text-align: center"> 0 / 110</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=13">Meru</a></td>
			                <td style="text-align: center"> 0 / 481</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=45">Migori</a></td>
			                <td style="text-align: center"> 0 / 192</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=2">Mombasa</a></td>
			                <td style="text-align: center"> 0 / 305</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=22">Muranga</a></td>
			                <td style="text-align: center"> 0 / 234</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=1">Nairobi</a></td>
			                <td style="text-align: center"> 0 / 857</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=33">Nakuru</a></td>
			                <td style="text-align: center"> 0 / 372</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=30">Nandi</a></td>
			                <td style="text-align: center"> 0 / 200</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=34">Narok</a></td>
			                <td style="text-align: center"> 0 / 157</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=47">Nyamira</a></td>
			                <td style="text-align: center"> 0 / 141</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=19">Nyandarua</a></td>
			                <td style="text-align: center"> 0 / 150</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=20">Nyeri</a></td>
			                <td style="text-align: center"> 0 / 440</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=26">Samburu</a></td>
			                <td style="text-align: center"> 0 / 78</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=42">Siaya</a></td>
			                <td style="text-align: center"> 0 / 170</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=7">Taita Taveta</a></td>
			                <td style="text-align: center"> 0 / 91</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=5">Tana River</a></td>
			                <td style="text-align: center"> 0 / 65</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=14">Tharaka Nithi</a></td>
			                <td style="text-align: center"> 0 / 120</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=27">Trans Nzoia</a></td>
			                <td style="text-align: center"> 0 / 146</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=24">Turkana</a></td>
			                <td style="text-align: center"> 0 / 147</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=28">Uasin Gishu</a></td>
			                <td style="text-align: center"> 0 / 183</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=39">Vihiga</a></td>
			                <td style="text-align: center"> 0 / 88</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=9">Wajir</a></td>
			                <td style="text-align: center"> 0 / 131</td>
			            </tr>
					            
			            <tr class="odd gradeX">
			            	<td> <a href="countyallocation.php?id=25">West Pokot</a></td>
			                <td style="text-align: center"> 0 / 99</td>
			            </tr>
					       
					   
					    </tbody>
						</table>
			</div>
		</div>

	</div>

			

<script src="../assets/neon/neon-x/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="../assets/neon/neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="../assets/neon/neon-x/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="../assets/neon/neon-x/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="../assets/neon/neon-x/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-chat.js" id="script-resource-7"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-custom.js" id="script-resource-8"></script>
	<script src="../assets/neon/neon-x/assets/js/neon-demo.js" id="script-resource-9"></script>
	<script type="text/javascript">
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>
	
</body>
</html>

	<div class="col-sm-9">
		
		<div class="panel panel-gradient">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>
						Genexpert County Allocation
					</h4>
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                 <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<div class="panel-body no-padding">
				
				    <div id="mapdiv" align="center"> 
					    <script type="text/javascript">
						   var map = new FusionMaps("../assets/FusionMaps/FCMap_KenyaCounty.swf", "mapdiv", "650", "600", "0", "0");
						   map.setDataURL("../assets/xml1/countyall.php");		   
						   map.render("mapdiv");
						</script>
					 </div>
		</div>
		</div>
	</div>
	
</div>
