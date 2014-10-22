<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class addAllocation extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function add_allocation_(){

		$allocation = $_POST['allocation'];

		$id = $_GET['id'];
		$id = $_GET['cid'];


		if ((isset($_GET['id'])) && ($_GET['id'] != "")) {

			$query_str = "UPDATE consumption SET status=1,allocated='$allocation' WHERE ID = $id";

				$result = $this->db->query($query_str)->result_array();

				$update = $result;

				$row = $this->db->affected_rows();

					if ($update) {

						redirect('pm/countyallocation?id=$county');
					}

			
		}


	}
}
