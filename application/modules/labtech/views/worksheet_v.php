<html>
<link rel="stylesheet" type="text/css"charset=" " href="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/neon/neon-x/assets/css/custom.css"  id="style-resource-6">
	<!--
	<script src="<?php echo base_url(); ?>assets/neon/neon-x/assets/js/jquery-1.10.2.min.js"></script>-->
<!-- <body onLoad="JavaScript:window.print();"> -->
<div align="center">
<h3> <center> GeneXpert Register </center></h3>
<table class="table table-condensed">

<thead><tr>
	<th style="text-align:center">Lab No.</th>
	<th style="text-align:center">Date Tested</th>
	<th style="text-align:center">Patient Name</th>
	<th style="text-align:center">Referred Facility</th>
	<th style="text-align:center">Lab No Barcode</th>
	<th style="text-align:center">Patient Name Barcode</th>
</tr></thead><tbody>
	<?php 
		
		
	foreach($gene as $row){
		
	 	$num=$row['a'];
	 	$pno="<span class='style7'>Lab NO : <strong>$num</strong>   </span>  <br>
	 	<img alt='$num' src='<?php echo base_url();?>assets/php_barcode/barcode.php?text=$num' />";
		
		$name=$row['c'];
	 	$pname ="<span class='style7'>Patient Name : <strong>$name</strong>   </span>  <br>
	 	<img alt='$name' src='<?php echo base_url();?>assets/php_barcode/barcode.php?text=$name' />";
 	 	//echo $image;
		//exit;

	    ?>
	<tr class"odd">
		<td style="text-align:center"><?php echo $row['a']; ?></td>
		<td style="text-align:center"><?php echo $row['b']; ?></td>
		<td style="text-align:center"><?php echo $row['c']; ?></td>
		<td style="text-align:center"><?php echo $row['d']; ?></td>
		<td style="text-align:center"><?php echo "<img alt='$num' src='".base_url()."assets/php_barcode/barcode.php?text=$num' />";?></td>
		<td style="text-align:center"><?php echo "<img alt='$name' src='".base_url()."assets/php_barcode/barcode.php?text=$name' />";?></td>
	
	</tr>
	<?php }
			?>


	
	</tbody>


</table>

</body>
</html>

