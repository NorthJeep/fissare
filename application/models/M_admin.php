<?php

class M_admin extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function chart($act){
		if(isset($act)) {
			if($act == 'getChart1') {
				$qry = $this->db->query("SELECT rss.rss_name as name, COUNT(*) as y FROM `tbl_download` as td inner join tbl_error_type as tet on tet.tet_id = td.tet_id inner join r_supported_system as rss on rss.rss_id = tet.rss_id group by rss.rss_name");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getChart2') {
				$qry = $this->db->query("SELECT tet.tet_name as name, COUNT(*) as y FROM `tbl_download` as td 
                    inner join tbl_error_type as tet 
                    on tet.tet_id = td.tet_id 
                    inner join r_supported_system as rss 
                    on rss.rss_id = tet.rss_id group by tet.tet_name");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getChart3') {
				$qry = $this->db->query("SELECT rss.rss_name as name,count(et.rss_id) as y FROM `tbl_error_type` et
                                            inner join r_supported_system rss
                                            on et.rss_id = rss.rss_id
                                            group by et.rss_id ");
				$record = $qry->result();
				return $record;
			}
		}
	}

	public function role($act, $post) {
		if (isset($act)) {
			if ($act == 'add') {
				$RName = $post['role'];
				$check = $this->db->query('SELECT * FROM sys_user_role WHERE sur_name = "'.$RName.'"');
				if($check->num_rows() > 0) {		
					return array('mes' => 'Duplicate');
				}
				else {
					$add = array(
						'sur_name' => $RName
					);
					$this->db->insert('sys_user_role', $add);	
					return array('mes' => 'Success');
				}
			}

			if($act == 'getRole') {
				$qry = $this->db->query("SELECT * FROM sys_user_role");
				$result = $qry->result();
				return $result;
			}

			if($act == 'edit'){
				
				$dataID = $post['roleEditID'];
				$dataArray = array(
					'sur_name' => $post['roleEdit']
				);
				$this->db->set($dataArray);
				$this->db->where('sur_id',$dataID);
				$this->db->update('sys_user_role'); 
				// gives UPDATE sys_user_role SET sur_name = $post['roleEdit'] WHERE sur_id = $post['roleEditID']

				return array('mes' => 'Updated');
			}

			// if($act == 'delete')
			// {
			// 	return array('mes' => 'Deleted');
			// }
		}
	}

	public function user($act, $post) {
		if(isset($act)) {
			if($act == 'add') {
				$check = $this->db->query("SELECT * FROM sys_user WHERE su_username = '{$post['username']}' AND su_password = '{$post['password']}' ");
				if($check->num_rows() > 0) {
					return array('mes' => 'Duplicate');
				}
				else {
					$data = array(
						'su_name' => $post['name'],
						'su_email' => $post['email'],
						'su_contact' => $post['contact'],
						'su_username' => $post['username'],
						'su_password' => $post['password'],
						'e_password' => MD5($post['password']),
						'sur_id' => $post['role']
					);

					$this->db->insert('sys_user', $data);
					return array('mes' => 'Success');
				}
			}

			if($act == 'edit'){
				
				$uID = $post['userID'];
				$uName = $post['uName'];
				$uRole = $post['uRole'];
				$uContact = $post['uContact'];
				$uAddress = $post['uAddress'];
				$uEmail = $post['uEmail'];
				$uUser = $post['uUser'];
				$uPass = $post['uPass'];

				$dataArray = array(
						'su_name' => $uName,
						'su_email' => $uEmail,
						'su_contact' => $uContact,
						'su_address' => $uAddress,
						'su_username' => $uUser,
						'su_password' => $uPass,
						'e_password' => MD5($uPass),
						'sur_id' => $uRole
					);


				// $dataArray = array(
				// 	'sur_name' => $post['roleEdit'],

				// );
				$this->db->set($dataArray);
				$this->db->where('su_id',$uID);
				$this->db->update('sys_user'); 
				// gives UPDATE sys_user_role SET sur_name = $post['roleEdit'] WHERE sur_id = $post['roleEditID']

				return array('mes' => 'Updated');
			}

			if($act == 'getUser') {
				$qry = $this->db->query("SELECT su.su_id as s_id
												, su.su_name as s_name
										        , su.su_email as s_email
										        , su.su_contact as s_contact
										        , su.su_address as s_address
										        , su.su_username as s_username
										        , su.su_password as s_password
										        , ur.sur_id as r_id
										        , ur.sur_name as r_name
										FROM sys_user AS su
										INNER JOIN sys_user_role AS ur
										ON ur.sur_id = su.sur_id");
				$result = $qry->result();
				return $result;
			}
		}
	}

	public function error($act, $post) {
		if(isset($act)) {
			if($act == 'add') {
				$check = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_error_code = '{$post['code']}'");
				if($check->num_rows() > 0) {
					return array('mes' => 'Duplicate');
				}
				else {
					$data = array(
						'tet_error_code' => $post['code'],
						'tet_version' => $post['version'],
						'tet_name' => $post['name'],
						'tet_description' => $post['description'],
						'rss_id' => $post['system'],
						'su_id' => $this->session->userdata('id')
					);

					$this->db->insert('tbl_error_type', $data);
					return array('mes' => 'Success');
				}
			}
			if($act == 'edit') {
				$EID = $post['ErrorID'];
				$EName = $post['EName'];
				$RSSID = $post['ESys'];
				$ECode = $post['ECode'];
				$EVersion = $post['EVersion'];
				$EDesc = $post['EDesc'];

				$dataArray = array(
						'tet_error_code' => $ECode,
						'tet_version' => $EVersion,
						'tet_name' => $EName,
						'tet_description' => $EDesc,
						'rss_id' => $RSSID
					);

				$this->db->set($dataArray);
				$this->db->where('tet_id',$EID);
				$this->db->update('tbl_error_type'); 
				// gives UPDATE sys_user_role SET sur_name = $post['roleEdit'] WHERE sur_id = $post['roleEditID']

				return array('mes' => 'Updated');
			}

			if($act == 'getError1') {
				$qry = $this->db->query("SELECT TET.`tet_id`,
												TET.`tet_error_code`,
										        TET.`tet_version`,
										        TET.`tet_name`,
										        TET.`tet_description`,
										        TET.`tet_instruction`,
										        TET.`su_id`,
										        TET.`timestamp`,
										        IFNULL(RSS.`rss_id`,'') AS `rss_id`,
										        IFNULL(RSS.`rss_name`,'') AS `rss_name`,
										        IFNULL(RSS.`rss_timestamp`,'') AS `rss_timestamp`
										FROM `tbl_error_type` AS TET
										LEFT JOIN r_supported_system AS RSS
											ON TET.rss_id = RSS.rss_id");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getError') {
				$cond = '';
				$qry = '';
				if($post != NULL && $post != '') {
					$temp = $post;
					$cond = 'WHERE TET.su_id ='.$temp.'';
					$qry = $this->db->query("SELECT TET.`tet_id`,
												TET.`tet_error_code`,
										        TET.`tet_version`,
										        TET.`tet_name`,
										        TET.`tet_description`,
										        TET.`tet_instruction`,
										        TET.`su_id`,
										        TET.`timestamp`,
										        IFNULL(RSS.`rss_id`,'') AS `rss_id`,
										        IFNULL(RSS.`rss_name`,'') AS `rss_name`,
										        IFNULL(RSS.`rss_timestamp`,'') AS `rss_timestamp`
										FROM `tbl_error_type` AS TET
										LEFT JOIN r_supported_system AS RSS
											ON TET.rss_id = RSS.rss_id {$cond}");
				}
				else {
					$cond = '';
					$qry = $this->db->query("SELECT TET.`tet_id`,
												TET.`tet_error_code`,
										        TET.`tet_version`,
										        TET.`tet_name`,
										        TET.`tet_description`,
										        TET.`tet_instruction`,
										        TET.`su_id`,
										        TET.`timestamp`,
										        IFNULL(RSS.`rss_id`,'') AS `rss_id`,
										        IFNULL(RSS.`rss_name`,'') AS `rss_name`,
										        IFNULL(RSS.`rss_timestamp`,'') AS `rss_timestamp`
										FROM `tbl_error_type` AS TET
										LEFT JOIN r_supported_system AS RSS
											ON TET.rss_id = RSS.rss_id {$cond}");
				}

				$record = $qry->result();
				return $record;
			}
		}
	}

	public function attachment($act, $post, $file) {
		if($act == 'add') {
			$a = 0;
			$b = 0;
			$result = array();
			
			foreach($file["FileInputUpload"] as $row) {
				$result[] = $row;
				$a += 1;
			}
			foreach($file["FileInputUpload"]["name"] as $row) {
				$b += 1;
			}

			for($i = 0; $i < $b; $i++) {
				$file = '';

				// if(!empty($result[1][$i]))
				// {
				// 	$file = $result[0][$i];
				// }

				// if(file_exists("resources/attachments/" . $result[0][$i]) && $file != "")
				// {

				// 	$suffix = 0;
				// 	$name = pathinfo($result[0][$i], PATHINFO_FILENAME);
				// 	$extension = pathinfo($result[0][$i], PATHINFO_EXTENSION);
				// 	while(file_exists($result[0][$i]."/".$name.".".$extension))
				// 	{
				// 		$name .=$suffix;
				// 		$suffix++;
				// 	}
				// 	$basename = substr(md5(uniqid(rand())), 0, 11).".".$extension;
				// 	$sourcePath = $result[2][$i];
				// 	$targetPath = "resources/attachments/".$basename;

				// 	move_uploaded_file($sourcePath,$targetPath) ;
				// 	$file = $basename;
				// }
				// else if($file != '')
				// {
					// $sourcePath = $result[2][$i];
					// $targetPath = "resources/attachments/".$result[0][$i];
					// move_uploaded_file($sourcePath,$targetPath) ;
					// $file = $result[0][$i];
				// }

				$check = $this->db->query("SELECT * FROM tbl_attachement WHERE ta_attachement = '{$result[0][$i]}' AND tet_id = '{$post['error']}'");
				if($check->num_rows() > 0) {
					
				}
				else {
					$sourcePath = $result[2][$i];
					$targetPath = "resources/attachments/".$result[0][$i];
					move_uploaded_file($sourcePath,$targetPath) ;
					$file = $result[0][$i];

					$data = array(
						'tet_id'	=> $post['error'],
						'ta_attachement'	=> $file,
						'su_id' => $this->session->userdata('id')
					);

					$this->db->insert('tbl_attachement', $data);
				}
			}
			return array('mes' => 'Success');
		}
	}

	public function instruction($act, $post) {
		if(isset($act)) {
			if($act == 'add') {
				// foreach($post['code'] as $row) {
					// $val = $row;
					$data = array(
						'tet_id' => $post['error'],
						'ti_instruction' => $post['code'],
						'su_id' => $this->session->userdata('id')
					);

					$this->db->insert('tbl_instruction', $data);
				// }

				return array('mes' => 'Success');
			}
			if($act == "edit")
			{
				$ID = $post['InstructID'];
				$Desc = $post['InstructDesc'];

				$dataArray = array(
						'ti_instruction' => $Desc
					);

				$this->db->set($dataArray);
				$this->db->where('tet_id',$ID);
				$this->db->update('tbl_instruction'); 
				// gives UPDATE sys_user_role SET sur_name = $post['roleEdit'] WHERE sur_id = $post['roleEditID']

				return array('mes' => 'Updated');
			}

			if($act == 'getInstruction1') {
				$qry = $this->db->query("SELECT tet.tet_id as tet_id, 
												tet.tet_error_code as tet_error_code, 
												tet.tet_version as tet_version, 
												tet.tet_name as tet_name,
												ti.ti_id as ti_id, 
												ti.ti_instruction as ti_instruction,
												rss.rss_name as rss_name 
										FROM `tbl_instruction` as ti 
										INNER JOIN tbl_error_type as tet 
											ON tet.tet_id = ti.tet_id
										INNER JOIN r_supported_system as rss
											ON tet.rss_id = rss.rss_id");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getInstruction') {
				$qry = $this->db->query("SELECT tet.tet_id as tet_id, 
												tet.tet_error_code as tet_error_code, 
												tet.tet_version as tet_version, 
												tet.tet_name as tet_name,
												ti.ti_id as ti_id,  
												ti.ti_instruction as ti_instruction,
												rss.rss_name as rss_name  
										FROM `tbl_instruction` as ti 
										INNER JOIN tbl_error_type as tet 
											ON tet.tet_id = ti.tet_id
										INNER JOIN r_supported_system as rss
										ON tet.rss_id = rss.rss_id 
										WHERE ti.su_id = {$this->session->userdata('id')}");
				$record = $qry->result();
				return $record;
			}
		}
	}

	public function system_supported($act, $post) {
		if(isset($act)) {
			if($act == 'add') {
				$check = $this->db->query("SELECT * FROM r_supported_system WHERE rss_name = '{$post['name']}' ");
				if($check->num_rows() > 0) {
					return array('mes' => 'Duplicate');
				}
				else {
					$data = array('rss_name' => $post['name'], 'su_id' => $this->session->userdata('id'));

					$this->db->insert('r_supported_system', $data);
					return array('mes' => 'Success');
				}
			}
			if($act == 'edit')
			{
				$dataID = $post['ESysID'];
				$dataArray = array(
					'rss_name' => $post['ESysName']
				);
				$this->db->set($dataArray);
				$this->db->where('rss_id',$dataID);
				$this->db->update('r_supported_system'); 
				// gives UPDATE sys_user_role SET sur_name = $post['roleEdit'] WHERE sur_id = $post['roleEditID']

				return array('mes' => 'Updated');
			}

			if($act == 'getSystem1') {
				$qry = $this->db->query("SELECT * FROM r_supported_system");
				$record = $qry->result();
				return $record;
			}

			if($act == 'getSystem') {
				$cond = '';
				$temp = $this->session->userdata('id');
				if(isset($temp) && $temp != NULL && $temp != '') {
					$cond = 'WHERE su_id ='.$temp;
				}
				else {
					$cond = '';
				}
				$qry = $this->db->query("SELECT * FROM r_supported_system {$cond}");
				$record = $qry->result();
				return $record;
			}
		}
	}

	public function request($act, $post) {
		if(isset($act)) {
			if($act == 'getRequest') {
				$qry = $this->db->query("SELECT * FROM r_request_error");

				$result = $qry->result();
				return $result;
			}
		}
	}

	public function datamine($act, $post, $input)
	{
		if(isset($act)){
			if($act == 'add') {
				$file_name = $post;    
				
				//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
		 		$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
		          //Set to read only
		      	$objReader->setReadDataOnly(true); 		  
		        //Load excel file
				 $objPHPExcel=$objReader->load(FCPATH.'resources/excel/'.$file_name);		 
		         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Number of rows avalable in excel      	 
		         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
		          //loop from first data untill last data
		          for($i=2;$i<=$totalrows;$i++)
		          {
		          	  $number = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(); //Excel Column 1
		              $code = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 2			
		              $version = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 3 
					  $error = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 4
					  $description = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 5
					  $instruction =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 6

					  	$check1 = $this->db->query("SELECT * FROM tbl_error_type where tet_error_code = '{$code}' AND tet_version = '{$version}' AND tet_name = '{$this->db->escape_like_str($error)}' AND tet_description = '{$this->db->escape_like_str($description)}' AND rss_id != {$input['system']} ");
					  	if($check1->num_rows() > 0) {

					  	}
					  	else {
					  		$data_user=array(
					  					'tet_error_code'=>$code
					  					, 'tet_version'=>$version
					  					, 'tet_name'=>$error 
					  					, 'tet_description'=>$description
					  					, 'tet_instruction' =>$instruction 
					  					, 'su_id' => $this->session->userdata('id')
					  					, 'rss_id' => $input['system']
					  					);
					  		$this->db->insert('tbl_error_type', $data_user);
					  	}
					}
					$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE su_id = {$this->session->userdata('id')} AND rss_id = {$input['system']}");
					foreach($qry->result() as $row) {
						$qry1 = $this->db->query("SELECT * FROM tbl_instruction WHERE su_id = {$this->session->userdata('id')}");
						
						foreach ($qry->result() as $rows) {
							if($row->tet_id == $rows->tet_id) {
								$check = $this->db->query("SELECT * FROM tbl_instruction WHERE ti_instruction = '{$this->db->escape_like_str($row->tet_instruction)}' AND tet_id = {$row->tet_id} AND su_id = {$this->session->userdata('id')} ");
								if($check->num_rows() > 0) {

								}
								else {
									$data = array(
										'ti_instruction' => $row->tet_instruction,
										'su_id' => $this->session->userdata('id'),
										'tet_id' => $row->tet_id
									);
									$this->db->insert('tbl_instruction', $data);
								}
							}
						}
					}
				}

			if($act == 'datamine'){
				$chk = 0;
				$info = array();
        		$info2 = array();
				foreach ($post as $rec1):
	        		$line = preg_split('/\t+/', $rec1);
	        		if($line[0] != '')
	        		{
	        			$info = array(
									'tet_error_code' 		=> $line[0],
									'tet_version' 	=> $line[1],
									'tet_name'	=> $line[2],
									'tet_description'		=> $line[3]
								);

		        		$this->db->where(array(
									'tet_error_code' 		=> $line[0],
									'tet_version' 	=> $line[1],
									'tet_name'	=> $line[2],
									'tet_description'		=> $line[3]
								));

		        		$qry1 = $this->db->query("SELECT tet_id FROM tbl_error_type WHERE tet_name = '{$line[2]}'");
		        		if($qry1->num_rows() > 0) {
		        			foreach ($qry1->result() as $row) {
		        				$info2 = array(
		        					'tet_id' => $row->tet_id,
		        					'ti_instruction' => $line[4]
		        				);
		        			}
		        			$this->db->insert('tbl_instruction', $info2);
		        		}

		        		$qry = $this->db->get('tbl_error_type');

		        		if(!$qry->result()){
		        			$this->db->insert('tbl_error_type',$info);
		        			if($this->db->affected_rows()!=0){
		        				$chk += 1;
		        			}
		        		}
	        		}
		        endforeach;

		        // $temp = $this->session->userdata('s_id');
		        // $data4 = array(
		        // 	's_id' => $temp);
		        // $this->db->insert('tbl_datamine', $data4);
		        return array('mes' => 'Success');
		    }
		}
	}
}

?>