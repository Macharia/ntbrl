<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test extends MY_Controller {



	public function index()
	{
		
		//$this->load->model('test_m');


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
       // $test_data = $this->test_m->test_ajax();
        
        	//$data['test_data'] = $test_data;



		   //$this->load->load_test('test_v');




	}


	public function get_test_json_()
		{


			$FacilityID = $_POST['id'];

			$query_str="SELECT * FROM section4 WHERE section4.facility='$FacilityID'";
							

			$result = $this->db->query($query_str)->result_array();

			// echo "<pre/>";
			// print_r($result);

			// die();

			 $table='<table class="table table-striped">
			 			<tr>
				 			 <th style="text-align:center">Facility Name</th>
				 			 <th  style="text-align:center">Type of Tests</th>
				 			 <th  style="text-align:center">Distance</th><th  style="text-align:center">Average No. of Samples</th>
				 			 <th  style="text-align:center">Frequency</th>
			 			 </tr>';

			foreach($result as $value)
			{
				

				 $table .= '<tr>
				 				<td style="text-align:center">'.$value['reference'].'</td>
				 				<td style="text-align:center">'.$value['test'].'</td>
				 				<td style="text-align:center">'.$value['distance'].'</td>
				 				<td style="text-align:center">'.$value['sample'].'</td>
				 				<td style="text-align:center">'.$value['frequency'].'</td>
			 				</tr>';'</td><td style="text-align:center">'.$value['test'].'</td>
			 					<td style="text-align:center">'.$value['distance'].'</td>
			 					<td style="text-align:center">'.$value['sample'].'</td>
			 					<td style="text-align:center">'.$value['frequency'].'</td>
		 					</tr>';


				
			}
			$table.='</table>';
			echo $table;
			



		}
}
