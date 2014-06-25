<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allo_summ extends MY_Controller {
	
		
		
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



			$this->load->load_allo_summ('allo_summ_v',$data);



		}


	}