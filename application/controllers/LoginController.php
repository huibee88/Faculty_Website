<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

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
		$this->form_validation->set_rules('password', 'Facility Description', 'trim|required|min_length[6]|max_length[20]');

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
			// if(true){

				$vrf_userdetails = [
					'id' => $result->userID,
					'first_name' => $result->userFirstName,
					'last_name' => $result->userLastName,
					'email' => $result->email,
					'role' => $result->role
				];
				// $vrf_userdetails = [
				// 	'id' => 1,
				// 	'first_name' => 'me',
				// 	'last_name' => 'me',
				// 	'email' => 'me',
				// 	'role' => 1
				// ];

				// var_dump($vrf_userdetails);
				// $roleNumber = $vrf_userdetails->role;

				$this->session->set_userdata('verified', $vrf_userdetails['role']);
				$this->session->set_userdata('vrf_user', $vrf_userdetails);
				redirect(base_url('homeafter'));
			}else{
				redirect(base_url('login'));
			}
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('verified');
		$this->session->unset_userdata('vrf_user');
		$this->session->sess_destroy();

		redirect(base_url('home'));
	}


}

?>
