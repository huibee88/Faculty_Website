<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComS_Admin extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this -> load -> model('FCourse', '', TRUE);
		$this -> load -> library('session');
	}

	public function index($courseCode){
		$data = $this -> FCourse -> getcourseData($courseCode);
		
		$this->load->view('headerAfterLogin');
		$this->load->view('coms_admin', $data[0]);
		$this->load->view('footer');
	}

	public function getcourseID($courseCode){
		$this->index($courseCode);
	}

}
