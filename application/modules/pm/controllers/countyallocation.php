<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class countyallocation extends MY_Controller {

	    var $TT;
		var $TT1;
		var $county;
		var $previousmonth;
		var $currentyear;
		var $countyID;



		function __construct() {
		parent::__construct();
		$county = $this->input->post('id',TRUE);

		$this->previousmonth= @date("m")- 1 ;
		$this->currentyear= @date("Y");
		$this->TT=$this->TOTALFacilitypercounty($this->county);
		$this->TT1= $this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);
		
			}
	public function index(){

		$this->countyallocation_();

	}

	public function countyallocation_(){

			$county = $this->input->post('id',TRUE);

		    $data['category'] = $this->session->userdata('category');
		    $data['user'] = $this->session->userdata('user');
            $data['name'] = $this->session->userdata('name');
        
            $data['table'] = $this->get_allocation_table_();


       		$data['TT1'] = $this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);

       		$data['TT'] = $this->TOTALFacilitypercounty($this->county);
       		// $TT = $this->TOTALFacilityReportedpercounty($county,$previousmonth,$currentyear);
       		 //$TT1 = $this->TOTALFacilitypercounty($county);
       		 //$data['filter'] = $this->header();
       		$data['currentmonth'] = $this->allocation_ca();
       		$data['currentyear'] = $this->allocation_ca();
       		$data['previousmonth'] = $this->allocation_ca();
       		$data['countyID'] = $_GET['id'];
       		$data['countyName'] = $this->get_county_name();

		    $this->load->load_countyallocation('countyallocation_v',$data);




	}


	public function get_county_allocation_json_()
		{

			$countyID = $_GET['id'];


			$req = R::getAll("SELECT 
								`consumption`.`ID` AS id,
								`consumption`.`facility` AS a,
								`facilitys`.`name` AS b, 
								`districts`.`name` AS c,
								consumption.date AS d,
								consumption.b_bal AS e,
								consumption.quantity_used AS f,
								consumption.end_bal AS g,
								consumption.q_req AS h,
								consumption.status AS st,
								consumption.quantity AS q
								FROM `consumption` ,facilitys, `districts` ,`countys`
								WHERE 
								`consumption`.`facility`= `facilitys`.`facilitycode`
								AND  `districts`.`ID` = `facilitys`.`district`
								AND `countys`.`ID` = `districts`.`county`
								AND consumption.status=0
								AND `countys`.`ID` = '$countyID'");

			$data = array();
			$recordsTotal = 0;

			foreach ($req as $key => $value) {
				# code...



			$data[] = array(

				
				$value["a"],
				$value["b"],
				$value["c"],
				$value["d"],
				$value["e"],
				$value["q"],
				$value["f"],
				$value["g"],
				$value["h"],
				'<form method="post" action=""><input type="text" name="allocation" size="2" /><input type="image" align="right" src="../assets/images/icons/sv.jpg" alt="Allocate" height="20"  width="18" title="Allocate"></form>',
				'<marquee length="80%" scrolldelay="300"><div class="label label-success">'.$value['st'].'</div></marquee>',






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


			public function get_allocation_table_()
				{


					
					$county = $this->input->post('id',TRUE);


					$query_str = "SELECT ID as a,name as b from countys";

					$result = $this->db->query($query_str)->result_array();

					// echo "<pre/>";
					// print_r($result);

					// die();



					$table='<table class="table table-striped">
					 <tr>
					 <td style="font-weight: bold;"> Counties</td>
						<td style="font-weight: bold;">Reported / Total(Facilities)</td>
					 </tr>';

					 foreach($result as $value)
					{
						

						$TT=$this->TOTALFacilitypercounty($value["a"]);
						$TT1=$this->TOTALFacilityReportedpercounty($value["a"],$this->previousmonth,$this->currentyear);


						 $table .= '<tr>
						 <td> <a href="countyallocation?id='.$value['a'].'"> '.$value['b'].'</a></td>
						 <td style="text-align:center">'.$this->TT1.' / '.$this->TT.'</td>
						 </tr>';


						
					}
					$table.='</table>';
					return $table;
					




				}


				public function get_county_name(){

					$countyID = $_GET['id'];

					$query_str = "SELECT ID as a,name as b from countys WHERE `countys`.`ID` = '$countyID'";


					$result = $this->db->query($query_str)->result_array();

					if($result){

						$countyName=$result[0]['b'];
					}
					return $countyName;




				}

public function allocation_ca(){



			$query_str= "SELECT ID as a,name as b from countys";
			


			$result = $this->db->query($query_str)->result_array();
			
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;

			if ($currentmonth ==1)
			{
			$previousmonth=12;
			$currentyear=@date("Y")-1;
			}
			else
			{
			$previousmonth=@date("m")- 1;
			$currentyear=@date("Y");
			}

			return $currentmonth;
			return $currentyear;
			return $previousmonth;
}
	
			//total patients in county
			public function TOTALFacilitypercounty($county){
			//$countyID = $_POST['id'];
		//	$county = $this->input->post('id',TRUE);



			$query_str="SELECT 
			`facilitys`.`facilitycode` AS CODE,
			`facilitys`.`name` AS FACILITY, 
			`districts`.`name` AS DISTRICT,
			`countys`.`name` AS COUNTY
			FROM `facilitys` , `districts` ,`countys`
			WHERE 
			`districts`.`ID` = `facilitys`.`district`
			AND `countys`.`ID` = `districts`.`county`
			AND `countys`.`ID` = '$county'

			";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TT=count($result);
			return $this->TT;
					
			}



			public function TOTALFacilityReportedpercounty($county,$previousmonth,$currentyear){
			$query_str= "SELECT 
			`consumption`.`facility` AS a,
			`facilitys`.`name` AS b, 
			`districts`.`name` AS c,
			consumption.commodity AS d,
			consumption.quantity AS e,
			consumption.quantity_used AS f,
			consumption.end_bal AS g,
			consumption.q_req AS h,
			`countys`.`name` as county
			FROM `consumption` ,facilitys, `districts` ,`countys`
			WHERE 
			`consumption`.`facility`= `facilitys`.`facilitycode`
			AND  `districts`.`ID` = `facilitys`.`district`
			AND `countys`.`ID` = `districts`.`county`
			AND `countys`.`ID` = '$county'
			AND MONTH(consumption.date)='$previousmonth'
			AND YEAR(consumption.date)='$currentyear'
			Group by `consumption`.`facility`";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TT1=count($result);
			return $this->TT1;
			}





}