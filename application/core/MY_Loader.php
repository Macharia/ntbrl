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
	
public function load_referral($template_ref, $vars = array(), $return = FALSE){


	//load the session library
		$this->load->library('session');

		//get the session
		//if there is no session

		if (!$this->session->userdata('name')) {

			redirect('login/login');
		 }
		  else{

		$content = $this->view('template/header_v', $vars,$return);
		$content .= $this->view($template_ref, $vars,$return);
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





}
