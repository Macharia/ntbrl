<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allocation extends MY_Controller {
	
		
		
		public function index(){
			
			$this->allocation_();
			
			
			
		}

		public function allocation_(){


			$this->load->model('allocation_m');

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
       		 $data['name'] = $this->session->userdata('name');
        	$allocation_data = $this->allocation_m->allocation_pm();
        
        	$data['allocation_data'] = $allocation_data;






			$this->load->load_allocation('allocation_v');









		}



		public function get_allocation_json_()
		{
			$req = R::getAll("SELECT ID as a,name as b from countys");

			$data = array();
			$recordsTotal = 0;

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





	}