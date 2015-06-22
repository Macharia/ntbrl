<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class user extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function get_user_(){

		if (isset($_POST['id'])) {
		
			$CountyID = $_POST['id'];
		}
		

		$query_str="SELECT id as id,name as nm,username as usernm,mfl as mfl,facility as fac,category as cat
				    FROM user
				    WHERE id ='$CountyID'";

		$result = $this->db->query($query_str)->result_array();


		foreach ($result as $key => $value) {
			
		$table ='<table class="table table-striped"><tr><th  style="text-align:center">User ID</th><th  style="text-align:center">Full Name</th><th  style="text-align:center">Username</th><th  style="text-align:center">Mfl Code</th><th  style="text-align:center">Facility Name</th></tr>';
        $table .= '<tbody><tr><td style="text-align:center">'.$value['id'].'</td><td style="text-align:center">'.$value['nm'].'</td><td style="text-align:center">'.$value['usernm'].'</td><td style="text-align:center">'.$value['mfl'].'</td><td style="text-align:center">'.$value['fac'].'</td></tr></tbody></table>';
	  		


		}
		


		echo $table;


	}
		
























		}
