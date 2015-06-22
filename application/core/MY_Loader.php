<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {





	public function load_pm($template_pm, $vars = array(), $return = FALSE){

		//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_pm, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);

//		$this->load->view('header_v', $vars);
//		$this->load->view($views, $vars);
//		$this->load->view('footer_v', $vars);


		//if($return)
		//{

			return $content;
		//}


	}



		}
	
public function load_pm_contact($template_contact, $vars = array(), $return = FALSE){


	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_contact, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);

//		$this->load->view('header_v', $vars);
//		$this->load->view($views, $vars);
//		$this->load->view('footer_v', $vars);


		//if($return)
		//{

			return $content;
		//}


	}



		}

public function load_pm_changePass($template_changePass, $vars = array(), $return = FALSE){


	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_changePass, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);

//		$this->load->view('header_v', $vars);
//		$this->load->view($views, $vars);
//		$this->load->view('footer_v', $vars);


		//if($return)
		//{

			return $content;
		//}


	}



		}	



public function load_countyfmap($template_cnty, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{


		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_cnty, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;
		

	}




		}


public function load_facility($template_facility, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_facility, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;
		


	}



		}

public function load_allocation($template_allocation, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_allocation, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;
		



	}


		}

public function load_allo_summ($template_allo_summ, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_allo_summ, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


			}

		}



public function load_test($template_test, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{


		$content = $this->view($template_test, $vars,$return);
		



			return $content;
		



	}


		}


public function load_countyview($template_countyview, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_countyview, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;

				}

	}

public function load_countyallocation($template_countyallocation, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_countyallocation, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

		}

public function load_inventory($template_inventory, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_inventory, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//templates for labtech
public function load_lab_header($template_header, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view($template_header, $vars,$return);
		//$content .= $this->view('template/header_lab_v', $vars,$return);
		



			return $content;


		}

	}


	public function load_lab_header2($template_header2, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view($template_header2, $vars,$return);
		//$content .= $this->view('template/header_lab_v', $vars,$return);
		



			return $content;


		}

	}


	public function load_lab_index($template_index, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		$this->load->module("template/header_lab");

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

	
		

		$this->header_lab->header_lab();
		// $content = $this->view('template/header_lab_v', $vars,$return);
		$content = $this->view($template_index, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

public function load_lab_allsampleview($template_allsampleview, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_allsampleview, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

	public function load_lab_sampleErr($template_sampleEr, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_sampleEr, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

	public function load_lab_dashboard($template_dashboard, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_dashboard, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

	public function load_lab_sampleview($template_sampleview, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_sampleview, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}



	public function load_lab_facility($template_facility, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_facility, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}


	public function load_lab_viewconsumption($template_viewconsumption, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_viewconsumption, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}


	public function load_lab_summ($template_summ, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_summ, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}


	public function load_lab_changePass($template_changePass, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view('template/header_lab_v', $vars,$return);
		$content .= $this->view($template_changePass, $vars,$return);
		$content .= $this->view('template/footer_v', $vars,$return);



			return $content;


		}

	}

	public function load_lab_sample1($template_sample1, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$content = $this->view('template/header_lab_v', $vars,$return);
			$content .= $this->view($template_sample1, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}

	}	


	public function load_lab_worksheet($template_worksheet, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			//$content = $this->view('template/header_lab_v', $vars,$return);
			$content = $this->view($template_worksheet, $vars,$return);
			//$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}

	}	


	public function load_lab_pendings($template_pendings, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');




			$this->load->module("template/header_lab2");
			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			
			$this->header_lab2->header_lab2();  	
			//$content = $this->view('template/header_lab_v', $vars,$return);
			$content = $this->view($template_pendings, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}

	}	

		public function load_lab_submitconsumptionreport($template_submitconsumptionreport, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');



			$this->load->module("template/header_lab2");
			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			
			$this->header_lab2->header_lab2();   	
			//$content = $this->view('template/header_lab_v', $vars,$return);
			$content = $this->view($template_submitconsumptionreport, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}

///////////////////////////////////////////////////////////////////////////////////////admin template
	///////////////////////////////


public function load_admin_index($template_admin_index, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$content = $this->view('template/admin_header_v', $vars,$return);
			$content = $this->view($template_admin_index, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}

public function load_admin_userlog($template_admin_userlog, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$content = $this->view('template/admin_header_v', $vars,$return);
			$content = $this->view($template_admin_userlog, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}	

public function load_admin_addfacility($template_admin_addfacility, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$content = $this->view('template/admin_header_v', $vars,$return);
			$content = $this->view($template_admin_addfacility, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}

public function load_admin_usergp($template_admin_usergp, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$content = $this->view('template/admin_header_v', $vars,$return);
			$content = $this->view($template_admin_usergp, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}	


	//////////////////////DTLC template////////////////////////

public function load_dtlc_header($template_header_dtlc, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view($template_header_dtlc, $vars,$return);
		
		



			return $content;


		}

	}					

public function load_dtlc_header2($template_header2_dtlc, $vars = array(), $return = FALSE){

	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
			 }
		  else{

		$content = $this->view($template_header2_dtlc, $vars,$return);
		
		



			return $content;


		}

	}					

public function load_dtlc_countyview($template_dtlc_countyview, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session
			$this->load->module("template/dtlc_header");

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$this->dtlc_header->dtlc_header();
			//$content = $this->view('template/dtlc_header_v', $vars,$return);  	
			$content = $this->view($template_dtlc_countyview, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}	

public function load_dtlc_facility($template_dtlc_facility, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session
			$this->load->module("template/dtlc_header2");

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$this->dtlc_header2->dtlc_header2();
			//$content = $this->view('template/dtlc_header2_v', $vars,$return);  	
			$content = $this->view($template_dtlc_facility, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}



public function load_dtlc_dashboard($template_dtlc_dashboard, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session
			$this->load->module("template/dtlc_header");

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$this->dtlc_header->dtlc_header();
			//$content = $this->view('template/dtlc_header2_v', $vars,$return);  	
			$content = $this->view($template_dtlc_dashboard, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}			
public function load_dtlc_report($template_dtlc_report, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session
			$this->load->module("template/dtlc_header2");

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$this->dtlc_header2->dtlc_header2();
			//$content = $this->view('template/dtlc_header2_v', $vars,$return);  	
			$content = $this->view($template_dtlc_report, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}

public function load_dtlc_changePass($template_dtlc_changePass, $vars = array(), $return = FALSE){

		//load the session library
			$this->load->library('session');

			//get the session
			//if there is no session
			$this->load->module("template/dtlc_header2");

			if (!$this->session->userdata('name')) {

				redirect('login/login');
				 }
			  else{

			$this->dtlc_header2->dtlc_header2();
			//$content = $this->view('template/dtlc_header2_v', $vars,$return);  	
			$content = $this->view($template_dtlc_changePass, $vars,$return);
			$content .= $this->view('template/footer_v', $vars,$return);



				return $content;


		}


	}



}
