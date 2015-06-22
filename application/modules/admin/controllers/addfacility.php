<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class addfacility extends MY_Controller {


	var $FacID;
	var $currentyear;
	var $currentmonth;


	function __construct() {
		parent::__construct();

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			//header('Content-Type: application/json; charset=utf-8');
	}

public function index(){
			
			$this->index_addfacility();
			
			
			
		}

		public function index_addfacility(){


			
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

        	


			$this->load->load_admin_addfacility('admin/addfacility_v',$data);	









		}




		public function get_county(){


		$req= R::getAll("SELECT countys.ID AS id, countys.name AS name FROM countys ORDER BY countys.name");	


		$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["id"],
				$value["name"],
				

			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data
			);

			//header('Content-Type: application/json; charset=utf-8');

			echo json_encode($json_req);



		}


		public function get_facility(){


		$req= R::getAll("SELECT  DISTINCT ftype AS ftype FROM `facilitys`");	


		$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				
				$value["ftype"],
				

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

		public function get_owner(){


		$req= R::getAll("SELECT DISTINCT owner AS owner FROM `facilitys`");	


		$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				
				$value["owner"],
				

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




		public function get_upload_facility(){

			if (isset($_POST["btnUpload"])) {
				

				$query_str = "INSERT INTO facilitys (`facilitycode`,`name`,`district`,`ftype`, `owner`, `contactperson`, `contacttelephone`,`ContactEmail`) VALUES (
					'$_POST[code]',
						'$_POST[fname]',
							'$_POST[district]',
								'$_POST[ftype]',
									'$_POST[owner]',
										'$_POST[incharge]',
											'$_POST[tel]',
												'$_POST[email]')";


				$result = $this->db->query($query_str);

				$retval = $result;

				if (! $retval) {

				$this->session->set_flashdata('error_message', TRUE);
					
					redirect('admin/addfacility');	
					
				}else{


				$this->session->set_flashdata('success_message', TRUE);
					
					redirect('admin/addfacility');

				}
					}
				}

}