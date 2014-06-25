<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class logout extends MY_Controller {

	public function index(){
			
			$this->logout_();



}

	public function logout_()
	{


    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'id' && $key != 'user' && $key != 'name' ) {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('login/login');





		}

}