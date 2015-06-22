<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class facilitytrendline extends MY_Controller {

	   var $gtdone;
		var $gtmtbpos;
		var $gtmtbneg;
		var $gtmtbrif;
		var $gttesterr;
		var $month;
		var $year;
		var $monthname;
		var $FacID;
		var $currentyear;
		var $startmonth;


	function __construct() {


		



		
		parent::__construct();

	$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

	$this->FacID = $this->input->get('fid');
	

	$this->gtdone = $this->get_testsdone_fac($this->FacID,$this->startmonth,$this->currentyear);
	$this->gtmtbpos = $this->get_mtbpos_fac($this->FacID,$this->startmonth,$this->currentyear);
	$this->gtmtbneg = $this->get_mtbneg_fac($this->FacID,$this->startmonth,$this->currentyear);
	$this->gtmtbrif = $this->get_mtbrif_fac($this->FacID,$this->startmonth,$this->currentyear);

	//$this->monthname = $this->GetMonthName($this->month);	
	
}
		public function index(){
			
			$this->facilitytrendline_();
			
			
			
		}

		public function facilitytrendline_(){

			// $this->load->library('session');

			// if($this->session->userdata('mfl')) {

			//   $FacID = $this->session->userdata('mfl');

			// }

			// if (isset($_GET['fid'])){
			// 	$FacID = $_GET['fid'];
			// }	

			// if (isset($_GET['year'])){
			// 	$year = $_GET['year'];
			// }
			// else {
			// 	$year = @date('Y');
			// }



			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$data['FacID'] = $this->session->userdata('mfl');


			$data['gtdone'] = $this->get_testsdone_fac($this->FacID,$this->startmonth,$this->currentyear);
        	$data['gtmtbpos'] = $this->get_mtbpos_fac($this->FacID,$this->startmonth,$this->currentyear);
        	$data['gtmtbneg'] = $this->get_mtbneg_fac($this->FacID,$this->startmonth,$this->currentyear);
        	$data['gtmtbrif'] = $this->get_mtbrif_fac($this->FacID,$this->startmonth,$this->currentyear);
        	
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
		public function get_testsdone_fac($FacID,$month,$year){


			$FacID = $this->input->get('fid');
	
					$query_str="SELECT COUNT(*) AS tsdone FROM sample1 where cond='1' AND MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";	
					$result = $this->db->query($query_str)->result_array();

					foreach ($result as $value) {

			        $gtdone=$value;
							}

				return $gtdone;			
	
	}
		public function get_mtbpos_fac($FacID,$month,$year){

			$FacID = $this->input->get('fid');


					$query_str="SELECT 
					sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtbpos
					FROM sample1
					WHERE cond=1 and MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";

					$result = $this->db->query($query_str)->result_array();
					foreach ($result as $value) {
			        $gtmtbpos=$result;
							}

				return $gtmtbpos;		
					 		
			
			}

		public function get_mtbneg_fac($FacID,$month,$year){

			$FacID = $this->input->get('fid');

					$query_str="SELECT sum( CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END ) AS MTBNEG
					FROM sample1
					where cond=1 and MONTH(End_Time)='$month' AND YEAR(End_Time)='$year' AND facility='$FacID'";	
					$result = $this->db->query($query_str)->result_array();
					foreach ($result as $value) {
			        $gtmtbneg=$result;
							}

				return $gtmtbneg;		
			
			}
			
		public function get_mtbrif_fac($FacID,$month,$year){

			$FacID = $this->input->get('fid');


					$query_str="SELECT 
					sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS mtbrif
					FROM sample1
					 WHERE cond=1 and MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'  AND facility='$FacID'";	
					$result = $this->db->query($query_str)->result_array();
					foreach ($result as $value) {
			        $gtmtbrif=$result;
							}

				return $gtmtbrif;		
			
			}
		public function get_testwitherrors_fac($FacID,$month,$year){

			$FacID = $this->input->get('fid');

					$query_str="SELECT 
					sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS err
					FROM sample1
					 WHERE cond=1 and MONTH(End_Time)='$month' AND YEAR(End_Time)='$year'  AND facility='$FacID'";	
					$result = $this->db->query($query_str)->result_array();
					foreach ($result as $value) {
			        $testerr=$rs[0];
							}

				return $gttesterr;		
			
			}


		public function get_facilitytrendline_chart(){


			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');

			}

		if (isset($_GET['fid'])){

		 $FacID = $_GET['fid'];
			
			} 

		if (isset($_GET['year'])){
			
			$year = $_GET['year'];
		
		}

		else {
		
			$year = @date('Y');
		
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
				
				$totaltests = $this->get_testsdone_fac($FacID,$startmonth,$year);
				
				
		
			
		$chart.='<set value="' .$totaltests.'" />';
			}
		
		$chart.='</dataset>';






		$chart.='<dataset seriesname="MTB Positive Test" color="F1683C" anchorbordercolor="F1683C" anchorbgcolor="F1683C">';
		 

		$startmonth =  1; 
		 $endmonth =  12;

				  
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$mtbpos=$this->get_mtbpos_fac($FacID,$startmonth,$year);
				
				
	
			
		$chart.='<set value=" '.$mtbpos.'" />';	
			}
		$chart.='</dataset>';





		$chart.='<dataset seriesname="MTB Negative Test" color="2AD62A" anchorbordercolor="2AD62A" anchorbgcolor="2AD62A">';
		   

		$startmonth =  1; 
		 $endmonth =  12; 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$mtbneg=$this->get_mtbneg_fac($FacID,$startmonth,$year);
				
				
		
			
		$chart.='<set value=" '.$mtbneg.' " />';
			}
		$chart.='</dataset>';








		$chart.='<dataset seriesname="MTB Rif Res Test" color="DBDC25" anchorbordercolor="DBDC25" anchorbgcolor="DBDC25">';
		  

		$startmonth =  1; 
		 $endmonth =  12; 

		 
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$mtbrif=$this->get_mtbrif_fac($FacID,$startmonth,$year);
				
				
		
			
		$chart.='<set value=" '.$mtbrif.' " />';
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