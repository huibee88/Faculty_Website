<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonViewPageAfterLogin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('verified') != 2 AND $this->session->userdata('verified') != 1){
			redirect(base_url('login'));
		}

		$this->load->model('FacilityModel');

	}

	public function displayFacilityAfter(){
		$facilities = new FacilityModel;
		$data['facilities'] = $facilities->getFacilities();
		$this->load->view('headerAfterLogin');
		$this->load->view('viewOnlyFacilities', $data);
		$this->load->view('footer');
	}

	public function displayHomeAfter(){
		$this->load->view('headerAfterLogin');
		$this->load->view('content_main');
		$this->load->view('footer');
	}
	public function displayContactAfter(){
		$this->load->view('headerAfterLogin');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function displayAboutAfter(){
		$this->load->view('headerAfterLogin');
		$this->load->view('about');
		$this->load->view('footer');
	}
}
?>
