<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class pendings extends MY_Controller {

	var $FacID;
	var $countyID;
	var $cname;
	var $maxY;
	var $minY;
	
	function __construct() {




		parent::__construct();

			$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}


			
	}

public function index(){
			
			$this->pendings_lab();
			
			
			
		}

		public function pendings_lab(){


            $this->load->library('session');

            if($this->session->userdata('mfl')) {

              $FacID = $this->session->userdata('mfl');
                
            }
			
			


			

			$dt=@date("d-M-Y");
            $currentmonth=@date("m");
            $data['currentyear']=@date("Y");
            $data['previousmonth']=@date("m")- 1;
            //$displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
            $todaysdate=@strtotime(@date("Y-m-d"));

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
			
			$data['previousmonthname']=$this->get_month_name($previousmonth);
			//$submittedstatus=GetProcurementReportStatus($previousmonth,$currentyear,$userlab);
			//get month names from ID
			

			$data['reportedpreviousmonth'] = $this->get_reportedpreviousmonth_fac($currentmonth,$currentyear,$FacID);

			$data['complete'] = $this->get_complete_fac($FacID);
			$data['notup'] = $this->get_notup_fac($FacID);
			$data['errors'] = $this->get_errors_fac($FacID);
			$data['todayswork'] = $this->get_todayswork_fac($dt,$FacID);

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	
		

			$this->load->load_lab_pendings('labtech/pendings_v',$data);	


		}



		public function get_month_name($month)
        {
         
         $monthname="";
         if ($month==1)
         {
             $monthname=" Jan ";
         }
        else if ($month==2)
         {
             $monthname=" Feb ";
         }else if ($month==3)
         {
             $monthname=" Mar ";
         }else if ($month==4)
         {
             $monthname=" Apr ";
         }else if ($month==5)
         {
             $monthname=" May ";
         }else if ($month==6)
         {
             $monthname=" Jun ";
         }else if ($month==7)
         {
             $monthname=" Jul ";
         }else if ($month==8)
         {
             $monthname=" Aug ";
         }else if ($month==9)
         {
             $monthname=" Sep ";
         }else if ($month==10)
         {
             $monthname=" Oct ";
         }else if ($month==11)
         {
             $monthname=" Nov ";
         }
          else if ($month==12)
         {
             $monthname=" Dec ";
         }
          else if ($month==13)
         {
             $monthname=" Jan - Sep  ";
         }
        return $monthname;

        }
	
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


			public function get_reportedpreviousmonth_fac($previousmonth,$currentyear,$FacID){

            $query_str = "SELECT * FROM consumption WHERE MONTH(date)='$previousmonth' and  YEAR(date)='$currentyear' and facility='$FacID'";

            $result = $this->db->query($query_str)->result_array();
            $reportedpreviousmonth = $result;
            return $reportedpreviousmonth; 
            
        }   

		



}