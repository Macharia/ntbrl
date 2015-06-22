<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class index extends MY_Controller {


	var $FacID;
	var $currentyear;
	var $currentmonth;
	var $x;
	var $y;


	function __construct() {
		parent::__construct();

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}

		$this->x=$this->get_testsdonethismonth_fac($this->currentmonth,$this->currentyear,$this->FacID);
		$this->y=$this->get_catridges_fac($this->currentmonth,$this->currentyear,$this->FacID);			
	}

public function index(){
			
			$this->index_lab();
			
			
			
		}

		public function index_lab(){


			
			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $FacID = $this->session->userdata('mfl');
				
			}


			// if (isset($_SESSION['mfl'])){

			//   $FacID = $_SESSION['mfl'];
			  
			// } 

			$dt=@date("d-M-Y");
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;
			//$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
			$todaysdate=@strtotime(@date("Y-m-d"));
			
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

        	$data['testdonethismonth'] = $this->get_testsdonethismonth_fac($currentmonth,$currentyear,$FacID);
        	$data['expdate'] = $this->get_expdate_fac($currentmonth,$currentyear,$FacID);
        	$data['totalrow'] = $this->get_totalrow_fac($currentmonth,$currentyear,$FacID);
        	$data['reportedpreviousmonth'] = $this->get_reportedpreviousmonth_fac($previousmonth,$currentyear,$FacID);
        	$data['catridges'] = $this->get_catridges_fac($currentmonth,$currentyear,$FacID);
        	$data['remainingcarts'] = $this->get_remainingcarts_fac($currentmonth,$currentyear,$FacID);


        	 $data['complete'] = $this->get_complete_fac($FacID);
        	 $data['notup'] = $this->get_notup_fac($FacID);
        	 $data['errors'] = $this->get_errors_fac($FacID);
        	 $data['todayswork'] = $this->get_todayswork_fac($dt,$FacID);




			$this->load->load_lab_index('labtech/index_v',$data);	









		}




		public function get_gx_perfomance(){


		   	$FacID = $this->FacID;
			
			 $query_str="SELECT 

							 sum(CASE WHEN Module_Name='A1' THEN 1 ELSE 0 END) as TA1,
							 sum(CASE WHEN Module_Name='A2' THEN 1 ELSE 0 END) as TA2,
							 sum(CASE WHEN Module_Name='A3' THEN 1 ELSE 0 END) as TA3,
							 sum(CASE WHEN Module_Name='A4' THEN 1 ELSE 0 END) as TA4,
							 sum(CASE WHEN Module_Name='A1' AND Test_Result='ERROR' THEN 1 ELSE 0 END) as EA1,
							 sum(CASE WHEN Module_Name='A2' AND Test_Result='ERROR' THEN 1 ELSE 0 END) as EA2,
							 sum(CASE WHEN Module_Name='A3' AND Test_Result='ERROR' THEN 1 ELSE 0 END) as EA3,
							 sum(CASE WHEN Module_Name='A4' AND Test_Result='ERROR' THEN 1 ELSE 0 END) as EA4,
							 sum(CASE WHEN Test_Result='ERROR' THEN 1 ELSE 0 END) as TotalError,
							 Instrument_SN as sn,
							 count(*) as tt


						 FROM sample1 where cond='1' and facility='$FacID'";	


		$result = $this->db->query($query_str)->result_array();

		if ($result) {
			
			$TA1=$result[0]['TA1'];
			$TA2=$result[0]['TA2'];
			$TA3=$result[0]['TA3'];
			$TA4=$result[0]['TA4'];
			$EA1=$result[0]['EA1'];
			$EA2=$result[0]['EA2'];
			$EA3=$result[0]['EA3'];
			$EA4=$result[0]['EA4'];
			$totalerror=$result[0]['TotalError'];
		}else{

			$TA1=0;
			$TA2=0;
			$TA3=0;
			$TA4=0;
			$EA1=0;
			$EA2=0;
			$EA3=0;
			$EA4=0;
			$totalerror=0;

		}
				
		return $TA1;
		return $TA2;
		return $TA3;
		return $TA4;
		return $EA1;
		return $EA2;
		return $EA3;
		return $EA4;
		return $totalerror;
			
			}

			public function get_totalrow_fac($currentmonth,$currentyear,$FacID){

			$query_str = "SELECT * FROM consumption WHERE MONTH(date)='$currentmonth' and  YEAR(date)='$currentyear' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$totalrow = $result;
			return $totalrow; 
			
		}	

			public function get_reportedpreviousmonth_fac($previousmonth,$currentyear,$FacID){

				$FacID = $this->FacID;

			$query_str = "SELECT * FROM consumption WHERE MONTH(date)='$previousmonth' and  YEAR(date)='$currentyear' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$reportedpreviousmonth = $result;
			return $reportedpreviousmonth; 
			
		}	

			public function get_catridges_fac($currentmonth,$currentyear,$FacID){

			$query_str = "SELECT (c.end_bal+c.allocated) AS cart FROM consumption c WHERE  c.facility='$FacID' ORDER BY c.date DESC LIMIT 1";

			$result = $this->db->query($query_str)->result_array();
			$catridges = $result[0]['cart'];
			return $catridges; 
			
		}	

			public function get_testsdonethismonth_fac($currentmonth,$currentyear,$FacID){

			$query_str = "SELECT * FROM sample1 WHERE MONTH(End_Time)='$currentmonth' and  YEAR(End_Time)='$currentyear' and cond=1 and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$testdonethismonth = count($result);
			return $testdonethismonth; 
			
		}	

			

			public function get_expdate_fac($currentmonth,$currentyear,$FacID){

			$query_str = "SELECT DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate FROM sample1 s WHERE s.facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$expdate = count($result);
			return $expdate; 
			
		}	


			public function get_remainingcarts_fac($currentmonth,$currentyear,$FacID){

				$this->x=$this->get_testsdonethismonth_fac($this->currentmonth,$this->currentyear,$this->FacID);
				$this->y=$this->get_catridges_fac($this->currentmonth,$this->currentyear,$this->FacID);

				
			$remainingcarts=$this->x-$this->y;

			return $remainingcarts;
			
		}	

///////////////////////////////////////////////////////////////////////////////////////////////////////
			public function get_complete_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=1 and Test_Result!='ERROR' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();
			$complete = count($result);
			
			return $complete; 
			
		}	

			public function get_notup_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=0 and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$notup = count($result);	
			
			return $notup; 
			
		}	

			public function get_errors_fac($FacID){

			$query_str = "SELECT * FROM sample1 WHERE Test_Result='ERROR' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$errors = count($result);
			
			return $errors; 
			
		}	

			public function get_todayswork_fac($dt,$FacID){

			$query_str = "SELECT * FROM sample1 WHERE cond=1 and coldate='$dt' and facility='$FacID'";

			$result = $this->db->query($query_str)->result_array();

			$todayswork = count($result); 
			
			return $todayswork; 
			
		}	






}