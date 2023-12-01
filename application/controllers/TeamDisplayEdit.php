<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeamDisplayEdit extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Lecturer','',TRUE);
		$this->load->library("session");
	}

	public function index($lecid)
	{
		$l_img = $this->Lecturer->getLecturerImg($lecid);
		$data['img'] = $l_img;

		$l_name = $this->Lecturer->getEachName($lecid);
		$data['name'] = $l_name;

		$l_position = $this->Lecturer->getEachPosition($lecid);
		$data['position'] = $l_position;

		$l_email = $this->Lecturer->getEachEmail($lecid);
		$data['email'] = $l_email;

		$l_phone = $this->Lecturer->getEachPhone($lecid);
		$data['phone'] = $l_phone;

		$l_education = $this->Lecturer->getEachEducation($lecid);
		$data['education'] = $l_education;

		$l_aoe = $this->Lecturer->getEachAOExpert($lecid);
		$data['aoe'] = $l_aoe;

		$this->load->view('headerAfterLogin');
		$this->load->view('teamdisplayEdit', $data);
		$this->load->view('footer');
	}

	public function getlecturerid($lecid)
	{
	      $this->index($lecid);
    }

}
?>