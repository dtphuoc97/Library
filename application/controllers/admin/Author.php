<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__."/../../core/Curd_Controller.php";
class Author extends Curd_Controller
{
	
	function __construct()
	{
		$this->_table = 'author';
		$this->_model = 'author_model';
		parent::__construct();
	}
	public function index()
	{
		$data['data'] = $this->_getList();
		$this->template->appendTitle('Manage Author');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->addContentPage('admin/topbar','topbar');
		$this->template->addContentPage('admin/left-menu','left-menu');
		$this->template->addContentPage('admin/center-author','center',$data);
		$this->template->show();
	}
	public function add()
	{
		$this->form_validation->set_rules("name", "Author's Name", "required");
       	//--------------
       	$name=$this->input->post('name');
       	$subname=$this->input->post('subname');
    	$date=date("Y-m-d H:i:s");
    	$user_id=$this->_user['user_id'];
    	if ($this->form_validation->run()) 
        {
			$data = array
			(
					'name' => $name,
					'subname' =>$subname,
					'date_create' =>$date,
					'user_id' =>$user
			);
			if($this->_insert($data))
			{
		
				// $newId = $this->{$this->_model}->getIDbyEmail($email);
				// echo json_encode(array( 'status'=>1, 'email'=>$email, 'level'=>1, 'u_id'=>$newId, 'name'=>$name ));
			} else echo json_encode(array( 'status'=>-1));
		}
		else
		{
			$error=strip_tags(validation_errors());
			echo json_encode(array( 'status'=>0, 'error'=>$error ));
		}

	}
}