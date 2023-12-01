<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantDetails_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('postgraduates_application', '', TRUE);
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function getApplicantID($appID)
	{
		$this->index($appID);
	}

	public function index($appID)
	{
		$aDetails=$this->postgraduates_application->getApplicant($appID); 
		$this->load->view('headerAfterLogin');
		$this->load->view('applicantDetails_view', $aDetails);
		$this->load->view('footer');
	}

	public function update_approvalStatus($appID,$appStatus)
	{
		$data['aID'] = $appID;

		if ($appStatus==1) {
			$data['aStatus']= 'Approve';
		}
		elseif ($appStatus==0) {
			$data['aStatus']= 'Not Approve';
		}
		else{
			$data['aStatus']= 'Undefined';
		}		
		$this->load->model('postgraduates_application','',TRUE);
		$result = $this->postgraduates_application->approvalStatus($data);

		$this->index($appID);
	}
}