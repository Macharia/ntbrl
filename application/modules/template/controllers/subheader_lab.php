<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class subheader_lab extends MY_Controller {


    var $FacID;
    // var $comlete;
    // var $notup;
    // var $errors;
    // var $todayswork;
    // var $dt;
    // var $todaysdate;

	function __construct() {


		parent::__construct();

        $this->load->library('session');

            if($this->session->userdata('mfl')) {

              $this->FacID = $this->session->userdata('mfl');
                
            }
            // $this->dt=@date("d-M-Y");
            // $currentmonth=@date("m");
            // $currentyear=@date("Y");
            // $previousmonth=@date("m")- 1;
            // $displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
            // $this->todaysdate=@strtotime(@date("Y-m-d"));

    // $this->complete = $this->get_complete_fac($this->FacID);
     //$this->notup = $this->get_notup_fac($this->FacID);
     //$this->errors = $this->get_errors_fac($this->FacID);
     //$this->todayswork = $this->get_todayswork_fac($this->dt,$this->FacID);       


	}

public function index(){
			
			$this->subheader_lab();
			
			
			
		}

		public function subheader_lab(){


			$countyID = $_POST['id'];

            $this->load->library('session');

            if($this->session->userdata('mfl')) {

              $FacID = $this->session->userdata('mfl');
                
            }

            $dt=@date("d-M-Y");
            $currentmonth=@date("m");
            $currentyear=@date("Y");
            $previousmonth=@date("m")- 1;
            $displayDate=@strtotime(@date("Y-m-d", lastDateOfMonth($currentmonth)))."<br>";
            $todaysdate=@strtotime(@date("Y-m-d"));



			$data['testdonethismonth'] = $this->get_testsdonethismonth_fac($currentmonth,$currentyear,$FacID);
            $data['expdate'] = $this->get_expdate_fac($currentmonth,$currentyear,$FacID);
            $data['totalrow'] = $this->get_totalrow_fac($currentmonth,$currentyear,$FacID);
            $data['reportedpreviousmonth'] = $this->get_reportedpreviousmonth_fac($currentmonth,$currentyear,$FacID);
            $data['catridges'] = $this->get_catridges_fac($currentmonth,$currentyear,$FacID);
        
			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

            $data['complete'] = $this->get_complete_fac($FacID);
            $data['notup'] = $this->get_notup_fac($FacID);
            $data['errors'] = $this->get_errors_fac($FacID);
            $data['todayswork'] = $this->get_todayswork_fac($dt,$FacID);
            $data['todaysdate'] = $this->todaysdate;
            $data['displayDate'] = $this->displayDate;
        	



			$this->load->load_header('subheader_lab_v',$data);	









		}


		 public function get_max_month_based_on_max_year()
    {
        
    
    $query_str ="SELECT month(max(End_Time)) AS maxmonth FROM sample1";
    $result = $this->db->query($query_str)->result_array();
    $getmaxyear = $result;
    $showyear = $getmaxyear[0]['maxmonth'];

    if ($showyear !='')
    {
    }
    else
    {
    $showyear=date('m');
    }



return $showyear;
}

		public function get_max_year(){
    $query_str = "SELECT max(year(End_Time)) AS maximumyear 
                  FROM sample1 ";
    $result = $this->db->query($query_str)->result_array();
    if($result){
        $maximumyear = $result[0]['maximumyear'];
    }else{
        $showyear=date('Y');
    }
   return $maximumyear;
}


public function get_min_year()
{
    

    $query_str = "SELECT MIN(year(End_Time)) AS minimumyear FROM sample1  ";
    $result = $this->db->query($query_str)->result_array();

    if($result){
        $minimumyear = $result[0]['minimumyear'];
        // var_dump($minimumyear);
        // die();
    }else{
        $showyear=date('Y');
    }
   return $minimumyear;
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


public function header_var(){


        $displaymonth = null;  
        $fromdate = null;
        $displayfromdate = null;
        $displaytodate = null;
        $todate = null;
        $tofilter = null;
        $fromfilter = null;
        //echo json_encode('ok');die();

        if (isset($_GET['year']))
        {
            $mwaka = $_GET['year'];
        }
        
        if (isset($_GET['mwezi']))
        {
            $mwezi = $_GET['mwezi'];
        }
        


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
                $displaytodate = @date("d-M-Y", strtotime($todate));
                $title = "Last 6 Months";
                $currentmonth = @date("m");
                $currentyear = @date("Y");
                $colspan = 6;
                $mapwidth = 540;
            } elseif (($filter == 0)||(!isset($_GET['filter'])))//last submission

            {
                

                // $filter = 0;
                $colspan = 6;
                $mapwidth = 540;
                $currentmonth = $this->GetMaxMonthbasedonMaxYear();

                // echo $currentmonth;
                // die();
                
                $displaymonth = $this->GetMonthName($currentmonth);
                //$currentyear = $this->GetMaxYear($mwaka);
                $currentyear = $this->GetMaxYear();
                $title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;
                


                //get current month and year


            } elseif ($filter == 3)//month/year
            {
                $displaymonth =$this->GetMonthName($mwezi);
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
                $currentmonth = $this->GetMaxMonthbasedonMaxYear();
                $currentyear = $this->GetMaxYear();
                $displaymonth = $this->GetMonthName($currentmonth);
                $minyear = $this->GetMinYear();
                $title = "Cumulative Data : " . $minyear . ' to ' . $displaymonth . ' - ' . $currentyear;
                
            }
        } else {
                //echo json_encode($_POST['myform']);
            if (isset($_POST['myform'])){
                // print_r($_POST);die;
                // $data["from"] = $_POST['fromfilter'];
                // $data["to"] = $_POST['tofilter'];
                //$data["filter"] = $_POST['filter'];
            //     echo json_encode($data);
            // die();
                // echo "<pre>";
                // print_r($formfilter);die();
                
                $filter = 2;
                $fromfilter = $_POST['fromfilter'];
               
                $tofilter = $_POST['tofilter'];
                $mwaka = substr($fromfilter, 0,4);
                $mwezi = substr($fromfilter, 5,2);
                $displaymonth = $this->GetMonthName($mwezi);
              
               // $tofilter = $_GET['tofilter'];
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
                        $displaymonth = $this->GetMonthName($mwezi);
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

                    $currentmonth = $this->GetMaxMonthbasedonMaxYear();
                    $displaymonth = $this->GetMonthName($currentmonth);

                    $currentyear = $this->GetMaxYear();
                    $title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;
                }
            }    
            
        }
        
        $returnable = array('filter'=>$filter,
                            'currentmonth'=>$currentmonth,
                            'currentyear'=>$currentyear,
                            'title'=>$title,
                            'displaymonth'=>$displaymonth,
                            'todate'=>$todate,
                            'fromdate'=>$fromdate,
                            'displayfromdate'=>$displayfromdate,
                            'displaytodate'=>$displaytodate,
                            'tofilter'=>$tofilter,
                            'fromfilter'=>$fromfilter
                            );

					// var_dump($returnable);
					// die();
       
         if (isset($_POST['myform'])){
         	 echo json_encode($returnable);
            die();
   		 }else{
   		 	return  $returnable;
   		 }

                    

}

public function last_date_of_month($Month, $Year=-1) {
    if ($Year < 0) $Year = 0+@date("Y");
    $aMonth = @mktime(0, 0, 0, $Month, 1, $Year);
    $NumOfDay = 0+@date("t", $aMonth);
    $LastDayOfMonth = @mktime(0, 0, 0, $Month, $NumOfDay, $Year);
    return $LastDayOfMonth;
}

public function get_complete_fac($FacID){

            $query_str = "SELECT * FROM sample1 WHERE cond=1 and Test_Result!='ERROR' and facility='$FacID'";

            $result = $this->db->query($query_str)->result_array();
            $this->complete = count($result);
            
            return $this->complete; 
            
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





            public function get_totalrow_fac($currentmonth,$currentyear,$FacID){

            $query_str = "SELECT * FROM consumption WHERE MONTH(date)='$currentmonth' and  YEAR(date)='$currentyear' and facility='$FacID'";

            $result = $this->db->query($query_str)->result_array();
            $totalrow = $result;
            return $totalrow; 
            
        }   

            public function get_reportedpreviousmonth_fac($previousmonth,$currentyear,$FacID){

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
            $testdonethismonth = $result;
            return $testdonethismonth; 
            
        }   

            

            public function get_expdate_fac($currentmonth,$currentyear,$FacID){

            $query_str = "SELECT DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate FROM sample1 s WHERE s.facility='$FacID'";

            $result = $this->db->query($query_str)->result_array();
            $expdate = $result;
            return $expdate; 
            
        }   


            public function get_remainingcarts_fac($currentmonth,$currentyear,$FacID){

                $x=$this->get_catridges_fac($currentmonth,$currentyear,$FacID);
                $y=$this->get_testsdonethismonth_fac($currentmonth,$currentyear,$FacID);

                echo $x;
                die();
            $remainingcarts=$x-$y;

            return $remainingcarts;
            
        }   



}