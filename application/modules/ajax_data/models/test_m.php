<?php

class test_m extends MY_Model{
	
	public function __construct()
	{
		parent::__construct();
		
	}


	public function test_ajax()
	{

$FacilityID = $_POST['id'];

		$query_str="SELECT `section4`.`facility` AS FACILITY,
			 							`section4`.`test` AS TEST,
										 `section4`.`distance` AS DISTANCE,
										 `section4`.`sample` AS SAMPLE,
										 `section4`.`frequency` AS FREQUENCY
							FROM section4 WHERE section4.facility='$FacilityID'";


		$result = $this->db->query($query_str)->result_array();



	}






}	