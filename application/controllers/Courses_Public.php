<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_Public extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this -> load -> model('FCourse', '', TRUE);
		$this -> load -> library('session');
	}

	public function index(){
		$course_name = $this->FCourse->getcourseName();
		$data['cname'] = $course_name;

		$this->load->view('header');
		$this->load->view('course_public', $data);
		$this->load->view('footer');
	}
}
