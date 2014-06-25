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


	}