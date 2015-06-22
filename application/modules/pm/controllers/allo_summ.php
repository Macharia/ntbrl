<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allo_summ extends MY_Controller {


	 // var $TT;
		// var $TT1;
		 var $county;
		 var $maximumyear;
		 var $minimumyear;
		 var $TT;
		 var $TTA;
		


		function __construct() {
		parent::__construct();
		
		$this->maximumyear=$this->GetMaxYear();
		$this->minimumyear= $this->GetMinYear();
		$this->TT=$this->TOTALFacilitypercounty($this->county);
		$this->TTA= $this->TOTALFacilityAllocatedpercounty($this->county);
		
}
		
		
		public function index(){
			
			$this->allo_summ_();
			
			
			
		}

		public function allo_summ_()
		{


			$this->load->model('allo_summ_m');

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	

        	$allo_summ_data = $this->allo_summ_m->allo_summ_pm();
        
        	$data['allo_summ_data'] = $allo_summ_data;
        	$data['maximumyear'] = $this->GetMaxYear();
        	$data['minimumyear'] = $this->GetMinYear();
        	$data['row_RsCounty'] = $this->get_allo_report_json_();




			$this->load->load_allo_summ('allo_summ_v',$data);



		}


		public function get_allo_summ_json_()
		{
			$req = R::getAll("SELECT countys.ID as a,
				countys.name as b,
				consumption.date as c, 
				sum(consumption.allocated) as d
 						FROM `consumption` ,facilitys, `districts` ,`countys`
						WHERE 
							`consumption`.`facility`= `facilitys`.`facilitycode`
						AND  `districts`.`ID` = `facilitys`.`district`
						AND consumption.status=1
						AND `countys`.`ID` = `districts`.`county`
						Group by  countys.ID");

			$data = array();
			$recordsTotal = 0;


			foreach ($req as $key => $value) {
				# code...
				$total_facilities=$this->TOTALFacilitypercounty($value["a"]);
				$allocated_facilities=$this->TOTALFacilityAllocatedpercounty($value["a"]);


			$data[] = array(

				'<img src="../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">',
				$value["a"],
				$value["b"],
				$value["c"],
				$allocated_facilities."/".$total_facilities,
				$value["d"],
				
				






			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data
			);

			echo json_encode($json_req);






		}

		public function get_allo_report_json_()
		{
			$req = R::getAll("SELECT countys.ID as a,
				countys.name as b,
				consumption.date as c, 
				sum(consumption.allocated) as d
 						FROM `consumption` ,facilitys, `districts` ,`countys`
						WHERE 
							`consumption`.`facility`= `facilitys`.`facilitycode`
						AND  `districts`.`ID` = `facilitys`.`district`
						AND consumption.status=1
						AND `countys`.`ID` = `districts`.`county`
						Group by  countys.ID");

			

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				//'<option value="0">All Counties</option>',
				$value["a"],
				$value["b"],
				

			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data
			);

			echo json_encode($json_req);






		}


		public function get_ajax_all_json_()
		{
			$countyID = $this->input->post('d',TRUE);

			 $req = R::getAll("SELECT 
							`consumption`.`ID` AS id,
							`consumption`.`facility` AS a,
							`facilitys`.`name` AS b, 
							`districts`.`name` AS c,
							consumption.commodity AS d,
							consumption.quantity AS e,
							consumption.quantity_used AS f,
							consumption.end_bal AS g,
							consumption.q_req AS h,
							consumption.status AS st
							FROM `consumption` ,facilitys, `districts` ,`countys`
							WHERE 
							`consumption`.`facility`= `facilitys`.`facilitycode`
							AND  `districts`.`ID` = `facilitys`.`district`
							AND `countys`.`ID` = `districts`.`county`
							AND `countys`.`ID` = '$countyID'
							group by `consumption`.`facility`");
							

			 $data = array();
			$recordsTotal = 0;


			$data[]=array(0,'All Facilities');




			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["a"],
				$value["b"],
				

			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data
			);

			echo json_encode($json_req);



				


	}



		public function GetMaxYear(){


			    $query_str = "SELECT max(year(End_Time)) AS maximumyear 
			                  FROM sample1";
			    $result = $this->db->query($query_str)->result_array();
			    if($result){
			    	$maximumyear = $result[0]['maximumyear'];
			    }else{
			    	$showyear=date('Y');
			    }
			   return $maximumyear;
}


		public function GetMinYear()
{
	

			    $query_str = "SELECT MIN(year(End_Time)) AS minimumyear FROM sample1 ";
			    $result = $this->db->query($query_str)->result_array();

			    if($result){
			    	$minimumyear = $result[0]['minimumyear'];
			    }else{
			    	$showyear=date('Y');
			    }
			   return $minimumyear;
}

	public function TOTALFacilitypercounty($county){
			//$countyID = $_POST['id'];

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



			public function TOTALFacilityAllocatedpercounty($county){
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
							AND consumption.status=1
							AND `countys`.`ID` = '$county'";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TTA=count($result);
			return $this->TTA;
			}



	}