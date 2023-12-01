<?php

class Delete_Course extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this -> load -> model('FCourse', '', TRUE);
		$this -> load -> library('session');
	}

	public function getCourseCode($courseCode){
		$this->index($courseCode);
	}

	public function index($courseCode){
		$this -> FCourse -> deleteCourse($courseCode);
		redirect('http://localhost/Faculty_Website/Courses_AdminView/', 'refresh');
	}
}//class