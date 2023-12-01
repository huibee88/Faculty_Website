<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NormalViewPage extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('FacilityModel');

	}
	public function displayFacility(){
		$facilities = new FacilityModel;
		$data['facilities'] = $facilities->getFacilities();
		$this->load->view('header');
		$this->load->view('viewOnlyFacilities', $data);
		$this->load->view('footer');
	}

	public function displayHome(){
		$this->load->view('header');
		$this->load->view('content_main');
		$this->load->view('footer');
	}
}


?>
