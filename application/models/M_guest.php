<?php

class M_guest extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}

	public function index($act, $post, $file) {
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
				$qry = $this->db->query("SELECT * 
										FROM tbl_error_type 
										WHERE tet_name 
											LIKE '%{$post['search']}%' 
												OR tet_description 
											LIKE '%{$post['search']}%'");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getPagination'){

				$qry = $this->db->query('SELECT SU.su_id,
												SU.su_name,
                                                TA.agency_name,
										        SU.su_profile
										FROM sys_user AS SU
                                        LEFT JOIN tbl_agency AS TA 
                                        	ON SU.su_agency = TA.agency_id');
				$record = $qry->result();
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
			// if($act == 'getData') {
			// 	$qry = $this->db->query("SELECT * FROM tbl_error_type WHERE tet_id = {$post['id']}");
			// 	$record = $qry->result();
			// 	return $record;
			// }
			if($act == 'getTopComment'){
				$qry = $this->db->query('SELECT TC.comment_id,
												TC.comment_tet,
										        TC.comment_ref,
										        TC.comment_desc,
										        TCR.CREACT
										FROM tbl_comment AS TC
										INNER JOIN (SELECT TCR2.comment_id, COUNT(TCR2.react) AS CREACT
										            FROM tbl_comment_react AS TCR2
										            WHERE TCR2.react = 1
										           GROUP BY TCR2.comment_id) AS TCR
											ON TCR.comment_id = TC.comment_id
										WHERE TC.comment_tet = '.$post["id"].'
											OR TC.comment_ref = '.$post["id"].'
										LIMIT 5
										');
				$record = $qry->result();
				return $record;
			}
			if($act == 'getData') {
				$qry = $this->db->query("SELECT * 
										FROM tbl_error_type 
										INNER JOIN r_supported_system
											ON tbl_error_type.rss_id = r_supported_system.rss_id
										WHERE tet_id = {$post['id']}");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getData1') {
				$qry = $this->db->query("SELECT * 
										FROM tbl_instruction as ti 
										inner join tbl_error_type as tet 
											on tet.tet_id = ti.tet_id 
										inner join r_supported_system as rss 
											on rss.rss_id = tet.rss_id 
										WHERE ti.tet_id = {$post['id']}");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getGU') {
				$Offset = '';
				// $PNo = $post['PageNo'];
				if($post > 1)
				{
					$Offset = $post*3;
					
					$qry = $this->db->query('SELECT SU.su_id,
												SU.su_name,
                                                TA.agency_name,
										        SU.su_profile
										FROM sys_user AS SU
                                        LEFT JOIN tbl_agency AS TA 
                                        	ON SU.su_agency = TA.agency_id
										LIMIT 3 OFFSET '.$post.' ');
					// $this->db->limit($Offset,3);
				}
				else
				{
					$qry = $this->db->query("SELECT SU.su_id,
												SU.su_name,
										        TA.agency_name,
										        SU.su_profile
										FROM sys_user AS SU
                                        LEFT JOIN tbl_agency AS TA 
                                        	ON SU.su_agency = TA.agency_id
										LIMIT 3");
				}
				
				// $qry = $this->db->query("SELECT SU.su_id,
				// 								SU.su_name,
				// 						        SU.su_profile
				// 						FROM sys_user AS SU
				// 						LIMIT 3 OFFSET 3");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getSystem') {
				$userID = $post;
				// $Offset = '';
				// if($post['PageNo'] > 1)
				// {
				// 	$OffsetNo = $post['PageNo']*3;
				// 	$Offset = 'OFFSET '.$OffsetNo.'';
				// }
				$qry = $this->db->query("SELECT su_id,
										        rss_id,
										        rss_name
										FROM r_supported_system
										WHERE su_id = {$userID}
										ORDER BY su_id");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getComment'){
				$qry = $this->db->query("SELECT TC.comment_id,
												TC.comment_tet,
										        TC.comment_ref,
										        TC.comment_user,
										        TC.comment_desc,
										        TC.comment_date,
										        SU.su_name,
										        TA.agency_name
										FROM tbl_comment AS TC
										INNER JOIN sys_user AS SU
											ON TC.comment_user = SU.su_id
										INNER JOIN tbl_agency AS TA 
											ON SU.su_agency = TA.agency_id
										WHERE comment_tet = {$post['id']}
										ORDER BY TC.comment_id DESC");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getSubComment'){
				$qry2 = $this->db->query("SELECT TC.comment_id,
														TC.comment_tet,
												        TC.comment_ref,
												        TC.comment_user,
												        TC.comment_desc,
												        TC.comment_date,
												        SU.su_name,
												        TA.agency_name
												FROM tbl_comment AS TC
												INNER JOIN sys_user AS SU
													ON TC.comment_user = SU.su_id
												INNER JOIN tbl_agency AS TA 
													ON SU.su_agency = TA.agency_id
												WHERE comment_ref = {$post}
												ORDER BY TC.comment_id DESC");
				
				$record = $qry2->result();
				return $record;
			}
			if($act == 'comment'){
				$data = array(
					'comment_tet' => $post['EID'],
					'comment_user' => $this->session->userdata('id'),
					'comment_desc' => $post['commentTxt'],
					'comment_date' => $this->db->select('NOW() as db_date')->get()->row()->db_date
				);
				$this->db->insert('tbl_comment', $data);

				$getLast = $this->db->query("SELECT * FROM tbl_comment ORDER BY comment_id DESC LIMIT 1");
				$record = $getLast->result();
				foreach($record as $rec)
				{
					$CID = $rec->comment_id;
				}

				$a = 0;
				$b = 0;
				$result = array();
				foreach($file["fileUp"] as $row) {
					$result[] = $row;
					$a += 1;
				}
				foreach($file["fileUp"]["name"] as $row) {
					$b += 1;
				}

				for($i = 0; $i < $b; $i++) 
				{
					$file = '';
					$check = $this->db->query("SELECT * FROM tbl_attachement WHERE ta_attachement = '{$result[0][$i]}' AND cm_id = '{$CID}'");
					if($check->num_rows() > 0) 
					{
						
					}
					else 
					{
						$sourcePath = $result[2][$i];
						$targetPath = "resources/attachments/".$result[0][$i];
						move_uploaded_file($sourcePath,$targetPath) ;
						$file = $result[0][$i];

						$data = array(
							'cm_id'	=> $CID,
							'ta_attachement'	=> $file,
							'su_id' => $this->session->userdata('id')
						);

						$this->db->insert('tbl_attachement', $data);
					}
				}
				return array('mes' => 'Success');
			}
			if($act == 'subcomment'){
				$data = array(
					'comment_ref' => $post['CID'],	
					'comment_user' => $this->session->userdata('id'),
					'comment_desc' => $post['commentTxt'],
					'comment_date' => $this->db->select('NOW() as db_date')->get()->row()->db_date
					);

				$this->db->insert('tbl_comment', $data);

				$getLast = $this->db->query("SELECT * FROM tbl_comment ORDER BY comment_id DESC LIMIT 1");
				$record = $getLast->result();
				foreach($record as $rec)
				{
					$CID = $rec->comment_id;
				}
				$a = 0;
				$b = 0;
				$result = array();
				foreach($file["fileUp"] as $row) {
					$result[] = $row;
					$a += 1;
				}
				foreach($file["fileUp"]["name"] as $row) {
					$b += 1;
				}

				for($i = 0; $i < $b; $i++) 
				{
					$file = '';
					$check = $this->db->query("SELECT * FROM tbl_attachement WHERE ta_attachement = '{$result[0][$i]}' AND cm_id = '{$CID}'");
					if($check->num_rows() > 0) 
					{
						
					}
					else 
					{
						$sourcePath = $result[2][$i];
						$targetPath = "resources/attachments/".$result[0][$i];
						move_uploaded_file($sourcePath,$targetPath) ;
						$file = $result[0][$i];

						$data = array(
							'cm_id'	=> $CID,
							'ta_attachement'	=> $file,
							'su_id' => $this->session->userdata('id')
						);

						$this->db->insert('tbl_attachement', $data);
					}
				}
				return array('mes' => 'Success');
			}
			if($act == 'getDownload'){
				$qry = $this->db->query("SELECT *
										FROM tbl_attachement
										WHERE cm_id = {$post}");
				$record = $qry->result();
				return $record;
			}
			if($act == 'getDownload1'){
				$qry = $this->db->query("SELECT *
										FROM tbl_attachement
										WHERE tet_id = {$post}");
				$record = $qry->result();
				return $record;
			}
			if($act == 'insertErrorDL') {

				if($file == "EID")
				{
					$data = array(
					'tet_id' => $post,
					'td_user' => $this->session->userdata('id'),
					'td_date' => $this->db->select('NOW() as db_date')->get()->row()->db_date
					);
					$this->db->insert('tbl_download', $data);
					$data = '';
				}
				else
				{
					$data = array(
					'cm_id' => $post,
					'td_user' => $this->session->userdata('id'),
					'td_date' => $this->db->select('NOW() as db_date')->get()->row()->db_date
					);
					$this->db->insert('tbl_download', $data);
					$data = '';
				}
			}
			if($act == 'react'){
				if($file == 'check')
				{
					$UserID = $this->session->userdata('id');
					$CheckQry = $this->db->query("SELECT * 
								FROM tbl_comment_react 
								WHERE comment_id = {$post['CID']} 
									AND user_id = {$UserID}");
					$record = $CheckQry->result();
					return $record;
				}
				elseif($file == 'update')
				{
					if($post['react'] == 0)
					{
						$react = 0;
					}
					else
					{
						$react = 1;
					}
					$UserID = $this->session->userdata('id');
					$dataArray = array(
						'react' => $react
					);
					$whereArray = array(
						'comment_id' => $post['CID'],
						'user_id' => $UserID
					);
					$this->db->set($dataArray);
					$this->db->where($whereArray);
					$this->db->update('tbl_comment_react'); 

					return array( 'mes' => 'Updated');
				}
				elseif($file == 'insert')
				{
					$UserID = $this->session->userdata('id');
					$dataArray = array(
						'comment_id' => $post['CID'], 
						'user_id' => $UserID,
						'react' => $post['react']
					);
					$this->db->insert('tbl_comment_react',$dataArray); 
					return array( 'mes' => 'Inserted');
				}
			}
			if($act == 'chkReact'){
				if($file == 'check')
				{
					$UserID = $this->session->userdata('id');
					$NGQry = $this->db->query("SELECT COUNT(comment_id) AS NG_Count
												FROM tbl_comment_react
												WHERE react = 0
												AND comment_id = ".$post."");
					$PSQry = $this->db->query("SELECT COUNT(comment_id) AS PS_Count
												FROM tbl_comment_react
												WHERE react = 1
												AND comment_id = ".$post."");
					$NGResult = $NGQry->result();
					$PSResult = $PSQry->result();
					foreach($NGResult as $NGRec)
					{
						$NGCount = $NGRec->NG_Count;
					}
					foreach($PSResult as $PSRec)
					{
						$PSCount = $PSRec->PS_Count;
					}
					// $record = $CheckQry->result();
					$record = array(
						'PSCount' => $PSCount,
						'NGCount' => $NGCount
					);
					return $record;
				}
			}
		}
	}
	public function print($print, $post){
		if(isset($print))
		{
			if($print == 'getError'){
				$qry = $this->db->query("SELECT * 
										FROM tbl_error_type 
										INNER JOIN r_supported_system
											ON tbl_error_type.rss_id = r_supported_system.rss_id
										WHERE tet_id = ".$post."");
				$record = $qry->result();
				return $record;
			}
			if($print == 'getDetails'){
				$EID = $post;
				// $qry = $this->db->query("SELECT * 
				// 						FROM tbl_error_type 
				// 						INNER JOIN r_supported_system
				// 							ON tbl_error_type.rss_id = r_supported_system.rss_id
				// 						WHERE tbl_error_type.tet_id = ".$EID."
				// 						AND r_supported_system.rss_id = '".$SID."'");
				$qry = $this->db->query("SELECT * 
										FROM tbl_error_type 
										INNER JOIN r_supported_system
											ON tbl_error_type.rss_id = r_supported_system.rss_id
										WHERE tbl_error_type.tet_id = ".$EID."");
				$record = $qry->result();
				return $record;
			}
		}
	}
}
?>