<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guest extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_guest->index('add', $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'search') {
				$record = $this->M_guest->index('search', $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'auto_search') {
				$record = $this->M_guest->index('auto_search', $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'wildsearch') {
				$record = $this->M_guest->index('wildsearch', $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'getData') {
				$record = $this->M_guest->index('getData', $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'getData1') {
				$record = $this->M_guest->index('getData1', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		$data['system'] = $this->M_admin->system_supported('getSystem', '');
		$data['error'] = $this->M_admin->error('getError', '');
		$data['instruction'] = $this->M_user->user('getInstruction', '');
		$data['user'] = $this->M_guest->index('getUser', '');

		$this->load->view('index', $data);
	}
}
?>