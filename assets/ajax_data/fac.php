<?php

@require_once('../connection/db.php'); 
$conn = mysql_connect($hostname, $username, $password);

 
 
    if (isset($_POST['id'])){
		$CountyID = $_POST['id'];
	    $sql4="SELECT mfl,fname,total,mtb,neg,rif

FROM(
SELECT 
facilitys.facilitycode AS mfl,
facilitys.name as fname,

sum(CASE WHEN cond='1' THEN 1 ELSE 0 END) as total,

sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance NOT DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance NOT DETECTED'OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE'  OR  Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR  Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED' THEN 1 ELSE 0 END ) AS mtb,

sum(CASE WHEN Test_Result = 'MTB NOT DETECTED'  THEN 1 ELSE 0 END) as neg,

sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE' THEN 1 ELSE 0 END ) AS rif  

FROM sample 
LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`

WHERE `countys`.`ID` ='$CountyID'
GROUP BY fname
)x";
	//echo $sql4;
  
    $result=mysql_query($sql4,$conn) or die(mysql_error());
	//$data_array=mysql_fetch_assoc( $result);
	
	if( mysql_num_rows($result)==0){
			
			 $table .= '<table class="table table-striped"><tr><td colspan="6" style="text-align:center">There are no tests done in this County</td></tr></table>';
			} 
    else{
       	$table.='<table class="table table-striped"><tr><th  style="text-align:center">MFL Code</th><th  style="text-align:center">Facility Name</th><th  style="text-align:center">Total Tests</th><th  style="text-align:center">MTB Positive</th><th style="text-align:center">MTB Negative</th><th  style="text-align:center">RIF Resistant</th></tr>';

	   while ($data_array=mysql_fetch_array($result))
       {
       
        $table .= '<tr><td style="text-align:center">'.$data_array['mfl'].'</td><td style="text-align:center">'.$data_array['fname'].'</td><td style="text-align:center">'.$data_array['total'].'</td><td style="text-align:center">'.$data_array['mtb'].'</td><td style="text-align:center">'.$data_array['neg'].'</td><td style="text-align:center">'.$data_array['rif'].'</td></tr>';
	
      } 
    }
  
  $table .= '</table>';
      
        echo $table;
   
           
     }
?>
