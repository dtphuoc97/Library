<?php
require_once  __DIR__."/../../core/Curd_Model.php";


class User_model extends Curd_Model
{

	function __construct()
	{
		$this->_table = 'user';
		parent::__construct();
		
	}
	public function getDetailbyID($id)//lay info theo id
	{
		$where = 'user_id = '.$id;
		$limit = 1;
		//----------------------------------
		$r = $this->_select('*', $where,'',$limit);
		$r[0]['level_str']=cvt_level($r[0]['level']);
		//----------------------------------
		return $r[0];
	}

	public function getIDbyEmail($email)//lay id theo email
	{
		$where = "email = '{$email}' ";
		$limit = 1;
		//----------------------------------
		$r = $this->_select('*',$where,'',$limit);
		//----------------------------------
		return $r[0]['user_id'];
		
	}

	public function deletebyID($id)//xoa
	{
		$where = 'user_id = '.$id;
		$limit = 1;
		//----------------------------------
		return $this->_delete($where,$limit);
	}
	public function checkemail($email)
	{
		$where = "email = '{$email}'";
		$r = $this->_select('*',$where,'','');
		if(sizeof($r)==0) return true;
		return false;
	}
}
