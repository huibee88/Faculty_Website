<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditCourseFee extends CI_Controller {
	function __construct(){
		parent:: __construct();

		$this->load->model('Finance','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function getCourseFeeID($coursefeeID){
		$this->index($coursefeeID);
	}

	public function index($coursefeeID)
	{	
		$x = $this->Finance->getData($coursefeeID);
		$this->load->view('headerAfterLogin');
		$this->load->view('editPayment_views',$x);
		$this->load->view('footer');
	}//end of index

	function updateCourseFee($coursefeeID){
		
		$this->load->library('form_validation');
		$data['content'] = "formEditPayment";
		$x = $this->Finance->getData($coursefeeID);

		//define the rules of input validation
		$this->form_validation->set_rules('iCourse','Course Name','trim|required');
		$this->form_validation->set_rules('iSemester','Semester','trim|required');
		$this->form_validation->set_rules('iDesc','Description','trim|required');
		$this->form_validation->set_rules('iAmount','Total Amount','trim|required');

		$this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_flashdata('status','<div class="alert alert-danger text-center" style="width:60%">Error! Please enter the correct information!</div>');
			//Field validation failed. User redirected to course_admin_view
			$this->load->view('headerAfterLogin');
			$this->load->view('editPayment_views',$x);
			$this->load->view('footer');
			$this->session->unset_userdata('status');
		}
		else
		{
			//update course fee info into database
			$data['insertCourseFeeID'] = $coursefeeID;
			$data['insertCourseName'] = $this->input->post('iCourse');
			$data['insertSemester'] = $this->input->post('iSemester');
			$data['insertDescription'] = $this->input->post('iDesc');
			$data['insertTotalAmount'] = $this->input->post('iAmount');

			//pass the $data to controller
			$this->load->model('Finance','',TRUE);
			$result = $this->Finance->updateCourseFee($data);

			if($result){
				$this->session->set_flashdata('status','<div class="alert_green" style="width=60%">New Course Fee Was Successfully Added!</div>');
				$x = $this->Finance->getData($coursefeeID);

				$this->load->view('headerAfterLogin');
				$this->load->view('editPayment_views',$x);
				$this->load->view('footer');
				$this->session->unset_userdata('status');
			}else{
				$this->session->set_flashdata('status','<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
				$x = $this->Finance->getData($coursefeeID);

				$this->load->view('headerAfterLogin');
				$this->load->view('editPayment_views',$x);
				$this->load->view('footer');
				$this->session->unset_userdata('status');
			}
		}
	}
}
?>