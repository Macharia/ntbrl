<?php

class login_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}
		
											
	public function check_login($username, $password)
	{
		$sha1_password = sha1($password);
		
		$query_str = "SELECT id,category,name FROM user WHERE username = ? and password = ?";
		
		$result = $this->db->query($query_str, array($username, $sha1_password)); 
		
		if($result->num_rows()==1)
		{ 
			$results['id']=$result->row(0)->id;
			$results['category']=$result->row(1)->category;
			$results['name']=$result->row(2)->name;
			
			return $results;
			
		}
		
		else{
			
			return $results="0";
			
		}
		
	
	
	
	
	}
	


}
?>