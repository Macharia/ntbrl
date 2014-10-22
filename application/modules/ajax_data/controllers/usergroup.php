<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class usergroup extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function get_usergroup_(){

		if (isset($_POST['id'])) {
		
			$usergroup = $_POST['id'];
		}
		

		$query_str="INSERT INTO usergroup (groupName) VALUES('$usergroup')";

		$result = $this->db->query($query_str)->result_array();



		$retval = $result;

		return $retval;





	}
		
























		}
