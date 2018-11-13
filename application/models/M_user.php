<?php
defined('BASEPATH') OR exit('No direct script allowed');

class M_user extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('email');
	}

	public function user($act, $post) {

		if(isset($act)) {
			if($act == 'getError') {
				$cond = '';
				if(isset($post['id']) && $post['id'] != NULL && $post['id'] != 'undefined' && $post['id'] != 0) {
					$cond = 'WHERE ti.rss_id = '. $post['id']. ' AND ti.su_id = '. $this->session->userdata('id');
				}
				else {
					$cond = 'WHERE ti.su_id ='. $this->session->userdata('id');
				}

				$qry = $this->db->query("SELECT * 
										FROM tbl_error_type as tet 
										INNER JOIN  tbl_instruction as ti 
											ON ti.tet_id = tet.tet_id
										INNER JOIN r_supported_system as rss
											ON tet.rss_id = rss.rss_id {$cond}");
				$record = $qry->result();
				return $record;
			}

			if($act == 'td') {

				$data = array(
					'tet_id' => $_GET['tet_id'],
					'td_user' => $this->session->userdata('id'),
					'td_date' => $this->db->select('NOW() as db_date')->get()->row()->db_date
					);
				$this->db->insert('tbl_download', $data);
			}

			if($act == 'getInstruction') {
				$qry = $this->db->query("SELECT * FROM tbl_instruction");
				$record = $qry->result();
				return $record;
			}

			if($act == 'add') {
				$check = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_name LIKE '%{$post['request']}%'");
				if($check->num_rows() > 0) {
					return array('mes' => 'Duplicate');
				}
				else {
					$data = array('rre_name' => $post['request']);
					$this->db->insert("r_request_error", $data);
					return array('mes' => 'Success');
				}
			}

			if($act == 'getSystem') {
				$qry = $this->db->query("SELECT * FROM r_supported_system WHERE su_id = {$this->session->userdata('id')}");
				$record = $qry->result();
				return $record;
			}
		}
	}

	public function request($act, $post, $file) {
		if ($act == 'getRequest') {
			$qry = $this->db->query("SELECT * FROM r_details WHERE su_id = {$this->session->userdata('id')}");
			$record = $qry->result();
			return $record;
		}

		if($act == 'getId') {
			$qry = $this->db->query("SELECT * FROM r_details WHERE rd_id = {$post['id']}");
			$record = $qry->result();
			return $record;
		}

		if($act == 'sent') {

			$data = array(
				'rse_filename' => $file,
				'rd_id' => $post['rd_id']
			);

			$this->db->insert('r_sent_email', $data);

			$data1 = array(
				'rd_status' => 1
			);
			$this->db->where('rd_id', $post['rd_id']);
			$this->db->update('r_details', $data1);

			
			$attach = '';
			$emailTo = '';
			$subject = '';

			$check1 = $this->db->query("SELECT rd_description, rd_email FROM r_details WHERE rd_id = {$post['rd_id']}");
			foreach($check1->result() as $row) {
				$emailTo = $row->rd_email;
				$subject = $row->rd_description;
			}

			$check2 = $this->db->query("SELECT rse_filename FROM r_sent_email WHERE rse_filename = '{$file}'");
			foreach($check2->result() as $rows) {
				$attach = $rows->rse_filename;
			}

			$this->email->from('kohospeleyer@gmail.com', 'Fissare');
			$this->email->to($emailTo);
			$this->email->subject($subject);
			$this->email->attach('resources/emailAttachment/'.$attach);
			$this->email->send();

			// echo $this->email->print_debugger();

			// return array('mes' => 'Success');
		}
	}
}
?>