<?php

class Access extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('access_model');
	}
	public function index()
	{
		$this->load->view('access/index');
	}
	public function login()
	{
		$result = array();
		$user = array();
		$user['email'] = $this->input->post('email');
		$user['password'] =md5($this->input->post('password'));

		$login = $this->access_model->checklogin($user);
		if($login['check'])//dang nhap thanh cong
		{ 
			$result['status']= true;

			$infologin = array ( 'accept'=>true );// sesssion bo sung cac thong tin dang nhap ve sau

			$this->session->set_userdata('user',$login);
			$this->session->set_userdata('infologin',$infologin);

			switch ($login['level'])//kiem tra cap bac user de xac dinh redirect
			{
				case 1: //level 1 --> di toi trang admin
					$result['url'] = base_url('admin/dashboard');
					break;
				// di ve trang nguoi dung
				default:
					$result['url'] = base_url();
					break;
			}
		}
		else//dang nhap that bai 
		{
			$result['status'] = false;
		}
		echo json_encode($result); //tra ve ket qua ajax
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('access'),'refresh');
	}
	public function register()
	{
		$user = array();
		$user['email'] = $this->input->post('email');
		$user['password'] =md5($this->input->post('password'));
	}
}