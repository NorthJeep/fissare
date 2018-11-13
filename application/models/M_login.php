<?php

class M_login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	//Login function
	public function user_validate($act, $post)
	{
		if(isset($act))
		{
			if($act == 'login')
			{
				$qry = $this->db->query("SELECT * FROM sys_user WHERE su_username = '{$post['username']}' AND su_password = '{$post['password1']}'");
				if($qry->num_rows() > 0)
				{
					foreach($qry->result() as $row)
					{
						$this->session->set_userdata(array(
							'name' => $row->su_name,
							'role' => $row->sur_id,
							'id' => $row->su_id,
							'email' => $row->su_email,
							'address' => $row->su_address,
							'contact' => $row->su_contact
						));

						if($row->sur_id == 1)
							$sess_array['url'] = base_url('C_admin/index');
						else if($row->sur_id == 2)
							// $sess_array['url'] = base_url('C_user/index');
							$sess_array['url'] = base_url('C_guest');
						else
							$sess_array['url'] = base_url('C_guest');
					}
					$sess_array['IsError'] = 0;
				}
			}
			return $sess_array;
		}

		// $query = $this->db->query("SELECT * FROM sys_user WHERE s_username = '$username' AND s_password = '$password'");

		// if($query->num_rows() > 0)
		// {
		// 	foreach($query->result() as $row)
		// 	{
		// 		$this->session->set_userdata(array(
		// 			'username' => $row->Username,
		// 			'password' => $row->Password,
		// 			'roel' => $row->Role
		// 			));
		// 		if($row->Role == 'admin')
		// 			$sess_array['url'] = base_url('C_admin');
		// 		else if($row->Role == 'official')
		// 			$sess_array['url'] = base_url('C_lgu/');
		// 		else if($row->Role == 'officer')
		// 			$sess_array['url'] = base_url('C_bit');
		// 		else
		// 			$sess_array['url'] = base_url('C_login');
		// 	}
		// 	$sess_array['IsError'] = 0;
		// }
	}
}
?>