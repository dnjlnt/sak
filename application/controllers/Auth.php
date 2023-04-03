<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }
	
	public function index() {
		$this->load->view('auth/index');
	}
	
	public function loginProcess() {
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');

		if ($user_id != "") {
			if ($password != "") {
				$getuserstatus = $this->ModelAuth->getuserstatus($user_id);
				if ($getuserstatus == "0" || $getuserstatus == 0) {
					$getid = $this->ModelAuth->getid($user_id);
					
					$this->session->set_userdata('sess_id', $getid);
					$session_id = $this->session->userdata('sess_id');
					$this->session->set_userdata('session_userid', $user_id);
					$session_userid = $this->session->userdata('session_userid');
				} else {
					echo "NOTACTIVEUSER";
				}
			} else {
				echo "PASSWORDEMPTY";
			}
		} else {
			echo "USERNAMEEMPTY";
		}

		// if ($user_id != "") {
		// 	if ($password != "") {
		// 		$getusername = $this->ModelAuth->getusername($user_id);
		// 		if ($getuser)id == $user_id) {
		// 		// 	$getpassword = $this->ModelAuth->getpassword($user_id);
		// 		// 	if ($password == $getpassword) {
		// 		// 		$getuserstatus = $this->ModelAuth->getuserstatus($user_id);
		// 		// 		if ($getuserstatus == "0" || $getuserstatus == 0) {
		// 		// 			$getresetpassword = $this->ModelAuth->getresetpassword($user_id);
		// 		// 			if ($getresetpassword == "0" || $getresetpassword == 0) {
		// 		// 				$getid = $this->ModelAuth->getid($user_id);
							
		// 		// 				$this->session->set_userdata('sess_userid', $getid);
		// 		// 				$session_userid = $this->session->userdata('sess_userid');
		// 		// 				$this->session->set_userdata('sess_username', $user_id);
		// 		// 				$session_username = $this->session->userdata('sess_username');
		// 		// 			} else {
		// 		// 				echo "RESETPASSWORD";
		// 		// 			}
		// 		// 		} else {
		// 		// 			echo "NOTACTIVEUSER";
		// 		// 		}
		// 		// 	} else {
		// 		// 		echo "PASSWORDINVALID";
		// 		// 	}
		// 		} else {
		// 			echo "USERNAMEINVALID";
		// 		}
		// 	} else {
		// 		echo "PASSWORDEMPTY";
		// 	}
		// } else {
		// 	echo "USERNAMEEMPTY";
		// }
	}
}