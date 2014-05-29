<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = "login/login_v";
		$data['title'] = "Dashboard | System Login";
		$this -> template($data);
	}

	public function recovery() {
		$data['content_view'] = "login/recovery_v";
		$data['title'] = "Dashboard | Password Recovery";
		$this -> template($data);
	}

	public function process_credentials() {
		$validated = $this -> form_validation -> run();
		if ($validated) {
			$username = $this -> input -> post("username", TRUE);
			$password = $this -> input -> post("password", TRUE);
			$this -> authenticate_user($username, $password);
		} else {
			$this -> index();
		}
	}

	public function recover_credentials() {
		$validated = $this -> form_validation -> run();
		if ($validated) {
			$email_address = $this -> input -> post("email_address", TRUE);
			$this -> validate_email($email_address);
		} else {
			$this -> recovery();
		}
	}

	public function validate_email($email_address) {
		$user_table = $this -> config -> item('user_table');
		$email_column = $this -> config -> item('email_column');

		$sql = "SELECT *
				FROM $user_table		
				WHERE $user_table.$email_column=:e";
		$users = R::getAll($sql, array(':e' => $email_address));
		if ($users) {
			$error_message = $this -> reset_account($users[0]);
			$error_message .= 'Check your email to reset this account.';
		} else {
			$error_message = 'This Credentials are invalid.';
		}
		$this -> session -> set_flashdata('error_message', $error_message);
		redirect("login/recovery");
	}

	public function reset_account($users = array()) {
		$characters = strtoupper($this -> config -> item('alpha_password_pool'));
		$characters .= strtolower($this -> config -> item('alpha_password_pool'));
		$characters .= $this -> config -> item('numeric_password_pool');
		$password = "";
		$user_id = $users['id'];
		$email_address = $users[$this -> config -> item('email_column')];
		$full_name = $users[$this -> config -> item('fullname_column')];
		$username = $users[$this -> config -> item('username_column')];
		$email_sender_title = strtolower($this -> config -> item('email_sender_title'));

		$string = '';
		for ($i = 0; $i < $this -> password_min_length; $i++) {
			$password .= $characters[rand(0, strlen($characters) - 1)];
		}
		$this -> change_password($user_id, $password);

		$first_message = "Dear $full_name, <br/><br/>
		                Your username for the $email_sender_title is <b> $username </b><br/>
						This email will be followed by a default password for this account.<br/>
						You are advised after first login to change this password.<br/><br/>
						Regards,<br/>
						$email_sender_title team.";

		$message = $this -> send_mail($email_address, $this -> config -> item('reset_mail_subject'), $first_message);
		$second_message = $password;
		$message = $this -> send_mail($email_address, $this -> config -> item('reset_mail_subject'), $second_message);
		return $message;
	}

	public function send_mail($email_address, $subject, $message) {
		ini_set("max_execution_time", "1000000");
		ini_set("SMTP", "ssl://smtp.gmail.com");
		ini_set("smtp_port", "465");

		$config['mailtype'] = "html";
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = stripslashes($this -> config -> item('email_sender'));
		$config['smtp_pass'] = stripslashes('WebAdt_052013');
		$this -> load -> library('email', $config);

		$this -> email -> from($this -> config -> item('email_sender'), $this -> config -> item('email_sender_title'));
		$this -> email -> to($email_address);
		$this -> email -> subject($subject);
		$this -> email -> set_newline("\r\n");
		$this -> email -> message($message);

		if ($this -> email -> send()) {
			$this -> email -> clear(TRUE);
			$error_message = 'Email was sent to <b>' . $email_address . '</b> <br/>';
		} else {
			$error_message = $this -> email -> print_debugger();
		}

		return $error_message;
	}

	public function change_password($user_id, $password) {
		$user_table = $this -> config -> item('user_table');
		$password_column = $this -> config -> item('password_column');
		$password = $this -> encrypt_password($password);
		$time_updated_column = $this -> config -> item('time_updated_column');
		$today = date('Y-m-d H:i:s');

		$sql = "UPDATE $user_table SET $password_column='$password',$time_updated_column='$today' WHERE id=:u";
		R::getAll($sql, array(':u' => $user_id));

		$log = R::dispense($this -> config -> item('password_log_table'));
		$log -> user = $user_id;
		$log -> password = $password;
		$log -> date_changed = date('Y-m-d H:i:s');
		$log -> ip_address = $this -> input -> ip_address();
		$log -> agent = $this -> input -> user_agent();
		R::store($log);
	}

	public function authenticate_user($username, $password) {
		$password = $this -> encrypt_password($password);
		$user_table = $this -> config -> item('user_table');
		$access_level_table = $this -> config -> item('access_level_table');
		$username_column = $this -> config -> item('username_column');
		$password_column = $this -> config -> item('password_column');
		$access_level_column = $this -> config -> item('access_level_column');

		$sql = "SELECT $user_table.*,al.*,count(identity.id)+ count(auth.id) as authentication_level
				FROM $user_table
				LEFT JOIN $access_level_table al ON al.id=$user_table.$access_level_column,
					(SELECT * FROM  $user_table
				        WHERE $username_column=:u) as identity
				LEFT JOIN
				        (SELECT * FROM $user_table
				        WHERE $username_column=:u
				        AND $password_column=:p) as auth ON auth.id=identity.id				
				WHERE identity.id=$user_table.id";
		$users = R::getAll($sql, array(':u' => $username, ':p' => $password));
		if ($users[0]['authentication_level'] == 2) {
			$this -> apply_security($users[0]);
		} else {
			$this -> perform_attempt($users[0]);
		}

	}

	public function perform_attempt($users = array()) {
		$error_message = "The username or password you entered is incorrect.";
		$access_level_indicator = $this -> config -> item('access_level_indicator');
		$access_level = $users[$access_level_indicator];
		$user_id = $users['id'];
		$username_column = $this -> config -> item('username_column');
		$username = $users[$username_column];
		$access_type = "denied";
		$admin_indicator = $this -> config -> item('admin_indicator');

		if ($users['authentication_level'] == 1 && $access_level != $admin_indicator) {
			if (!$this -> session -> userdata($username . '_attempt')) {
				$attempt = 1;
				$this -> session -> set_userdata($username . '_attempt', $attempt);
			} else if ($this -> session -> userdata($username . '_attempt') && $this -> session -> userdata($username . '_attempt') < $this -> config -> item('attempt_limit')) {
				$attempt = $this -> session -> userdata($username . '_attempt');
				$attempt++;
				$this -> session -> set_userdata($username . '_attempt', $attempt);
			} else {
				$this -> deactivate_user($username);
				$this -> write_log($user_id, $access_type);
				$error_message = "This Account has been deactivated.<br/> Contact the administrator for assistance.";
			}
		}
		$this -> session -> set_flashdata('error_message', $error_message);
		redirect("login");
	}

	public function apply_security($users = array()) {
		$active = $users[$this -> config -> item('active_column')];
		$authentication = $users[$this -> config -> item('authentication_column')];
		$time_updated = $users[$this -> config -> item('time_updated_column')];
		$indicator = $users[$this -> config -> item('access_level_indicator')];
		$user_id = $users['id'];
		$expired = $this -> check_if_expired($indicator, $time_updated);
		$link = "login";

		if ($active != 1) {
			$error_message = 'This Account has been deactivated.<br/> Contact the administrator for assistance.';
		} else if ($authentication != 1) {
			$error_message = 'This Account is inactive check your email for the activation link.';
		} else if ($expired) {
			$error_message = 'This Password for this Account has expired.<br/> Please click the <a href="' . base_url() . 'home/change_password/' . $user_id . '">link</a> to change your password';
		} else {
			$this -> set_session_data($users);
			$link = $this -> config -> item('module_after_login');
		}
		if ($link == "login") {
			$this -> session -> set_flashdata('error_message', $error_message);
		}
		redirect($link);
	}

	public function set_session_data($users = array()) {
		$session_data = array();
		$access_type = "login";
		$user_id = $users['id'];
		$access_level = $users[$this -> config -> item('access_level_column')];
		$this -> set_menus($access_level);
		$this -> set_sidemenus($access_level);
		$this -> notifications($access_level);

		foreach ($users as $index => $user) {
			if ($index != $this -> config -> item('password_column')) {
				$session_data[$index] = $user;
			}
		}
		$this -> session -> set_userdata($session_data);
		$this -> write_log($user_id, $access_type);
	}

	public function set_menus($access_level) {
		$menu_rights_table = $this -> config -> item('menu_rights_table');
		$menu_table = $this -> config -> item('menu_table');
		$menu_column = $this -> config -> item('menu_column');
		$menu_access_column = $this -> config -> item('menu_access_column');
		$menu_label_column = $this -> config -> item('menu_label_column');
		$menu_url_column = $this -> config -> item('menu_url_column');
		$counter = 0;
		$menu_items = array();

		$sql = "SELECT $menu_label_column as label,$menu_url_column as url 
		        FROM $menu_rights_table mr
		        LEFT JOIN $menu_table m ON m.id=mr.$menu_column
		        WHERE mr.$menu_access_column=:al";
		$menus = R::getAll($sql, array(':al' => $access_level));

		if ($menus) {
			foreach ($menus as $menu) {
				$menu_items['menu_items'][$counter]['url'] = $menu['url'];
				$menu_items['menu_items'][$counter]['text'] = $menu['label'];
				$counter++;
			}
		}
		$this -> session -> set_userdata($menu_items);
	}

	public function set_sidemenus($access_level) {
		$sidemenu_rights_table = $this -> config -> item('sidemenu_rights_table');
		$sidemenu_table = $this -> config -> item('sidemenu_table');
		$menu_column = $this -> config -> item('menu_column');
		$menu_access_column = $this -> config -> item('menu_access_column');
		$menu_label_column = $this -> config -> item('menu_label_column');
		$menu_url_column = $this -> config -> item('menu_url_column');
		$counter = 0;
		$sidemenu_items = array();

		$sql = "SELECT $menu_label_column as label,$menu_url_column as url 
		        FROM $sidemenu_rights_table mr
		        LEFT JOIN $sidemenu_table m ON m.id=mr.$menu_column
		        WHERE mr.$menu_access_column=:al";
		$menus = R::getAll($sql, array(':al' => $access_level));

		if ($menus) {
			foreach ($menus as $menu) {
				$sidemenu_items['sidemenu_items'][$counter]['url'] = $menu['url'];
				$sidemenu_items['sidemenu_items'][$counter]['text'] = $menu['label'];
				$counter++;
			}
		}
		$this -> session -> set_userdata($sidemenu_items);
	}

	public function notifications($access_level) {
		$counter = 0;
		$notifications = array();

		$notifications['notifications'][$counter]['url'] = "notification/deactivated_users";
		$notifications['notifications'][$counter]['text'] = "Deactivated Users(0)";
		$this -> session -> set_userdata($notifications);
	}

	public function check_if_expired($indicator, $time_updated) {
		if ($indicator != $this -> config -> item('admin_indicator')) {
			if ($indicator == $this -> config -> item('temp_indicator')) {
				$expiry_duration = $this -> config -> item('temp_expiry');
			} else {
				$expiry_duration = $this -> config -> item('normal_expiry');
			}

			$today = date('Y-m-d');
			$diff = abs(strtotime($today) - strtotime($time_updated));
			$years = floor($diff / (365 * 60 * 60 * 24));
			$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
			$period = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

			if ($period >= $expiry_duration) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	public function deactivate_user($username) {
		$active_column = $this -> config -> item('active_column');
		$username_column = $this -> config -> item('username_column');
		$user_table = $this -> config -> item('user_table');

		$sql = "UPDATE $user_table SET $active_column='0' WHERE $username_column=:u";
		R::getAll($sql, array(':u' => $username));
	}

	public function encrypt_password($password) {
		$key = $this -> encrypt -> get_key();
		$encrypted_password = $key . $password;
		$password = md5($encrypted_password);
		return $password;
	}

	public function logout() {
		$user_id = $this -> session -> userdata("id");
		$access_type = "logout";
		$this -> write_log($user_id, $access_type);
		$this -> session -> sess_destroy();
		redirect("login");
	}

	public function write_log($user_id, $access_type) {
		$log = R::dispense($this -> config -> item('user_log_table'));
		$log -> user = $user_id;
		$log -> access_type = $access_type;
		$log -> timestamp = date('Y-m-d H:i:s');
		$log -> ip_address = $this -> input -> ip_address();
		$log -> agent = $this -> input -> user_agent();
		R::store($log);
	}

	public function template($data) {
		$data['show_menu'] = 0;
		$data['show_sidemenu'] = 0;
		$this -> load -> module('template');
		$this -> template -> index($data);
	}

}
