<?php

class allocation_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}




	public function allocation_pm()
	{
			$countyID = $_POST['id'];

		$query_str="SELECT 
							consumption.facility AS a,
							facilitys.name AS b, 
							districts.name AS c,
							consumption.commodity AS d,
							consumption.quantity AS e,
							consumption.quantity_used AS f,
							consumption.end_bal AS g,
							consumption.q_req AS h,
							countys.name as county
							FROM consumption ,facilitys, districts ,countys
							WHERE 
							consumption.facility= facilitys.facilitycode
							AND  districts.ID = facilitys.district
							AND countys.ID = districts.county
							AND countys.ID = '$county'
							AND MONTH(consumption.date)='$previousmonth'
							AND YEAR(consumption.date)='$currentyear'
							Group by consumption.facility";


		$result = $this->db->query($query_str)->result_array();

		// echo "<pre/>";
		// print_r($result);


		// die();










	}



















}