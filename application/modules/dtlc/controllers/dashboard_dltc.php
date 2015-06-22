<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class dashboard_dltc extends MY_Controller {
	
	var $countyID;
    var $cname;

    			function __construct() {
               			 parent::__construct();

               	 $this->countyID=$this->get_county();		 	
                           
			            }

	public function index(){
        
		$this->dtlc_dashboard_();



	}
    

	public function dtlc_dashboard_(){
        


        if (isset($_GET['year'])){
            $year = $_GET['year'];
            }
        else {
                $year = @date('Y');
            }

        

        $currentmonth=@date("m");
        $currentyear=@date("Y");
        $previousmonth=@date("m")- 1;

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


		
		$data['category'] = $this->session->userdata('category');
        $data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');

        $data['remainingcarts'] = $this->get_cartridges() - $this->get_tests_month();
        $data['remainingtubes'] = $this->get_expdate() - $this->get_tests_month();

        $data['maxyear'] = $this->get_max_year();
        $data['minyear'] = $this->get_min_year();
        $data['FacID'] = $this->session->userdata('mfl');
        $data['fname'] = $this->get_facility_name();

        $data['f'] = $this->get_facility();
        $data['expdate'] = $this->get_expdate();
        $data['cartridges'] = $this->get_cartridges();
        $data['tubes'] = $this->get_expdate();
        $data['testdonethismonth'] = $this->get_tests_month();
       
		$this->load->load_dtlc_dashboard('dashboard_dltc_v',$data);	
	}


    public function get_county()
    {
        $facilitycode= $this->session->userdata('mfl');

        $query_str="SELECT  countys.ID AS cid,countys.name AS cN 
                FROM countys,facilitys ,districts
                WHERE 
                `facilitys`.`facilitycode`='$facilitycode'
                AND `districts`.`ID` = `facilitys`.`district`
                AND `countys`.`ID` = `districts`.`county` ";

        $result = $this->db->query($query_str)->result_array();
            if ($result) {
            $this->countyID = $result[0]['cid'];
            $this->cname = $result[0]['cN']; 

            }
            else{
                $this->countyID=0;
                $this->cname=0;
            }
        //var_dump($this->countyID);
        // die();
        return $this->countyID;
        return $this->cname;



    }


     public function get_facility_name(){


        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT name as fn FROM facilitys where facilitycode='$FacID'";
        $result = $this->db->query($query_str)->result_array();

        if($result) {
            
            $fname = $result[0]['fn'];
        }

        return $fname;
    }


       public function get_facility(){

        $countyId = $this->countyID;
        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT 
                        `sample1`.`facility` AS a,
                        `facilitys`.`name` AS b
                        FROM sample1,facilitys, `districts` ,`countys`
                        WHERE 
                        `sample1`.`facility`= `facilitys`.`facilitycode`
                        AND  `districts`.`ID` = `facilitys`.`district`
                        AND `countys`.`ID` = `districts`.`county`
                        AND `countys`.`ID` = '$countyId'
                        group by `sample1`.`facility`";
        $result = $this->db->query($query_str)->result_array();

        return $result;
    } 
	  
    public function get_expdate(){


        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT DATEDIFF( max( s.Expiration_Date ) , NOW() ) AS DiffDate FROM sample1 s WHERE s.facility='$FacID'";
        $result = $this->db->query($query_str)->result_array();

               return count($result);
    }
    
    public function get_cartridges(){


        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT (c.end_bal+c.allocated) AS cart FROM consumption c WHERE  c.facility='$FacID' and c.commodity='Cartridge' ORDER BY c.date DESC LIMIT 1";
        $result = $this->db->query($query_str)->result_array();

               return count($result);
    }


    public function get_tubes(){


        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT (c.end_bal+c.allocated) AS tubes FROM consumption c WHERE  c.facility='$FacID' and c.commodity='Falcon Tubes'  ORDER BY c.date DESC LIMIT 1";
        $result = $this->db->query($query_str)->result_array();

               return count($result);
    }

    public function get_tests_month(){

         $currentmonth=@date("m");
        $currentyear=@date("Y");
        $previousmonth=@date("m")- 1;

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


        $FacID= $this->session->userdata('mfl');

        $query_str = "SELECT * FROM sample1 WHERE MONTH(End_Time)='$currentmonth' and  YEAR(End_Time)='$currentyear' and cond=1 and facility='$FacID'";
        $result = $this->db->query($query_str)->result_array();

               return count($result);
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
    
//END

}