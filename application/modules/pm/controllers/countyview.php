<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class countyview extends MY_Controller {
	
	var $ttc;
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
    var $temp_var;
    var $r;
    var $rs;
    var $countyname;
    var $TTC;
    var $countyID;
    var $D;
    var $errormsg;

    			function __construct() {
               			 parent::__construct();

               			 	$this->countyId = $this->input->post('id',TRUE);
                            //$this->countyID = $this->input->post('id',TRUE);
               
			                //$this->previousmonth= @date("m")- 1 ;
			                //$this->currentyear= @date("Y");
			                $this->total = $this->overall_logged();
			                $this->mtb = $this->overall_logged();
			                $this->notb = $this->overall_logged();
			                $this->rif = $this->overall_logged();

			                



			                $this->r= $this->get_r($this->countyId);
			                $this->countyname= $this->get_countyname($this->countyId);
			                $this->rs= $this->get_rs($this->countyId);



			                $this->header_var=$this->header_var($this->filter,$this->mwaka,$this->mwezi);


			                $this->currentyear= $this->header_var['currentyear'];



			                $this->displaymonth=$this->header_var['displaymonth'];   
			                $this->mwaka=@$this->header_var['mwaka'];
			                $this->mwezi=@$this->header_var['mwezi'];
			                $this->filter=$this->header_var['filter'];
			                $this->fromfilter=@$this->header_var['fromfilter'];
			                $this->tofilter=@$this->header_var['tofilter'];
			                $this->fromdate=@$this->header_var['fromdate'];
			                $this->todate=@$this->header_var['todate'];
			                $this->title=@$this->header_var['title'];
                            $this->currentmonth=@$this->header_var['currentmonth'];
    
			                $this->TTC=$this->totalTestsCountyWise($this->countyID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
                            //$this->tnat=$this->totalTestsNational($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
                            //$this->tt= $this->totalTestsByOutcome($this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
                            $this->age=$this->totalTestsPerCountyByAge($this->countyID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate); 
                            $this->gender=$this->totalTestsPerCountyByGender($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                            $this->hstatus=$this->totalTestsPerCountyByHStatus($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                            $this->ptype=$this->totalTestsPerCountyByPtype($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
                             


			            }

	public function index($id){
        
		$this->countyview_(null,null,null,$id);



	}
    public function _remap($id){
        
        $this->index($id);



    }
    public function do_session_check(){

        if ($this->is_logged_in()) {
            
            redirect('pm/countyview');

        }else{

           $this->load->view('login/login');
        }
    }

	public function countyview_($mwaka=null,$mwezi=null,$filter=null,$id=null){
        //$countyID = $this->input->get('id',TRUE);
         if (isset($_GET['id'])) {
                
                $countyId =$_GET['id'];
            }

		
		$data['category'] = $this->session->userdata('category');
        $data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');

        $data['minY'] = $this->GetMaxYear();
        $data['maxY'] = $this->GetMinYear();

        $data['rs'] = $this->get_rs($this->countyId);
        $data['r'] = $this->get_r($this->countyId);
        $data['countyname'] = $this->get_countyname($this->countyId);


        $data['total'] = $this->overall_logged();   
        $data['mtb'] = $this->overall_logged();
        $data['neg'] = $this->overall_logged();
        $data['rif'] = $this->overall_logged();

        $data['countyID'] = $countyId;
        $data['title'] = $this->title;
        $data['filter'] = $this->filter;
        $data['fromfilter'] = $this->fromfilter;
        $data['tofilter'] = $this->tofilter;
        $data['fromdate'] = $this->fromdate;
        $data['todate'] = $this->todate;
        $data['displaymonth'] = $this->displaymonth;
        $data['currentyear'] = $this->currentyear;
        $data['currentmonth'] = $this->currentmonth;

        $data['tt'] = $this->totalTestsCountyWise($this->countyID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate) ;
        $data['age'] = $this->totalTestsPerCountyByAge($this->countyID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate); 
        $data['gender'] = $this->totalTestsPerCountyByGender($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
        $data['hstatus'] = $this->totalTestsPerCountyByHStatus($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);
        $data['ptype'] = $this->totalTestsPerCountyByPtype($this->countyID,$this->filter, $this->currentmonth, $this->currentyear, $this->fromfilter, $this->tofilter, $this->fromdate, $this->todate);




		$this->load->load_countyview('countyview_v',$data);	
	}



       public function header_var(){


        $displaymonth = null;  
        $fromdate = null;
        $displayfromdate = null;
        $displaytodate = null;
        $todate = null;
        $tofilter = null;
        $fromfilter = null;

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




	public function get_countyname($countyId)
	{

        $countyID = $countyId;

		$countyID = $this->input->get('id');
        $countyname = null;
        
		$query_str=" SELECT name 
		AS cN 
		FROM countys 
		WHERE ID ='$countyID' "
		;

		$result = $this->db->query($query_str)->result_array();

		foreach ($result as $value) {



			$this->countyname=$value['cN'];


			


		}


		return $this->countyname;

        // echo $this->countyname;
        // die();





	}



	public function get_rs($countyId)
	{

        $countyID = $countyId;
        $countyID = $this->input->get('id');
        //$countyID = $this->input->post('id',TRUE); 


		$query_str="SELECT County,total
		FROM(
			SELECT 
			countys.name AS County,
			count(*) as total
			FROM sample
			LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
			LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
			LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
			LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
			WHERE `countys`.`ID` ='$countyID'
			Group by County
			)x";

$result = $this->db->query($query_str)->result_array();

$this->rs = $result;

if(($this->rs)==0)
{
	$this->errormsg= 'There are no tests done in ' .$this->countyname. ' County';
}
else{

    return $this->rs;
}


}

public function get_r($countyId)
{
     

     $countyID = $countyId;
     $countyID = $this->input->get('id');

        
   // $countyID = $this->input->post('id',TRUE);    
	$query_str="SELECT 
	`section3`.`facility` AS a,
	`facilitys`.`name` AS b, 
	`districts`.`name` AS c,
	section3.make AS d,
	`countys`.`name` as e
	FROM `section3` ,facilitys, `districts` ,`countys`
	WHERE 
	`section3`.`facility`= `facilitys`.`facilitycode`
	AND  `districts`.`ID` = `facilitys`.`district`
	AND `countys`.`ID` = `districts`.`county`
	AND `countys`.`ID` ='$countyID'";

	$result = $this->db->query($query_str)->result_array();


    if($result){
        $this->r=$result[0]['a'];
        $this->r=$result[0]['b'];
        $this->r=$result[0]['c'];
        $this->r=$result[0]['d'];
    }
	
        return $this->r;

 

}


public function totalTestsCountyWise($countyID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
{

 $countyID = $this->input->get('id');
 //    echo "<pre/>";  
 // print_r($filter) ;
 // print_r($currentmonth) ;

 // print_r($currentyear) ;
 // die();
	if ($filter==0) //last submission
      {
      $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,
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
sum( CASE WHEN pat_type='sputum smear-positive relapse' THEN 1 ELSE 0 END) as totalsputumpos,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumpos,
sum( CASE WHEN (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumpos,
sum( CASE WHEN pat_type='sputum smear-negative relapse' THEN 1 ELSE 0 END) as totalsputumneg,
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
 
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
      $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
 sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
          $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
 sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
       $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
 sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
     $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
 sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
          $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
 sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,

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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
           elseif ($filter==8) //all
      {
          $query_str="SELECT count(*) as total,
sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,
sum(CASE WHEN Test_Result = 'negative'  THEN 1 ELSE 0 END) as neg,
sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif, 
sum(CASE WHEN (age Between 1 AND 5) AND ( Test_Result = 'positive')  THEN 1 ELSE 0 END) as totalbelow,
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
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND cond='1'  ";
	  }


	       $result = $this->db->query($query_str)->result_array();


	       if($result){

	       	$this->TTC=$result[0];
	       }else{
	       	$this->TTC = array();
	       }

	      
		return $this->TTC;
	   }

	   public function totalTestsPerCountyByAge($countyID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
	   {

        $countyID = $this->input->get('id');



	  if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1' ";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
         elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN age>15 THEN 1 ELSE 0 END) AS ageAboveC,sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END) AS ageBtwnC,sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END) AS ageBelowC
              FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND cond='1'  ";
      }
	     



	     $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->ageAboveC=count($result[0]['ageAboveC']);
            $this->ageBtwnC=count($result[0]['ageBtwnC']);
            $this->ageBelowC=count($result[0]['ageBelowC']);

        }
        else{
            $this->ageAboveC=0;
            $this->ageBtwnC=0;
            $this->ageBelowC=0;
            
            }
            return $this->ageAboveC;
            return $this->ageBtwnC;
            return $this->ageBelowC;    






	 }



	


	 public function totalTestsPerCountyByHStatus($countyID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
	 {

        $countyID = $this->input->get('id');


	  if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
      elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END) AS hstatusPosC,sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END) AS hstatusNegC,sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END) AS hstatusNoTestC
 FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND cond='1'  ";
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

            $this->hstatusPosC=count($result[0]['hstatusPosC']);
            $this->hstatusNegC=count($result[0]['hstatusNegC']);
            $this->hstatusNoTestC=count($result[0]['hstatusNoTestC']);

        }
        else{
            $this->hstatusPosC=0;
            $this->hstatusNegC=0;
            $this->hstatusNoTestC=0;
            
            }
            return $this->hstatusPosC;
            return $this->hstatusNegC;
            return $this->hstatusNoTestC;    

       

	}


	public function totalTestsPerCountyByPtype($countyID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
	{

        $countyID = $this->input->get('id');

	 if ($filter==0) //last submission
      {
      $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC  
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
      elseif ($filter==8) //all
      {
       $query_str="SELECT sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumposC,
sum( CASE WHEN  (pat_type='sputum smear-positive relapse') AND (mtbRif = 'positive')  THEN 1 ELSE 0 END ) AS rifsputumposC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbsputumnegC,
sum( CASE WHEN (pat_type='sputum smear-negative relapse') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifsputumnegC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbReturnC,
sum( CASE WHEN (pat_type='Return after defaulting') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifReturnC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureC,
sum( CASE WHEN (pat_type='Failure 1-st line treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureC,  
sum( CASE WHEN (pat_type='Failure re-treatment') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbFailureRtC,
sum( CASE WHEN (pat_type='Failure re-treatment') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifFailureRtC,  
sum( CASE WHEN (pat_type='New Patients') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNPC,
sum( CASE WHEN (pat_type='New Patients') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNPC,  
sum( CASE WHEN (pat_type='New case PTB') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbNewcaseC,
sum( CASE WHEN (pat_type='New case PTB') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifNewcaseC,  
sum( CASE WHEN (pat_type='MDR TB Contact') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbContactC,
sum( CASE WHEN (pat_type='MDR TB Contact') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifContactC,  
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbRefC,
sum( CASE WHEN (pat_type='Refugees SS+ve') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifRefC,
sum( CASE WHEN (pat_type='HCWs') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHCWsC,
sum( CASE WHEN (pat_type='HCWs') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHCWsC,  
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (Test_Result = 'positive')  THEN 1 ELSE 0 END ) AS mtbHivSmearC,
sum( CASE WHEN (pat_type='Hiv(+) & Smear(-)') AND (mtbRif = 'positive') THEN 1 ELSE 0 END ) AS rifHivSmearC   
FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND cond='1'  ";
      }


	  $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->mtbsputumposC=count($result[0]['mtbsputumposC']);
            $this->rifsputumposC=count($result[0]['rifsputumposC']);
            $this->mtbsputumnegC=count($result[0]['mtbsputumnegC']);
            $this->rifsputumnegC=count($result[0]['rifsputumnegC']);
            $this->mtbReturnC=count($result[0]['mtbReturnC']);
            $this->rifReturnC=count($result[0]['rifReturnC']);
            $this->mtbFailureC=count($result[0]['mtbFailureC']);
            $this->rifFailureC=count($result[0]['rifFailureC']);
            $this->mtbFailureRtC=count($result[0]['mtbFailureRtC']);
            $this->rifFailureRtC=count($result[0]['rifFailureRtC']);
            $this->mtbNPC=count($result[0]['mtbNPC']);
            $this->rifNPC=count($result[0]['rifNPC']);
            $this->mtbNewcaseC=count($result[0]['mtbNewcaseC']);
            $this->rifNewcaseC=count($result[0]['rifNewcaseC']);
            $this->mtbContactC=count($result[0]['mtbContactC']);
            $this->rifContactC=count($result[0]['rifContactC']);
            $this->mtbRefC=count($result[0]['mtbRefC']);
            $this->rifRefC=count($result[0]['rifRefC']);
            $this->mtbHCWsC=count($result[0]['mtbHCWsC']);
            $this->rifHCWsC=count($result[0]['rifHCWsC']);
            $this->mtbHivSmearC=count($result[0]['mtbHivSmearC']);
            $this->rifHivSmearC=count($result[0]['rifHivSmearC']);

        }
        else{
            $this->mtbsputumposC=0;
            $this->rifsputumposC=0;
            $this->mtbsputumnegC=0;
            $this->rifsputumnegC=0;
            $this->mtbReturnC=0;
            $this->rifReturnC=0;
            $this->mtbFailureC=0;
            $this->rifFailureC=0;
            $this->mtbFailureRtC=0;
            $this->rifFailureRtC=0;
            $this->mtbNPC=0;
            $this->rifNPC=0;
            $this->mtbNewcaseC=0;
            $this->rifNewcaseC=0;
            $this->mtbContactC=0;
            $this->rifContactC=0;
            $this->mtbRefC=0;
            $this->rifRefC=0;
            $this->mtbHCWsC=0;
            $this->rifHCWsC=0;
            $this->mtbHivSmearC=0;
            $this->rifHivSmearC=0;
            
            }
            return $this->mtbsputumposC;
            return $this->rifsputumposC;
            return $this->mtbsputumnegC;
            return $this->rifsputumnegC;
            return $this->mtbReturnC;
            return $this->rifReturnC;
            return $this->mtbFailureC;
            return $this->rifFailureC;
            return $this->mtbFailureRtC;
            return $this->rifFailureRtC;
            return $this->mtbNPC;
            return $this->rifNPC;
            return $this->mtbNewcaseC;
            return $this->rifNewcaseC;
            return $this->mtbContactC;
            return $this->rifContactC;
            return $this->mtbRefC;
            return $this->rifRefC;
            return $this->mtbHCWsC;
            return $this->rifHCWsC;
            return $this->mtbHivSmearC;
            return $this->rifHivSmearC;

	}


//get number of tests done Per County by Gender
      public function totalTestsPerCountyByGender($countyID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
      {
        $countyID = $this->input->get('id');

      if ($filter==0) //last submission
      {
       $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear'";

      }
      elseif ($filter==1)//last 6 months $fromdate$todate
      {
       $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1' ";
      }
      elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1' ";
      }
        elseif ($filter==3)//month/year
      {
        $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  ";
      }
        elseif ($filter==4)//year only
      {
      $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND  YEAR(End_Time)='$currentyear'  AND cond='1' ";
      }
        elseif ($filter==7) //last 6 months $fromdate$todate
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  ";
      }
         elseif ($filter==8) //all
      {
           $query_str="SELECT  sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS maleC,sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS femaleC,sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END) AS notSpC  FROM sample1
LEFT  JOIN `facilitys` ON `sample1`.`facility` = `facilitys`.`facilitycode`
LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
WHERE `countys`.`ID` ='$countyID' AND cond='1'  ";
      }
      $result = $this->db->query($query_str)->result_array();

        if($result)
        {

            $this->maleC=count($result[0]['maleC']);
            $this->femaleC=count($result[0]['femaleC']);
            $this->notSpC=count($result[0]['notSpC']);

        }
        else{
            $this->maleC=0;
            $this->femaleC=0;
            $this->notSpC=0;
            
            }
            return $this->maleC;
            return $this->femaleC;
            return $this->notSpC;    


        
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
        // $sql="SELECT month(max(End_Time)) AS maxmonth FROM sample1";
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
            


            $query_str="SELECT total,mtb,neg,rif
    FROM(
    SELECT 

    sum(CASE WHEN cond='1' THEN 1 ELSE 0 END) as total,

    sum( CASE WHEN Test_Result ='MTB DETECTED HIGH; Rif Resistance NOT DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance NOT DETECTED' OR Test_Result =  'MTB DETECTED MEDIUM; Rif Resistance NOT DETECTED'  OR Test_Result =  'MTB DETECTED VERY LOW; Rif Resistance NOT DETECTED'  OR Test_Result =  'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE'  OR Test_Result =  'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result =  'MTB DETECTED LOW; Rif Resistance DETECTED'  OR Test_Result =  'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR Test_Result =  'MTB DETECTED VERY LOW; Rif Resistance DETECTED' THEN 1 ELSE 0 END ) AS mtb,

    sum(CASE WHEN Test_Result =   'MTB NOT DETECTED'  THEN 1 ELSE 0 END) as neg,

    sum( CASE WHEN   Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR Test_Result =  'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR Test_Result =  'MTB DETECTED VERY LOW; Rif Resistance DETECTED'  OR Test_Result =  'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE' THEN 1 ELSE 0 END ) AS rif  


    FROM sample)x" ;    



     $result = $this->db->query($query_str)->result_array();
     if( $result){
        $this->total=$result[0]['total'];
        $this->mtb=$result[0]['mtb'];
        $this->notb=$result[0]['neg'];
        $this->rif=$result[0]['rif'];
     }

     
     
       return $this->total;
       return $this->mtb;
       return $this->notb;
       return $this->rif;
            }   

public function GetMaxYear(){
    $query_str = "SELECT max(year(End_Time)) AS maximumyear 
                  FROM sample1";
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
    

    $query_str = "SELECT MIN(year(End_Time)) AS minimumyear FROM sample1 ";
    $result = $this->db->query($query_str)->result_array();

    if($result){
        $minimumyear = $result[0]['minimumyear'];
    }else{
        $showyear=date('Y');
    }
   return $minimumyear;
}



//END

}