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
		$this->template->appendTitle('Dashboard');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->addContentPage('admin/topbar','topbar');
		$this->template->addContentPage('admin/left-menu','left-menu');
		$this->template->addContentPage('admin/center-booka','center',$data);
		$this->template->show();
	}
}