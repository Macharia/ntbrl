<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class summ extends MY_Controller {

	var $FacID;
	var $countyID;
	var $cname;
	var $maxY;
	var $minY;
	
	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}


			$this->maxY=$this->get_max_year();
			$this->minY=$this->get_min_year();
			
	}

public function index(){
			
			$this->summ_lab();
			
			
			
		}

		public function summ_lab(){


			
			


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

		
        	$data['maxY'] = $this->get_max_year();
            $data['minY'] = $this->get_min_year();

			$this->load->load_lab_summ('labtech/summ_v',$data);	


		}


		public function get_max_year(){


			    $query_str = "SELECT max(year(End_Time)) AS maximumyear 
			                  FROM sample1";
			    $result = $this->db->query($query_str)->result_array();
			    if($result){
			    	$maximumyear = $result[0]['maximumyear'];
			    }else{
			    	$showyear=date('Y');
			    }
			   return $maximumyear;
}


		public function get_min_year(){
	

			    $query_str = "SELECT MIN(year(End_Time)) AS minimumyear FROM sample1 ";
			    $result = $this->db->query($query_str)->result_array();

			    if($result){
			    	$minimumyear = $result[0]['minimumyear'];
			    }else{
			    	$showyear=date('Y');
			    }
			   return $minimumyear;
}

		



}