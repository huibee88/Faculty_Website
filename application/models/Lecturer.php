<?php

class Lecturer extends CI_Model{

public function __construct()
{
	parent::__construct();
}

	function getProfessorName(){
		$this->db->select('lecturerName, lecturerID');
		$this->db->from('teams');
		$this->db->where('lecturerPosition', 'professor');
		$data = $this->db->get();
		
		$prof = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($prof, array($row["lecturerID"], $row["lecturerName"]));
		}
		return $prof;
	}

	function getAssociateProfessorName(){
		$this->db->select('lecturerName, lecturerID');
		$this->db->from('teams');
		$this->db->where('lecturerPosition', 'associate professor');
		$data = $this->db->get();
		
		$aprof = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($aprof, array($row["lecturerID"], $row["lecturerName"]));
		}
		return $aprof;
	}

	function getSeniorLecturerName(){
		$this->db->select('lecturerName, lecturerID');
		$this->db->from('teams');
		$this->db->where('lecturerPosition', 'senior lecturer');
		$data = $this->db->get();

		$slec = array();
		
		foreach ($data->result_array() as $row)
		{
        	array_push($slec, array($row["lecturerID"], $row["lecturerName"]));
		}
		return $slec;
	}

	function getLecturerName(){
		$this->db->select('lecturerName, lecturerID');
		$this->db->from('teams');
		$this->db->where('lecturerPosition', 'lecturer');
		$data = $this->db->get();
		
		$lec = array();
		
		foreach ($data->result_array() as $row)
		{
        	array_push($lec, array($row["lecturerID"], $row["lecturerName"]));
		}

		return $lec;
	}


	function getLecturerImg($lecid){
		$this->db->select('lecturerImg');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$result = $this->db->get();

		$row = $result->row_array();

		if (isset($row))
		{
		    return $row['lecturerImg'];
		}
	}

	function getEachName($lecid){
		$this->db->select('lecturerName');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$name = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($name, $row["lecturerName"]);
		}
		
		return $name;
	}

	function getEachPosition($lecid){
		$this->db->select('lecturerPosition');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$position = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($position, $row["lecturerPosition"]);
		}
		
		return $position;
	}

	function getEachEmail($lecid){
		$this->db->select('lecturerEmail');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$email = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($email, $row["lecturerEmail"]);
		}
		
		return $email;
	}

	function getEachPhone($lecid){
		$this->db->select('lecturerPhone');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$phone = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($phone, $row["lecturerPhone"]);
		}
		
		return $phone;
	}

	function getEachEducation($lecid){
		$this->db->select('lecturerEducation');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$education = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($education, $row["lecturerEducation"]);
		}
		
		return $education;
	}

	function getEachAOExpert($lecid){
		$this->db->select('AreaOfExpert');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);
		$data = $this->db->get();

		$aoe = array();

		foreach ($data->result_array() as $row)
		{
        	array_push($aoe, $row["AreaOfExpert"]);
		}
		
		return $aoe;
	}

	function addNewLecturer($data){
		if ($data) {
			
			$this->db->trans_begin(true);

			//check the duplication of lecturerID
			$query = $this->db->get_where('teams', array('lecturerID' => trim($data['lecID'])));
			$count = $query->num_rows();

			if ($count == 0) {

				$value = array(
					'lecturerID' => trim($data['lecID']),
					'lecturerName' => trim($data['lecName']),
					'lecturerPosition' => trim($data['lecPostion']),
					'lecturerEmail' => trim($data['lecEmail']),
					'lecturerPhone' => trim($data['lecPhone']),
					'lecturerEducation' => trim($data['lecEducation']),
					'AreaOfExpert' => trim($data['lecAOE']),
					'FacultyID' => trim($data['facID']),
					'LecturerImg' => trim($data['lecImg'])
					);

				$this->db->insert('teams', $value);

			}else{
				$this->db->trans_rollback();
				return false;
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return false;
			}else{
				$this->db->trans_commit();
				return true;
			}
		}else{
			return false;
		}
	}


	function updateTeam($data){
		$value = array(
			'lecturerID' => trim($data['lecID']),
			'lecturerName' => trim($data['lecName']),
			'lecturerPosition' => trim($data['lecPosition']),
			'lecturerEmail' => trim($data['lecEmail']),
			'lecturerPhone' => trim($data['lecPhone']),
			'lecturerEducation' => trim($data['lecEducation']),
			'AreaOfExpert' => trim($data['lecAOE']),
			'FacultyID' => trim($data['facID']),
			'LecturerImg' => trim($data['lecImg'])
			);

		$this->db->where('lecturerID', $data['lecID']);

		if ($this->db->update('teams', $value)) {
			//echo 'update success';
			return true;
		}else{
			return false;
			//echo 'update error';
		}
	}

	function getTeamData($lecid){
		$this->db->select('*');
		$this->db->from('teams');
		$this->db->where('lecturerID', $lecid);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			$ldata = $query->row_array();

			$value = array(
			'lID' => $ldata['lecturerID'],
			'lName' => $ldata['lecturerName'],
			'lPosition' => $ldata['lecturerPosition'],
			'lEmail' => $ldata['lecturerEmail'],
			'lPhone' => $ldata['lecturerPhone'],
			'lEducation' => $ldata['lecturerEducation'],
			'AOE' => $ldata['AreaOfExpert'],
			'fID' => $ldata['FacultyID']
			);

			return $value;
		}else{
			return false;
		}
	}

	function deletelec($lecid){
		
		$this->db->where('lecturerID', $lecid);
		$this->db->delete('teams');
	}
}
?>