<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */

class  MY_Controller  extends  MX_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Nairobi');
	}
	
	
	public function is_logged_in()
	{
		
		$this->_ci->load->library('session');
		$this->_ci->load->model('login');
		$username = $this->_ci->session->userdata(config_item('username'));
		$password = $this->_ci->session->userdata(config_item('password'));
		return $this->_ci->auth_model->password_check($username, $password, TRUE);
		
		
		
		
		
	}

	
	
	


    
	
	
	



}


