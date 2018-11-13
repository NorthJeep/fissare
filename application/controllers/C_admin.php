<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('download');
		$this->load->helper('form');
		$this->load->library('session');
		//$this->index();
	}

	// public function chart() {		
	// 	$data = $this->M_admin->chart('getChart1');

	// 	$category = array();
	// 	// $category['name'] = 'System Name';
	// 	$series = array();
	// 	// $series['name'] = 'Total';

	// 	foreach($data as $row) {
	// 		$category['data'][] = $row->rss_name;
	// 		$series['data'][] = $row->count;
	// 	}

	// 	$result = array();
	// 	array_push($result, $category);
	// 	array_push($result, $series);

	// 	print json_encode($result, JSON_NUMERIC_CHECK);
	// }

	public function index() {
		if(isset($_GET['getMSE'])){
			$record = $this->M_admin->chart('getChart2');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$data[] = array(
						'name'	=> $rec->name,
						'count'	=> $rec->y,
						'rss_name' => $rec->rss_name,
						'tet_version' => $rec->tet_version,
						'su_name' => $rec->su_name,
						'tet_error_type' => $rec->tet_error_type
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
		if(isset($_GET['getMSA'])){
			$record = $this->M_admin->chart('getChart1');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$data[] = array(
						'name'	=> $rec->name,
						'count'	=> $rec->y,
						'ro_name' => $rec->ro_name
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
		if(isset($_GET['getMNU'])){
			$record = $this->M_admin->chart('getChart3');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$data[] = array(
						'name'	=> $rec->name,
						'count'	=> $rec->y,
						'ro_name' => $rec->ro_name
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
		if(isset($_POST['act'])){
			if($_POST['act'] == 'ErrorPrint')
			{
				$output = '';
				$ErrorList = $this->M_admin->error('getError2',$_POST);
				if(count($ErrorList) > 0)
				{
					$output .= '<option selected>Nothing Selected</option>';
					foreach($ErrorList as $rec)
					{
						
						$output .= '<option value="'.$rec->tet_id.'">'.$rec->tet_name.'</option>';
					}
				}
				else
				{
					$output .= '<option>No Errors</option>';
				}
				$dataArray = array(
					'output' => $output
				);
				echo json_encode($dataArray);
				exit();
			}
		}
		$data['system'] = $this->M_admin->system_supported('getSystem1', '');
		// $data['error'] = $this->M_admin->error('getError1','');
		$data['chart'] = $this->M_admin->chart('getChart1');
		$data['chart2'] = $this->M_admin->chart('getChart2');
		$data['chart3'] = $this->M_admin->chart('getChart3');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/index');
	}

	public function role() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->role('add', $_POST);
				echo json_encode($record);
				exit();
			}
			elseif (isset($_POST['act']) == "edit"){
				$record = $this->M_admin->role('edit', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['delRole']))
		{
			// echo '';
			$record = $this->M_admin->role('delete', $_POST);	
			echo json_encode($record);
			exit();
		}

		if(isset($_GET['getRole'])) {
			$record = $this->M_admin->role('getRole','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->sur_name;
						
					$SName = "'".$rec->sur_name."'";
					// $btn = '<div class="btn-group">'.
					// 	'<button type="button" class="btn-responsive button-alignment btn-info" onclick="edit_('.$rec->sur_id .')"  
					// 		data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-pencil">E</i></button>&nbsp;'.
					// 	"<button type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->sur_id.",\"".$name."\")' 
					// 		data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>D</i></button>".
					// 	'</div>';
						
					$btn = '<div class="btn-group">
								<button type="button" class="btn btn-responsive btn-info" onclick="dataShow('.$rec->sur_id .','.$SName.')" style="width: 80px;"><i class="fa fa-fw fa-cog"></i> EDIT
								</button>&nbsp;
							</div>';

					$data[] = array(
						'id'	=> $rec->sur_id,
						'name'	=> $rec->sur_name,
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

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/Role');
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/role');
	}

	public function user() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') 
			{
				$record = $this->M_admin->user('add', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'edit')
			{
				$record = $this->M_admin->user('edit', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getUser'])) {
			$record = $this->M_admin->user('getUser','','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$id = $rec->s_id;
					$name =  $rec->s_name;
					$contact = $rec->s_contact;
					$address = $rec->s_address;
					$email = $rec->s_email;
					$rname = $rec->r_name;
					$rid = $rec->r_id;
					$suser = $rec->s_username;
					$spass = $rec->s_password;
					$tagency = $rec->t_agency;
					$tangencyid = $rec->t_agency_id;
					$sprofile = '<img src="'.base_url().'resources/profile/'.$rec->s_profile.'" style="max-height:100px;" />';
					
					// $btn = '<div class="btn-group">'.
					// 	'<button type="button" class="btn-responsive button-alignment btn-info" onclick="edit_('.$rec->s_id .')"  
					// 		data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-pencil">EDIT</i></button>&nbsp;'.
					// 	"<button type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->s_id.",\"".$name."\")' 
					// 		data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>DELETE</i></button>".
					// 	'</div>';

					$btn = '<div class="btn-group">
								<button type="button" class="btn btn-responsive btn-info" data-toggle="modal" data-href="#responsive" href="#responsive"
								onclick="dataPass(
										'.$id.',
										'.$tangencyid.',
										`'.$name.'`,
										'.$contact.',
										`'.$address.'`,
										`'.$email.'`,
										`'.$rname.'`,
										'.$rid.',
										`'.$suser.'`,
										`'.$spass.'`
												);" style="width: 80px;">
								<i class="fa fa-fw fa-cog"></i> EDIT
								</button>&nbsp;
							</div>';

				
					$data[] = array(
						'id'	=> $rec->s_id,
						'agency' => $rec->t_agency,
						'name'	=> $rec->s_name,
						'email'	=> $rec->s_email,
						'contact'	=> $rec->s_contact,
						'role'	=> $rec->r_name,
						'btn'	=> $btn,
						'profile' => $sprofile
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

		$data['role'] = $this->M_admin->role('getRole', '');
		$data['agency'] = $this->M_admin->agency('getAgency','');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/User', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/user');
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
			$record = $this->M_admin->error('getError1','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->tet_name;
					$SID = $rec->rss_id;
					
					if($rec->rss_id == "")
					{
						$SID = 0;
					}

					$btn = '<div class="btn-group">'.
						'<button type="button" class="btn btn-responsive btn-info" onclick="
										dataShow('.$rec->tet_id.',
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

		$data['system'] = $this->M_admin->system_supported('getSystem1', '');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/ErrorType', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/errorType');
	}

	public function instruction() {
		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->instruction('add', $_POST);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'edit') {
				$record = $this->M_admin->instruction('edit', $_POST);
				echo json_encode($record);
				exit();
			}
		}

		if(isset($_GET['getInstruction'])) {
			$record = $this->M_admin->instruction('getInstruction1','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->tet_name;
					
					// $btn = '<div class="btn-group">'.
					// 	'<button type="button" class="btn-responsive button-alignment btn-info" onclick="edit_('.$rec->tet_id .')"  
					// 		data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-pencil">E</i></button>&nbsp;'.
					// 	"<button type='button' class='btn-responsive button-alignment btn-danger' onclick='delete_(".$rec->tet_id.",\"".$name."\")' 
					// 		data-toggle='tooltip' title='' data-original-title='Delete'><i class='ti-close'>D</i></button>".
					// 	'</div>';
					
					$btn = '<div class="btn-group">'.
						'<button type="button" class="btn btn-responsive button-alignment btn-info" onclick="dataShow('.$rec->ti_id.','.$rec->tet_id.',`'.$rec->ti_instruction.'`)" style="width:80px" data-toggle="modal" data-href="#responsive" href="#responsive">
							<i class="fa fa-fw fa-cog"></i>EDIT</button>
							</div>';


					$data[] = array(
						'id'	=> $rec->tet_id,
						'system'	=> $rec->rss_name,
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

		$data['error'] = $this->M_admin->error('getError1', '');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/Instruction', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/instruction');
	}

	public function attachment() {
		

		if(isset($_POST['act'])) {
			if($_POST['act'] == 'add') {
				$record = $this->M_admin->attachment('add', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
		}
		if(isset($_GET['DLFormat']))
		{
			$FilePath    =   file_get_contents(base_url()."resources/file/Fissare_Library_Format.xlsx");
			$FileName    =   "Fissare_Library_Format.xlsx";
			force_download($FileName, $FilePath);
		}

		$data['error'] = $this->M_admin->error('getError1', '');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/Attachment', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/attachment');
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

				$record = $this->M_admin->datamine('add', $file, $_POST);
				echo json_encode($record);
				exit();
			}

			if($_POST['act']=='datamine')
			{
				$file1 = 'datamine';

				$config['upload_path']          = './resources/file/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 0;

                $this->load->library('upload', $config);
				
            	$file1 = fopen('./resources/file/' . $file1, "r");
				$LogDetails1 = array();
				 
				while (!feof($file1)) {
				   $LogDetails1[] = fgets($file1);
				}

				fclose($file1);
            	$logfilename1  = $file1;  

            	$record = $this->M_admin->datamine('datamine', $LogDetails1);
				echo json_encode($record);
				exit();
			}
		}
		$data['system'] = $this->M_admin->system_supported('getSystem1', '');

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/Migrate', $data);
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/migrate');
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

		if(isset($_GET['getSystem'])) {
			$record = $this->M_admin->system_supported('getSystem1','');
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

		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/supp');
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/supp');
	}

	public function request() {

		if(isset($_GET['getRequest'])) {
			$record = $this->M_admin->request('getRequest','');
			if (count($record) != 0) {
				foreach ($record as $rec) {
					$name =  $rec->rre_name;
					$id = $rec->rre_id;

					$btn = '<div class="btn-group">
								<button type="button" class="btn btn-responsive btn-success");" style="width: 50px;"><i class="fa fa-fw fa-envelope"></i>
								</button>
								<button type="button" class="btn btn-responsive btn-danger");" style="width: 50px;"><i class="fa fa-fw fa-trash"></i>
								</button>
							</div>';
				
					$data[] = array(
						'id'	=> $id,
						'name'	=> $name,
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
		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/request');
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/request');
	}

	public function agency(){

		if(isset($_POST['act']))
		{
			if($_POST['act'] == 'add')
			{
				$record = $this->M_admin->agency('add',$_POST);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'edit')
			{
				$record = $this->M_admin->agency('edit',$_POST);
				echo json_encode($record);
				exit();
			}
		}
		if(isset($_GET['getAgency']))
		{
			$record = $this->M_admin->agency('getAgency','');
			if(count($record) > 0)
			{
				foreach($record as $rec)
				{
					$btn = '<div class="btn-group">'.
						'<button type="button" class="btn btn-responsive btn-info" onclick="
										dataShow('.$rec->agency_id.',
												`'.$rec->head_agency_name.'`,
												`'.$rec->agency_name.'`,
												'.$rec->agency_type.')"  
							data-toggle="modal" data-href="#responsive" href="#responsive" style="width: 80px;"><i class="fa fa-fw fa-cog"></i> EDIT
								</button>&nbsp;
							</div>';
				
					$data[] = array(
						'id'	=> $rec->agency_id,
						'HName'	=> $rec->head_agency_name,
						'AName'	=> $rec->agency_name,
						'AType'	=> $rec->Type,
						'btn'	=> $btn
						);
				}
			}
			else
			{
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


		$this->load->view('admin/utilities/headcss');
		$this->load->view('css/admincss');
		$this->load->view('admin/utilities/header');
		$this->load->view('admin/utilities/sidebar');
		$this->load->view('admin/Agency');
		$this->load->view('admin/utilities/footjs');
		$this->load->view('admin/scripts/agency');
	}
}
?>
