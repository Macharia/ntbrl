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
		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');


		//$this->load->view('overall_v');


		$this->load->load_pm('template/body', $data);

	}



//get month names from ID

	function GetMonthName($month)
{
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































}













































