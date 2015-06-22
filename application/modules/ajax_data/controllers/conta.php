<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class conta extends MY_Controller {


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

        	











		}


		public function get_contact()
		{

			 if (isset($_POST['id'])){
				$facID = $_POST['id'];
					}

			$query_str="SELECT name as name,email as email,mobile as mobile FROM user WHERE mfl ='$facID' and category='3'";

			$result = $this->db->query($query_str)->result_array();

			// echo "<pre/>";
			// print_r($result);

			// die();

			 $table='<table class="table table-striped"><tr><th  style="text-align:center">Full Name</th><th  style="text-align:center">Email Address</th><th  style="text-align:center">Mobile Number</th></tr>';

			foreach($result as $data_array)
			{
				

				 $table .= '<tr><td style="text-align:center">'.$data_array['name'].'</td><td style="text-align:center">'.$data_array['email'].'</td><td style="text-align:center">0'.$data_array['mobile'].'</td></tr>';


				
			}
			$table.='</table>';
			echo $table;
			



		}
		


		

}