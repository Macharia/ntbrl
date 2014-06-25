<?php

class countyfmap_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}



	public function countyfmap_pm()
	{


		$query_str="SELECT `countys`.`ID` AS ID, `countys`.`name` AS name FROM `countys` ORDER BY `countys`.`ID` ASC";


		
		

		return $result = $this->db->query($query_str)->result_array();
		// echo "<pre/>";
		// print_r($result);

		// die();

		//$row_result = mysql_fetch_assoc($result);
		
		//$total = mysql_num_rows($result);


		
		//$countyfmap = $result->result_array(); 



		//$returnable = array('countyfmap' => $countyfmap);
		//return $returnable;









	}






		
}		
?>