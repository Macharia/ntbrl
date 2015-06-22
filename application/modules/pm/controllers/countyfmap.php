<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class countyfmap extends MY_Controller {
	
		
		
		public function index(){
			
			$this->countymap_();
			
			
			
		}

		public function countymap_(){


			$this->load->model('countyfmap_m');


			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$countyfmap_data = $this->countyfmap_m->countyfmap_pm();
        
        	$data['countyfmap_data'] = $countyfmap_data;



			$this->load->load_countyfmap('countyfmap_v',$data);	









		}


		public function get_countyfmap_json_()
		{


			$req = R::getAll("SELECT 
									countys.ID as ID,countys.name AS name,
									COUNT(*) AS Totaltest,
									sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtbpos,
									sum( CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END ) AS MTBNEG,
									sum( CASE WHEN mtbRif='positive' THEN 1 ELSE 0 END ) AS mtbrif,
									sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err

									FROM sample1 
									RIGHT JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
									RIGHT JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
									RIGHT JOIN `countys` ON `countys`.`ID` = `districts`.`county`
									WHERE  sample1.cond='1'
									Group by countys.ID");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value)
			# code...
			{
				$id = $value['ID'];
				$name = $value['name'];
				$Totaltest = $value['Totaltest'];
				$mtbpos = $value['mtbpos'];
				$MTBNEG = $value['MTBNEG'];
				$mtbrif = $value['mtbrif'];
				$err = $value['err'];
				$link = '<a href="'.base_url().'pm/countyview?id='.$id.'">';


				
				$data[] = array(


				'<img src="../assets/jquery-ui-1.10.3/demos/DataTables/examples/examples_support/details_open.png">',
				$value["ID"],
				$value["name"]." "."County",
				$value["Totaltest"],
				$value["mtbpos"],
				$value["MTBNEG"],
				$value["mtbrif"],
				$value["err"],
				$link.'<img src="../assets/images/icons/view.png" height="20" alt="View Details" title="View Details"/>'

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