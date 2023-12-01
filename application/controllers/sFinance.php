<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sFinance extends CI_Controller {

	public function index()
	{	
		$this->load->model('Finance','',TRUE);
		$this->load->library('session');

		$sInfo = $this->Finance->getStudentInfo();
		$data['studentInfo'] = $sInfo;

		$sLedger = $this->Finance->getStudentLedger();
		$data['studentLedger'] = $sLedger;

		$this->load->view('headerAfterLogin');
		$this->load->view('student_finance_view',$data); 
		$this->load->view('footer');
	}
}
?>