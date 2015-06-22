<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class day extends MY_Controller {

	   

	function __construct() {
		
		parent::__construct();

	
	//$this->monthname = $this->GetMonthName($this->month);	
	
}
		public function index(){
			
			$this->days_();
			
			
		public function days_(){

		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
    	$data['name'] = $this->session->userdata('name');
	

    	$data['monthname'] = $this->GetMonthName($this->month);



		}	
		}

		public function get_days_chart(){


			$query_str="SELECT DISTINCT s.facility as fcode, f.name as fname, DATEDIFF(  NOW(), max( s.End_Time )) AS DiffDate
		FROM sample1 s
        left join facilitys f on s.facility = f.facilitycode
        WHERE f.name IS NOT NULL
		GROUP BY f.name
		ORDER BY `DiffDate` DESC";
		    $result = $this->db->query($query_str)->result_array();

		    $chart =$title= $data=null;

		   
	



		$chart.='<chart xAxisName="Facilities" yAxisName="No of Days Since Last Upload"  bgColor="F1F1F1" showValues="1" canvasBorderThickness="1" canvasBorderColor="999999" plotFillAngle="330" plotBorderColor="999999" showAlternateVGridColor="1" divLineAlpha="0" bgcolor="#FFFFFF" showBorder="0">';

		 
		  
		   
		    
		   foreach ($result as $value) {
		   	
		 
		  {
			$fid=$value['fcode'];
		   	$fname= htmlspecialchars($value['fname'], ENT_QUOTES, 'UTF-8');
		  	$dd=$value['DiffDate'];
					
		    		if($dd>7){
		    				$color='FF0000';
		    			}
					else
						{
							$color='8BBA00';
						}
		    		  
				$data.="<set color='<?php echo $color ?>' label='<?php echo $fname ?>' value='<?php echo $dd ?>'
		            toolText='<?php echo "Facility Name: " .$fname; ?>
		           			  <?php echo "\nFacility Code: " .$fid; ?>
					          <?php echo "\nDays Since Last Upload: " .$dd." Days"; ?>'/>"; 

				
			}
		   
		$chart .=$data;
			

		$data .='</chart>';

		echo $chart;









		} 






		

			




	}