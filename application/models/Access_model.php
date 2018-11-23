<?php 

class Access_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function checklogin($user)
	{
		$email=$user['email'];
		$password=$user['password'];

		$q = "select * from user where email = '{$email}' and password = '{$password}' limit 1";
		$query = $this->db->query($q);

		$r = array();
		if($query->num_rows()==1)
		{		
			$r = $query->row_array();
			$r['check'] = true;
		}
		else
		{
			$r['check'] = false;
		}	
		return $r;
	}
}