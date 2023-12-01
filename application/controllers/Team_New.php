

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_New extends CI_Controller{

	function __construct(){

		parent::__construct();

		$this->load->model('Lecturer','',TRUE);
		$this->load->library('session');
		$this->load->helper('form','url');
	}

	public function index(){
		
		$this->load->view('headerAfterLogin');
		$this->load->view('add_lecturer');
		$this->load->view('footer');

	}

	function addnew(){
		//Sign Up form validation
		$this->load->library('form_validation');
		$data['content'] = "teamAdd";

		//define the rules of input validation
		$this->form_validation->set_rules('lID', 'Lecturer ID', 'trim|required');
		$this->form_validation->set_rules('lName', 'Lecturer Name', 'trim|required');
		$this->form_validation->set_rules('lPosition', 'Lecturer Position', 'trim|required');
		$this->form_validation->set_rules('lEmail', 'Lecturer Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('lPhone', 'Lecturer Phone', 'trim|required|regex_match[/^[0-9,-]{11}$/]');
		$this->form_validation->set_rules('lEducation', 'Lecturer Education', 'trim|required');
		$this->form_validation->set_rules('AOE', 'Lecturer AOE', 'trim|required');
		$this->form_validation->set_rules('fID', 'Faculty ID', 'trim|required');
		//$this->form_validation->set_rules('lImage', 'lecturer Image', 'required');
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			//Field validation failed. User redirected to login page
			$this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter the Correct Information!</div>');
			$this->load->view('headerAfterLogin');
			$this->load->view('add_lecturer', $data);
			$this->load->view('footer');
			$this -> session -> unset_userdata ('status');
		}
		else{
			//Binding from data from view into array $Data
			$data['lecID'] = $this->input->post('lID');
			$data['lecName'] = $this->input->post('lName');
			$data['lecPosition'] = $this->input->post('lPosition');
			$data['lecEmail'] = $this->input->post('lEmail');
			$data['lecPhone'] = $this->input->post('lPhone');
			$data['lecEducation'] = $this->input->post('lEducation');
			$data['lecAOE'] = $this->input->post('AOE');
			$data['facID'] = $this->input->post('fID');
			//$data['lecImg'] = $this->input->post('lImage');

			$photo = $this->input->post('lImage');
			
			//var_dump($_FILES['lImage']);
			$config['upload_path'] = './public/temp/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->do_upload('lImage');

			// if ($this->upload->do_upload('lImage')) {
			// 	//echo 'yes';
			// 	return true;
			// }else{
			// 	//echo $this->upload->display_errors();
			// 	return false;
			// }

			$upload_data = $this->upload->data();
			
			$data['lecImg'] = file_get_contents($upload_data['full_path']);
			//Pass the $data to controller
			$result = $this->Lecturer->addNewLecturer($data);

			if ($result) {
				$this->session->set_flashdata('status', '<div class="alert_green" style="width:60%">New Lecturer Data Was Added Successfully!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('add_lecturer', $data);
				$this->load->view('footer');
				$this->session->unset_userdata('status');
			}else{
				$this->session->set_flashdata('status', '<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('add_lecturer');
				$this->load->view('footer');
				$this -> session -> unset_userdata ('status');
			}
		}
	}//end of addnew method
}//end of class