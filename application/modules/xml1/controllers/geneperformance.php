<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class geneperformance extends MY_Controller {

	   var $month;
		var $year;
		var $monthname;
		var $FacID;
		var $currentyear;
		var $startmonth;
		var $gtlogs;
		var $gtlogout;


	function __construct() {


		



		
		parent::__construct();

	$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}
	
			$this->gtlogs = $this->get_logs($this->startmonth,$this->currentyear);
			$this->gtlogout = $this->get_logout($this->startmonth,$this->currentyear);	
			
}
		public function index(){
			
			$this->geneperformance_();
			
			
			
		}

		public function logtrend_(){

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



			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	$data['FacID'] = $this->session->userdata('mfl');


			$data['gtlogs'] = $this->get_logs($this->startmonth,$this->currentyear);
        	$data['gtlogout'] = $this->get_logout($this->startmonth,$this->currentyear);
        	
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
		public function get_module($month,$year){
	
					$query_str="SELECT Module_SN as moduleserial,count(*) as totaltests,sum(CASE WHEN Test_Result='ERROR' THEN 1 ELSE 0 END) AS Errors,((sum(CASE WHEN Test_Result='ERROR' THEN 1 ELSE 0 END)/count(*))*100) as errrate
								FROM sample1 where cond='1' and facility LIKE '%$FacID%' GROUP BY Module_SN ";	
					$result = $this->db->query($query_str)->result_array();

					foreach ($result as $value) {
			        $gtlogs=$result;
							}

				return $gtlogs;		
							
	
	}

		

		public function get_logtrend_chart(){


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



		$chart='<chart yAxisName="# of Tests" xAxisName="Genexpert Modules" showvalues="0" stack100Percent="0" showPercentValues="0" bgcolor="#FFFFFF" showBorder="0"';
		

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

		$chart.='<dataset seriesname="Login Attempts" color="1D8BD1" anchorbordercolor="1D8BD1" anchorbgcolor="1D8BD1">';
		 

		 $startmonth =  1; 
		 $endmonth =  12; 

		 
		 

				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$totallogin = $this->get_logs($startmonth,$year);
				
				
		
			
		$chart.='<set value="' .$totallogin[0]['num'].'" />';
			}
		
		$chart.='</dataset>';






		$chart.='<dataset seriesname="Logout Attempts" color="F1683C" anchorbordercolor="F1683C" anchorbgcolor="F1683C">';
		 

		$startmonth =  1; 
		 $endmonth =  12;

				  
				for ( $startmonth=1;$startmonth< 13;  $startmonth++)
		  		{  
				
				$totallogout=$this->get_logout($startmonth,$year);
				
				
	
			
		$chart.='<set value=" '.$totallogout[0]['num'].'" />';	
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