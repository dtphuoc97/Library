<?php 
/**
 * summary
 */
class Dashboard extends MY_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	//Load view
    	// $data = $this->session->userdata('user');
		$this->template->appendTitle('Dashboard');
		$this->template->setMasterPage('admin/master-admin');
		$this->template->addContentPage('admin/core-js','core-js');
		$this->template->addContentPage('admin/core-css','core-css');
		$this->template->addContentPage('admin/sidebar','sidebar');
		$this->template->addContentPage('admin/main-dashboard','main-dashboard');
		$this->template->addContentPage('admin/fixed-flugin','fixed-flugin');
		$this->template->show();
    }
}