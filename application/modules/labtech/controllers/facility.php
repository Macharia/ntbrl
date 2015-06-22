<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class facility extends MY_Controller {

	var $FacID;
	var $countyID;
	var $cname;
	
	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			$this->countyID = $this->get_countyid_lab();
			$this->cname = $this->get_countyid_lab();	

	}

public function index(){
			
			$this->facility_lab();
			
			
			
		}

		public function facility_lab(){


			
			


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

        	$data['countyID'] = $this->get_countyid_lab();   
        	$data['cname'] = $this->get_countyid_lab();
			



			$this->load->load_lab_facility('labtech/facility_v',$data);	









		}





		public function get_countyid_lab(){

			$facilitycode = $this->FacID;

			$query_str = "SELECT  countys.ID AS cid,countys.name AS cN 
							FROM countys,facilitys ,districts
							WHERE 
							`facilitys`.`facilitycode`='$facilitycode'
							AND `districts`.`ID` = `facilitys`.`district`
							AND `countys`.`ID` = `districts`.`county` ";

			$result = $this->db->query($query_str)->result_array();
			if($result){

				$this->countyID=$result[0]['cid'];
				$this->cname=$result[0]['cN'];
			}
			else{
				$this->countyID=0;
				$this->cname=0;
			}
			return $this->countyID; 
			return $this->cname;
			
		}	
		

		public function get_mapfacility_json(){

			
				$cid = $this->countyID;

			$req = R::getAll("SELECT 

									`facilitys`.`facilitycode` AS CODE,
									`facilitys`.`name` AS FACILITY, 
									`districts`.`name` AS DISTRICT,
									`countys`.`name` AS COUNTY

								FROM `facilitys` , `districts` ,`countys`
								WHERE 
								`districts`.`ID` = `facilitys`.`district`
								AND `countys`.`ID` = `districts`.`county`
								AND `countys`.`ID` = '$cid'");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(


				$value["CODE"],
				$value["FACILITY"],
				$value["DISTRICT"],
				$value["COUNTY"],
			






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