<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sendemail extends MY_Controller {



	public function index()
	{
		
		


		$data['category'] = $this->session->userdata('category');
		$data['user'] = $this->session->userdata('user');
        $data['name'] = $this->session->userdata('name');
      


	}


	public function get_sendemail_(){

		if (isset($_POST['id'])) {
		
			$SampleID = $_POST['id'];
		}
		

		$query_str="SELECT * FROM sample1 WHERE sample1.ID='$SampleID'";

		$result = $this->db->query($query_str)->result_array();


		foreach ($result as $row_rssamp) {
			
			$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$subject="Test Result Alert";

$mail->Username = 'elvismuriithi@gmail.com';
$mail->Password = 'kadushqwer';
$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Port = 587; 
$contactemail= $row_rssamp['d_email'];
$emailaddress= $row_rssamp['c_email'];
//$emailaddress1="elvismuriithi@yahoo.com";
//$emailaddress2="bmungai@chskenya.org";
//$emailaddress3="jnjenga@chskenya.org";
//$emailaddress4="schebore@chskenya.org";
//$emailaddress5="jlusike@clintonhealthaccess.org";
$mail->From="elvismuriithi@gmail.com";
$mail->FromName="Test - Alerts";
$mail->Sender="elvismuriithi@gmail.com";
$mail->AddReplyTo("elvismuriithi@gmail.com.", "Test - Alerts");
$mail->AddAddress($contactemail);
$mail->AddCC($emailaddress);
//$mail->AddCC($emailaddress1);
//$mail->AddCC($emailaddress2);
//$mail->AddCC($emailaddress3);
//$mail->AddCC($emailaddress4);
//$mail->AddCC($emailaddress5);
$mail->Subject = $subject;
$mail->IsHTML(TRUE);

//$mail->AddStringAttachment($doc, $reporttitle, 'base64', 'application/pdf');
$mail->Body = "
Hello Team, 

GeneXpert test for ".$row_rssamp['fullname']." was successfully done. Please notify the patient to visit the facility where the test was done from to collect the results. Below are the test summaries.\n

	    Lab No : ".$row_rssamp['lab_no']."
		, Date Tested : ".$row_rssamp['coldate']."\n
		, Patient Name : ".$row_rssamp['fullname']."\n
		, Gender : ".$row_rssamp['gender']."\n
		, Age : ".$row_rssamp['age']."\n
		, Patient Type : ".$row_rssamp['pat_type']."\n
		, Mobile No : ".$row_rssamp['mobile']."\n
		, MTB Result: ".$row_rssamp['Test_Result']."\n
		, MTB Rif: ".$row_rssamp['mtbRif']."\n
		, Technician : ".$row_rssamp['User']."\n.
    
Many Thanks.
--
TB Support Team

This email was automatically generated. Please do not respond to this email address or it will ignored.

";

if(!$mail->Send())
{
   $errormsg= 'Error sending Email';
 	echo '<script type="text/javascript">' ;
	echo "window.location.href='allsampleview.php?errormsg=$errormsg'";
	echo '</script>';
	
	 // $arr = array('message' => 'Sending Failed', 'title' => 'Email Response');
     // echo json_encode($arr);
}

else
{

     $suceessmsg = 'Email Sent Sucessfully';
     echo '<script type="text/javascript">' ;
	 echo "window.location.href='allsampleview.php?suceessmsg=$suceessmsg'";
	 echo '</script>';

    // $arr = array('message' => 'Sending Succesful', 'title' => 'Email Response');
     // echo json_encode($arr);
}
		}
		
	



	}
		
























		}
