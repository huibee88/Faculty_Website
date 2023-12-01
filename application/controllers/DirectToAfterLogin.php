<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectToAfterLogin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
	}

	function displayMenu(){
		if($this->session->userdata('verified') == 1 OR $this->session->userdata('verified') == 2){
			$this->load->view('headerAfterLogin');
			$this->load->view('content_main');
			$this->load->view('footer');
		}else{
			redirect(base_url('login'));
		}
		
		// $this->load->view('hey');
	}

}

?>
