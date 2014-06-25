<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class referral extends MY_Controller {



	public function index()
	{
		
		$this->load->model('referral_m');


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
        $referral_data = $this->referral_m->referral_pm();
        
        	$data['referral_data'] = $referral_data;



		    $this->load->load_referral('referral_v');




	}


	








}