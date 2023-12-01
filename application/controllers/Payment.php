<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Finance','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function getPaymentDetail($coursefeeID){
		$this->index($coursefeeID);
	}

	public function index($coursefeeID)
	{	
		$y = $this->Finance->getPaymentDetail($coursefeeID);
		$this->load->view('headerAfterLogin');
		$this->load->view('paymentform_view',$y);
		$this->load->view('footer');
	}

	function uploadPayment($coursefeeID){
		$this->load->library('form_validation');
		$data['content'] = "paymentform";

		$data['pCourseFeeID']=$coursefeeID;
		$data['pDate']= $this->input->post('sDate');
		$data['pstudentID']= $this->input->post('sID');
		$data['pAmount']= $this->input->post('sAmount');
		$data['pReceipt']= $this->input->post('sReceipt');

		//define rules of input validation
		$this->form_validation->set_rules('sID','Student ID','trim|required');
		$this->form_validation->set_rules('sDate','Date','trim|required');
		$this->form_validation->set_rules('sSemester','Semester','trim|required');
		$this->form_validation->set_rules('sAmount','Amount','trim|required');
		$this->form_validation->set_rules('sReceipt','Receipt','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_flashdata('status','<div class="alert alert-danger text-center" style="width:60%">Error! Please enter the correct information!</div>');
			$this->load->view('headerAfterLogin');
			$this->load->view('student_finance_view');
			$this->load->view('footer');
			$this->session->unset_userdata('status');
		}
		else
		{
			//insert data into payment table
			$data['pCourseFeeID']=$coursefeeID;
			$data['pDate']= $this->input->post('sDate');
			$data['pstudentID']= $this->input->post('sID');
			$data['pAmount']= $this->input->post('sAmount');
			$data['pReceipt']= $this->input->post('sReceipt');

			//pass the $data to controller
			$this->load->model('Finance','',TRUE);
			$result = $this->Finance->uploadReceipt($data);

			if($result){
				$sInfo = $this->Finance->getStudentInfo();
				$data['studentInfo'] = $sInfo;
		
				$sLedger = $this->Finance->getStudentLedger();
				$data['studentLedger'] = $sLedger;

				$this->session->set_flashdata('status','<div class="alert_green" style="width=60%">Payment Was Successfully Made!</div>');
				$this->load->view('headerAfterLogin');
				$this->load->view('student_finance_view',$data);
				$this->load->view('footer');
				$this->session->unset_userdata('status');
			}else {
				$this->session->set_flashdata('status','<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
				$y = $this->Finance->getPaymentDetail($coursefeeID);

				$this->load->view('headerAfterLogin');
				$this->load->view('paymentform_view',$y);
				$this->load->view('footer');
				$this->session->unset_userdata('status');
			}

		}

	}
}
?>