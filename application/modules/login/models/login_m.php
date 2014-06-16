<?php

class login_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}
		
											
	public function check_login($username, $password)
	{
		$sha1_password = sha1($password);
		
		$query_str = "SELECT id FROM user WHERE username = ? and password = ?";
		
		$result = $this->db->query($query_str, array($username, $sha1_password)); 
		
		if($result->num_rows()==1)
		{
			return $result->row(0)->id;
			
		}
		
		else{
			
			return FALSE;
			
		}
		
	
	
	
	
	}
	


}
?>