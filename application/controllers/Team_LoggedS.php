<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_LoggedS extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Lecturer','',TRUE);
		$this->load->library("session");

		if($this->session->userdata('verified') != 2 AND $this->session->userdata('verified') != 1){
			redirect(base_url('login'));
		}
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

		$this->load->view('headerAfterLogin');
		$this->load->view('teamS', $data);
		$this->load->view('footer');
	}

}
?>
