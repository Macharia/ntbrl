<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class activation extends MY_Controller {


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
			
			$this->get_activation();
			
			
			
		}

		



	public function get_activation(){
		
		$UserID = $_GET['id'];
		$status = $_GET['st'];


		if ($status==0) {
				$query_str = "UPDATE user SET st=1 WHERE id ='$UserID'" ;
			} 
			else if ($status==1) {
				$query_str = "UPDATE user SET st=0 WHERE id ='$UserID'" ;
			}


	$result = $this->db->query($query_str);
	if ($result) {
					$this->session->set_flashdata('success_message', TRUE);
					
					redirect('admin/userlog');
					}		
		}
		
		


}