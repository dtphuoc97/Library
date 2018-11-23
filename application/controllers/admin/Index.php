<?php

class Index extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
	public function index()
	{
		$data = $this->session->userdata('user');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->appendTitle('Dashboard');
		$this->addContentPage('admin/topbar','topbar');
		$this->addContentPage('admin/left-menu','left-menu');
		$this->addContentPage('admin/center-index','center',$data);
	}
}