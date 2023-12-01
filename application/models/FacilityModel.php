<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacilityModel extends CI_Model {
	
	public function insertFacility($data){
		return $this->db->insert('faci2', $data);
	}

	public function getFacilities(){
		$query = $this->db->get('faci2');
		return $query->result();
	}

	public function editFacility($id){
		$query = $this->db->get_where('faci2', ['id' => $id]);
		return $query->row();
	}

	public function updateFacility($data, $id){
		return $this->db->update('faci2', $data, ['id' => $id]);
	}

	public function checkFacilityImage($id){
		$query = $this->db->get_where('faci2', ['id' => $id]);
		return $query->row();
	}

	public function deleteFacility($id){
		return $this->db->delete('faci2', ['id' => $id]);
	}
}


?>