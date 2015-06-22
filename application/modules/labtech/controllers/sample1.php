<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sample1 extends MY_Controller {

	function __construct() {

		// var $FacID;
		// var $countyID;
		// var $cname;

		parent::__construct();

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			$this->countyID = $this->get_countyid_lab();
			$this->cname = $this->get_countyid_lab();
			// $this->rowfac = $this->get_rsfacilitys_lab();
			// $this->rowfacno = $this->get_rsfacilitys_lab();
			// $this->rowsfac = $this->get_rsfacilitys_lab();


	}

public function index(){
			
			$this->index_sample1();
			
			
			
		}

		public function index_sample1(){


			
			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');
				
			}


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

        	//$data['rsexam'] = $this->get_rsexamination_lab();
        	//$data['rshiv'] = $this->get_rshiv_lab();
        	//$data['rstype'] = $this->get_rstype_lab();
        	// $data['rowfac'] = $this->get_rsfacilitys_lab();
        	// $data['rowfacno'] = $this->get_rsfacilitys_lab();
        	// $data['rowsfac'] = $this->get_rsfacilitys_lab();
        	$data['countyID'] = $this->get_countyid_lab();   
        	$data['cname'] = $this->get_countyid_lab();
        	$data['namba'] = $this->get_namba_lab();
        	$data['notup'] = $this->get_notup_fac($this->FacID);
	        $data['complete'] = $this->get_complete_fac($this->FacID);
	        $data['errors'] = $this->get_errors_fac($this->FacID);
        	




			$this->load->load_lab_sample1('labtech/sample1_v',$data);	









		}

		public function get_rsexamination_lab(){

			 
			$req = R::getAll("SELECT examination_required.id AS id, examination_required.type AS type FROM examination_required ORDER BY examination_required.id");

			

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["id"],
				$value["type"],
				

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

		public function get_rshiv_lab(){


			$req = R::getAll("SELECT hiv_status.id AS id, hiv_status.status AS status FROM hiv_status ORDER BY hiv_status.id");

			

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["id"],
				$value["status"],
				

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
			

		public function get_rstype_lab(){
			
			$req = R::getAll("SELECT type_of_patient.id AS id, type_of_patient.type AS type FROM type_of_patient ORDER BY type_of_patient.id");

			

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["id"],
				$value["type"],
				

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

		public function get_rsfacilitys_lab(){

			$facilitycode = $this->FacID;
			$countyID = $this->countyID;

			$req = R::getAll("SELECT 
							`facilitys`.`facilitycode` AS CODE,
							`facilitys`.`name` AS FACILITY
							FROM `facilitys` , `districts` , `countys`, `provinces`
							WHERE 
							`districts`.`ID` = `facilitys`.`district`
							AND `countys`.`ID` = `districts`.`county`
							AND `provinces`.`ID` = `countys`.`province`
							AND `provinces`.`ID` = '$countyID'");

			

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["CODE"],
				$value["FACILITY"],
				

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

		public function get_namba_lab(){

			$mfl = $this->FacID;
			$countyID = $this->countyID;

			$query_str = "SELECT sample1.lab_no as num FROM sample1 where facility='$mfl' ORDER by tym DESC LIMIT 1";

			$result = $this->db->query($query_str)->result_array();
			if ($result){
				$no = $result[0]['num'];
			}
			else{
				$no = 0;
			}
			
			if($no==0){
				$num = substr($no,-5);
				$namba = str_pad($num + 1, 5, 0, STR_PAD_LEFT );
			}

			else{

				$num = rand(1, 1);

				for($i = 1; $i <=$num ; $i++){
					$namba = str_pad($i,5,'0', STR_PAD_LEFT);
				} 
			}
			
			return $namba;
		}


		public function get_upload_lab(){

			if (isset($_POST["btnUpload"])) {
				

				$query_str = "INSERT INTO sample1 (`lab_no`,`op_no`,`ip_no`,`regno`, `fullname`, `gender`, `age`,`ageb`, `mobile`,`address`,`pat_type`,`facility`,`Refacility`,`coldate`,`smear`,`h_status`,`exam_req`,`d_email`,`c_no`,`c_name`,`c_email`) VALUES (
					'$_POST[labno]',
						'$_POST[opno]',
							'$_POST[ipno]',
								'$_POST[regno]',
									'$_POST[name]',
										'$_POST[sex]',
											'$_POST[age]',
												'$_POST[ageb]',
													'$_POST[p_no]',
														'$_POST[address]',
															'$_POST[ptype]',
																'$_POST[facility]',
																	'$_POST[refacility]',
																		'$_POST[date]',
																			'$_POST[smear]',
																				'$_POST[hstatus]',
																					'$_POST[exam]',
																						'$_POST[d_email]',
																							'$_POST[c_no]',
																								'$_POST[c_name]',
																									'$_POST[c_email]')";
				$result = $this->db->query($query_str);

				$retval = $result;

				if (! $retval) {

				$this->session->set_flashdata('error_message', TRUE);
					
					redirect('labtech/sample1');	
					
				}else{


				$this->session->set_flashdata('success_message', TRUE);
					
					redirect('labtech/sample1');

				}
					}
				}
					
		


}