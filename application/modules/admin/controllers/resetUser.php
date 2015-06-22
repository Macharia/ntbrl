<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class resetUser extends MY_Controller {


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
			
			$this->get_reset();
			
			
			
		}

		



	public function get_reset(){
		
		if (isset($_GET['id'])){
			$ID = $_GET['id'];
			}

		$newpass=sha1(123456);	

		$query_str = "UPDATE user SET password='$newpass' WHERE id ='$ID'" ;

		$result = $this->db->query($query_str);
		
		if ($result) {
					$this->session->set_flashdata('success_message', TRUE);
					
					redirect('admin/userlog');
					}			
		}
		
		


}