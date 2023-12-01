<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('form');

		// TODO access session data for auth
		// $sess_array = array(
		// 	'userid' => 2,
		// 	'name' => 'test user',
		// 	'role' => 'admin'
		// );

		// $this->session->set_userdata('logged_in', $sess_array);

		if($this->session->userdata('verified') != 1 && $this->session->userdata('verified') != 2){
			redirect(base_url('home'));
		}
    }

	public function index()
	{
		$this->load->model('forum_model', '', TRUE);
		$data['topics'] = $this->forum_model->getTopics();
		$data['topics'] = json_encode($data['topics']);

		// add change
		$this->load->view('headerAfterLogin'); 
		$this->load->view('forum', $data);
		$this->load->view('footer');
	}

	function addNew(){
		// add change
		$this->load->view('headerAfterLogin');
		$this->load->view('create_view');
		$this->load->view('footer');
	}
}
