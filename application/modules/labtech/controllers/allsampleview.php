<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allsampleview extends MY_Controller {


	
	var $currentyear;
	var $currentmonth;


	function __construct() {
		parent::__construct();

		// $this->load->library('session');

		// 	if($this->session->userdata('mfl')) {

		// 	  $this->FacID = $this->session->userdata('mfl');
				
		// 	}


	}

public function index(){
			
			$this->index_allsample_view();
			
			
			
		}

		public function index_allsample_view(){


			
			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');
				
			}


			if (isset($_GET['id'])){
					$sampleID = $_GET['id'];
					}

			$dt=@date("d-M-Y");
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;
			//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
			$todaysdate=@strtotime(@date("Y-m-d"));
					
			
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

        	$data['all'] = $this->get_sample_view();
        	 $data['complete'] = $this->get_complete_fac($FacID);
        	 $data['notup'] = $this->get_notup_fac($FacID);
        	 $data['errors'] = $this->get_errors_fac($FacID);
        	 $data['todayswork'] = $this->get_todayswork_fac($dt,$FacID);




			$this->load->load_lab_allsampleview('labtech/allsampleview_v',$data);	









		}


		public function get_sample_view(){

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');
				
			}	


		$query_str="SELECT s.Status,s.Start_Time,s.End_Time,s.Assay,s.Assay_Version,s.Assay_Type,s.Reagent_Lot_Number,s.Reagent_Lot_ID,s.Expiration_Date,s.Cartridge_SN,s.Module_Name,s.Module_SN,s.Instrument_SN,s.SW_Version,s.Exported_Date,s.User, s.Test_Result, s.Sample_ID AS sid,s.Patient_ID AS pid, s.ID as ID,s.lab_no as ln, s.fullname as a, s.age as b, f.name as c, s.End_Time as d, s.Test_Result as e,  s.mtbRif as f,s.age,s.gender,s.address,s.mobile,s.coldate,s.h_status,s.pat_type, s.smear, s.c_name,s.c_email,s.c_no,d_email FROM sample1 s , facilitys f WHERE s.Refacility=f.facilitycode AND s.Test_Result!='ERROR' and s.cond=1 and s.facility='$FacID' ORDER BY s.tym desc";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}

		public function get_complete_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=1 and Test_Result!='ERROR' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$complete = count($result);
			
			return $complete; 
			
		}	

			public function get_notup_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=0 and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$notup = count($result);	
			
			return $notup; 
			
		}	

			public function get_errors_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE Test_Result='ERROR' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$errors = count($result);
			
			return $errors; 
			
		}	

			public function get_todayswork_fac($dt,$FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=1 and coldate='$dt' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$todayswork = count($result); 
			
			return $todayswork; 
			
		}	


		


		

}