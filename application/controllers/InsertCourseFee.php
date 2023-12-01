<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertCourseFee extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Finance','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{	
		$this->load->view('headerAfterLogin');
		$this->load->view('insertNewPayment_view');
		$this->load->view('footer');
	}

	function addNew(){

		//add new form validation
		$this->load->library('form_validation');
		$data['content'] = "formInsertNewPayment";

		//define the rules of input validation
		$this->form_validation->set_rules('iCourse','Course Name','trim|required');
		$this->form_validation->set_rules('iSemester','Semester'.'trim|required');
		$this->form_validation->set_rules('iDesc','Description','trim|required');
		$this->form_validation->set_rules('iAmount','Total Amount','trim|required');

		$this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');

		if($this->form_validation->run() == FALSE){
			$this->form_validation->set_flashdata('status','<div class="alert alert-danger text-center" style="width:60%">Error! Please enter the correct information!</div>');
			$this->load->view('header');
			$this->load->view('insertNewPayment_view',$data);
			$this->load->view('footer');
			$this->session->unset_userdata('status');
		}
		else
		{
			//Binding form data from view into array $Data
			
			$data['insertCourseName'] = $this->input->post('iCourse');
			$data['insertSemester'] = $this->input->post('iSemester');
			$data['insertDescription'] = $this->input->post('iDesc');
			$data['insertTotalAmount'] = $this->input->post('iAmount');
			//Pass the $data to controller
			$result = $this->Finance->insertNewCourseFee($data);

			if($result){
				$this->session->set_flashdata('status','<div class="alert_green" style="width=60%">New Course Fee Was Successfully Added!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('insertNewPayment_view',$data);
			 	$this->load->view('footer');
			 	$this->session->unset_userdata('status');
			 }else{

			 	$this->session->set_flashdata('status','<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
			 	$this->load->view('headerAfterLogin');
			 	$this->load->view('insertNewPayment_view');
			 	$this->load->view('footer');
			 	$this->session->unset_userdata('status');
			 }
		}

	}//end of addnew course fee method
}
?>