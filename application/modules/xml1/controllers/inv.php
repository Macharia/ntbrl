<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class inv extends MY_Controller {

	   

	function __construct() {
		
		parent::__construct();

	
	//$this->monthname = $this->GetMonthName($this->month);	
	
}
		public function index(){
			
			$this->inv_();
			
			
			
		}

		public function inv_(){

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');


			
        	$data['rs'] = $get_Inv($facility);
        	
        	$data['monthname'] = $this->GetMonthName($this->month);

		}

		public function get_Inv($facility){
	
			$query_str="SELECT DISTINCT s.facility, DATEDIFF( max( s.Expiration_Date ) , NOW( ) ) AS DiffDate, f.name
			FROM sample1 s, facilitys f
			WHERE s.facility = f.facilitycode
			GROUP BY s.facility";	

			$result = $this->db->query($query_str)->result_array();
			$rs=$result;
			return $rs[0]['DiffDate'];
	
	}
		

		public function get_inv_chart_(){

		$currentmonth=@date("m");
		$currentyear=@date("Y");
		$previousmonth=@date("m")- 1;

		if ($currentmonth ==1)
		{
		$previousmonth=12;

		}
		else
		{
		$previousmonth=@date("m")- 1;
		$currentyear=@date("Y");
		} 	

		

		
		  
		 $query_str="SELECT DISTINCT c.facility as fcode, f.name as fname, DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate,(c.end_bal+c.received) AS cart
				        FROM consumption c
				        left join facilitys f on c.facility = f.facilitycode
						left join sample1 s on s.facility = c.facility
						where s.Expiration_Date IS NOT NULL
						and c.facility>1
						and c.commodity='Cartridge'
				        and Year(c.date) = '2015'
						and month(c.date) = '$previousmonth'
						GROUP BY c.facility ";
							  
			  $result = $this->db->query($query_str)->result_array();
			   
			$chart =$title= $data=null;

			$chart.='<chart xAxisName="Facilities" yAxisName="No of Days Remaining(Expiration)"  bgColor="F1F1F1" showValues="0" canvasBorderThickness="1" canvasBorderColor="999999" plotFillAngle="330" plotBorderColor="999999" showAlternateVGridColor="1" divLineAlpha="0" bgcolor="#FFFFFF" showBorder="0">';	


			   foreach ($result as $value) {
			    
			   
				$fid=$value['fcode'];
   	$fname= htmlspecialchars($value['fname'], ENT_QUOTES, 'UTF-8');
  	$dd= (int) $value['DiffDate'];
	$cart= (int) $value['cart'];
	
	$q = "SELECT (c.end_bal+c.allocated) AS tubes FROM consumption c WHERE  c.facility='$fid' and c.commodity='Falcon Tubes'  ORDER BY c.date DESC LIMIT 1";
	$r = $this->db->query($q)->result_array();
	$tubes= $r['tubes'];
	
	$query_rssample = "SELECT * FROM sample1 WHERE MONTH(End_Time)='$currentmonth' and  YEAR(End_Time)='$currentyear' and cond=1 and facility='$fid'";
	$row_rssample = $this->db->query($query_rssample)->result_array();
	$testdonethismonth = $row_rssample;
	
		
	$remainingcarts= $cart - $testdonethismonth;
	$remainingtubes= $tubes - $testdonethismonth;
	
	if ($remainingcarts<0) {
		$remainingcarts=0;
	}
	if ($remainingtubes<0) {
		$remainingtubes=0;
	}
	
	if ($dd=='NULL' or '') {
		$dd=0;
	}
	 if ($dd<0) 
	 	$dd = 0;
		 
		 $data.="<set label='<?php echo $fname ?>' value='<?php echo $dd ?>'
            toolText='<?php echo "Facility Name: " .$fname; ?>
           			  <?php echo "\nFacility Code: " .$fid; ?>
			          <?php echo "\nNo Inventory Recorded" ;?>'/>" 
		 
		
    	    else 
    	        {
    			if($dd<60 && $remainingcarts>150){
    				$color='FF0000';
    			}
				elseif($dd>90 and $remainingcarts<50)
				{
					$color='FFFF00';
				}
				elseif($remainingtubes<50)
				{
					$color='FFFF00';
				}
				elseif($dd<60 && $remainingcarts<50)
				{
					$color='FFFF00';
				}
				else
				{
					$color='8BBA00';
				}
    		 
		$data.="<set color='<?php echo $color ?>' label='<?php echo $fname ?>' value='<?php echo $dd ?>'
            toolText='<?php echo "Facility Name: " .$fname; ?>
           			  <?php echo "\nFacility Code: " .$fid; ?>
			          <?php echo "\nRemaining days(Expiration): " .$dd." Days"; ?>
			          <?php echo "\nRemaining Cartridges: " .$remainingcarts." Cartridges"; ?>
			          <?php echo "\nRemaining Falcon Tubes: " .$remainingtubes." Falcon Tubes"; ?>'/>" 

		
				
			}


		$chart .= $data;	
		







		

		
		$chart.='</chart>';
		

		
		
		echo $chart;							    

									    } 






		

			




	}