<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterAdmin_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', TRUE);
		$this->load->library('session');
	}

	public function index()
	{
		$masterInfo=$this->postgraduates_application->getMaster();
		$data['master']=$masterInfo;
		$this->load->view('headerAfterLogin');
		$this->load->view('master_view', $data);
		$this->load->view('footer');
	}
}