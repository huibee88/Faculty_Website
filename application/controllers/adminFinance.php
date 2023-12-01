<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminFinance extends CI_Controller {

	public function index()
	{	
		$this->load->model('Finance','',TRUE);
		$this->load->library('session');
		
        $course_fee = $this->Finance->getCourseFee();
        $data['coursefee_info'] = $course_fee;

		$this->load->view('headerAfterLogin');
		$this->load->view('course_admin_views',$data); 
		$this->load->view('footer');
	}
}
?>