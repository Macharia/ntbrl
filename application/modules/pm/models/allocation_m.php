<?php

class allocation_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}




	public function allocation_pm()
	{


		$query_str="SELECT ID as a,name as b from countys";


		$result = $this->db->query($query_str)->result_array();

		//echo "<pre/>";
		//print_r($result);


		//die();










	}



















}