<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class index extends MY_Controller {


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
			
			$this->index_admin();
			
			
			
		}

		public function index_admin(){


			
			// $this->load->library('session');

			// if($this->session->userdata('mfl')) {

			//   $FacID = $this->session->userdata('mfl');
				
			// }


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

        	$data['info'] = $this->get_info($currentmonth,$currentyear,$todaydate);
        	$data['stats'] = $this->get_stats();
        	$data['logs'] = $this->get_logs();
        	


			$this->load->load_admin_index('admin/index_v',$data);	









		}




		public function get_info($currentmonth,$currentyear,$todaydate){


		$query_str="SELECT 
						(
						   SELECT count(*) FROM facilitys
						)AS facilities, 
						(
						SELECT COUNT(*) FROM activitylog where activity='login' AND MONTH(tym)='$currentmonth' AND YEAR(tym)='$currentyear' AND DAY(tym)='$todaydate'
						)AS log,
						(
						SELECT count(*)  FROM user
						)AS users";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}


		public function get_stats(){


		$query_str="SELECT distinct a.groupName as a,count(b.category) as b FROM usergroup a,user b where a.usergroupID=b.category group by category";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}

		public function get_logs(){


		$query_str="SELECT a.uname as b,a.activity as c,b.groupName as d, a.tym as e FROM activitylog a, usergroup b WHERE a.ugroup=b.usergroupID GROUP BY a.ID DESC";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}


}