<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteDoctor_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', TRUE);
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{ 
		$doctorInfo=$this->postgraduates_application->getDr();
		$data['doctor']=$doctorInfo;
		$this->load->view('headerAfterLogin');
		$this->load->view('drphilosophy_view',$data);
		$this->load->view('footer');
	}

	function deleteDoctor($appID)
	{
		$this->postgraduates_application->deleteApp($appID);
		$this->index();
	}
}