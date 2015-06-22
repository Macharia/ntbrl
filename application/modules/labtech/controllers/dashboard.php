<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class dashboard extends MY_Controller {


	
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
		var $FacID;


		function __construct() {
		parent::__construct();

		$this->load->library('session');

			if($this->session->userdata('mfl')) {

			  $this->FacID = $this->session->userdata('mfl');
				
			}
		
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
						
}
		
		
		public function index(){
			
			$this->dashboard_lab();
			
			
			
		}

		public function dashboard_lab()
		{

			

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	

        	//$allo_summ_data = $this->allo_summ_m->allo_summ_pm();
        
        	// $data['allo_summ_data'] = $allo_summ_data;
        	// $data['maximumyear'] = $this->GetMaxYear();
        	// $data['minimumyear'] = $this->GetMinYear();
        	// $data['row_RsCounty'] = $this->get_allo_report_json_();

        	$data['maxY'] = $this->get_max_year();
            $data['minY'] = $this->get_min_year();
            $data['TTF'] = $this->get_totaltestsfacilitywise_lab($this->FacID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
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

            //$data['TTF'] = $this->get_totaltestsfacilitywise_lab($this->FacID,$this->filter,$this->currentmonth,$this->currentyear,$this->fromfilter,$this->tofilter,$this->fromdate,$this->todate);
	        $data['returnable'] = $this->header_var();
	        $data['notup'] = $this->get_notup_fac($this->FacID);
	        $data['complete'] = $this->get_complete_fac($this->FacID);
	        $data['errors'] = $this->get_errors_fac($this->FacID);
			$this->load->load_lab_dashboard('dashboard_v',$data);



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
                    //$displaymonth = $this->GetMonthName($currentmonth);

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
		        
		    }else{
		        $showyear=date('Y');
		    }
		   return $minimumyear;
		}


		public function get_samplemap_json()
		{

			
			$fid = $this->FacID;


			$req = R::getAll("SELECT `sample1`.`lab_no` AS a, `sample1`.`End_Time` AS b, `facilitys`.`name` AS c, `districts`.`name` AS d, countys.name AS e
								FROM `sample1` , `facilitys` , `districts`,countys
								WHERE `sample1`.`Refacility` = `facilitys`.`facilitycode`
								AND `districts`.`ID` = `facilitys`.`district`
								AND `districts`.`county` = `countys`.`ID`
								AND `sample1`.`cond`=1
								AND `sample1`.`facility` = '$fid'");

			$data = array();
			$recordsTotal = 0;


			foreach ($req as $key => $value) {


			$data[] = array(

				$value["a"],
				$value["b"],
				$value["c"],
				$value["d"],
				$value["e"],
				
				






			);	

			$recordsTotal++;



			}

			$json_req = array(

				"sEcho"    =>1,
				"iTotalRecords" =>$recordsTotal,
				"iTotalDisplayRecords" =>$recordsTotal,
				"aaData" => $data

			);


			echo json_encode($json_req);






		}



		public function get_max_year(){


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


		public function get_min_year(){
	

			    $query_str = "SELECT MIN(year(End_Time)) AS minimumyear FROM sample1 ";
			    $result = $this->db->query($query_str)->result_array();

			    if($result){
			    	$minimumyear = $result[0]['minimumyear'];
			    }else{
			    	$showyear=date('Y');
			    }
			   return $minimumyear;
}

	public function TOTALFacilitypercounty($county){
			//$countyID = $_POST['id'];

			$query_str="SELECT 
			`facilitys`.`facilitycode` AS CODE,
			`facilitys`.`name` AS FACILITY, 
			`districts`.`name` AS DISTRICT,
			`countys`.`name` AS COUNTY
			FROM `facilitys` , `districts` ,`countys`
			WHERE 
			`districts`.`ID` = `facilitys`.`district`
			AND `countys`.`ID` = `districts`.`county`
			AND `countys`.`ID` = '$county'

			";
			
			$result = $this->db->query($query_str)->result_array();
			
			$this->TT=count($result);
			return $this->TT;
					
			}



			public function get_totaltestsfacilitywise_lab($FacID,$filter,$currentmonth,$currentyear,$fromfilter,$tofilter,$fromdate,$todate)
				 

				  {
				  if ($filter==0) //last submission
				  {
				  $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			 
			FROM sample1 WHERE
			 MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  AND facility='$FacID'";

				  }
				  elseif ($filter==1)//last 6 months $fromdate$todate
				  {
				  $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			FROM sample1 WHERE
			 End_Time BETWEEN '$fromdate' AND '$todate'  AND cond='1'  AND facility='$FacID'";
				  }
				  elseif ($filter==2)//cusomtize dates $fromfiler $tofilter
				  {
				  	  $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			FROM sample1 WHERE
			 End_Time BETWEEN '$fromfilter' AND '$tofilter'  AND cond='1'  AND facility='$FacID'";
				  }
				    elseif ($filter==3)//month/year
				  {
				   $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err 
			FROM sample1 WHERE
			 MONTH(End_Time)='$currentmonth' AND YEAR(End_Time)='$currentyear' AND cond='1'  AND facility='$FacID'";
			 	  }
				    elseif ($filter==4)//year only
				  {
				 $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			FROM sample1 WHERE
			  YEAR(End_Time)='$currentyear'  AND cond='1'  AND facility='$FacID'";
				  }
				    elseif ($filter==7) //last 6 months $fromdate$todate
				  {
				  	  $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			FROM sample1 WHERE
			 End_Time BETWEEN '$fromdate' AND '$todate' AND cond='1'  AND facility='$FacID'";
				  }
				       elseif ($filter==8) //all
				  {
				  	  $query_str="SELECT count(*) AS tt,
			   sum(CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END) AS mtb,
			   sum(CASE WHEN Test_Result = 'negative' THEN 1 ELSE 0 END) AS neg,
			   sum(CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END) AS rif,
			   sum(CASE WHEN age>15 THEN 1 ELSE 0 END)AS abv,
			   sum(CASE WHEN age Between 6 AND 15 THEN 1 ELSE 0 END)AS btwn,
			   sum(CASE WHEN age Between 1 AND 5 THEN 1 ELSE 0 END)AS blw,
			   sum(CASE WHEN gender='Male' THEN 1 ELSE 0 END)AS male,
			   sum(CASE WHEN gender='Female' THEN 1 ELSE 0 END)AS female,
			   sum(CASE WHEN gender='Not specified' THEN 1 ELSE 0 END)AS notsp,
			   sum(CASE WHEN h_status='Positive' THEN 1 ELSE 0 END)AS hpos,
			   sum(CASE WHEN h_status='Negative' THEN 1 ELSE 0 END)AS hneg,
			   sum(CASE WHEN h_status='Not Done' or h_status='Declined' THEN 1 ELSE 0 END)AS hnotdone,
			   sum(CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END) AS err
			   FROM sample1 WHERE  cond='1'  AND facility='$FacID'";
				  }
				     
			$result = $this->db->query($query_str)->result_array();
			
			return $result;

			}



	}