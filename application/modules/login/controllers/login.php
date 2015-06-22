<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class login extends MY_Controller {
	var $countyID;
	
		
		function __construct() {
               			 parent::__construct();

              $this->countyID=$this->get_countyid(); 			 
               			}

		public function index(){
			
			$this->login_();
			
			
			
		}
		
		public function login_(){
			
			$this->form_validation->set_rules('username','Username','required|trim|max_length[50]|xss_clean');
			$this->form_validation->set_rules('password','Password','required|trim|max_length[200]|xss_clean'); 
			
			
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('login_v');
				
				
			}
			
			else
			{
				//process their input and log in the user
				
				extract($_POST);
				$this->load->model("login_m");
				$login_data = $this-> login_m->check_login($username, $password); 

				if ($login_data=="0")
				{
					
					$this->session->set_flashdata('login_error', TRUE);
						
					redirect('login/login');
					
				}
				else
				{
					
					
					
				
					if($login_data['category']=="")
					{
					
						//login failed error
						
						$this->session->set_flashdata('login_error', TRUE);
						
						redirect('login/login');
					
					}
					else
					{
						
						$this->session->set_userdata(array(
									'logged_in'=> TRUE,
									'category' => $login_data['category'],
									'name' => $login_data['name'],
									'facility' => $login_data['facility'],
									'mfl'  => $login_data['mfl'],
									'id'	=> $login_data['id'],
									));
						//log them in
						if($login_data['category']==1)
						
						{
						//redirects to allocated user group
						redirect('admin/index');
							
														
						}
						 
						else if ($login_data['category']==2)
						{
						//redirects to allocated user group
						//redirect('#');
						echo 'hi there';	
						
							
						}
						
						else if ($login_data['category']==3)
						{
						//redirects to allocated user group
						redirect('labtech/index');
							
							
							
						}
						

						else if ($login_data['category']==4)
						{ 
						//redirects to allocated user group
						redirect('pm/overall');
							
							
							
						}

						else if ($login_data['category']==5)
						{

						
							
						$countyID=$this->get_countyid();	
						//redirects to allocated user group
						redirect("dtlc/countyview_dltc?id=".$countyID."");
							
							
							
						}

						else if ($login_data['category']==6)
						{
						//redirects to allocated user group
						redirect('#');
							
					
							
						}

						else if ($login_data['category']==7)
						{
						//redirects to allocated user group
						redirect('#');
							
							
							
						}


						else if($login_data['category']==8)
						{
						//redirects to allocated user group
						redirect('#');
							
							
							
						}
						
						
					else
					{

						return FALSE;



					}
					
					}
					
					
					
					
					
				}
				
			
				
				
								
					
								
				
				
								
			}
			
			
			
			
		}
		
		
		
		public function password_check($username,$password = FALSE)
	{
		//check for blanks
		
		if($username == ''){return FALSE;}
		
		//check for existing user
		
		$u=$this->get_user_by_username($username);
		
		if($q->num_rows()==0)
		{
			
			return FALSE;
		}
		
		//if exists check for matching password
		
		else
		{
			
			$a = $q->row();
			$salt = substr($a->password,0,config_item('salt_length')	);
			$this->load->helper('encrypt_helper');
			
			
			if(!$encrypted){ $password = encrypt_this($password,$salt);}
			
			
			//check password and return match
			
			
			$this->db->where(config_item('username_field'),$username);
			$this->db->where(config_item('password_field'),$password);
			$q = $this->db->get(config_item('users'));
			
			if($q->num_rows()== 0)
			
			{
				
				return FALSE;
			}
			
			else
			{
			
				return TRUE;
			}
			
		}
	}
		
		
		
		
	public function confirm_string_check($username)
	{
		
		$this->db->where(config_item('username_field'),$username);
		$this->db->where(config_item('confirm_string_field'),$username);
		$q = $this->db->get(config_item('users'));
		
		if ($q->num_rows()>0)
		{
			return TRUE;
			
		}
		else
		{
			
			return FALSE;
		}
			
		
	}
	
	
	public function get_countyid()
	{
		$facilitycode= $this->session->userdata('mfl');

		$query_str="SELECT  countys.ID AS cid,countys.name AS cN 
				FROM countys,facilitys ,districts
				WHERE 
				`facilitys`.`facilitycode`='$facilitycode'
				AND `districts`.`ID` = `facilitys`.`district`
				AND `countys`.`ID` = `districts`.`county` ";

		$result = $this->db->query($query_str)->result_array();
			if ($result) {
			$this->countyID = $result[0]['cid'];
			$cn = $result[0]['cN'];	

			}
			else{
				$this->countyID=0;
				$this->cname=0;
			}
		//var_dump($this->countyID);
		// die();
		return $this->countyID;
		
		
		
	}
	
	public function get_user_by_username($username)
	{
		
		//if roles table is set,join it in
		
		
		if (config_item('roles_item')!= '')
		{
			
			$rt = config_item('roles_table');
			$ut = config_item('users');
			$this->db->select($rt . '.*,' . $ut . '.*');
			$this->db->join($rt, $rt . '.id = ' . $ut . '.' . config_item('role_id_field'));
			
		}
		
		$this->db->where(config_item('username_field'),  $username );
		return $this ->db->get(config_item('users'));
		
		
	}
		
		
		
		
		
		
	}

