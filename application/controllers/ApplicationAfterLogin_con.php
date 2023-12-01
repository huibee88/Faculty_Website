<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicationAfterLogin_con extends CI_Controller{

	function __construct()
	{
		parent::__construct();

		$this->load->model('postgraduates_application','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view('headerAfterLogin');
		$this->load->view('applicationFormStudent_view');
		$this->load->view('footer');
	}

	function addnew()
	{
		//Application form validation
		$this->load->library('form_validation');
		$data['content'] = "formApplication";

		//define the rules of input validation
		$this->form_validation->set_rules('aProg', 'Applicant\'s Program is Invalid', 'trim|required');
		$this->form_validation->set_rules('aDate', 'Date of Apply is Invalid', 'trim|required');
		$this->form_validation->set_rules('aName', 'Applicant\'s Full Name is Invalid', 'trim|required');
		$this->form_validation->set_rules('aICPass', 'Applicant\'s IC / Passport No. is Invalid', 'trim|required');
		$this->form_validation->set_rules('aGender', 'Applicant\'s Gender is Invalid', 'trim|required');
		$this->form_validation->set_rules('aDOB', 'Applicant\'s Date of Birth is Invalid', 'trim|required');
		$this->form_validation->set_rules('aNationality', 'Applicant\'s Nationality is Invalid', 'trim|required');
		$this->form_validation->set_rules('aRace', 'Applicant\'s Race is Invalid', 'trim|required');
		$this->form_validation->set_rules('aPhoneNo', 'Applicant\'s Phone Number is Invalid', 'trim|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('aAdd1', 'Address 1 is Invalid', 'trim|required');
		$this->form_validation->set_rules('aAdd2', 'Address 2 is Invalid', 'trim');
		$this->form_validation->set_rules('aPostCode', 'Postal Code is Invalid', 'trim|required');
		$this->form_validation->set_rules('aCity', 'City is Invalid', 'trim|required');
		$this->form_validation->set_rules('aState', 'State is Invalid', 'trim|required');
		$this->form_validation->set_rules('aCountry', 'Country is Invalid', 'trim|required');
		$this->form_validation->set_rules('aEmail', 'Personal Email is Invalid', 'trim|required|valid_email');
		//$this->form_validation->set_rules('aImg', 'Profile Picture is Invalid', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			//Field validation failed. User redirected to login page
			$this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter the Correct Information!</div>');
			$this->load->view('headerAfterLogin');
			$this->load->view('applicationFormStudent_view', $data);
			$this->load->view('footer');
			$this -> session -> unset_userdata ('status');
		}

		else
		{
			//Binding from data from view into array $Data
			$data['appProg'] = $this->input->post('aProg');
			$data['appDate'] = $this->input->post('aDate');
			$data['appName'] = $this->input->post('aName');
			$data['appIC'] = $this->input->post('aICPass');
			$data['appGender'] = $this->input->post('aGender');
			$data['appDOB'] = $this->input->post('aDOB');
			$data['appNation'] = $this->input->post('aNationality');
			$data['appRace'] = $this->input->post('aRace');
			$data['app_phone_no'] = $this->input->post('aPhoneNo');
			$data['appAdd1'] = $this->input->post('aAdd1');
			$data['appAdd'] = $this->input->post('aAdd2');
			$data['appPost'] = $this->input->post('aPostCode');
			$data['appCity'] = $this->input->post('aCity');
			$data['appState'] = $this->input->post('aState');
			$data['appCountry'] = $this->input->post('aCountry');
			$data['appEmail'] = $this->input->post('aEmail');
			//$data['appImg'] = $this->input->post('aImg');

			$photo = $this->input->post('aImg');
			
			$config['upload_path'] = './public/temp/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->do_upload('aImg');

			$upload_data = $this->upload->data();
			
			$data['appImg'] = file_get_contents($upload_data['full_path']);

			//Pass the $data to model
			$result = $this->postgraduates_application->addNewApplicant($data);

			if ($result) 
			{
				$this->session->set_flashdata('status', '<div class="alert_green" style="width:60%">New Applicant Data Was Added Successfully!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('applicationFormStudent_view', $data);
				$this->load->view('footer');
				$this -> session -> unset_userdata ('status');
			}

			else
			{
				$this->session->set_flashdata('status', '<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('applicationFormStudent_view_view');
				$this->load->view('footer');
				$this -> session -> unset_userdata ('status');
			}
		}
	}//end of addnew method
}//end of class


