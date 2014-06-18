<?php
include('../includes/functions.php');
echo $_SESSION['mfl'];

if (isset($_GET['fid'])){
		   echo $FacID = $_GET['fid'];
	}   

function gettestsdone1($FacID,$month,$year){
	
 $sql="SELECT COUNT(*) FROM sample1 where cond='1' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";	
$query=mysql_query($sql) or die(mysql_error());
$rs=mysql_fetch_row($query);
return $rs[0]	;
	
	}
function getmtbpos1($FacID,$month,$year){
$sql="SELECT 
sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance NOT DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance NOT DETECTED'OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE'  OR  Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR  Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED' THEN 1 ELSE 0 END ) AS mtbpos
FROM sample1
WHERE MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";

$query=mysql_query($sql) or die(mysql_error());
$rs=mysql_fetch_row($query);
return $rs[0]	;
 
	
	}

function getmtbneg1($FacID,$month,$year){
$sql="SELECT sum( CASE WHEN Test_Result = 'MTB NOT DETECTED' THEN 1 ELSE 0 END ) AS MTBNEG
FROM sample1
where MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";	
$query=mysql_query($sql) or die(mysql_error());
$rs=mysql_fetch_row($query);
return $rs[0]	;
	
	}
	
function getmtbrif1($FacID,$month,$year){
$sql="SELECT 
sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE' THEN 1 ELSE 0 END ) AS mtbrif
FROM sample1
 WHERE MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'  AND facility='$FacID'";	
$query=mysql_query($sql) or die(mysql_error());
$rs=mysql_fetch_row($query);
return $rs[0]	;
	
	}
?>

<chart  yAxisName="# of Tests" lineThickness="1" showValues="0" formatNumberScale="0" anchorRadius="2" showAlternateHGridColor="1" alternateHGridAlpha="5" alternateHGridColor="CC3300" shadowAlpha="40" bgcolor="#FFFFFF" showBorder="0">
<categories >
<?php  

		for ( $startmonth;  $startmonth<=$endmonth;  $startmonth++)
  		{  $monthname=GetMonthName($startmonth);
		
?>
<category label='<?php echo $monthname ;?>' />
<?php
}
?>
</categories>
<dataset seriesName='Test Done' color='A666EDD' >
<?php   

$startmonth =  1; 
 $endmonth =  12; 
		for ( $startmonth=1;$startmonth< 13;  $startmonth++)
  		{  
		
		$totaltests=gettestsdone1($FacID,$startmonth,2014);
		
		
?>

<set value='<?php echo $totaltests; ?>' />
<?php
}
?>
</dataset>

<dataset seriesName='MTB Positive Test' color='F1683C' >
<?php   

$startmonth =  1; 
 $endmonth =  12; 
		for ( $startmonth=1;$startmonth< 13;  $startmonth++)
  		{  
		
		$mtbpos=getmtbpos1($FacID,$startmonth,2014);
		
		
?>

<set value='<?php echo $mtbpos; ?>' />
<?php
}
?>
</dataset>
<dataset seriesName='MTB Negative Test' color='DBDC25' >
<?php   

$startmonth =  1; 
 $endmonth =  12; 
		for ( $startmonth=1;$startmonth< 13;  $startmonth++)
  		{  
		
		$mtbneg=getmtbneg1($FacID,$startmonth,2014);
		
		
?>

<set value='<?php echo $mtbneg; ?>' />
<?php
}
?>
</dataset>

<dataset seriesName='MTB Rif Res Test' color='2AD62A' >
<?php   

$startmonth =  1; 
 $endmonth =  12; 
		for ( $startmonth=1;$startmonth< 13;  $startmonth++)
  		{  
		
		$mtbrif=getmtbrif1($FacID,$startmonth,2014);
		
		
?>

<set value='<?php echo $mtbrif; ?>' />
<?php
}
?>
</dataset>


<styles>

<definition>
<style name="Anim1" type="animation" param="_xscale" start="0" duration="1"/>
<style name="Anim2" type="animation" param="_alpha" start="0" duration="0.6"/>
<style name="DataShadow" type="Shadow" alpha="40"/>
</definition>
-
<application>
<apply toObject="DIVLINES" styles="Anim1"/>
<apply toObject="HGRID" styles="Anim2"/>
<apply toObject="DATALABELS" styles="DataShadow,Anim2"/>
</application>
</styles>
</chart>