<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Course extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this -> load -> model('FCourse', '', TRUE);
		$this -> load -> library('session');
		$this -> load -> helper('form');
	}

	public function index(){
		$this -> load -> view('headerAfterLogin');
		$this -> load -> view('add_course');
		$this -> load -> view('footer');
	}

	function addnew(){
		//Sign Up form validation
		$this -> load -> library('form_validation');
		$data ['content'] = "formAddCourse";

		//define the rules of input validation
		$this -> form_validation -> set_rules('cicon', 'Icon', 'trim|required');
		$this -> form_validation -> set_rules('ccode', 'Course Code', 'trim|required');
		$this -> form_validation -> set_rules('cname', 'Course Name', 'trim|required');
		$this -> form_validation -> set_rules('cch', 'Credit Hour', 'trim|required');
		$this -> form_validation -> set_rules('cyear', 'Course Year', 'trim|required');
		$this -> form_validation -> set_rules('cfID', 'Faculty ID', 'trim|required');
		$this -> form_validation -> set_rules('cdesc', 'Course Description', 'trim|required');
		//$this -> form_validation -> set_rules('cimg', 'Choose Course Image here', 'trim|required');

		$this -> form_validation -> set_error_delimiters('<div class="error_msg">', '</div>');

		if($this -> form_validation -> run() == FALSE){
			//Field validation failed. User redirected to login page
			$this -> session -> set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter the Correct Information!</div>');
			$this -> load -> view('headerAfterLogin');
			$this -> load -> view('add_course', $data);
			$this -> load -> view('footer');
			$this -> session -> unset_userdata('status');
		}
		else{
			//Binding form data from view into array $Data
			$data['courseICON'] = $this -> input -> post('cicon');
			$data['courseCODE'] = $this -> input -> post('ccode');
			$data['courseNAME'] = $this -> input -> post('cname');
			$data['courseCH'] = $this -> input -> post('cch');
			$data['courseYEAR'] = $this -> input -> post('cyear');
			$data['courseFID'] = $this -> input -> post('cfID');
			$data['courseDESC'] = $this -> input -> post('cdesc');
			//$data['courseIMAGE'] = $this -> input -> post('cimg');
			//var_dump($_FILES['cimg']);
			$photo = $this -> input -> post('cimg');
			$config['upload_path'] = './public/temp/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this -> load -> library('upload', $config);
			$this -> upload -> do_upload('cimg');
			// var_dump($this->upload->file_type);

			// if($this -> upload -> do_upload('cimg')){
			// 	echo 'yes';
			// }else{
			// 	echo $this->upload->display_errors();
			// }

			$upload_data = $this -> upload -> data();
			$data['courseIMAGE'] = file_get_contents($upload_data['full_path']);

			//Pass the $data to controller
			$this -> load -> model('FCourse', '', TRUE);
			$result = $this -> FCourse -> insertNewCourse($data);

			if($result){
				$this -> session -> set_flashdata('status', '<div class="alert_green" style="width:60%">New Course Data Was Added Successfully!</div>');
				$this -> load -> view('headerAfterLogin');
				$this -> load -> view('add_course', $data);
				$this -> load -> view('footer');
				$this -> session -> unset_userdata('status');
			}
			else{
				$this -> session -> set_flashdata('status', '<div class="alert" style="width:500px">Error! Please Try Again! Thank you</div>');
				$this -> load -> view('headerAfterLogin');
				$this -> load -> view('add_course');
				$this -> load -> view('footer');
				$this -> session -> unset_userdata('status');
			}
		}
	}//end of addnew method
}//end of class