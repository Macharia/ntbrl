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

			$query_str="SELECT mfl,fname,total,mtb,neg,rif

						FROM(
						SELECT 
								facilitys.facilitycode AS mfl,
								facilitys.name as fname,

			sum(CASE WHEN cond='1' THEN 1 ELSE 0 END) as total,

			sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance NOT DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance NOT DETECTED'OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE'  OR  Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR  Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED' THEN 1 ELSE 0 END ) AS mtb,

			sum(CASE WHEN Test_Result = 'MTB NOT DETECTED'  THEN 1 ELSE 0 END) as neg,

			sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE' THEN 1 ELSE 0 END ) AS rif  

						FROM sample 
						LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
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
				 </tr>';


				
			}
			$table.='</table>';
			echo $table;
			



		}
}