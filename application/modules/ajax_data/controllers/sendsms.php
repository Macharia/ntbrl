<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sendsms extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function get_sendsms_(){

		if (isset($_POST['id'])) {
		
			$SampleID = $_POST['id'];
		}
		

		$query_str="SELECT * FROM sample1 WHERE sample1.ID='$SampleID'";

		$result = $this->db->query($query_str)->result_array();


		foreach ($result as $row_rssamp) {
			
			$rname=urlencode($row_rssamp['c_name']);
			$rnamephone=urlencode($row_rssamp['c_no']);
			$labno=urlencode($row_rssamp['lab_no']);
			$opno=urlencode($row_rssamp['op_no']);
			$pname=urlencode($row_rssamp['fullname']);
			$mtb=urlencode($row_rssamp['Test_Result']);
			$mtbrif=urlencode($row_rssamp['mtbRif']);
		}
		
	$x= file_get_contents("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$rnamephone&text=Hi+$rname+%0a+Genexpert+Test+Result+for+$pname+whose+Lab+No+-+$lab_no+has+been+done.+%0a+The+outcome+is:+MTB+$mtb+n+MTBRif:+$mtbrif");

		echo 'SMS sent Successfully'.'<a href="allsampleview.php">Click to go Back</i></a>';

		ob_flush();	




	}
		
























		}
