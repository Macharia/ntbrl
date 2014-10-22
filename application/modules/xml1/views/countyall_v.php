<map showBevel='0' showMarkerLabels='1' fillColor='F1f1f1' borderColor='000000' hoverColor='efeaef' canvasBorderColor='FFFFFF' baseFont='Verdana' baseFontSize='10' markerBorderColor='000000' markerBgColor='FF5904' markerRadius='6' legendPosition='bottom' useHoverColor='1' showMarkerToolTip='1'  showExportDataMenuItem='1' >

	<data>
 






<entity link='countyallocation.php?id=<?php echo $countyid;?>' id='<?php echo $countyid;?>' displayValue ='<?php  $countyname ?>'
        
		toolText='<?php echo $countyname . " County";?>
		&lt;BR&gt;<?php echo "Total No of Facilities: " .$TT1; ?>
		&lt;BR&gt;<?php echo "Reported facilities: " .$TT; ; ?>
		&lt;BR&gt;<?php echo "GeneXpert Sites: " .$siteC ; ?>' 
		
		color='<?php  echo array_rand($colors,1); ?>'  />



	</data>
	
	
 
	
		<styles> 
  <definition>
   <style name='TTipFont' type='font' isHTML='1'  color='FFFFFF' bgColor='666666' size='11'/>
   <style name='HTMLFont' type='font' color='333333' borderColor='CCCCCC' bgColor='FFFFFF'/>
   <style name='myShadow' type='Shadow' distance='1'/>
  </definition>
  <application>
   <apply toObject='MARKERS' styles='myShadow' /> 
   <apply toObject='MARKERLABELS' styles='HTMLFont,myShadow' />
   <apply toObject='TOOLTIP' styles='TTipFont' />
  </application>
 </styles>
</map>