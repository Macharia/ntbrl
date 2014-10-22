<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class allo extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function get_ajax_all_json_()
		{
			$countyID = $this->input->post('d');

			 $req = R::getAll("SELECT 
							`consumption`.`ID` AS id,
							`consumption`.`facility` AS a,
							`facilitys`.`name` AS b, 
							`districts`.`name` AS c,
							consumption.commodity AS d,
							consumption.quantity AS e,
							consumption.quantity_used AS f,
							consumption.end_bal AS g,
							consumption.q_req AS h,
							consumption.status AS st
							FROM `consumption` ,facilitys, `districts` ,`countys`
							WHERE 
							`consumption`.`facility`= `facilitys`.`facilitycode`
							AND  `districts`.`ID` = `facilitys`.`district`
							AND `countys`.`ID` = `districts`.`county`
							AND `countys`.`ID` = '$countyID'
							group by `consumption`.`facility`");
							//$rsFinC = mysql_query($sql, $conn) or die(mysql_error());
							//$row_rsFinC = mysql_fetch_assoc($rsFinC);


			 $data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["a"],
				$value["b"],
				

			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data
			);

			echo json_encode($json_req);



				


	}
}
