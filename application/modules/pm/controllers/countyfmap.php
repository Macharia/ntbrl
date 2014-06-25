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


	}