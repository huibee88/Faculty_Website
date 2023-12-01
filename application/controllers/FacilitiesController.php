<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacilitiesController extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('FacilityModel', '', TRUE);
		if($this->session->userdata('verified') != 2){
			redirect(base_url('login'));
		}
	}

	public function mainFacilityDisplay(){
		$facilities = new FacilityModel;
		$data['facilities'] = $facilities->getFacilities();
		$this->load->view('headerAfterLogin');
		$this->load->view('Facilities', $data);
		$this->load->view('footer');
	}

	//this control to show each row of data into view page
	public function manage(){
		$facilities = new FacilityModel;
		$data['facilities'] = $facilities->getFacilities();
		$this->load->view('facilities/manage', $data);
	}

	//this just load the form
	public function create(){
		$this->load->view('facilities/create');
	}

	public function store(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('fName', 'Facility Name', 'required');
		$this->form_validation->set_rules('fDes', 'Facility Description', 'required');

		if($this->form_validation->run()){

			$ori_filename = $_FILES['fImage']['name'];
			$new_name = time()."".str_replace(' ', '-', $ori_filename);

			$config = [
				'upload_path' => './images/facility/',
				'allowed_types' => 'gif|jpg|png',
				'file_name' => $new_name,
			];

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fImage')){
                $imageError = array('error' => $this->upload->display_errors());
             
                $this->load->view('facilities/create', $imageError);
             
            }else{
                $fac_filename = $this->upload->data('file_name');
                $data = [
                	'fName' => $this->input->post('fName'),
                	'fDes' => $this->input->post('fDes'),
                	'fImageName' => $fac_filename
                ];
                $facility = new FacilityModel;
                $res = $facility->insertFacility($data);
                $this->session->set_flashdata('status', 'Facility Inserted Successfully');
                redirect(base_url('facilities/add'));
             }

		}else{
			$this->create();
		}
	}

	public function edit($id){
		$facility = new FacilityModel;
		$data['facility'] = $facility->editFacility($id);
		$this->load->view('facilities/edit', $data);
	}

	public function update($id){
		$this->form_validation->set_rules('fName', 'Facility Name', 'required');
		$this->form_validation->set_rules('fDes', 'Description', 'required');

		if($this->form_validation->run()){
			$old_filename = $this->input->post('old_fac_image');
			$new_filename = $_FILES["fImage"]['name'];

			if($new_filename == TRUe){
				$update_filename = time()."-".str_replace(' ', '-', $_FILES['fImage']['name']);
				$config = [
					'upload_path' => './images/facility/',
					'allowed_types' => 'gif|jpg|png',
					'file_name' => $update_filename,
				];
				$this->load->library('upload', $config);
				if($this->upload->do_upload('fImage')){
					if(file_exists("./images/facility/".$old_filename)){
						unlink("./images/facility/".$old_filename);
					}
				}
			}else{
				$update_filename = $old_filename;
			}

			$data = [
				'fName' => $this->input->post('fName'),
				'fDes' => $this->input->post('fDes'),
				'fImageName' => $update_filename
			]; 

			$facility = new FacilityModel;
			$res = $facility->updateFacility($data, $id);
            $this->session->set_flashdata('status', 'Facility Update Successfully');
            redirect(base_url('facilities/edit/'.$id));

		}else{
			return $this->edit($id);
		}
	}

	public function delete($id){
		$facility = new FacilityModel;
		if($facility->checkFacilityImage($id)){
			$data = $facility->checkFacilityImage($id);
			
			if(file_exists("./images/facility/".$data->fImageName)){
				unlink("./images/facility/".$data->fImageName);
			}
			$facility->deleteFacility($id);
			$this->session->set_flashdata('status', 'Facility Data is deleted');
			redirect(base_url('facilities/manage'));
		}
	}

}


?>
