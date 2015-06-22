<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class submitconsumptionreport extends MY_Controller {

	var $FacID;
	var $countyID;
	var $cname;
	var $maxY;
	var $minY;
	
	function __construct() {




		parent::__construct();

			// $this->load->library('session');

			// if($this->session->userdata('mfl')) {

			//   $this->FacID = $this->session->userdata('mfl');
				
			// }


			
	}

public function index(){
			
			$this->submitconsumptionreport_lab();
			
			
			
		}

		public function submitconsumptionreport_lab(){


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
                $recordyear=@date("Y")-1;
                }
            else
                {
                $previousmonth=@date("m")- 1;
                $recordyear=@date("Y");
                }
            
            $data['previousmonthname']=$this->get_month_name($previousmonth);
            //$submittedstatus=GetProcurementReportStatus($previousmonth,$currentyear,$userlab);
            //get month names from ID
            

            $data['reportedpreviousmonth'] = $this->get_reportedpreviousmonth_fac($currentmonth,$recordyear,$FacID);
            $data['vtotaltest'] = $this->get_total_tests($previousmonth,$recordyear,$FacID);
            $data['beginningbalc'] = $this->get_beginningbal_c($previousmonth,$recordyear,$FacID);
			
            $data['FacID'] = $this->session->userdata('mfl');
			$data['complete'] = $this->get_complete_fac($FacID);
			$data['notup'] = $this->get_notup_fac($FacID);
			$data['errors'] = $this->get_errors_fac($FacID);
			$data['todayswork'] = $this->get_todayswork_fac($dt,$FacID);

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	
		

			$this->load->load_lab_submitconsumptionreport('labtech/submitconsumptionreport_v',$data);	


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

	  
        public function get_reportedpreviousmonth_fac($previousmonth,$recordyear,$FacID){

            $query_str = "SELECT * FROM consumption WHERE MONTH(date)='$previousmonth' and  YEAR(date)='$recordyear' and facility='$FacID'";

            $result = $this->db->query($query_str)->result_array();
            $reportedpreviousmonth = $result;
            return $reportedpreviousmonth; 
            
        }   
		
         public function get_total_tests($previousmonth,$recordyear,$FacID){

            $query_str = "SELECT * FROM sample1 WHERE MONTH(End_Time)='$previousmonth' AND YEAR(End_Time)='$recordyear' AND cond=1 and facility=".$this->session->userdata('mfl');

            $result = $this->db->query($query_str)->result_array();
            $vtotaltest = count($result);
            
            return $vtotaltest; 
            
        }

        public function get_beginningbal_c($previousmonth,$recordyear,$FacID){

            $query_str = "SELECT end_bal as ebal FROM consumption WHERE commodity='cartridge' and MONTH(date)='$previousmonth' AND YEAR(date)='$recordyear' and facility=".$this->session->userdata('mfl');

            $result = $this->db->query($query_str)->result_array();
            $beginningbalc = count($result);
            
            return $beginningbalc; 
            
        }

        public function get_beginningbal_f($previousmonth,$recordyear,$FacID){

            $query_str = "SELECT end_bal as ebal FROM consumption WHERE commodity='Falcon tubes' and MONTH(date)='$previousmonth' AND YEAR(date)='$recordyear' and facility=".$this->session->userdata('mfl');

            $result = $this->db->query($query_str)->result_array();
            $beginningbalc = count($result);
            
            return $beginningbalc; 
            
        }


        public function get_upload_submission(){

            if (isset($_POST["submitreport"])) {
                

                $query_str = "INSERT INTO consumption (`facility`,`commodity` ,`b_bal` ,`quantity` ,`quantity_used` ,`losses` ,`pos` ,`neg` ,`end_bal` ,`q_req` ,`comments`, `status`,`date`  ) VALUES (
                                                    '$_POST[mfl]',
                                                    '$_POST[commodity]',
                                                    '$_POST[oqualkit]',
                                                    '$_POST[recqualkit]',
                                                    '$_POST[uqualkit]',
                                                    '$_POST[wqualkit]',
                                                    '$_POST[pqualkit]',
                                                    '$_POST[iqualkit]',
                                                    '$_POST[equalkit]',
                                                    '$_POST[rqualkit]',
                                                    '$_POST[comments]',
                                                    '0','$reportingdate'),
                                                    ('$_POST[mfl]',
                                                    '$_POST[commodity1]',
                                                    '$_POST[oqualkit1]',
                                                    '$_POST[recqualkit1]',
                                                    '$_POST[uqualkit1]',
                                                    '$_POST[wqualkit1]',
                                                    '$_POST[pqualkit1]',
                                                    '$_POST[iqualkit1]',
                                                    '$_POST[equalkit1]',
                                                    '$_POST[rqualkit1]',
                                                    '$_POST[comments1]',
                                                    '0','$reportingdate')";


                $result = $this->db->query($query_str);

                $retval = $result;

                if (! $retval) {

                $this->session->set_flashdata('error_message', TRUE);
                    
                    redirect('labtech/submitconsumptionreport');  
                    
                }else{


                $this->session->set_flashdata('success_message', TRUE);
                    
                    redirect('labtech/submitconsumptionreport');

                }
                    }
                }


}