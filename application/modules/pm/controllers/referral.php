<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class referral extends MY_Controller {


		function __construct() {

			parent::__construct();


		}


	public function index()
	{
		
		$this->load->model('referral_m');


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
        $referral_data = $this->referral_m->referral_pm();
        
        	$data['referral_data'] = $referral_data;



		    $this->load->load_referral('referral_v',$data);




	}

	public function get_referral_json_()
		{
			$req = R::getAll("SELECT `section4`.`facility` AS MFL, `facilitys`.`name` AS FACILITY
								FROM `section4` , `facilitys`
								WHERE `section4`.`facility` = `facilitys`.`facilitycode`
								GROUP BY `section4`.`facility`");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				'<img src=../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png>',
				$value["MFL"],
				$value["FACILITY"],
				






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