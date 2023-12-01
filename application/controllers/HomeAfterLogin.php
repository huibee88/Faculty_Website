<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAfterLogin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if($this->session->userdata('verified') != 2 AND $this->session->userdata('verified') != 1){
			redirect(base_url('login'));
		}


	}

	public function displayHomeAfter(){
		$this->load->view('headerAfterLogin');
		$this->load->view('content_main');
		$this->load->view('footer');
	}
}

?>
