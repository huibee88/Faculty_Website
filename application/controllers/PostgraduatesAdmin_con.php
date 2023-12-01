<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostgraduatesAdmin_con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('postgraduates_application','',TRUE);
		$this->load->library("session");

		if($this->session->userdata('verified') != 2 AND $this->session->userdata('verified') != 1){
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$prog=$this->postgraduates_application->getProgramme();
		$data['programme'] = $prog;
		$this->load->view('headerAfterLogin');
		$this->load->view('postgraduatesAdmin_view', $data);
		$this->load->view('footer');
	}
}

