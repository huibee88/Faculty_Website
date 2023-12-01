<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteMaster_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', TRUE);
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{ 
		$masterInfo=$this->postgraduates_application->getMaster();
		$data['master']=$masterInfo;
		$this->load->view('headerAfterLogin');
		$this->load->view('master_view',$data);
		$this->load->view('footer');
	}

	function deleteMaster($appID)
	{	
		$this->postgraduates_application->deleteApp($appID);
		$this->index();
	}
}