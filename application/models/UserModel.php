<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model {

	public function loginUser($data){
		$this->db->select('*');
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$this->db->from('user1');
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}

	}

}


?>