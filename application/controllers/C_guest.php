<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guest extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->library("pagination");
	}

	public function index()
	{
		if(isset($_POST['act'])) 
		{
			if($_POST['act'] == 'add') {
				$record = $this->M_guest->index('add', $_POST, '');
				echo json_encode($record);
				exit();
			}

			// if($_POST['act'] == 'search') {
			// 	$record = $this->M_guest->index('search', $_POST,'');
			// 	echo json_encode($record);
			// 	exit();
			// }
			if($_POST['act'] == 'search') {
				$record = $this->M_guest->index('search', $_POST, '');
				$output = '';
				if(count($record) > 0){
					foreach($record as $rec)
					{
						$output .= '
						<li class="list-group-item" style="color:black;">
							<a href="#" data-toggle="modal" style="color:black;" onclick="loadError('.$rec->tet_id.');">'.$rec->tet_name.'
							</a>
						</li>';
					}
				}
				else
				{
					$output .= '
						<li class="list-group-item" style="color:black;">
							Nothing to Show.
						</li>';
				}
				$output .='';

				$dataArray = array('DATA' => $output);

				echo json_encode($dataArray);
				exit();
			}
			if($_POST['act'] == 'auto_search') {
				$record = $this->M_guest->index('auto_search', $_POST, '');
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'wildsearch') {
				$record = $this->M_guest->index('wildsearch', $_POST, '');
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'getEList') {
				$record = $this->M_guest->index('wildsearch', $_POST, '');
				$output = '';
				if(count($record) > 0)
				{
					foreach($record as $rec)
					{
						$output .='
						<li class="list-group-item">
							<a href="#" data-toggle="modal" data-target="#ErrorModal" style="color:black;" onclick="loadError('.$rec->tet_id.');">'.$rec->tet_name.'
							</a>
						</li>';
					}
					
				}

				$dataArray = array('output' => $output);

				echo json_encode($dataArray);
				exit();
			}
			if($_POST['act'] == 'getData') {
				$record = $this->M_guest->index('getData', $_POST, '');
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'getData1') {
				$record = $this->M_guest->index('getData1', $_POST, '');
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'suppSystem') {

				$GovPanel = '';
				$SysPanel = '';
				$PNo = $_POST['PageNo'];
				$record = $this->M_guest->index('getGU', $PNo, '');
				if (count($record) != 0) 
				{	
					$ctr1 = 1;
					$active1 = '';
					foreach ($record as $rec) 
					{
						$userid = $rec->su_id;
						$username = $rec->su_name;
						$profile = $rec->su_profile;
						// $sysid = $rec['rss_id'];
						// $sysname = $rec['rss_name'];

						if($ctr1 == 1)
						{
							$active1 = ' active';
							$ctr1 = 0;

						}
						else
						{
							$active1 = '';
						}

						$record2 = $this->M_guest->index('getSystem',$userid,'');
						if(count($record2) != 0)
						{	
							$SysPanel .='<div class="tab-pane '.$active1.'" id="system-'.$userid.'">
						                    <label>'.$username.' Systems</label>
						                    <ul class="list-group list-group-flush">';
						                    
							foreach($record2 as $rec2)
							{
								$su_id = $rec2->su_id;
								$rss_id = $rec2->rss_id;
								$rss_name = $rec2->rss_name;
								$SysPanel .='<li class="list-group-item">
												<a href="#" data-toggle="modal" data-target="#SystemModal" style="color:#669fff;" 
												onclick="passData('.$rss_id.',`'.$rss_name.'`)">'.$rss_name.'</a>
											</li>'; 
							}
							$SysPanel .='</ul>
						                </div>';
						}
						$GovPanel .='<li class="nav-item">
				                      <a class="nav-link'.$active1.'" href="#system-'.$userid.'" role="tab" data-toggle="tab">
				                        <img src="'.base_url().'resources/profile/'.$profile.'" alt="system_Logo" width="auto" height="100px">
				                        <div class="clear-row"></div>'.$username.'
				                      </a>
				                    </li>';
					}
				}
				$output = array(
	                   	"GovPanel"   => $GovPanel,
	                    "SysPanel" => $SysPanel
	                );
				echo json_encode($output);
				// echo $record;
				exit();
			}
			if($_POST['act'] == 'getEInfo') {
				$record = $this->M_guest->index('getData', $_POST, '');
				foreach($record as $rec)
				{

					$record2 = $this->M_guest->index('getDownload1',$rec->tet_id,'');
					if(count($record2)>0)
					{
						$dlFlag = "TRUE";
					}
					else
					{
						$dlFlag = "FALSE";
					}

					$dataRecord = array(
						'rss_name' => $rec->rss_name,
						'tet_id' =>  $rec->tet_id,
						'tet_code' => $rec->tet_error_code,
						'tet_type' => $rec->tet_error_type,
						'tet_version' => $rec->tet_version,
						'tet_name' => $rec->tet_name,
						'tet_error_type' => $rec->tet_error_type,
						'tet_description' => $rec->tet_description,
						'tet_instruction' => $rec->tet_instruction,
						'tet_dlFlag' => $dlFlag
					);
				}


				
				// $dataArray = array(
				// 	'DATA' => $dataRecord
				// );

				echo json_encode($dataRecord);
				exit();
			}
			if($_POST['act'] == 'getEDetails') {
				$record = $this->M_guest->index('getData', $_POST, '');
				foreach($record as $rec)
				{

					$record2 = $this->M_guest->index('getDownload1',$rec->tet_id,'');
					if(count($record2)>0)
					{
						$dlList = array();
						foreach($record2 as $rec2)
						{
							$dlList[] = $rec2->ta_attachement;
						}
					}
					else
					{
						$dlList = '';
					}

					$dataRecord = array(
						'rss_name' => $rec->rss_name,
						'tet_id' =>  $rec->tet_id,
						'tet_code' => $rec->tet_error_code,
						'tet_type' => $rec->tet_error_type,
						'tet_version' => $rec->tet_version,
						'tet_name' => $rec->tet_name,
						'tet_error_type' => $rec->tet_error_type,
						'tet_description' => $rec->tet_description,
						'tet_instruction' => $rec->tet_instruction,
						'tet_dlList' => $dlList
					);
				}


				
				// $dataArray = array(
				// 	'DATA' => $dataRecord
				// );

				echo json_encode($dataRecord);
				exit();
			}
			if($_POST['act'] == 'getTopComment') {
				$record = $this->M_guest->index('getTopComment', $_POST, '');
				if(count($record) > 0)
				{
					foreach($record as $rec)
					{
						$record2 = $this->M_guest->index('getDownload',$rec->comment_id,'');
						if(count($record2) > 0)
						{
							$dlList = array();
							foreach($record2 as $rec2)
							{
								$dlList[] = $rec2->ta_attachement;
							}
							$dataRecord[] = array(
								'comment' => $rec->comment_desc,
								'file' => $dlList
							);
						}
						else
						{
							$dlList = array('');
							$dataRecord[] = array(
								'comment' => $rec->comment_desc
							);
						}

						
					}
				}
				else
				{
					$dataRecord = '';
				}
				
				echo json_encode($dataRecord);
				exit();
			}
			if($_POST['act'] == 'getComment') {
				$Output = 
				'<label>Comments</label>';
                $record = $this->M_guest->index('getComment', $_POST, '');
				if(count($record) > 0)
				{
					foreach($record as $rec1)
					{	
						$SubComment ='';
						$CID = $rec1->comment_id;

						$record0 = $this->M_guest->index('getDownload',$rec1->comment_id,'');
						if(count($record0) > 0)
						{
							$dlFlag = "TRUE";
						}
						else
						{
							$dlFlag = "FALSE";
						}


						$Output .=
						'<div class="card-header">
		                    <div>
		                      <div class="col-md-12">
		                        <label>'.$rec1->su_name.'</label>
		                        <div class="clear-row"></div>
		                        <label>Date: '.$rec1->comment_date.'</label>
		                      </div>
		                      <div class="row col-md-12">
		                        <div class="col-md-11">
		                          <p>'.$rec1->comment_desc.'</p>';
		                // $Output .= '<button id="dl-btn" type="button" class="btn btn-secondary float-right '.$dlFlag.'">Download Attachment</button>';
	                     if($this->session->has_userdata('id') && $dlFlag == "TRUE")
	                      {
	                        $Output .= '<button id="dl-btn" type="button" class="btn btn-secondary float-right" onclick="dlAttachment(``,'.$CID.')">Download Attachment</button>';
	                      }
	                      elseif ($dlFlag == "TRUE")
	                      {
	                        $Output .= '<button id="dl-btn" type="button" class="btn btn-secondary float-right req-sign-up">Download Attachment</button>';
	                      }
		                
		                $Output .=        
		                	'</div>';
		                if($this->session->has_userdata('id'))
					    {          
					    $ReactNo = $this->M_guest->index('chkReact',$CID,'check');


				         $Output .=     '<div class="col-md-1 d-inline-block">
				                            <label>Is this helpful?</label>
				                            <div class="clear-row"></div>
			          						<button class="btn btn-primary btn-sm" onclick="commentReact('.$CID.',1);">
					         					<i class="material-icons">thumb_up</i> '.$ReactNo["PSCount"].'
					         				</button>
					                        <button class="btn btn-danger btn-sm" onclick="commentReact('.$CID.',0);">
					                        	<i class="material-icons">thumb_down</i> '.$ReactNo["NGCount"].'
					                        </button>
				                        </div>';
				        }
		                $Output .='</div>
		                      <!-- COMMENT INPUT -->
		                      <form id="formSubComment'.$CID.'" name="formComment'.$CID.'" data-source="'.base_url("C_guest/Index").'" novalidate>
		                      <div class="col-md-12 d-block">

		                        <div class="col-md-8">
		                        	<input type="text" name="CID" value="'.$CID.'" hidden>
	                            	<input type="hidden" name="act" value="subcomment">
		                            <textarea id="commentTxt'.$CID.'" name="commentTxt" placeholder="Comment something..." class="form-control" row="3"></textarea>
		                            <input id="fileUp'.$CID.'" name="fileUp[]" type="file" placeholder="Upload something..." class="form-control" style="display:none;" multiple enctype="multipart/form-data">
		                        </div>';
		                        if($this->session->has_userdata('id'))
							                    {	
			                        $Output .=
			                        '<div class="col-md-4">
				                        <label class="btn btn-primary btn-round" for="fileUp'.$CID.'"><i class="material-icons">attachment</i></label>
				                        <button type="button" class="btn btn-primary btn-round comment-btn"><i class="material-icons" onclick="SubCommentAdd('.$CID.');">comment</i></button>
			                        </div>';
		                    	}
		                    	else
		                    	{
		                    		$Output .=
		                    		'<div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-round req-sign-up">
                                      <i class="material-icons">attachment</i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-round req-sign-up">
                                      <i class="material-icons">comment</i>
                                    </button>
                                  </div>';
		                    	}

		                     $Output .='</div>
		                      </form>
		                      <!-- END COMMENT INPUT -->
		                    </div>';
                    
                      	$record2 = $this->M_guest->index('getSubComment',$CID,'');
					
						if(count($record2) > 0)
						{
							$Output .= '<!-- START SUBCOMMENT -->
                    					<div id="subcomment" class="col-md-12" style="overflow-y: auto; max-height: 500px;">';
							foreach($record2 as $rec2)
							{
								$record3 = $this->M_guest->index('getDownload',$rec2->comment_id,'');
								if(count($record3) > 0)
								{
									$dlFlag1 = "TRUE";
								}
								else
								{
									$dlFlag1 = "FALSE";
								}

								$Output .='<div class="col-md-12" style="background-color: #ededed;">
						                        <div class="col-md-12">
						                          <label>'.$rec2->su_name.'</label>
						                          <div class="clear-row"></div>
						                          <label>Date: '.$rec2->comment_date.'</label>
						                        </div>
						                        <div class="col-md-12 form-inline">
						                          <div class="col-md-11 d-inline-block">
						                            <p>'.$rec2->comment_desc.'</p>';
						                        if($this->session->has_userdata('id') && $dlFlag1 == "TRUE")
							                    {
							                    	$Output .=          
								                '<button type="button" class="btn btn-secondary float-right" onclick="dlAttachment(``,'.$CID.')">Download Attachment</button>';
							                    }
							                    elseif($this->session->has_userdata('id') && $dlFlag1 == "FALSE")
							                    {
							                    	$Output .='';
							                    }
							                    else
							                    {
							                    	$Output .=          
								                '<button type="button" class="btn btn-secondary float-right req-sign-up">Download Attachment</button>';
							                    }
						        $Output .=      '</div>';
						        if($this->session->has_userdata('id'))
							    {              
							    $ReactNo = $this->M_guest->index('chkReact',$rec2->comment_id,'check');      
						         $Output .=     '<div class="col-md-1 d-inline-block">
						                            <label>Is this helpful?</label>
						                            <div class="clear-row"></div>
					          						<button class="btn btn-primary btn-sm" onclick="commentReact('.$rec2->comment_id.',1);">
							         					<i class="material-icons">thumb_up</i>  '.$ReactNo["PSCount"].'
							         				</button>
							                        <button class="btn btn-danger btn-sm" onclick="commentReact('.$rec2->comment_id.',0);">
							                        	<i class="material-icons">thumb_down</i>  '.$ReactNo["NGCount"].'
							                        </button>
						                        </div>';
						        }
						        $Output .=       '</div>
						                      </div>';
							}
							$Output .= '</div>';
						}

                  		$Output .= '</div>';
						
					}
				}

				// foreach($record as $rec)
				// {
					// $dataRecord = array(
					// 	'tet_id' =>  $rec->tet_id,
					// 	'tet_code' => $rec->tet_error_code,
					// 	'tet_version' => $rec->tet_version,
					// 	'tet_name' => $rec->tet_name,
					// 	'tet_error_type' => $rec->tet_error_type,
					// 	'tet_description' => $rec->tet_description,
					// 	'tet_instruction' => $rec->tet_instruction
					// );
				// }

				
				$dataArray = array(
					'DATA' => $Output
				);

				echo json_encode($dataArray);
				exit();
			}
			if($_POST['act'] == 'comment') {
				$record = $this->M_guest->index('comment', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'subcomment') {
				$record = $this->M_guest->index('subcomment', $_POST, $_FILES);
				echo json_encode($record);
				exit();
			}
			if($_POST['act'] == 'dlAttachment') {

				if($_POST['EID'] !='' && $_POST['CID'] == '')
				{
					$EID = $_POST['EID'];
					$insertDL = $this->M_guest->index('insertErrorDL',$EID,'EID');

					$qry = $this->db->query("SELECT * FROM tbl_attachement WHERE tet_id = {$_POST['EID']}");
		
					if($qry->num_rows() > 0) {
						foreach($qry->result() as $row) 
						{
							$path = 'resources/attachments/'.$row->ta_attachement;

							$this->zip->read_file($path);
						}
					}

					$qry1 = $this->db->query("SELECT TE.tet_name, 
													TI.ti_instruction 
											FROM tbl_error_type as TE 
											INNER JOIN tbl_instruction as TI 
												ON TI.tet_id = TE.tet_id 
											WHERE TE.tet_id = {$_POST['EID']}");
					
					if($qry1->num_rows() > 0) {
						foreach($qry1->result() as $row1) {
							$name = $row1->tet_name.'.txt';
							$data = $row1->ti_instruction;

							$this->zip->add_data($name, $data);
						}
					}

					$this->zip->archive('resources/files/file.zip');

					// $this->M_user->user('td', $_GET);

					$this->zip->download('file.zip');
				}
				elseif($_POST['EID'] == '' && $_POST['CID'] != '')
				{
					$CID = $_POST['CID'];
					$insertDL = $this->M_guest->index('insertErrorDL',$CID,'CID');

					$qry = $this->db->query("SELECT * FROM tbl_attachement WHERE cm_id = {$_POST['CID']}");
		
					if($qry->num_rows() > 0) {
						foreach($qry->result() as $row) {
							$path = 'resources/attachments/'.$row->ta_attachement;

							$this->zip->read_file($path);
						}
					}

					$qry1 = $this->db->query("SELECT TE.tet_name, 
													TI.ti_instruction 
											FROM tbl_error_type as TE 
											INNER JOIN tbl_instruction as TI 
												ON TI.tet_id = TE.tet_id 
											WHERE TE.tet_id = {$_POST['CID']}");
					
					if($qry1->num_rows() > 0) {
						foreach($qry1->result() as $row1) {
							$name = $row1->tet_name.'.txt';
							$data = $row1->ti_instruction;

							$this->zip->add_data($name, $data);
						}
					}

					$this->zip->archive('resources/files/file.zip');

					// $this->M_user->user('td', $_GET);

					$this->zip->download('file.zip');
				}
				exit();
			}
			if($_POST['act'] == 'commentReact'){
				$checkReact = $this->M_guest->index('react',$_POST,'check');
				if(count($checkReact) > 0)
				{
					$React = $this->M_guest->index('react',$_POST,'update');
				}
				else
				{
					$React = $this->M_guest->index('react',$_POST,'insert');
				}
				echo json_encode($React);
				exit();
			}
		}
		if(isset($_GET['PaginationNo']))
		{
			$PaginationNo = $this->M_guest->index('getPagination','','');

		}
		// $data['downloadChk'] = $this->M_guest->('getDownload','','');
		$data['system'] = $this->M_admin->system_supported('getSystem', '');
		$data['error'] = $this->M_admin->error('getError', '');
		$data['instruction'] = $this->M_user->user('getInstruction', '');
		$data['user'] = $this->M_guest->index('getUser', '','');

		$this->load->view('index', $data);
	}
	public function print()
	{
		if(isset($_GET['ErrorID']))
		{
			$data['Error'] = $this->M_guest->print('getError',$_GET['ErrorID']);
			$this->load->view('print/ErrorPrint', $data);
			
		}
		if(isset($_GET['Error']))
		{
			$data['Error'] = $this->M_guest->print('getDetails',$_GET['Error']);
			$this->load->view('print/ErrorDetails', $data);
			
		}
		// $this->load->view('print/ErrorPrint', $data);
		
	}

}
?>