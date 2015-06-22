<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class worksheet extends MY_Controller {

	

	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			define('IN_CB',true);

			define('VERSION', '2.1.0');



			if(version_compare(phpversion(),'5.0.0','>=')!==true)
				exit('Sorry, but you have to run this script with PHP5... You currently have the version <b>'.phpversion().'</b>.');

			if(!function_exists('imagecreate'))
				exit('Sorry, make sure you have the GD extension installed before running this script.');

			$facilityname=$this->FacID;
			

	}

public function index(){
			
			$this->worksheet_lab();
			
			
			
		}

		public function worksheet_lab(){



			//require_once('./assets/html/function.php');
			//require_once('./assets/html/config.php');
			$mfl=$this->FacID;
			// $facilityname=$_GET['id2'];
			$dt=@date("d-M-Y");
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

        	$data['gene'] = $this->gene_reg_xpert();
	        // $data['complete'] = $this->get_complete_fac($this->FacID);
	        // $data['errors'] = $this->get_errors_fac($this->FacID);

			
			

			$this->load->load_lab_worksheet('labtech/worksheet_v',$data);	


		}


		public function gene_reg_xpert(){

				// $this->load->library('html/function');
				// $this->load->library('html/config');

				$mfl = $this->FacID;

			    $query_str = "SELECT s.lab_no AS a,s.coldate AS b, s.fullname AS c, f.name AS d FROM sample1 s , facilitys f WHERE s.cond=0 and s.Refacility = f.facilitycode AND s.facility='$mfl'";
			    $result = $this->db->query($query_str)->result_array();
			    
			   return $result;
		}



}