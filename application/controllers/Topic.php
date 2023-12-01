<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('form');
		// add change
		if($this->session->userdata('verified') != 1 && $this->session->userdata('verified') != 2){
			redirect(base_url('home'));
		}
    }

	
	function getTopic($topic_id){
		$this->index($topic_id);
	}


	public function index($topic_id)
	{
		$this->load->model('forum_model', '', TRUE);
		$data = $this->forum_model->getTopic($topic_id);
		if(!$data){
			$this->session->set_tempdata('status', '<div class="alert alert-danger">Topic not found</div>', 10);
			redirect(base_url().'Forum', 'refresh');
		}

		$jsonarr['topic'] = json_encode($data);
		
		$this->load->view('headerAfterLogin');
		$this->load->view('topic', $jsonarr);
		$this->load->view('footer');
	}


	function addTopic(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', "Title", 'required');
		$this->form_validation->set_rules('content', "Content", 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if($this->form_validation->run() == FALSE){
			$this->session->set_tempdata('status', '<div class="alert alert-danger">Cannot create empty topic</div>', 10);
		}
		else{
			$data = array(
				'user' => $this->session->userdata('vrf_user')['id'],
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content')
			);

			$this->load->model('forum_model', '', TRUE);
			$result = $this->forum_model->addNewTopic($data);

			if($result === FALSE){
				$this->session->set_tempdata('status', '<div class="alert alert-danger">Oops something went wrong. Please try again</div>', 10);
			}
			else{
				$this->session->set_tempdata('status', '<div class="alert alert-primary">Topic Created</div>', 10);
				$this->getTopic($result);
			}
		}
		
		redirect(base_url().'Forum', 'refresh');
	}

	function addComment($topic_id){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if($this->form_validation->run() == FALSE){
			$this->session->set_tempdata('status', '<div class="alert alert-primary" role="alert">Cannot add empty comment</div>', 10);
		}
		else{
			$comment = $this->input->post('comment');

			$this->load->model('forum_model', '', TRUE);
			$result = $this->forum_model->addNewComment($topic_id, $this->session->userdata('vrf_user')['id'], $comment); //TODO will add user id from session
			
			if($result === FALSE){
				$this->session->set_tempdata('status', '<div class="alert alert-primary" role="alert">Oops something went wrong. Please try again</div>', 10);
			}
			else{
				$this->session->set_tempdata('status', '<div class="alert alert-primary">Comment Added</div>', 10);
			}
		}

		redirect(base_url().'Topic/getTopic/'.$topic_id, 'refresh');
	}


	// TODO: check admin
	// TODO check session save user method
	function deleteTopic($topic_id){
		$userCheck = $this->checkUser($this->session->userdata('vrf_user')['id']);
		
		if($userCheck){
			$this->load->model('forum_model', '', TRUE);
			$result = $this->forum_model->removeTopic($topic_id);
			if(!$result){
				$this->session->set_tempdata('status', '<div class="alert alert-primary" role="alert">Failed to delete. Please try again</div>', 10);
			}
		}else{
			$this->session->set_tempdata('status', '<div class="alert alert-primary">Topic deleted</div>', 10);
		}

		redirect(base_url().'Forum');
	}

	// check valid user
	// TODO to query role also
	function checkUser($user_id){
		$this->load->model('forum_model', '', TRUE);
		$query = $this->forum_model->checkUser($user_id);

		if($query){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
