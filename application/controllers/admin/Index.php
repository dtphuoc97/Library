<?php

class Index extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = $this->session->userdata('user');
		$this->template->appendTitle('Dashboard');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->addContentPage('admin/topbar','topbar');
		$this->template->addContentPage('admin/left-menu','left-menu');
		$this->template->addContentPage('admin/center-index','center',$data);
		$this->template->show();
	}
}