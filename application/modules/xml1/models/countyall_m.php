<?php

class facility_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}
		


	public function countyall_xml()
	{


		$query_str="select ID,name from countys";


	return $result = $this->db->query($query_str)->result_array();




			

	//echo "<pre/>";
	//print_r($result);

	//die();




	} 	








}
