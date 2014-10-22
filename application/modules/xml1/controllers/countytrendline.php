<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class countytrendline extends MY_Controller {

	   var $gtdoneC;
		var $gtmtbposC;
		var $gtmtbnegC;
		var $gtmtbrifC;
		var $month;
		var $year;
		var $monthname;
		var $totaltests;
		var $currentyear;
		var $startmonth;
		var $countyID;


	function __construct() {
		
		parent::__construct();

	$this->countyID = $this->input->get('id');	
	$this->gtdoneC=$this->getCountytestsdone($this->countyID,$this->month,$this->year);
	$this->gtmtbposC = $this->getCountymtbpos($this->countyID,$this->month,$this->year);
	$this->gtmtbnegC = $this->getCountymtbneg($this->countyID,$this->month,$this->year);
	$this->gtmtbrifC = $this->getCountymtbrif($this->countyID,$this->month,$this->year);

	//$this->monthname = $this->GetMonthName($this->month);	
	
}
		public function index(){
			
			$this->countytrendline_();
			
			
			
		}

		public function countytrendline_(){

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');


			$data['gtdoneC'] = $this->getCountytestsdone($countyID,$startmonth,$currentyear);
        	$data['gtmtbposC'] = $getCountymtbpos($countyID,$startmonth,$currentyear);
        	$data['gtmtbnegC'] = $getCountymtbneg($countyID,$startmonth,$currentyear);
        	$data['gtmtbrifC'] = $getCountymtbrif($countyID,$startmonth,$currentyear);
        	
        	$data['monthname'] = $this->GetMonthName($this->month);

		}

		public function GetMonthName($month){
	
        	$monthname='';
            $month_value=null;
            $months=array(
                  1=>'Jan',
                  2=>'Feb',
                  3=>'Mar',
                  4=>'Apr',
                  5=>'May',
                  6=>'Jun',
                  7=>'Jul',
                  8=>'Aug',
                  9=>'Sep',
                  10=>'Oct',
                  11=>'Nov',
                  12=>'Dec'
                  );

            
            $monthname = $months[$month];
             
            return $monthname;

}
		public function getCountytestsdone($countyID,$month,$year){

			$countyID = $this->input->get('id');

		$query_str="SELECT COUNT(*) AS totaltests
		From sample1
		LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
		LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
		LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
		WHERE cond=1 and `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'";	


		$result = $this->db->query($query_str)->result_array();
				
				$this->gtdoneC = $result[0]['totaltests'];

				return $this->gtdoneC;
			
			}


		public function getCountymtbpos($countyID,$month,$year){

			 $countyID = $this->input->get('id');

		$query_str="SELECT 
		sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtbpos
		FROM sample1 
		LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
		LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
		LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
		WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'
		";

		$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbposC = $result[0]['mtbpos'];

				return $this->gtmtbposC;
	 
		
			}


		public function getCountymtbneg($countyID,$month,$year){

			 $countyID = $this->input->get('id');

		$query_str="SELECT mtbneg
		FROM(
		SELECT 
		sum( CASE WHEN Test_Result = 'negative ' THEN 1 ELSE 0 END ) AS mtbneg
		FROM sample1 
		LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
		LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
		LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
		WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'
		)x";	

		$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbnegC = $result[0]['mtbneg'];

				return $this->gtmtbnegC;			

	}

		public function getCountymtbrif($countyID,$month,$year){

			 $countyID = $this->input->get('id');

		$query_str="SELECT mtbrif
		FROM(
		SELECT 
		sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS mtbrif
		FROM sample1
		LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
		LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
		LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
		WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'
		)x";	

		$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbrifC = $result[0]['mtbrif'];

				return $this->gtmtbrifC;
	
			}
			


		// 	public function getCountyErrors($countyID,$month,$year){


		// $query_str="SELECT mtbrif
		// FROM(
		// SELECT 
		// sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS mtbrif
		// FROM sample1
		// LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
		// LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
		// LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
		// WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'
		// )x";	
		// $query=myquery_str_query($query_str) or die(myquery_str_error());
		// $rs=myquery_str_fetch_row($query);
		// return $rs[0]	;
			
		// 	}


		public function get_county_trendline_chart_(){


			if (isset($_GET['mwaka']))
		 {
		 	$currentyear = $_GET['mwaka'];
		 }
		 $countyID = $this->input->get('id');

		$chart='<chart  yAxisName="# of Tests" lineThickness="1" showValues="0" formatNumberScale="0" anchorRadius="2" showAlternateHGridColor="1" alternateHGridAlpha="5" alternateHGridColor="CC3300" shadowAlpha="40" bgcolor="#FFFFFF" showBorder="0">';
		

		$chart.='<categories >';
		  
		  $startmonth = 1;
		  $endmonth = 12;

				for ( $startmonth=1; $startmonth<=12; $startmonth++)
		  		{ 
		  		 $this->monthname=$this->GetMonthName( $startmonth);
		  		
				// var_dump($this->monthname);
				// die();
				
		$chart.='<category label= "'.$this->monthname.'" />';
		}
		
		$chart.='</categories>';

		$chart.='<dataset seriesname="Test Done" color="A666EDD" anchorbordercolor="1D8BD1" anchorbgcolor="1D8BD1">';
		 
		 
		 $startmonth =  1; 
		 $endmonth =  12; 

		 

				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->totaltests = $this->getCountytestsdone($countyID,$startmonth,$currentyear);
				
				
		
			
		$chart.='<set value="' .$this->totaltests.'" />';
			}
		
		$chart.='</dataset>';






		$chart.='<dataset seriesname="MTB Positive Test" color="F1683C" anchorbordercolor="F1683C" anchorbgcolor="F1683C">';
		 
		
		$startmonth =  1; 
		 $endmonth =  12;


		 
		  
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbposC=$this->getCountymtbpos($countyID,$startmonth,$currentyear);
				
				
	
			
		$chart.='<set value=" '.$this->mtbposC.'" />';	
			}
		$chart.='</dataset>';





		$chart.='<dataset seriesname="MTB Negative Test" color="2AD62A" anchorbordercolor="2AD62A" anchorbgcolor="2AD62A">';
		   
		 
		$startmonth =  1; 
		 $endmonth =  12; 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbnegC=$this->getCountymtbneg($countyID,$startmonth,$currentyear);
				
				
		
			
		$chart.='<set value=" '.$this->mtbnegC.' " />';
			}
		$chart.='</dataset>';








		$chart.='<dataset seriesname="MTB Rif Res Test" color="DBDC25" anchorbordercolor="DBDC25" anchorbgcolor="DBDC25">';
		  
		 
		$startmonth =  1; 
		 $endmonth =  12; 


		 
		 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbrifC=$this->getCountymtbrif($countyID,$startmonth,$currentyear);
				
				
		
			
		$chart.='<set value=" '.$this->mtbrifC.' " />';
			}
		$chart.='</dataset>';







		$chart.='<styles>';

		$chart.='<definition>';
		$chart.='<style name="Anim1" type="animation" param="_xscale" start="0" duration="1"/>';
		$chart.='<style name="Anim2" type="animation" param="_alpha" start="0" duration="0.6"/>';
		$chart.='<style name="DataShadow" type="Shadow" alpha="40"/>';
		$chart.='</definition>';
		$chart.='<application>';
		$chart.='<apply toObject="DIVLINES" styles="Anim1"/>';
		$chart.='<apply toObject="HGRID" styles="Anim2"/>';
		$chart.='<apply toObject="DATALABELS" styles="DataShadow,Anim2"/>';
		$chart.='</application>';
		$chart.='</styles>';
		$chart.='</chart>';
		
		echo $chart;							    

									    } 






		

			




	}