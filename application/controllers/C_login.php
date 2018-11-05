<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	// public function logout() {
	// 	$this->session->sess_destroy();
	// 	redirect($this->index);
	// }
	public function logout()
	{
		$this->session->sess_destroy();
		redirect($this->index);
	}

	public function index() {
		$this->load->view('login');
	}

	public function validate_user() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'login') {
				$record = $this->M_login->user_validate('login', $_POST);
				echo json_encode($record);
				exit();
			}
		}
	}
}
