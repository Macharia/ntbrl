<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class facility_dltc extends MY_Controller {
	
	var $countyID;
    var $cname;

    			function __construct() {
               			 parent::__construct();

               	 $this->countyID=$this->get_county();		 	
                           
			            }

	public function index(){
        
		$this->dtlc_facility_();



	}
    

	public function dtlc_facility_(){
        
         if (isset($_GET['id'])) {
                
                $countyId =$_GET['id'];
            }

		
		$data['category'] = $this->session->userdata('category');
        $data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');

       
		$this->load->load_dtlc_facility('facility_dltc_v',$data);	
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
       
    public function get_fac_table(){

        $countyId = $this->countyID;

        $req = R::getAll("SELECT 
                            `facilitys`.`facilitycode` AS CODE,
                            `facilitys`.`name` AS FACILITY, 
                            `districts`.`name` AS DISTRICT,
                            `countys`.`name` AS COUNTY
                            FROM `facilitys` , `districts` ,`countys`
                            WHERE 
                            `districts`.`ID` = `facilitys`.`district`
                            AND `countys`.`ID` = `districts`.`county`
                            AND `countys`.`ID` = '$countyId'");

            $data = array();
            $recordsTotal = 0;

            foreach ($req as $key => $value) {
                # code...



            $data[] = array(


                $value["CODE"],
                $value["FACILITY"],
                $value["DISTRICT"],
                $value["COUNTY"],



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
	  

    



//END

}