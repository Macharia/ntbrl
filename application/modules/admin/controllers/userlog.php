<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class userlog extends MY_Controller {


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
			
			$this->userlog_admin();
			
			
			
		}

		public function userlog_admin(){


			
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

        	$data['user'] = $this->get_user();
        	//$data['usergp'] = $this->get_usergp();
        	//$data['facility'] = $this->get_facility();


			$this->load->load_admin_userlog('admin/userlog_v',$data);	









		}




		public function get_user(){


		$query_str="SELECT user.id as id, user.name as nm,user.username as un, user.st as ac, usergroup.groupName as gp FROM user,usergroup WHERE  user.category=usergroup.usergroupID ORDER BY user.id";	


		$result = $this->db->query($query_str)->result_array();

		return $result;

		}


		public function get_usergp(){


		$req= R::getAll("SELECT usergroup.usergroupID as ID, usergroup.groupName as name FROM usergroup ORDER BY usergroup.usergroupID");	


		$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["ID"],
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


		$req= R::getAll("SELECT facilitys.facilitycode as code, facilitys.name as name FROM facilitys ORDER BY facilitys.name");	


		$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["code"],
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

		public function get_add_user(){


		$newpassword = md5($_POST['password']);
		$repeatnewpassword = md5($_POST['password1']);
if (isset($_POST["btnsave"])) {
	if($newpassword==$repeatnewpassword){
				

				$query_str = "INSERT INTO user (name,category,mfl,facility,email,mobile,username,password,st)
								VALUES('$_POST[name]',
											'$_POST[category]',
											'$_POST[mfl]',
											'$_POST[fname]',
											'$_POST[email]',
											'$_POST[no]',
											'$_POST[username]',
											'$newpassword',1)";


				$result = $this->db->query($query_str);

				$retval = $result;

				if (! $retval) {

				$this->session->set_flashdata('error_message', TRUE);
					
					redirect('admin/userlog');	
					
				}else{


				$this->session->set_flashdata('success_message', TRUE);
					
					redirect('admin/userlog');

				}
					}
				

		}
	}	


}