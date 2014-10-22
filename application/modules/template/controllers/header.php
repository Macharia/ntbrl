<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

public function index(){
			
			$this->header_();
			
			
			
		}

		public function header_(){


			$countyID = $_POST['id'];




			
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');


        	



			$this->load->load_header('header_v',$data);	









		}


public function header_var()
{


$mwaka = $_GET['year'];
$mwezi = $_GET['mwezi'];

if (isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	if ($filter == 1)//LAST 3 MONTHS
	{
		$todate = @date("Y-m-d");
		// current date
		$fromdate = @date('Y-m-d', strtotime('-3 month'));
		$displayfromdate = @date("d-M-Y", strtotime($fromdate));
		$displaytodate = @date("d-M-Y", strtotime($todate));
		$title = "Last 3 Months";
		$currentmonth = @date("m");
		$currentyear = @date("Y");
		$colspan = 3;
		$mapwidth = 540;

	} elseif ($filter == 7)//last 6 months
	{
		$todate = @date("Y-m-d");
		// current date
		$fromdate = @date('Y-m-d', strtotime('-6 month'));
		$displayfromdate = @date("d-M-Y", strtotime($fromdate));
		$displaytodate = @date("d-M-Y", strtotime($$D
			));
		$title = "Last 6 Months";
		$currentmonth = @date("m");
		$currentyear = @date("Y");
		$colspan = 6;
		$mapwidth = 540;
	} elseif ($filter == 0)//last submission
	{
		$filter = 0;
		$colspan = 6;
		$mapwidth = 540;
		$currentmonth = GetMaxMonthbasedonMaxYear($mwezi);
		$displaymonth = GetMonthName($currentmonth);
		$currentyear = GetMaxYear($mwaka);
		$title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;
		//get current month and year
	} elseif ($filter == 3)//month/year
	{
		$displaymonth =GetMonthName($mwezi);
		$title = $displaymonth . ' - ' . $mwaka;
		//get current month and year
		$currentmonth = $mwezi;
		$currentyear = $mwaka;
		$colspan = 1;
		$mapwidth = 540;
	} elseif ($filter == 4)//year
	{
		$title = $mwaka;
		//get current month and year
		$currentmonth = "";
		//get current month and year
		$currentyear = $mwaka;
		$colspan = 12;
		$mapwidth = 400;
	}
	elseif ($filter == 8)//all
	{
		$currentmonth = GetMaxMonthbasedonMaxYear($mwezi);
		$currentyear = GetMaxYear($mwaka);
		$displaymonth = GetMonthName($currentmonth);
		$minyear = GetMinYear();
		$title = "Cumulative Data : " . $minyear . ' to ' . $displaymonth . ' - ' . $currentyear;
		
	}
} else {
	if ($_REQUEST['submitform']) {
		$filter = 2;
		$fromfilter = $_GET['fromfilter'];
		$tofilter = $_GET['tofilter'];
		$displayfromfilter = @date("d-M-Y", strtotime($fromfilter));
		$displaytofilter = @date("d-M-Y", strtotime($tofilter));
		$title = $displayfromfilter . "  to  " . $displaytofilter;
		$currentmonth = @date("m");
		$currentyear = @date("Y");
		$colspan = 1;
		$mapwidth = 540;
	} else {
		if (isset($mwaka)) {
			if (isset($mwezi)) {
				$filter = 3;
				$displaymonth = GetMonthName($mwezi);
				$title = $displaymonth . ' - ' . $mwaka;
				//get current month and year
				$currentmonth = $mwezi;
				$currentyear = $mwaka;
				$colspan = 1;
				$mapwidth = 540;
			} else {
				$filter = 4;
				$title = $mwaka;
				//get current month and year
				$currentmonth = "";
				//get current month and year
				$currentyear = $mwaka;
				$colspan = 12;
				$mapwidth = 400;
			}
		} else  {	
		    $filter = 0;
			$colspan = 6;
			$mapwidth = 540;

			$currentmonth = GetMaxMonthbasedonMaxYear($samp);
			$displaymonth = GetMonthName($currentmonth);
			$currentyear = GetMaxYear($samp);
			$title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;


			 $data['TT'] = $this->TOTALFacilityReportedpercounty($county,$previousmonth,$currentyear);
       		 $data['TT1'] = $this->TOTALFacilitypercounty($county);
			
			//get current month and year
		}
	}
}


return $filter;
}

public function countyall_(){



			

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	//$countyall_data = $this->countyfmap_m->countyall_xml();
        
        	//$data['countyall_data'] = $countyall_data;

        	$this->load->load_allocation('countyall_v');





		}

		
		

			public function GetAllGeneSitesInCounty($county)
			{
				$query_str="SELECT 
					`section3`.`facility` AS a,
					`facilitys`.`name` AS b, 
					`districts`.`name` AS c,
					section3.make AS d,
					`countys`.`name` as county
					FROM `section3` ,facilitys, `districts` ,`countys`
					WHERE 
					`section3`.`facility`= `facilitys`.`facilitycode`
					AND  `districts`.`ID` = `facilitys`.`district`
					AND `countys`.`ID` = `districts`.`county`
					AND `countys`.`ID` ='$county'";
				
				$result = $this->db->query($query_str)->result_array();
			
			$rs=$result;
			return $rs;
					
			}



			//total patients in county
			public function TOTALFacilitypercounty($county){
					
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
			
			$TT=$result;
			return $TT;
					
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
			
			$TT1=$result;
			return $TT1;
			}



}