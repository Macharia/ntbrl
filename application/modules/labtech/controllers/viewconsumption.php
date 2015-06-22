<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class viewconsumption extends MY_Controller {

	var $FacID;
	var $countyID;
	var $cname;
	
	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			
	}

public function index(){
			
			$this->viewconsumption_lab();
			
			
			
		}

		public function viewconsumption_lab(){


			
			


			// if (isset($_SESSION['mfl'])){

			//   $FacID = $_SESSION['mfl'];
			  
			// } 

			$dt=@date("d-M-Y");
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;
			//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
			$todaysdate=@strtotime(@date("Y-m-d"));
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$data['notup'] = $this->get_notup_fac($this->FacID);
	        $data['complete'] = $this->get_complete_fac($this->FacID);
	        $data['errors'] = $this->get_errors_fac($this->FacID);

			



			$this->load->load_lab_viewconsumption('labtech/viewconsumption_v',$data);	


		}


		

		public function get_consumptionreport_json(){

			
				$fid = $this->FacID;

			$req = R::getAll("SELECT 
								consumption.b_bal AS a,
								consumption.quantity AS b,
								consumption.quantity_used AS c,
								consumption.losses as d,
								consumption.pos as e,
								consumption.neg as f,
								consumption.end_bal AS g,
								consumption.q_req AS h,
								consumption.allocated AS i,
								consumption.date AS j

							FROM `consumption`
							WHERE 
							`consumption`.`facility`= $fid");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(


				$value["a"],
				$value["b"],
				$value["c"],
				$value["d"],
				$value["e"],
				$value["f"],
				$value["g"],
				$value["h"],
				$value["i"],
				$value["j"],
			






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