<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class countyfmap extends MY_Controller {
	
		
		
		public function index(){
			
			$this->countymap_();
			
			
			
		}

		public function countymap_(){


			$this->load->model('countyfmap_m');


			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$countyfmap_data = $this->countyfmap_m->countyfmap_pm();
        
        	$data['countyfmap_data'] = $countyfmap_data;



			$this->load->load_countyfmap('countyfmap_v',$data);	









		}


		public function get_countyfmap_json_()
		{


			$req = R::getAll("SELECT `countys`.`ID` AS ID,
									 `countys`.`name` AS name 
			 				FROM `countys`
			  				ORDER BY `countys`.`ID` ASC");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value)
			# code...
			{
				$id = $value['ID'];
				$name = $value['name'];
				$link = '<a href="'.base_url().'pm/countyview?id='.$id.'">';


				
				$data[] = array(


				'<img src="../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">',
				$value["ID"],
				$value["name"]." "."County",
				$link.'<img src="../assets/images/icons/view.png" height="20" alt="View Details" title="View Details"/>'

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