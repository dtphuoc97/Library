<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__."/../../core/Curd_Controller.php";
class Book extends Curd_Controller
{
	
	function __construct()
	{
		$this->_table = 'books';
		$this->_model = 'books_model';
		parent::__construct();
		
	}

	public function index()
	{
		$data['data'] = $this->_getList();
		$this->load->view('admin/books',$data);
	}
}