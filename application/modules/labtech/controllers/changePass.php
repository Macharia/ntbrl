<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class changePass extends MY_Controller {

	var $FacID;
	var $UserID;
	var $countyID;
	var $cname;
	var $maxY;
	var $minY;
	var $errormsg;
	var $suceessmsg;

	function __construct() {




		parent::__construct();
		
		 	$this->load->database();

			$this->load->library('form_validation');


			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

			$this->load->library('session');

			if($this->session->userdata('id')) {

			  $this->UserID = $this->session->userdata('id');
				
			}

			// $this->maxY=$this->get_max_year();
			// $this->minY=$this->get_min_year();
			
	}

public function index(){
			
			$this->changePass_lab();
			
			
			
		}

		public function changePass_lab(){


			
			


			// if (isset($_SESSION['mfl'])){

			//   $FacID = $_SESSION['mfl'];
			  
			// } 

			$dt=@date("d-M-Y");
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;
			//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
			$todaysdate=@strtotime(@date("Y-m-d"));
			

			$data['result'] = $this->get_changepass();
			$data['suceessmsg'] = $this->get_changepass();
			$data['errormsg'] = $this->get_changepass();

			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$data['notup'] = $this->get_notup_fac($this->FacID);
	        $data['complete'] = $this->get_complete_fac($this->FacID);
	        $data['errors'] = $this->get_errors_fac($this->FacID);

		
        	// $data['maxY'] = $this->get_max_year();
         //    $data['minY'] = $this->get_min_year();

			$this->load->load_lab_changePass('labtech/changePass_v',$data);	


		}


		


		public function get_changepass(){

		   
		$this->load->library('form_validation');

		$this->form_validation->set_rules('opassword','Old Password','required|trim|xss_clean|callback_change');

		$this->form_validation->set_rules('npassword','New Password','required|trim');

		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');

    if ($this->form_validation->run() == FALSE)

    {
         

    }


else{


     $session_data = $this->session->userdata('id');

     $query=$this->db->query("select * from user where id=".$session_data['id']);

     foreach ($query->result() as $my_info) {

     $db_password = $my_info->password;

     $db_id = $my_info->id;


     }

     if ((sha1($this->input->post('opassword',$db_password)) == $db_password) && ($this->input->post('npassword') != "") && ($this->input->post('cpassword')!=""))
      {

		$fixed_pw = sha1($this->input->post('npassword'));

		$update = $this->db->query("Update user SET password='$fixed_pw' WHERE id='$db_id'")or die(mysql_error());

     	$this->session->set_flashdata('success_message', TRUE);
					
					redirect('labtech/changePass');
				   

     }
   else  {

		$this->session->set_flashdata('error_message', TRUE);
					
					redirect('labtech/changePass');
			
}
	}	

		



		}











}