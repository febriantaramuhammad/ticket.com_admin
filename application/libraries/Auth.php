<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth library
 */
 
class Auth
{
	var $CI = NULL;
	
	function __construct()
	{
		// get CI's object
		$this->CI =& get_instance();		
		$this->CI->load->helper('cookie');
		$this->CI->load->library('session');
		$this->CI->load->database();
		//$this->db_users = $this->CI->load->database('users', TRUE);
	}
	
	// untuk validasi login sales
	/*function do_login_sales($username,$password)
	{
		// cek di database, ada ga?
		global $username_,$password_;
		$username_ = $this->CI->db->escape_str($username);
		$password_ = $this->CI->db->escape_str($password);
		$this->db_users->from('user_employee');
		$this->db_users->where('DSR_Code',$username_);
		$this->db_users->where('Date_Of_Birth',$password_);
		$this->db_users->where('Status','ACTIVE');
		$result = $this->db_users->get();
		if($result->num_rows() == 0) 
		{
			// username dan password tsb tidak ada 
			return false;
		}
		else	
		{
			// jika ada, maka ambil informasi dari database
			$userdata = $result->row();
			$fo_level = array('SPG','SPB','FO','Funding Officer','DSR');
			$spv_level = array('Supervisor','SPV','ASM','RSM','ASH','BSH');
			if (in_array($userdata->Position, $fo_level)){
			    $level = 'staff';
			}
			if (in_array($userdata->Position, $spv_level)){
			    $level = 'leader';
			}
			$session_data = array(
				'username'	=> $userdata->DSR_Code,
				'nik'=> $userdata->DSR_Code,
				'realname'	=> $userdata->Name,
				'branch'	=> $userdata->Branch,
				'position'	=> $userdata->Position,
				'level'		=> $level
			);
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}*/
	
	// untuk validasi login sales
	function do_login_sales($username,$password)
	{
		// API key
		$apiKey = '4ad75498f665ec44c5b91e70c3cf6698';

		// API auth credentials
		$apiUser = "admindika";
		$apiPass = "B3ndh1L2019";

		// API URL
		$url = 'https://rest-api.ptdika.com/api/user/login_sales?username='.$username.'&password='.$password;

		// Create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
		curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");

		$result = curl_exec($ch);

		// Close cURL resource
		curl_close($ch);
		
		$data = json_decode($result);
		$responStatus = $data->status;
		
		if($responStatus == '1'){
		    $userdata = $data->data;
			$fo_level = array('SPG','SPB','FO','Funding Officer','DSR','RO');
			$spv_level = array('Supervisor','SPV','ASM','RSM','ASH','BSH');
			if (in_array($userdata->Position, $fo_level)){
			    $level = 'staff';
			}
			if (in_array($userdata->Position, $spv_level)){
			    $level = 'leader';
			}
			$session_data = array(
				'username'	=> $userdata->DSR_Code,
				'nik'=> $userdata->DSR_Code,
				'realname'	=> $userdata->Name,
				'branch'	=> $userdata->Branch,
				'position'	=> $userdata->Position,
				'level'		=> $level
			);
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
		else if($responStatus == '0'){
			return false;
		}
		else{
		    $this->do_login_saless($username,$password);
			return true;
		}
	}
	
	// untuk validasi login sales from local database
	function do_login_saless($username,$password)
	{
		// cek di database, ada ga?
		global $username_,$password_;
		$username_ = $this->CI->db->escape_str($username);
		$password_ = $this->CI->db->escape_str($password);
		$this->CI->db->from('`internal`.`data_sales`');
		$this->CI->db->where('DSR_Code',$username_);
		$this->CI->db->where('Date_Of_Birth',$password_);
		$this->CI->db->where('Status','ACTIVE');
		$result = $this->CI->db->get();
		if($result->num_rows() == 0) 
		{
			// username dan password tsb tidak ada 
			return false;
		}
		else	
		{
			// jika ada, maka ambil informasi dari database
			$userdata = $result->row();
			$fo_level = array('SPG','SPB','FO','Funding Officer','DSR','RO');
			$spv_level = array('Supervisor','SPV','ASM','RSM','ASH','BSH');
			if (in_array($userdata->Position, $fo_level)){
			    $level = 'staff';
			}
			if (in_array($userdata->Position, $spv_level)){
			    $level = 'leader';
			}
			$session_data = array(
				'username'	=> $userdata->DSR_Code,
				'nik'=> $userdata->DSR_Code,
				'realname'	=> $userdata->Name,
				'branch'	=> $userdata->Branch,
				'position'	=> $userdata->Position,
				'level'		=> $level
			);
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}
	
	// untuk validasi login admin
	function do_login($username,$password)
	{
		// cek di database, ada ga?
		global $username_,$password_;
		$username_ = $this->CI->db->escape_str($username);
		$password_ = $this->CI->db->escape_str($password);
		$this->CI->db->from('users');
		$this->CI->db->where('username',$username_);
		$this->CI->db->where('password=MD5("'.$password_.'")','',false);
		$this->CI->db->where('status','active');
		$result = $this->CI->db->get();
		if($result->num_rows() == 0) 
		{
			// username dan password tsb tidak ada 
			return false;
		}
		else	
		{
			// ada, maka ambil informasi dari database
			$userdata = $result->row();
			$session_data = array(
				'username'	=> $userdata->username,
				'realname'	=> $userdata->name,
				'branch'	=> $userdata->branch,
				'position'	=> '0',
				'level'		=> $userdata->privilege
			);
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}
	
	// untuk mengecek apakah user sudah login/belum
	function is_logged_in()
	{
		if($this->CI->session->userdata('username') == '')
		{
			return false;
		}
		return true;
	}
	// untuk logout
	function do_logout()
	{
		$this->CI->session->sess_destroy();	
	}
}