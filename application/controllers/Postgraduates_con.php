<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postgraduates_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', true);
	}

	public function index()
	{
		$prog=$this->postgraduates_application->getProgramme();
		$data['programme'] = $prog;
		$this->load->view('header');
		$this->load->view('postgraduates_view', $data);
		$this->load->view('footer');
	}
}
