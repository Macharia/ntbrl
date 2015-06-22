<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class contact extends MY_Controller {


	var $FacID;
	var $currentyear;
	var $currentmonth;


	function __construct() {
		parent::__construct();

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}


	}

public function index(){
			
			$this->index_contact();
			
			
			
		}

		public function index_contact(){


			
			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');
				
			}


			// if (isset($_SESSION['mfl'])){

			//   $FacID = $_SESSION['mfl'];
			  
			// } 

			$todaydate=@date("d-M-Y");
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;
			//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
			$todaysdate=@strtotime(@date("Y-m-d"));
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

        	


			$this->load->load_pm_contact('pm/contact_v',$data);	









		}


		public function get_contact()
		{
			$req = R::getAll("SELECT distinct mfl as fcode,facilitys.name AS fname, districts.name AS di, countys.name AS co
										FROM `user` , `facilitys` , `districts`,countys
										WHERE `user`.`mfl` = `facilitys`.`facilitycode`
										AND `districts`.`ID` = `facilitys`.`district`
										AND `districts`.`county` = `countys`.`ID`
										And user.category='3' and mfl>2");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				'<img src=../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png>',
				$value["fcode"],
				$value["fname"],
				$value["di"],
				$value["co"]
				






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