<?php

class referral_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}


	public function referral_pm()
	{



		$query_str="SELECT `section4`.`facility` AS MFL, `facilitys`.`name` AS FACILITY
					FROM `section4` , `facilitys`
					WHERE `section4`.`facility` = `facilitys`.`facilitycode`
					GROUP BY `section4`.`facility`";



		$result = $this->db->query($query_str)->result_array();			
		//echo "<pre/v>";
		//print_r($result);


		//die();




















	}
















}