<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class overall extends MY_Controller {

    var $previousmonth;
    var $currentyear;
    var $tnat;
    var $tt;
    var $age;
    var $gender;
    var $hstatus;
    var $ptype;
    var $filter;
    var $displaymonth;
    var $displayfromdate;
    var $displaytodate;
    var $currentmonth;
    var $fromfilter;
    var $tofilter;
    var $fromdate;
    var $todate;
    var $title;
    var $total;
    var $mtb;
    var $neg;
    var $rif; 
    var $notb;
    var $totaltt;
    var $MTBpositive;
    var $MTBnegative;
    var $rifRes;   
    var $mwezi;
    var $mwaka; 
    var $mtbabove;
    var $mtbbelow;
    var $mtbbtwn;
    var $header_var;
    var $samp;
    var $submitform;
    var $returnable;

    
    


        function __construct() {
                parent::__construct();
                //$this->previousmonth= @date("m")- 1 ;
                //$this->currentyear= @date("Y");
                $this->total = $this->overall_logged();
                $this->mtb = $this->overall_logged();
                $this->notb = $this->overall_logged();
                $this->rif = $this->overall_logged();

                



                $this->header_var=$this->header_var($this->filter,$this->mwaka,$this->mwezi);


                $this->currentyear= $this->header_var['currentyear'];


                //$this->returnable=$this->header_var['returnable'];   	
                $this->displaymonth=$this->header_var['displaymonth'];   
                $this->mwaka=@$this->header_var['mwaka'];
                $this->currentmonth=@$this->header_var['currentmonth'];
                $this->mwezi=@$this->header_var['mwezi'];
                $this->filter=$this->header_var['filter'];
                $this->fromfilter=@$this->header_var['fromfilter'];
                $this->tofilter=@$this->header_var['tofilter'];
                $this->fromdate=@$this->header_var['fromdate'];
                $this->todate=@$this->header_var['todate'];
                $this->title=@$this->header_var['title'];
                $this->displaytodate=@$this->header_var['displaytodate'];
                $this->displayfromdate=@$this->header_var['displayfromdate'];
               
               

                // $this->totaltt = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
                // $this->MTBpositive = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
                // $this->MTBnegative = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
                // $this->rifRes = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;

                // $this->mtbabove = $this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
                // $this->mtbbtwn = $this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
                // $this->mtbbelow = $this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
              
                $this->tnat=$this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
                $this->tt= $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
                $this->age=$this->totalTestsByAge($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate); 
                $this->gender=$this->totalTestsByGender($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                $this->hstatus=$this->totalTestsByHStatus($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                $this->ptype=$this->totalTestsByPtype($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                 

            }



	public function index(){



		$data['category'] = $this->session->userdata('category');
        $data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');

        $data['maxY'] = $this->GetMaxYear();
        $data['minY'] = $this->GetMinYear();

        $data['total'] = $this->overall_logged();   
        $data['mtb'] = $this->overall_logged();
        $data['neg'] = $this->overall_logged();
        $data['rif'] = $this->overall_logged();

       
        $data['title'] = $this->title;
        $data['filter'] = $this->filter;
        $data['fromfilter'] = $this->fromfilter;
        $data['tofilter'] = $this->tofilter;
        $data['fromdate'] = $this->fromdate;
        $data['todate'] = $this->todate;
        $data['displaymonth'] = $this->displaymonth;
        $data['currentyear'] = $this->currentyear;
        $data['currentmonth'] = $this->currentmonth ; 
        $data['displaytodate'] = $this->displaytodate;
        $data['displayfromdate'] = $this->displayfromdate ;

        $data['returnable'] = $this->header_var();  




        $data['totaltt'] = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;   
        $data['MTBpositive'] = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
        $data['MTBnegative'] = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
        $data['rifRes'] = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
     
        $data['tnat'] = $this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
        $data['tt'] = $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
        $data['age'] = $this->totalTestsByAge($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate); 
        $data['gender'] = $this->totalTestsByGender($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
        $data['hstatus'] = $this->totalTestsByHStatus($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
        $data['ptype'] = $this->totalTestsByPtype($this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);


        // echo "<pre>";
        // print_r($data);die();


        $this->load->load_pm('template/body',$data);



	

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


    public function GetMaxMonthbasedonMaxYear()
    {
        // $month_name='';
        // $month_value=null;
        // $months=array(
        //           '1'=>'Jan',
        //           '2'=>'Feb',
        //           '3'=>'Mar',
        //           '4'=>'Apr',
        //           '5'=>'May',
        //           '6'=>'Jun',
        //           '7'=>'Jul',
        //           '8'=>'Aug',
        //           '9'=>'Sep',
        //           '10'=>'Oct',
        //           '11'=>'Nov',
        //           '12'=>'Dec'
        //           );

        // //get max month
        // $sql="SELECT month(max(End_Time)) AS maxmonth FROM sample1 1";
        // $query=$this->db->query($sql);
        // $results=$query->result_array();
        
        // if($results){
        //     $month_value= $results[0]['maxmonth'];
        //     $month_name=$months[$month_value];
        // }
        // return $month_name;
    
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

       public function GetMonthName($month)
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






    public function overall_logged(){
            


            $query_str="SELECT fac, total,mtb,neg,rif,ind,errs
FROM(
SELECT 

COUNT(DISTINCT facility) AS fac,

sum(CASE WHEN cond='1' THEN 1 ELSE 0 END) as total,

sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,

sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,

sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,

sum( CASE WHEN mtbRif = 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,  

sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' THEN 1 ELSE 0 END ) AS errs  
FROM sample1 where cond=1)x" ;    

    // var_dump($query_str);
    // die();

     $result = $this->db->query($query_str)->result_array();
     if( $result){
        $this->fac=$result[0]['fac'];
        $this->total=$result[0]['total'];
        $this->mtb=$result[0]['mtb'];
        $this->notb=$result[0]['neg'];
        $this->rif=$result[0]['rif'];
        $this->ind=$result[0]['ind'];
        $this->errs=$result[0]['errs'];
     }

    
     
       return $this->fac;
       return $this->total;
       return $this->mtb;
       return $this->notb;
       return $this->rif;
       return $this->ind;
       return $this->errs;
            }   
            


   public function totalTestsNational($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate) 
{

// echo "<pre/>";  
//  print_r($filter) ;
//  print_r($currentmonth) ;

//  print_r($currentyear) ;
//  die();
// // print_r($fromfilter) ;
// // print_r($tofilter) ;
// // print_r($fromdate) ;
// // print_r($todate) ;
// die();
// $filter = $returnable["filter"];
 //$currentmonth = $returnable["currentmonth"];
// $currentyear = $returnable["currentyear"];
// echo "<pre/>";
// //print_r($filter);
// print_r($currentmonth) ;
// print_r($currentyear) ;
// print_r($fromfilter) ;
// print_r($tofilter) ;
// print_r($fromdate) ;
// print_r($todate) ;
//die();

if ($filter==0) //last submission
      {
      $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,
sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err 
FROM sample1 WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
      $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err  
FROM sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
          $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err
FROM sample1 WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
       $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err  
FROM sample1 WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
     $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err  
FROM sample1 WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
          $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err
FROM sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
      elseif ($filter==8) //all
      {
          $query_str="SELECT sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

sum( CASE WHEN ( age Between 1 AND 5 ) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbbelow,
sum( CASE WHEN  (age Between 1 AND 5) AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbelow,
sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) as totalbtwn,
sum( CASE WHEN  (age Between 6 AND 15) AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbbtwn,
sum( CASE WHEN (age Between 6 AND 15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifbtwn,
sum(CASE WHEN (age>15) THEN 1 ELSE 0 END) as totalabove,
sum( CASE WHEN (age>15) AND  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbabove,
sum( CASE WHEN  (age>15) AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifabove,
sum(CASE WHEN (gender='Male') THEN 1 ELSE 0 END) as totalMale,
sum( CASE WHEN (gender='Male') AND  (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbMale,
sum( CASE WHEN (gender='Male') AND  (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifMale,
sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) as totalFemale,
sum( CASE WHEN (gender='Female') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFemale,
sum( CASE WHEN (gender='Female') AND    (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifFemale,
sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) as totalNotsp,
sum( CASE WHEN (gender='Not specified') AND   (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNotsp,
sum( CASE WHEN (gender='Not specified') AND   (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNotsp,  
sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) as totalPos,
sum( CASE WHEN (h_status='Positive') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbPos,
sum( CASE WHEN (h_status='Positive') and   (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifPos, 
sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) as totalNeg,
sum( CASE WHEN (h_status='Negative') and  (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNeg,
sum( CASE WHEN (h_status='Negative') and  (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifNeg,  
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') OR h_status='Declined' THEN 1 ELSE 0 END) as totalNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and (Test_Result = 'positive') THEN 1 ELSE 0 END ) AS mtbNA,
sum( CASE WHEN (h_status='Not Done' OR h_status='Declined') and  (mtbRif = 'positive')   THEN 1 ELSE 0 END ) AS rifNA,
sum(CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum(CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum(CASE WHEN pat_type='Return after defaulting' THEN 1 ELSE 0 END) as totalReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum(CASE WHEN pat_type='Failure 1-st line treatment' THEN 1 ELSE 0 END) as totalFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN pat_type='Failure re-treatment' THEN 1 ELSE 0 END) as totalFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum(CASE WHEN pat_type='New Patients' THEN 1 ELSE 0 END) as totalNP,
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum(CASE WHEN pat_type='New case PTB' THEN 1 ELSE 0 END) as totalNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum(CASE WHEN pat_type='MDR TB Contact' THEN 1 ELSE 0 END) as totalContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum(CASE WHEN pat_type='Refugees SS+ve' THEN 1 ELSE 0 END) as totalRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum(CASE WHEN pat_type='HCWs' THEN 1 ELSE 0 END) as totalHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum(CASE WHEN pat_type='Hiv(+) & Smear(-)' THEN 1 ELSE 0 END) as totalHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear,
sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid' OR Test_Result = 'Indeterminate' THEN 1 ELSE 0 END ) AS err 
FROM sample1 WHERE cond='1'  ";
      }

$result = $this->db->query($query_str)->result_array();

// echo "<pre/>";
// print_r($query_str);
// die();


if( $result){
  $this->tnat=$result[0];
}else{
  $this->tnat = array();
}


//echo json_encode($this->tnat);
return $this->tnat;



 
}


public function totalTestsByOutcome($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate){

    // $query_str=null;

    // echo '<pre>';
    // print_r($filter);
    // die();
// $filter = $returnable["filter"];
// $currentmonth =$returnable["currentmonth"];
// $currentyear =$returnable["currentyear"];
// $fromfilter =$returnable["fromfilter"];
// $tofilter =$returnable["tofilter"];
// $fromdate =$returnable["fromdate"];
// $todate =$returnable["todate"];

if ($filter==0) //last submission
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err   
       FROM  sample1 WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err    
       FROM  sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
          $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err  
       FROM  sample1 WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err   
       FROM  sample1 WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err    
       FROM  sample1 WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err    
       FROM  sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
        elseif ($filter==8) //all
      {
       $query_str="SELECT COUNT(DISTINCT facility) AS fac, count(CASE WHEN cond='1' THEN 1 ELSE 0 END) AS totaltt,
       sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS MTBpositive,
       sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) AS MTBnegative,
       sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,
       sum( CASE WHEN mtbRif= 'Indeterminate' THEN 1 ELSE 0 END ) AS ind,
       sum( CASE WHEN Test_Result = 'ERROR' OR Test_Result = 'Invalid'  THEN 1 ELSE 0 END ) AS err    
       FROM  sample1 WHERE cond='1'  ";
      }

      // var_dump($query_str) ;
      // die();
                                     

        $result = $this->db->query($query_str)->result_array();

        // var_dump($result);
        // die();
            
        // $this->tt = $result;    

        // return $this->tt;
                                    
if( $result){
    $this->fac=$result[0]['fac'];
    $this->totaltt=$result[0]['totaltt'];
    $this->MTBpositive=$result[0]['MTBpositive'];
    $this->MTBnegative=$result[0]['MTBnegative'];
    $this->rifRes=$result[0]['rif'];
    $this->ind=$result[0]['ind'];
    $this->err=$result[0]['err'];
 }
else{
    $this->fac=0;
    $this->totaltt=0;
    $this->MTBpositive=0;
    $this->MTBnegative=0;
    $this->rifRes=0;
    $this->ind=0;
    $this->err=0;

}
 
   return $this->fac;     
   return $this->totaltt;
   return $this->MTBpositive;
   return $this->MTBnegative;
   return $this->rifRes;
   return $this->ind;
   return $this->err;

}


public function totalTestsByAge($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate){


	// $filter = $returnable["filter"];
	// $currentmonth =$returnable["currentmonth"];
	// $currentyear =$returnable["currentyear"];
	// $fromfilter =$returnable["fromfilter"];
	// $tofilter =$returnable["tofilter"];
	// $fromdate =$returnable["fromdate"];
	// $todate =$returnable["todate"];

    if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      } elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAbove,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwn,sum(CASE WHEN age Between 0 AND 5 THEN 1 ELSE 0 END) AS ageBelow
              FROM  sample1  WHERE cond='1'  ";
      }



        $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->ageAbove=count($result[0]['ageAbove']);
            $this->ageBtwn=count($result[0]['ageBtwn']);
            $this->ageBelow=count($result[0]['ageBelow']);

        }
        else{
            $this->ageAbove=0;
            $this->ageBtwn=0;
            $this->ageBelow=0;
            
            }
            return $this->ageAbove;
            return $this->ageBtwn;
            return $this->ageBelow;    








}

public function totalTestsByGender($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
{

	// $filter = $returnable["filter"];
	// $currentmonth =$returnable["currentmonth"];
	// $currentyear =$returnable["currentyear"];
	// $fromfilter =$returnable["fromfilter"];
	// $tofilter =$returnable["tofilter"];
	// $fromdate =$returnable["fromdate"];
	// $todate =$returnable["todate"];


    if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
         elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS male,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS female ,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSp

              FROM  sample1  WHERE cond='1'  ";
      }


 
        $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->male=count($result[0]['male']);
            $this->female=count($result[0]['female']);
            $this->notSp=count($result[0]['notSp']);

        }
        else{
            $this->male=0;
            $this->female=0;
            $this->notSp=0;
            
            }
            return $this->male;
            return $this->female;
            return $this->notSp;    





}




public function totalTestsByHStatus($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
      {

  //     	$filter = $returnable["filter"];
		// $currentmonth =$returnable["currentmonth"];
		// $currentyear =$returnable["currentyear"];
		// $fromfilter =$returnable["fromfilter"];
		// $tofilter =$returnable["tofilter"];
		// $fromdate =$returnable["fromdate"];
		// $todate =$returnable["todate"];

      if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
      elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPos,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNeg,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTest


              FROM  sample1  WHERE cond='1'  ";
      }


        $result = $this->db->query($query_str)->result_array();


        // if( $result){
        //               $this->hstatus=$result[0];
        //             }else{
        //               $this->hstatus = array();
        //             }



        //             return $this->hstatus;

         if($result)
        {

            $this->hstatusPos=count($result[0]['hstatusPos']);
            $this->hstatusNeg=count($result[0]['hstatusNeg']);
            $this->hstatusNoTest=count($result[0]['hstatusNoTest']);

        }
        else{
            $this->hstatusPos=0;
            $this->hstatusNeg=0;
            $this->hstatusNoTest=0;
            
            }
            return $this->hstatusPos;
            return $this->hstatusNeg;
            return $this->hstatusNoTest;    

       
}


public function totalTestsByPtype($filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
{

	// $filter = $returnable["filter"];
	// $currentmonth =$returnable["currentmonth"];
	// $currentyear =$returnable["currentyear"];
	// $fromfilter =$returnable["fromfilter"];
	// $tofilter =$returnable["tofilter"];
	// $fromdate =$returnable["fromdate"];
	// $todate =$returnable["todate"];
if ($filter==0) //last submission
      {
      $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1  WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
         elseif ($filter==8) //all
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumneg,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumneg,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturn,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturn,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailure,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailure,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRt,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRt,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNP,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNP,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcase,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcase,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContact,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContact,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRef,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRef,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWs,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWs,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmear,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmear  
FROM sample1 WHERE cond='1'  ";
    }
// var_dump($query_str);
// die();



        $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->mtbsputumpos=count($result[0]['mtbsputumpos']);
            $this->rifsputumpos=count($result[0]['rifsputumpos']);
            $this->mtbsputumneg=count($result[0]['mtbsputumneg']);
            $this->rifsputumneg=count($result[0]['rifsputumneg']);
            $this->mtbReturn=count($result[0]['mtbReturn']);
            $this->rifReturn=count($result[0]['rifReturn']);
            $this->mtbFailure=count($result[0]['mtbFailure']);
            $this->rifFailure=count($result[0]['rifFailure']);
            $this->mtbFailureRt=count($result[0]['mtbFailureRt']);
            $this->rifFailureRt=count($result[0]['rifFailureRt']);
            $this->mtbNP=count($result[0]['mtbNP']);
            $this->rifNP=count($result[0]['rifNP']);
            $this->mtbNewcase=count($result[0]['mtbNewcase']);
            $this->rifNewcase=count($result[0]['rifNewcase']);
            $this->mtbContact=count($result[0]['mtbContact']);
            $this->rifContact=count($result[0]['rifContact']);
            $this->mtbRef=count($result[0]['mtbRef']);
            $this->rifRef=count($result[0]['rifRef']);
            $this->mtbHCWs=count($result[0]['mtbHCWs']);
            $this->rifHCWs=count($result[0]['rifHCWs']);
            $this->mtbHivSmear=count($result[0]['mtbHivSmear']);
            $this->rifHivSmear=count($result[0]['rifHivSmear']);

        }
        else{
            $this->mtbsputumpos=0;
            $this->rifsputumpos=0;
            $this->mtbsputumneg=0;
            $this->rifsputumneg=0;
            $this->mtbReturn=0;
            $this->rifReturn=0;
            $this->mtbFailure=0;
            $this->rifFailure=0;
            $this->mtbFailureRt=0;
            $this->rifFailureRt=0;
            $this->mtbNP=0;
            $this->rifNP=0;
            $this->mtbNewcase=0;
            $this->rifNewcase=0;
            $this->mtbContact=0;
            $this->rifContact=0;
            $this->mtbRef=0;
            $this->rifRef=0;
            $this->mtbHCWs=0;
            $this->rifHCWs=0;
            $this->mtbHivSmear=0;
            $this->rifHivSmear=0;
            
            }
            return $this->mtbsputumpos;
            return $this->rifsputumpos;
            return $this->mtbsputumneg;
            return $this->rifsputumneg;
            return $this->mtbReturn;
            return $this->rifReturn;
            return $this->mtbFailure;
            return $this->rifFailure;
            return $this->mtbFailureRt;
            return $this->rifFailureRt;
            return $this->mtbNP;
            return $this->rifNP;
            return $this->mtbNewcase;
            return $this->rifNewcase;
            return $this->mtbContact;
            return $this->rifContact;
            return $this->mtbRef;
            return $this->rifRef;
            return $this->mtbHCWs;
            return $this->rifHCWs;
            return $this->mtbHivSmear;
            return $this->rifHivSmear;






}


public function GetMaxYear(){
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


public function GetMinYear()
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

public function filter_data()
{
    echo $data;
    echo "Its me";
}


}





