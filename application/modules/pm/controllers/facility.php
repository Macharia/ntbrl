<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class facility extends MY_Controller {
	
		
		
		public function index(){
			
			$this->facility_();
			
			
			
		}

		public function facility_(){

			$this->load->model('facility_m');


			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$facility_data = $this->facility_m->facility_pm();
        
        	$data['facility_data'] = $facility_data;







			$this->load->load_facility('facility_v');









		}


	}