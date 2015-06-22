<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sampleview extends MY_Controller {

	var $FacID;
	
	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}


	}

public function index(){
			
			$this->sampleview_lab();
			

			
			
		}

		public function sampleview_lab(){


			
			


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

        	



			$this->load->load_lab_sampleview('labtech/sampleview_v',$data);	









		}
		

		public function get_gxdetails_json(){

			


			$req = R::getAll("SELECT `sample1`.`lab_no` AS lab_no,
									`sample1`.`fullname` AS fullname,
									`sample1`.`age` AS age,
									`sample1`.`gender` AS gender,
									`sample1`.`pat_type` AS pat_type,
									`sample1`.`smear` AS smear,
									`sample1`.`coldate` AS coldate 

				FROM sample1 

				WHERE `cond` = 0 

				AND `sample1`.`facility`='$this->FacID'");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(


				$value["lab_no"],
				$value["fullname"],
				$value["age"],
				$value["gender"],
				$value["pat_type"],
				$value["smear"],
				$value["coldate"],
			






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