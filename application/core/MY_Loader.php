<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {



	public function load_pm($template_pm, $vars = array(), $return = FALSE){
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