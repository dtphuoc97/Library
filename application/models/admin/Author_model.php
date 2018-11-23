<?php 
require_once  __DIR__."/../../core/Curd_Model.php";

class Author_model extends Curd_Model
{

	function __construct()
	{
		$this->_table = 'author';
		parent::__construct();
		
	}
	public function getDetailbyID($id)//lay info theo id
	{
		$where = 'author_id = '.$id;
		$limit = 1;
		//----------------------------------
		$r = $this->_select('*', $where,'',$limit);
		//----------------------------------
		return $r[0];
	}

	public function deletebyID($id)//xoa
	{
		$where = 'author_id = '.$id;
		$limit = 1;
		//----------------------------------
		return $this->_delete($where,$limit);
	}
}