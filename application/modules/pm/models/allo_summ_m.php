<?php

class allo_summ_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}



	public function allo_summ_pm()
	{



		$query_str="SELECT countys.ID as a,countys.name as b,consumption.date as c, sum(consumption.allocated) as d
 					FROM `consumption` ,facilitys, `districts` ,`countys`
					WHERE 
						`consumption`.`facility`= `facilitys`.`facilitycode`
					AND  `districts`.`ID` = `facilitys`.`district`
					AND consumption.status=1
					AND `countys`.`ID` = `districts`.`county`
					Group by  countys.ID";


		return $result = $this->db->query($query_str)->result_array();



			echo "<pre/>";
			print_r($result);

			die();






	}







}