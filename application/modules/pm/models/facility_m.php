<?php

class facility_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}
		


	public function facility_pm()
	{


		$query_str="SELECT 
`facilitys`.`facilitycode` AS CODE,
`facilitys`.`name` AS FACILITY, 
`districts`.`name` AS DISTRICT,
`countys`.`name` AS COUNTY, 
`provinces`.`name` AS PROVINCE 

FROM `facilitys` , `districts` ,`countys`, `provinces`
WHERE 
`districts`.`ID` = `facilitys`.`district`
AND `countys`.`ID` = `districts`.`county`
AND `countys`.`province` = `provinces`.`ID`";


	return $result = $this->db->query($query_str)->result_array();

	//echo "<pre/>";
	//print_r($result);

	//die();




	} 	








}

