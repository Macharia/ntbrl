<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class login extends MY_Controller {
	
		
		
	/*public function index(){
		ini_set('memory_limit','-1');
		
		$data['content_view'] = "Login/login_v";
		$data['title'] = "NTBRL|System Login";
		$this->template($data);
		
		
	}
	
	public function process_credentials(){
		
		$validated = $this -> form_validation -> run();
		
		if($validated){
			
			$username = $this -> input -> post("username",TRUE);
			$password = $this -> input -> post("password",TRUE);
			$this -> authenticate_user($username, $password);
		}
		else {
			$this -> index();
		}
		
	}
	
	*/
		
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
				$id = $this-> login_m->check_login($username, $password); 
				
				if(!$id){
					
					//login failed error
					
					$this->session->set_flashdata('login_error', TRUE);
					
					redirect('login/login');
					
				}
				
				else{
					
					//log them in
					
					$this->session->set_userdata(array(
								'Logged in'=> TRUE,
								'id' => $user_id
								));
					//redirects to allocated user group
					redirect('#');
					
				}				
					
								
				
				
								
			}
			
			
			
			
		}
		
		
		
		
		
		
		
		
		
		
	}

