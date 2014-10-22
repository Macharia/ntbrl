<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class nationaltrendline extends MY_Controller {

	   var $gtdone;
		var $gtmtbpos;
		var $gtmtbneg;
		var $gtmtbrif;
		var $month;
		var $year;
		var $monthname;
		var $totaltests;
		var $currentyear;
		var $startmonth;


	function __construct() {


		



		
		parent::__construct();

	$this->gtdone=$this->gettestsdone($this->month,$this->year);
	$this->gtmtbpos = $this->getmtbpos($this->month,$this->year);
	$this->gtmtbneg = $this->getmtbneg($this->month,$this->year);
	$this->gtmtbrif = $this->getmtbrif($this->month,$this->year);

	//$this->monthname = $this->GetMonthName($this->month);	
	
}
		public function index(){
			
			$this->nationaltrendline_();
			
			
			
		}

		public function nationaltrendline_(){

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');


			$data['gtdone'] = $this->gettestsdone($startmonth,$currentyear);
        	$data['gtmtbpos'] = $this->getmtbpos($startmonth,$currentyear);
        	$data['gtmtbneg'] = $this->getmtbneg($startmonth,$currentyear);
        	$data['gtmtbrif'] = $this->getmtbrif($startmonth,$currentyear);
        	
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
		public function gettestsdone($month,$year){
			
			    $query_str="SELECT COUNT(*) AS tstdone FROM sample1 where cond='1' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' ";	
				$result = $this->db->query($query_str)->result_array();
				
				$this->gtdone = $result[0]['tstdone'];

				return $this->gtdone;
			
	}

		public function getmtbpos($month,$year){
				$query_str="SELECT 
				sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtbpos
				FROM sample1
				WHERE MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'";

				
				$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbpos = $result[0]['mtbpos'];

				return $this->gtmtbpos;
	 
		
		}

		public function getmtbneg($month,$year){
				$query_str="SELECT sum( CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END ) AS MTBNEG
				FROM sample1
				where MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'";	

				$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbneg = $result[0]['MTBNEG'];

				return $this->gtmtbneg;			

			}

		public function getmtbrif($month,$year){
				$query_str="SELECT 
				sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS mtbrif
				FROM sample1
				 WHERE MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'";	

				$result = $this->db->query($query_str)->result_array();
				
				$this->gtmtbrif = $result[0]['mtbrif'];
				// if( $result){
   	// 				  echo $this->gtmtbrif=$result[0]['mtbrif'];
   	// 				 }
				// 	else{
  		// 			  $this->gtmtbrif=0;
				// 			}
				return $this->gtmtbrif;
	
			}


		public function get_national_trendline_chart_(){

			if (isset($_GET['mwaka']))
		 {
		 	$currentyear = $_GET['mwaka'];
		 }

		$chart='<chart caption="# of Tests" linethickness="1" showvalues="0" formatnumberscale="0" anchorradius="2" divlinecolor="666666" divlinealpha="30" divlineisdashed="1" labelstep="2" bgcolor="FFFFFF" showalternatehgridcolor="0" labelpadding="10" canvasborderthickness="1" legendiconscale="1.5" legendshadow="0" legendborderalpha="0" legendposition="right" canvasborderalpha="50" numvdivlines="5" vdivlinealpha="20" showborder="0">';
		

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

		$chart.='<dataset seriesname="Test Done" color="1D8BD1" anchorbordercolor="1D8BD1" anchorbgcolor="1D8BD1">';
		 

		 $startmonth =  1; 
		 $endmonth =  12; 

		 
		 

				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->totaltests = $this->gettestsdone($startmonth,$currentyear);
				
				
		
			
		$chart.='<set value="' .$this->totaltests.'" />';
			}
		
		$chart.='</dataset>';






		$chart.='<dataset seriesname="MTB Positive Test" color="F1683C" anchorbordercolor="F1683C" anchorbgcolor="F1683C">';
		 

		$startmonth =  1; 
		 $endmonth =  12;

				  
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbpos=$this->getmtbpos($startmonth,$currentyear);
				
				
	
			
		$chart.='<set value=" '.$this->mtbpos.'" />';	
			}
		$chart.='</dataset>';





		$chart.='<dataset seriesname="MTB Negative Test" color="2AD62A" anchorbordercolor="2AD62A" anchorbgcolor="2AD62A">';
		   

		$startmonth =  1; 
		 $endmonth =  12; 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbneg=$this->getmtbneg($startmonth,$currentyear);
				
				
		
			
		$chart.='<set value=" '.$this->mtbneg.' " />';
			}
		$chart.='</dataset>';








		$chart.='<dataset seriesname="MTB Rif Res Test" color="DBDC25" anchorbordercolor="DBDC25" anchorbgcolor="DBDC25">';
		  

		$startmonth =  1; 
		 $endmonth =  12; 

		 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$this->mtbrif=$this->getmtbrif($startmonth,$currentyear);
				
				
		
			
		$chart.='<set value=" '.$this->mtbrif.' " />';
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