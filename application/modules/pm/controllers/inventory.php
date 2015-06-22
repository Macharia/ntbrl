<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inventory extends MY_Controller {
	
	

    			function __construct() {
               			 parent::__construct();

               			 	

			            }

	public function index(){
        
		$this->inventory_();



	}
   

	public function inventory_(){
        
         if (isset($_GET['id'])) {
                
                $countyId =$_GET['id'];
            }

		    
        $data['category'] = $this->session->userdata('category');
        $data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');


        $data['table'] = $this->get_allocation_table_();
        


		$this->load->load_inventory('inventory_v',$data);	
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


    public function get_inv($facility)
    {

     $query_str="SELECT DISTINCT s.facility, DATEDIFF( max( s.Expiration_Date ) , NOW( ) ) AS DiffDate, f.name
                    FROM sample1 s, facilitys f
                    WHERE s.facility = f.facilitycode
                    GROUP BY s.facility";   

        $result = $this->db->query($query_str)->result_array();

        foreach ($result as $value) {



            $rs=$value['DiffDate'];


            


        }


        return $rs;

        // echo $rs;
        // die();





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


public function get_allocation_table_(){
         
          $currentmonth=date("m");
          $currentyear=date("Y");
          $previousmonth=date("m")- 1;

          if ($currentmonth ==1)
          {
          $previousmonth=12;

          }
          else
          {
          $previousmonth=date("m")- 1;
          $currentyear=date("Y");
          } 





          $query_str = "Select DISTINCT c.facility as fcode, f.name as fname, DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate,(c.end_bal+c.received) AS cart
                        FROM consumption c
                        left join facilitys f on c.facility = f.facilitycode
                    left join sample1 s on s.facility = c.facility
                    where s.Expiration_Date IS NOT NULL
                    and c.facility>1
                    and c.commodity='Cartridge'
                        and Year(c.date) = '2015'
                    and month(c.date) = '$previousmonth'
                    GROUP BY c.facility";

          $result = $this->db->query($query_str)->result_array();

          // echo "<pre/>";
          // print_r($result);

          // die();



          $table='<table class="table table-striped"><tr><th  style="text-align:center">MFL Code</th><th  style="text-align:center">Facility Name</th><th  style="text-align:center">Remaining Cartridges</th><th  style="text-align:center">Remaining days(Expiration)</th><th  style="text-align:center">Remaining Falcon Tubes</th></tr>';
          $sumrc=0;
          $sumrt=0;


           foreach($result as $value)
          {
            

            $fid=$value['fcode'];
            $fname= htmlspecialchars($value['fname'], ENT_QUOTES, 'UTF-8');
            $dd= (int) $value['DiffDate'];
            $cart= (int) $value['cart'];


            $q = "SELECT (c.end_bal+c.allocated) AS tubes FROM consumption c WHERE  c.facility='$fid' and c.commodity='Falcon Tubes'  ORDER BY c.date DESC LIMIT 1";
            $r = $this->db->query($q)->result_array();
            $tubes= $r[0]['tubes'];


            $query_rssample = "SELECT * FROM sample1 WHERE MONTH(End_Time)='$currentmonth' and  YEAR(End_Time)='$currentyear' and cond=1 and facility='$fid'";
            $rssample = $this->db->query($q)->result_array();
            $testdonethismonth = $rssample;
            return $testdonethismonth;

            $remainingcarts= $cart - $testdonethismonth;
            $remainingtubes= $tubes - $testdonethismonth;

            if ($remainingcarts<0) {
            $remainingcarts=0;
            }
            if ($remainingtubes<0) {
            $remainingtubes=0;
            }

            if ($dd=='NULL' or '') {
            $dd=0;
            }
            if ($dd<0) {
            $dd = 0;
            } 
            $sumrc+=$remainingcarts;
            $sumrt+=$remainingtubes;

             $table .= '<tr><td style="text-align:center">'.$fid.'</td><td style="text-align:center">'.$fname.'</td><td style="text-align:center">'.$remainingcarts.'</td><td style="text-align:center">'.$dd.' days</td><td style="text-align:center">'.$remainingtubes.'</td></tr>';


            
          }
          $table.='<tr><td colspan="3" style="text-align:center">Total Remaining Cartridges = '.$sumrc.'</td><td colspan="2" style="text-align:center">Total remaining Falcon Tubes = '.$sumrt.'</td></tr>';
          $table.='</table>';
          return $table;
          




        }

//END

}