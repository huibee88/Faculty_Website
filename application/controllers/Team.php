<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Lecturer','',TRUE);
		$this->load->library("session");

	}

	public function index()
	{
		
		$name_of_prof = $this->Lecturer->getProfessorName();
		$data['professors'] = $name_of_prof;

		$name_of_aprof = $this->Lecturer->getAssociateProfessorName();
		$data['aprofessors'] = $name_of_aprof;

		$name_of_slec = $this->Lecturer->getSeniorLecturerName();
		$data['slec'] = $name_of_slec;

		$name_of_lec = $this->Lecturer->getLecturerName();
		$data['lec'] = $name_of_lec;

		$this->load->view('header');
		$this->load->view('team', $data);
		//$this->load->view('team_admin_view', $data);
		$this->load->view('footer');


	}
}
?>
