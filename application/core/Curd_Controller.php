<?php 

class Curd_Controller extends MY_Controller
{
	protected $_table = '';
	protected $_model = '';

	function __construct()
	{
		parent::__construct();

		if($this->_table != '' && $this->_model != '')
		{
			$this->load->model('admin/'.$this->_model);
		}
	}
	public function _getList()
	{
		return $this->{$this->_model}->getList();
	}
	protected function _insert($data)
	{
		return $this->{$this->_model}->insert($data);
	}
	protected function _deletebyID($id)
	{
		return $this->{$this->_model}->deletebyID($id);
	}
	protected function _getDetailbyID($id)
	{
		return $this->{$this->_model}->getDetailbyID($id);
	}
	protected function _getCondition($col, $where, $order, $limit)
	{
		return $this->{$this->_model}->getCondition($col, $where, $order, $limit);
	}
}