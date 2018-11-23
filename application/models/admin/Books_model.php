<?php
require_once  __DIR__."/../../core/Curd_Model.php";
class Books_model extends Curd_Model
{
	
	function __construct()
	{
		$this->_table = 'books';
		parent::__construct();
	}
}