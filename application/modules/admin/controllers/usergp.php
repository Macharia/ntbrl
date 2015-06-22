<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class usergp extends MY_Controller {


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
			
			$this->index_usergp();
			
			
			
		}

		public function index_usergp(){


			
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

        	$data['stats'] = $this->get_stats();


			$this->load->load_admin_usergp('admin/usergp_v',$data);	









		}


		public function get_stats(){


		$query_str="SELECT distinct a.groupName as a,count(b.category) as b FROM usergroup a,user b where a.usergroupID=b.category group by category";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}

		


		

}