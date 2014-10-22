<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allocation extends MY_Controller {
	
		 var $TT;
		var $TT1;
		var $county;
		var $previousmonth;
		var $currentyear;



		function __construct() {
		parent::__construct();
		$county = $this->input->post('id',TRUE);

		$this->previousmonth= @date("m")- 1 ;
		$this->currentyear= @date("Y");
		$this->TT=$this->TOTALFacilitypercounty($this->county);
		$this->TT1= $this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);
		
	}
		
		public function index(){
			
			$this->allocation_();

			
			
			
		}

		public function allocation_(){


			 $county = $this->input->post('id',TRUE);


			 $data['category'] = $this->session->userdata('category');
			 $data['user'] = $this->session->userdata('user');
       		 $data['name'] = $this->session->userdata('name');
        	
       		 $data['table'] = $this->get_allocation_json_();


       		 $data['TT1'] = $this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);

       		 $data['TT'] = $this->TOTALFacilitypercounty($this->county);
       		
       		 $data['currentmonth'] = $this->allocation_ca();
       		 $data['currentyear'] = $this->allocation_ca();
       		 $data['previousmonth'] = $this->allocation_ca();

       		 


			$this->load->load_allocation('allocation_v',$data);


		}



		public function get_allocation_json_()
		{


			
			$county = $this->input->post('id',TRUE);


			$query_str = "SELECT ID as a,name as b from countys";

			$result = $this->db->query($query_str)->result_array();

			// echo "<pre/>";
			// print_r($result);

			// die();



			$table='<table class="table table-striped">
			 <tr>
			 <td style="font-weight: bold;"> Counties</td>
				<td style="font-weight: bold;">Reported / Total(Facilities)</td>
			 </tr>';

			 foreach($result as $value)
			{
				

				$TT=$this->TOTALFacilitypercounty($value["a"]);
				$TT1=$this->TOTALFacilityReportedpercounty($value["a"],$this->previousmonth,$this->currentyear);


				 $table .= '<tr>
				 <td> <a href="countyallocation?id='.$value['a'].'">'.$value['b'].'</a></td>
				 <td style="text-align:center">'.$this->TT1.' / '.$this->TT.'</td>
				 </tr>';


				
			}
			$table.='</table>';

			return $table;
			




		}

		public function allocation_ca(){



			$query_str= "SELECT ID as a,name as b from countys";
			


			$result = $this->db->query($query_str)->result_array();
			
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;

			if ($currentmonth ==1)
			{
			$previousmonth=12;
			$currentyear=@date("Y")-1;
			}
			else
			{
			$previousmonth=@date("m")- 1;
			$currentyear=@date("Y");
			}

			return $currentmonth;
			return $currentyear;
			return $previousmonth;
}
	
			//total patients in county
			public function TOTALFacilitypercounty($county){
			//$countyID = $_POST['id'];
		//	$county = $this->input->post('id',TRUE);



			$query_str="SELECT 
			`facilitys`.`facilitycode` AS CODE,
			`facilitys`.`name` AS FACILITY, 
			`districts`.`name` AS DISTRICT,
			`countys`.`name` AS COUNTY
			FROM `facilitys` , `districts` ,`countys`
			WHERE 
			`districts`.`ID` = `facilitys`.`district`
			AND `countys`.`ID` = `districts`.`county`
			AND `countys`.`ID` = '$county'

			";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TT=count($result);
			return $this->TT;
					
			}



			public function TOTALFacilityReportedpercounty($county,$previousmonth,$currentyear){
			$query_str= "SELECT 
			`consumption`.`facility` AS a,
			`facilitys`.`name` AS b, 
			`districts`.`name` AS c,
			consumption.commodity AS d,
			consumption.quantity AS e,
			consumption.quantity_used AS f,
			consumption.end_bal AS g,
			consumption.q_req AS h,
			`countys`.`name` as county
			FROM `consumption` ,facilitys, `districts` ,`countys`
			WHERE 
			`consumption`.`facility`= `facilitys`.`facilitycode`
			AND  `districts`.`ID` = `facilitys`.`district`
			AND `countys`.`ID` = `districts`.`county`
			AND `countys`.`ID` = '$county'
			AND MONTH(consumption.date)='$previousmonth'
			AND YEAR(consumption.date)='$currentyear'
			Group by `consumption`.`facility`";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TT1=count($result);
			return $this->TT1;
			}


	}