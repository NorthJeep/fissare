<?php

class M_guest extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function index($act, $post) {
		if (isset($act)){
			if ($act == 'add') {
				$data = array(
					'rd_email' => $post['email'],
					'rd_description' => $post['Pdescription'],
					'su_id' => $post['user']
				);

				$this->db->insert('r_details', $data);
				return array('mes' => 'Success');
			}

			if ($act == 'getUser') {
				$qry = $this->db->query("SELECT su_name, su_id FROM sys_user WHERE sur_id = 2");
				$record = $qry->result();
				return $record;
			}

			if($act == 'search') {
				$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_name LIKE '%{$post['search']}%' OR tet_description LIKE '%{$post['search']}%'");
				$record = $qry->result();
				return $record;
			}

			if($act == 'auto_search') {
				$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_name LIKE '%{$post['search']}%' OR tet_description LIKE '%{$post['search']}%' LIMIT 10");
				$record = $qry->result();
				return $record;
			}

			if($act == 'wildsearch') {
				$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE rss_id = {$post['id']}");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getData') {
				$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_id = {$post['id']}");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getData1') {
				$qry = $this->db->query("SELECT * FROM tbl_instruction as ti inner join tbl_error_type as tet on tet.tet_id = ti.tet_id inner join r_supported_system as rss on rss.rss_id = tet.rss_id WHERE ti.tet_id = {$post['id']}");
				$record = $qry->result();
				return $record;
			}
		}
	}
}
?>