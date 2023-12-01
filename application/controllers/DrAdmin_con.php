<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DrAdmin_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', TRUE);
		$this->load->library('session');
	}

	public function index()
	{
		$drInfo=$this->postgraduates_application->getDr();
		$data['doctor']=$drInfo;
		$this->load->view('headerAfterLogin');
		$this->load->view('drphilosophy_view', $data);
		$this->load->view('footer');
	}
}