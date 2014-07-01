<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class facility extends MY_Controller {
	
		
		
		public function index(){
			
			$this->facility_();
			
			
			
		}

		public function facility_(){

			$this->load->model('facility_m');

			//$this->body_facility_();


			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$facility_data = $this->facility_m->facility_pm();
        	
        	

        	

        	//$data['query_str']=null;
        	//$data['dyn_table2']=null;
        	
        	$data['facility_data'] = $facility_data;







			$this->load->load_facility('facility_v',$data);








		}

		public function get_facility_json_()
		{
			$req = R::getAll("SELECT 
									`facilitys`.`facilitycode` AS CODE,
									`facilitys`.`name` AS FACILITY, 
									`districts`.`name` AS DISTRICT,
									`countys`.`name` AS COUNTY, 
									`provinces`.`name` AS PROVINCE 

								FROM `facilitys` , `districts` ,`countys`, `provinces`
								WHERE 
										`districts`.`ID` = `facilitys`.`district`
								AND `countys`.`ID` = `districts`.`county`
								AND `countys`.`province` = `provinces`.`ID`");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(


				$value["CODE"],
				$value["FACILITY"],
				$value["DISTRICT"],
				$value["COUNTY"],
				$value["PROVINCE"],
			






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
	


	}