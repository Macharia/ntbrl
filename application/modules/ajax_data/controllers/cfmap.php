<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class cfmap extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
       



	}


	public function get_cfmap_json_()
		{


			$CountyID = $_POST['id'];

			$query_str="SELECT mfl,fname,total,mtb,neg,rif,ind,errs

						FROM(
						SELECT 
						facilitys.facilitycode AS mfl,
						facilitys.name as fname,
						sum(CASE WHEN cond='1' THEN 1 ELSE 0 END) as total,

						sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,

						sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,

						sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 

						sum( CASE WHEN mtbRif = 'Indeterminate' THEN 1 ELSE 0 END ) AS ind, 

						sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' THEN 1 ELSE 0 END ) AS errs 
						FROM sample1 
						LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
						LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
						LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`

						WHERE `countys`.`ID` ='$CountyID'
						GROUP BY fname
						)x";
													

			$result = $this->db->query($query_str)->result_array();

			// echo "<pre/>";
			// print_r($result);

			// die();

			 $table='<table class="table table-striped">
			 <tr>
			 <th  style="text-align:center">MFL Code</th>
			 <th  style="text-align:center">Facility Name</th>
			 <th  style="text-align:center">Total Tests</th>
			 <th  style="text-align:center">MTB Positive</th>
			 <th style="text-align:center">MTB Negative</th>
			 <th  style="text-align:center">RIF Resistant</th>
			 <th style="text-align:center">RIF Indeterminate</th>
			 <th  style="text-align:center">Errors / Invalid</th>
			 </tr>';

			foreach($result as $value)
			{
				

				 $table .= '<tr>
				 <td style="text-align:center">'.$value['mfl'].'</td>
				 <td style="text-align:center">'.$value['fname'].'</td>
				 <td style="text-align:center">'.$value['total'].'</td>
				 <td style="text-align:center">'.$value['mtb'].'</td>
				 <td style="text-align:center">'.$value['neg'].'</td>
				 <td style="text-align:center">'.$value['rif'].'</td>
				 <td style="text-align:center">'.$value['ind'].'</td>
				 <td style="text-align:center">'.$value['errs'].'</td>
				 </tr>';


				
			}
			$table.='</table>';
			echo $table;
			



		}
}
