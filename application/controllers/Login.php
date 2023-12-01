<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('UserModel', '', TRUE);
	}


	public function loginForm(){
		$this->load->view('login');
	}

	public function login(){
		$this->form_validation->set_rules('email', 'User Emai', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'User Password', 'trim|required|min_length[6]|max_length[20]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
			$data = [
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			];

			$user = new UserModel;
			$result = $user->loginUser($data);

			if($result != FALSE){

				$vrf_userdetails = [
					'first_name' => $result->userFirstName,
					'last_name' => $result->userLastName,
					'email' => $result->email,
					'role' => $result->role
				];

				// var_dump($vrf_userdetails);
				// $roleNumber = $vrf_userdetails->role;

				$this->session->set_userdata('verified', $vrf_userdetails['role']);
				$this->session->set_userdata('vrf_user', $vrf_userdetails);
				redirect('http://localhost/Faculty_Website/HomeAfterLogin/displayHomeAfter');
			}else{
				redirect('http://localhost/Faculty_Website/Login/loginForm');
			}
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('verified');
		$this->session->unset_userdata('vrf_user');

		redirect('http://localhost/Faculty_Website/Welcome');
	}


}

?>
