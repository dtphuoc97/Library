<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	protected $_user = array();

	private $__permission = 0;
	private $__islogin;

	function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		$controller = strtolower($controller);

		switch ($controller) 
		{
			case 'admin':
			{
				$this->__checklogin();
				if (empty($this->__islogin)) redirect(base_url('access'),'refresh'); // chua login -> ve trang login
				if ($this->__permission<1) redirect(base_url(),'refresh'); //da login, khong du quyen truy cap -> ve trang chu
			}
			break;
			// case 'cron':
			// {
			// 	if (empty($this->__islogin)) redirect(base_url('access'),'refresh'); // chua login -> ve trang login
			// 	if ($this->__permission<2) redirect(base_url(),'refresh'); //da login, khong du quyen truy cap -> ve trang chu
			// 	$this->__checklogin();
			// }
			// break;
			default:
			{
				//truy cap trang nguoi dung, notthing
			}	
			break;
		}
	}
	private function __checklogin()
	{
		$this->__islogin = $this->session->userdata('infologin');
		if (!empty($this->__islogin))
		{
			$this->_user = $this->session->userdata('user');
			$this->__permission = $this->_user['level'];
		}
	}
}