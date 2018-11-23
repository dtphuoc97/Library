<?php 

class Curd_Model extends MY_Model
{
	protected $_table = '';

	function __construct()
	{
		parent::__construct();

	}
	
	public function getList()//lay toan bo table
	{
		$order = 'date_create desc';
		return $this->_select('*','',$order,'');
	}

	public function insert($data)
	{
		$this->db->insert($this->_table,$data);
		if($this->db->affected_rows()==1) return true;
		return false;
	}
	public function getCondition($col, $where, $order, $limit)
	{
		return $this->_select($col, $where, $order, $limit);
	}
	//----------------------------------------------------
	protected function _select($col, $where, $order, $limit)
	{	
		$q = "select ".$col." from ".$this->_table." ";
		if($where != '') $q.= "where ".$where." ";
		if($order != '') $q.= "order by ".$order." ";
		if($limit != '') $q.= "limit ".$limit." ";
		//--------------------------------------
		$query=$this->db->query($q);
		$r=$query->result_array();
		return $r;
	}

	protected function _delete($where, $limit)
	{
		$q = "delete from ".$this->_table." ";
		if($where != '') $q.= "where ".$where." ";
		if($limit != '') $q.= "limit ".$limit." ";
		//--------------------------------------
		$query=$this->db->query($q);
		//--------------------------------------
		if($this->db->affected_rows()==1) return true;
		return false;
	}
}