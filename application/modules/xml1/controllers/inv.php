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



		

		
		  
		 $query_str="SELECT DISTINCT s.facility as fcode, f.name as fname, DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate, (c.end_bal+c.allocated) AS cart
					FROM sample1 s
			        left join facilitys f on s.facility = f.facilitycode
					left join consumption c on s.facility = c.facility
					where s.facility IS NOT NULL
					GROUP BY s.facility ";
			  
			  $result = $this->db->query($query_str)->result_array();
			   
			$chart =$title= $data=null;

			$chart.='<chart xAxisName="Facilities" yAxisName="No of Days Remaining(Expiration)"  bgColor="F1F1F1" showValues="0" canvasBorderThickness="1" canvasBorderColor="999999" plotFillAngle="330" plotBorderColor="999999" showAlternateVGridColor="1" divLineAlpha="0" bgcolor="#FFFFFF" showBorder="0">';	


			   foreach ($result as $value) {
			    
			   
				$fid=$value['fcode'];
			   	$fname=trim($value['fname']);
			  	$dd=$value['DiffDate'];
				$cart= (int) $value['cart'];


				if ($dd<0) {

			 	$dd=0;

		//$chart.='<category label= "'.$this->monthname.'" />';
		
		$data.="<set label='".$fname."' value='".$dd."'
    			toolText='Facility Name:".$fname.";  
           			   Facility Code:".$fid.";  
			           No Inventory Recorded'/>";
			       }
			else{       

		$data.="<set label='".$fname."' value='".$dd."'
            toolText='Facility Name:".$fname." 
           			   Facility Code:".$fid."&lt;BR&gt; 
			           Remaining days(Expiration):".$dd." Days 
			           Remaining Cartridges:".$cart."Cartridges'/>";
				}
				
			}


		$chart .= $data;	
		







		

		
		$chart.='</chart>';
		

		
		
		echo $chart;							    

									    } 






		

			




	}