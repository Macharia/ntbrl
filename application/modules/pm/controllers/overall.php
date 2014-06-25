<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class overall extends MY_Controller {



	public function index()
	{
		//$data['contentView']="header_v";
		//$data['title'] = "Dashboard | Program Manager";
		//$data['content'] = "overall_v";
        //$data['footer'] = "footer_v";
        $this->load->model('overall_m');
       // $this->body_var($mwaka='',$mwezi='' );
		
        $data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
        $overall_data = $this->overall_m->overall_logged();
        $data['filter']=null;
        $data['title']=null;
        $data['submitform']=null;

        $data['overall_data'] = $overall_data;
		//$this->load->view('overall_v');


		$this->load->load_pm('template/body', $data);


	}


    public function body_var($mwaka=null,$mwezi=null,$filter=null)
    {

       // $mwaka = $_GET['year'];
        //$mwezi = $_GET['mwezi'];

if (isset($filter)) {
    $filter = $filter;
    


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

    }


     elseif ($filter == 7)//last 6 months
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
    }


     elseif ($filter == 0)//last submission
    {
        $filter = 0;
        $colspan = 6;
        $mapwidth = 540;
        $currentmonth = GetMaxMonthbasedonMaxYear($mwezi);
        $displaymonth = GetMonthName($currentmonth);
        $currentyear = GetMaxYear($mwaka);
        $title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;
        //get current month and year
    }



     elseif ($filter == 3)//month/year
    {
        $displaymonth =GetMonthName($mwezi);
        $title = $displaymonth . ' - ' . $mwaka;
        //get current month and year
        $currentmonth = $mwezi;
        $currentyear = $mwaka;
        $colspan = 1;
        $mapwidth = 540;
    } 


    elseif ($filter == 4)//year
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
        $currentmonth = GetMaxMonthbasedonMaxYear($mwezi);
        $currentyear = GetMaxYear($mwaka);
        $displaymonth = GetMonthName($currentmonth);
        $minyear = GetMinYear();
        $title = "Cumulative Data : " . $minyear . ' to ' . $displaymonth . ' - ' . $currentyear;
        
    }
} 



else 
{
    

    if ($_REQUEST['submitform']) {
        $filter = 2;
        $fromfilter = $_GET['fromfilter'];
        $tofilter = $_GET['tofilter'];
        $displayfromfilter = @date("d-M-Y", strtotime($fromfilter));
        $displaytofilter = @date("d-M-Y", strtotime($tofilter));
        $title = $displayfromfilter . "  to  " . $displaytofilter;
        $currentmonth = @date("m");
        $currentyear = @date("Y");
        $colspan = 1;
        $mapwidth = 540;
    } 

    else 
    {
        


        if (isset($mwaka)) {
            

            if (isset($mwezi)) {
                $filter = 3;
                $displaymonth = GetMonthName($mwezi);
                $title = $displaymonth . ' - ' . $mwaka;
                //get current month and year
                $currentmonth = $mwezi;
                $currentyear = $mwaka;
                $colspan = 1;
                $mapwidth = 540;
            }



             else {
                $filter = 4;
                $title = $mwaka;
                //get current month and year
                $currentmonth = "";
                //get current month and year
                $currentyear = $mwaka;
                $colspan = 12;
                $mapwidth = 400;
            }
        } 


        else  {   
            

            $filter = 0;
            $colspan = 6;
            $mapwidth = 540;

            $currentmonth = GetMaxMonthbasedonMaxYear($samp);
            $displaymonth = GetMonthName($currentmonth);
            $currentyear = GetMaxYear($samp);
            $title = "Last Upload :" . $displaymonth . ' - ' . $currentyear;
            //get current month and year
        }


    }


}





    }



}
