<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__."/../../core/Curd_Controller.php";
class User extends Curd_Controller	
{

	public $messerror='';
	function __construct()
	{
		$this->_table = 'user';
		$this->_model = 'user_model';
		parent::__construct();
	}

	public function index()
	{
		$data['data'] = $this->_getList();

		$this->template->appendTitle('Manage User');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->addContentPage('admin/topbar','topbar');
		$this->template->addContentPage('admin/left-menu','left-menu');
		$this->template->addContentPage('admin/center-user','center',$data);
		$this->template->show();
	}
	public function add()
	{
	   	$this->form_validation->set_rules("pass", "Password", "required|trim");
       	$this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
       	//--------------
       	$email=$this->input->post('email');
    	$password=md5($this->input->post('pass'));
    	$firstname=$this->input->post('firstname');
    	$lastname=$this->input->post('lastname');
    	$date=date("Y-m-d H:i:s");
    	
       	//--------------
        if ($this->form_validation->run() && $this->__checkemail($email)) 
        {
			$data = array
			(
					'email' => $email,
					'password' =>$password,
					'first_name' =>$firstname,
					'last_name' =>$lastname,
					'date_create' =>$date,
					'level' => 1
			);
			if($this->_insert($data))
			{
				$name=ucwords($firstname.' '.$firstname);
				$newId = $this->{$this->_model}->getIDbyEmail($email);
				echo json_encode(array( 'status'=>1, 'email'=>$email, 'level'=>1, 'u_id'=>$newId, 'name'=>$name ));
			} else echo json_encode(array( 'status'=>-1));
		}
		else
		{
			$error=strip_tags(validation_errors().$this->messerror);
			echo json_encode(array( 'status'=>0, 'error'=>$error ));
		}
	}
	public function delete()
	{
		$id=$this->input->post('id');
		if($this->_deletebyID($id))//Delete success
		echo json_encode(array( 'status'=>1, 'u_id'=>$id ));
	    else echo json_encode(array('status'=>-1 ));
	}
	public function detail()
	{
		$id=$this->input->post('id');
		$data= $this->_getDetailbyID($id);
		echo json_encode($data);
	}
	//-----------------------
	private function __checkemail($email)
	{
		if($this->{$this->_model}->checkemail($email))
		{
			return true;
		}
		else
		{
			$this->messerror='Email available.';
			return false;
		}
	}
} 