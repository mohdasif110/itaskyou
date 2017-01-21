<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('userID, username,emailID,firstName,lastName,contactNo');
		$this -> db -> from($this->db->dbprefix('web_users'));
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1)
		{
			return $query->row();
		
		}else{
			
			return false;
		}
	}
}
?>