<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->library('session');
	}

	// public function demo() {
	// 	$qry = $this->db->query("SELECT * FROM tbl_attachement where tet_id = 1");
		
	// 	if($qry->num_rows() > 0) {
	// 		foreach($qry->result() as $row) {
	// 			$path = 'resources/attachments/'.$row->ta_attachement;

	// 			$this->zip->read_file($path);
	// 		}
	// 	}

	// 	$qry1 = $this->db->query("SELECT TE.tet_name, TI.ti_instruction FROM tbl_error_type as TE INNER JOIN tbl_instruction as TI ON TI.tet_id = TE.tet_id where TE.tet_id = 1");
		
	// 	if($qry1->num_rows() > 0) {
	// 		foreach($qry1->result() as $row1) {
	// 			$name = $row1->tet_name.'.txt';
	// 			$data = $row1->ti_instruction;

	// 			$this->zip->add_data($name, $data);
	// 		}
	// 	}

	// 	$this->zip->archive('resources/files/file.zip');

	// 	$this->zip->download('file.zip');
	// }

	public function index() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_user->user('add', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['act'])) {
			if($_GET['act'] == 'download') {
				$qry = $this->db->query("SELECT * FROM tbl_attachement where tet_id = {$_GET['tet_id']}");
		
				if($qry->num_rows() > 0) {
					foreach($qry->result() as $row) {
						$path = 'resources/attachments/'.$row->ta_attachement;

						$this->zip->read_file($path);
					}
				}

				$qry1 = $this->db->query("SELECT TE.tet_name, TI.ti_instruction FROM tbl_error_type as TE INNER JOIN tbl_instruction as TI ON TI.tet_id = TE.tet_id where TE.tet_id = {$_GET['tet_id']}");
				
				if($qry1->num_rows() > 0) {
					foreach($qry1->result() as $row1) {
						$name = $row1->tet_name.'.txt';
						$data = $row1->ti_instruction;

						$this->zip->add_data($name, $data);
					}
				}

				$this->zip->archive('resources/files/file.zip');

				$this->M_user->user('td', $_GET);

				$this->zip->download('file.zip');
			}
		}

		if(isset($_GET['getError'])) {
			$record = $this->M_user->user('getError', $_GET);
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->tet_name;
					$Sname = $rec->rss_name;
					$btn = '<div>'.
						'<a type="button" class="btn btn-responsive button-alignment btn-info" href="Index?act=download&tet_id='.$rec->tet_id.'");" target="_blank"   
							data-toggle="tooltip" title="" data-original-title="Download Attachment"><i class="fa fa-download"></i></a>&nbsp;'.
						"<!--<a type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->tet_id.",\"".$name."\")' 
							data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>D</i></a>-->".
						'</div>';
				
					$data[] = array(
						'system' => $Sname,
						'code'	=> $rec->tet_error_code,
						'version'	=> $rec->tet_version,
						'name'	=> $rec->tet_name,
						'description'	=> $rec->tet_description,
						'instruction'	=> $rec->ti_instruction,
						'btn'	=> $btn
						);
				}

			}
			else {
				$data = 0;
			}
			$output = array(
	                   	"recordsTotal"    => count($record),
	                    "recordsFiltered" => count($record),
	                    "data"            => $data
	                );
			echo json_encode($output);
			exit();
		}

		$data['error'] = $this->M_user->user('getSystem', '');

		$data['chart'] = $this->M_admin->chart('getChart1');
		$data['chart2'] = $this->M_admin->chart('getChart2');
		$data['chart3'] = $this->M_admin->chart('getChart3');
		
		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/index', $data);
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/user');
	}

	public function supported_System() {

		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->system_supported('add', $_POST);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'edit')
			{
				$record = $this->M_admin->system_supported('edit', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getSystem']))
		{
			// $record = $this->M_admin->supported_System('getSystem','');
			$record = $this->M_user->user('getSystem',$this->session->userdata('id'));
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->rss_name;
					
					// $btn = '<div class="btn-group">'.
					// 	'<button type="button" class="btn-responsive button-alignment btn-info" onclick="edit_('.$rec->rss_id .')"  
					// 		data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-pencil">E</i></button>&nbsp;'.
					// 	"<button type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->rss_id.",\"".$name."\")' 
					// 		data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>D</i></button>".
					// 	'</div>';

					$btn = '<div class="btn-group">
								<button type="button" class="btn btn-responsive btn-info" onclick="dataShow('.$rec->rss_id .',`'.$rec->rss_name.'`)" style="width: 80px;"><i class="fa fa-fw fa-cog"></i> EDIT
								</button>&nbsp;
							</div>';
				
					$data[] = array(
						'id'	=> $rec->rss_id,
						'name'	=> $rec->rss_name,
						'btn'	=> $btn
						);
				}

			}
			else {
				$data = 0;
			}
			$output = array(
	                   	"recordsTotal"    => count($record),
	                    "recordsFiltered" => count($record),
	                    "data"            => $data
	                );
			echo json_encode($output);
			exit();
		}
		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/supp');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/supp');
	}

	public function error() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->error('add', $_POST);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'edit')
			{
				$record = $this->M_admin->error('edit', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getError'])) {
			$record = $this->M_admin->error('getError',$this->session->userdata('id'));
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->tet_name;
					$SID = $rec->rss_id;
					
					if($rec->rss_id == "")
					{
						$SID = 0;
					}

					$btn = '<div class="btn-group">'.
						'<button type="button" class="btn btn-responsive btn-info" onclick="dataShow('.$rec->tet_id.',
												'.$SID.',
												`'.$rec->tet_error_code.'`,
												`'.$rec->tet_error_type.'`,
												`'.$rec->tet_version.'`,
												`'.$rec->tet_description.'`,
												`'.$rec->tet_name.'`)"  
							data-toggle="modal" data-href="#responsive" href="#responsive" style="width: 80px;"><i class="fa fa-fw fa-cog"></i> EDIT
								</button>&nbsp;
							</div>';
				
					$data[] = array(
						'id'	=> $rec->tet_id,
						'system'	=> $rec->rss_name,
						'code'	=> $rec->tet_error_code,
						'type'	=> $rec->tet_error_type,
						'version'	=> $rec->tet_version,
						'name'	=> $rec->tet_name,
						'description'	=> $rec->tet_description,
						'btn'	=> $btn
						);
				}

			}
			else {
				$data = 0;
			}
			$output = array(
	                   	"recordsTotal"    => count($record),
	                    "recordsFiltered" => count($record),
	                    "data"            => $data
	                );
			echo json_encode($output);
			exit();
		}

		$data['system'] = $this->M_admin->system_supported('getSystem', '');
		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/ErrorType', $data);
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/errorType');
	}

	public function instruction() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->instruction('add', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getInstruction'])) {
			$record = $this->M_admin->instruction('getInstruction','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->tet_name;
					
					$btn = '<div class="btn-group">'.
						'<button type="button" class="btn-responsive button-alignment btn-info" onclick="edit_('.$rec->tet_id .')"  
							data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-pencil">E</i></button>&nbsp;'.
						"<button type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->tet_id.",\"".$name."\")' 
							data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>D</i></button>".
						'</div>';
				
					$data[] = array(
						'id'	=> $rec->tet_id,
						'code'	=> $rec->tet_error_code,
						'version'	=> $rec->tet_version,
						'name'	=> $rec->tet_name,
						'description'	=> $rec->ti_instruction,
						'btn'	=> $btn
						);
				}

			}
			else {
				$data = 0;
			}
			$output = array(
	                   	"recordsTotal"    => count($record),
	                    "recordsFiltered" => count($record),
	                    "data"            => $data
	                );
			echo json_encode($output);
			exit();
		}

		$data['error'] = $this->M_admin->error('getError', '');

		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/Instruction', $data);
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/instruction');
	}

	public function attachment() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->attachment('add', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
		}

		$data['error'] = $this->M_admin->error('getError', '');

		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/Attachment', $data);
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/attachment');
	}

	public function request() {
		if(isset($_POST['act'])) {
			if($_POST['act']=='getId')
			{
				$record = $this->M_user->request('getId', $_POST, '');
				echo json_encode($record);
				exit();
			}

			if($_POST['act'] == 'sent') {

				$file = '';

				if(!empty($_FILES["FileInputUpload"]["type"]))
				{
					$file = $_FILES["FileInputUpload"]["name"];
				}

				if(file_exists("resources/emailAttachment/" . $_FILES["FileInputUpload"]["name"]) && $file != "")
				{

					$suffix = 0;
					$name = pathinfo($_FILES['FileInputUpload']['name'], PATHINFO_FILENAME);
					$extension = pathinfo($_FILES['FileInputUpload']['name'], PATHINFO_EXTENSION);
					while(file_exists("FileInputUpload/".$name.".".$extension))
					{
						$name .=$suffix;
						$suffix++;
					}
					$basename = substr(md5(uniqid(rand())), 0, 11).".".$extension;
					$sourcePath = $_FILES['FileInputUpload']['tmp_name'];
					$targetPath = "resources/emailAttachment/".$basename; // Target path where file is to be stored

					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					$file = $basename;
				}
				else if($file != '')
				{
					$sourcePath = $_FILES['FileInputUpload']['tmp_name'];
					$targetPath = "resources/emailAttachment/".$_FILES["FileInputUpload"]["name"]; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					$file = $_FILES["FileInputUpload"]["name"];
				}

				$record = $this->M_user->request('sent', $_POST, $file);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getRequest'])) {
			$record = $this->M_user->request('getRequest', '', '');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->rd_email;
					if($rec->rd_status == 0) {
						$stats = 'Pending';
						$btn = '<div class="btn-group">'.
							'<button type="button" class="btn btn-responsive btn-info" onclick="edit('.$rec->rd_id.')" title="" data-original-title="Sent Email"><i class="fa fa-envelope"></i></button>&nbsp;'.
							"<button type='button' class='btn btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->rd_id.",\"".$name."\")' 
								data-toggle='tooltip' title='' data-original-title='Ignore'><i class='fa fa-trash'></i></button>".
							'</div>';
					}
					else {
						$stats = 'Email Sent';
						$btn = '';
					}
									
					$data[] = array(
						'id'	=> $rec->rd_id,
						'email'	=> $rec->rd_email,
						'description'	=> $rec->rd_description,
						'status' => $stats,
						'btn'	=> $btn
						);
				}

			}
			else {
				$data = 0;
			}
			$output = array(
	                   	"recordsTotal"    => count($record),
	                    "recordsFiltered" => count($record),
	                    "data"            => $data
	                );
			echo json_encode($output);
			exit();
		}

		

		$this->load->view('user/utilities/headcss');
		$this->load->view('user/utilities/header');
		$this->load->view('user/Request');
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/utilities/footjs');
		$this->load->view('user/scripts/request');
	}

	public function migrate() {


		if(isset($_POST['act']))
		{
			if($_POST['act'] == 'add') {

				$file = '';

				if(!empty($_FILES["FileInputUpload"]["type"]))
				{
					$file = $_FILES["FileInputUpload"]["name"];
				}

				if(file_exists("resources/attachments/" . $_FILES["FileInputUpload"]["name"]) && $file != "")
				{

					$suffix = 0;
					$name = pathinfo($_FILES['FileInputUpload']['name'], PATHINFO_FILENAME);
					$extension = pathinfo($_FILES['FileInputUpload']['name'], PATHINFO_EXTENSION);
					while(file_exists("FileInputUpload/".$name.".".$extension))
					{
						$name .=$suffix;
						$suffix++;
					}
					$basename = substr(md5(uniqid(rand())), 0, 11).".".$extension;
					$sourcePath = $_FILES['FileInputUpload']['tmp_name'];
					$targetPath = "resources/excel/".$basename; // Target path where file is to be stored

					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					$file = $basename;
				}
				else if($file != '')
				{
					$sourcePath = $_FILES['FileInputUpload']['tmp_name'];
					$targetPath = "resources/excel/".$_FILES["FileInputUpload"]["name"]; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					$file = $_FILES["FileInputUpload"]["name"];
				}

				$record = $this->M_admin->datamine('add', $file);
				echo json_encode($record);
				exit();
			}
		}

		$data['system'] = $this->M_admin->system_supported('getSystem', '');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('user/utilities/sidebar');
		$this->load->view('user/Migrate', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/migrate');
	}
}
?>