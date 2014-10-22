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


	public function get_allo_json_()
		{


			$countyID = $_POST['id'];

			$query_str="SELECT consumption.facility AS a,
			 facilitys.name AS b,
			 districts.name AS c,
			 consumption.commodity AS d,
			 consumption.b_bal AS e,
			 consumption.quantity AS f,
			 consumption.quantity_used AS g,
			 consumption.end_bal AS h,
			 consumption.q_req AS i,
			 consumption.allocated AS j,
			 consumption.date AS k
						FROM consumption, facilitys, districts, countys
						WHERE consumption.facility = facilitys.facilitycode
						AND districts.ID = facilitys.district
						AND countys.ID = districts.county
						AND countys.ID = '$countyID'
						AND consumption.status =1 
						GROUP BY `consumption`.`ID` "
						;
							

			$result = $this->db->query($query_str)->result_array();

			// echo "<pre/>";
			// print_r($result);

			// die();

			 $table='<table class="table table-striped">
			 <tr>
			 <th  style="text-align:center">MFL Code</th>
			 <th  style="text-align:center">Facility Name</th>
			 <th  style="text-align:center">District</th>
			 <th  style="text-align:center">Commodity</th>
			 <th style="text-align:center">Beginning Balance</th>
			 <th style="text-align:center">Quantity Issued(From KEMSA) </th>
			 <th style="text-align:center">Quantity Used</th>
			 <th  style="text-align:center">Closing Balance</th>
			 <th  style="text-align:center">Requested</th>
			 <th  style="text-align:center">Allocated</th>
			 <th  style="text-align:center">Period</th>
			 </tr>';

			foreach($result as $value)
			{
				

				 $table .= '<tr>
				 <td style="text-align:center">'.$value['a'].'</td>
				 <td style="text-align:center">'.$value['b'].'</td>
				 <td style="text-align:center">'.$value['c'].'</td>
				 <td style="text-align:center">'.$value['d'].'</td>
				 <td style="text-align:center">'.$value['e'].'</td>
				 <td style="text-align:center">'.$value['f'].'</td>
				 <td style="text-align:center">'.$value['g'].'</td>
				 <td style="text-align:center">'.$value['h'].'</td>
				 <td style="text-align:center">'.$value['i'].'</td>
				 <td style="text-align:center">'.$value['j'].'</td>
				 <td style="text-align:center">'.$value['k']= @date('M-Y', strtotime($value['k'])).'</td>
				 </tr>';


				
			}
			$table.='</table>';
			echo $table;
			



		}
}
