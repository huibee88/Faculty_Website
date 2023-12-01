<?php

class FCourse extends CI_Model {
	private $f_courseCode;
	private $f_courseName;
	private $f_creditHour;
	private $f_courseYear;
	private $f_facultyID;

	public function __construct(){
		parent::__construct();
		//echo 'constructor';
	}

	/* COURSES */
	function getcourseName(){
		$this->db->select('icon, courseName, description, courseCode');
		$this->db->from('courses');
		$data = $this->db->get();

		$result = array();

		foreach($data->result_array() as $row){
			array_push($result, array('cicon' => $row['icon'], 
									  'cname' => $row['courseName'], 
									  'cdesc' => $row['description'], 
									  'ccode' => $row['courseCode']));
		}
		return $result;
	} // end function getcourseName

	/* READ MORE */
	function getcourseData($courseCode){
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('courseCode', $courseCode);
		$data = $this->db->get();

		$result = array();

		foreach($data -> result_array() as $row){
			array_push($result, array('ccode' => $row['courseCode'], 
									  'cname' => $row['courseName'], 
									  'cch' => $row['creditHour'], 
									  'cyear' => $row['courseYear'], 
									  'cfID' => $row['facultyID'], 
									  'cdesc' => $row['description'], 
									  'cimg' => $row['img']));
		}
		return $result;
	} // end function getcourseData

	/* ADD */
	function insertNewCourse($data){
		if($data){
			$this->db->trans_begin(true);

			//check the duplication of account
			$query = $this->db->get_where('courses', array('courseCode' => trim($data['courseCODE'])));
			$count = $query->num_rows();

			if($count == 0){
				$value = array(
					'icon' => trim($data['courseICON']),
					'courseCode' => trim($data['courseCODE']),
					'courseName' => trim($data['courseNAME']), 
					'creditHour' => trim($data['courseCH']), 
					'courseYear' => trim($data['courseYEAR']),
					'facultyID' => trim($data['courseFID']), 
					'description' => trim($data['courseDESC']), 
					'img' => trim($data['courseIMAGE'])
				);

				$this->db->insert('courses', $value);
			}else{
				$this->db->trans_rollback();
				return false;
			}

			if($this->db->trans_status() == FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		else{
			return false;
			echo 'insert error!';
		}
	} // end function insertNewCourse

	/* EDIT DATA */
	function updateData($data){
		$value = array(
			'icon' => trim($data['courseICON']),
			'courseCode' => trim($data['courseCODE']),
			'courseName' => trim($data['courseNAME']), 
			'creditHour' => trim($data['courseCH']), 
			'courseYear' => trim($data['courseYEAR']),
			'facultyID' => trim($data['courseFID']), 
			'description' => trim($data['courseDESC']), 
			'img' => trim($data['courseIMAGE'])
		);

		$this -> db -> where('courseCode', $data['courseCODE']);

		if ($this -> db -> update('courses', $value)) {
			//echo'update success';
			return true;
		}else{
			return false;
			//echo'update error';
		}
	} // end function updateData

	/* GET DATA */
	function getData($courseCode){
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('courseCode', $courseCode);

		$query = $this->db->get();

		if($query -> num_rows() == 1){
			$data = $query -> row_array();

			$value = array(
				'uIcon' => $data['icon'],
				'uCode' => $data['courseCode'],
				'uName' => $data['courseName'], 
				'uHour' => $data['creditHour'], 
				'uYear' => $data['courseYear'],
				'uFacultyID' => $data['facultyID'], 
				'uDescription' => $data['description'], 
				'uImage' => $data['img']
			);
			return $value;
		}else{
			return false;
		}
	} // end function getData

	/* DELETE COURSE */
	function getcourse(){
		$this->db->select('courseCode');
		$this->db->from('courses');
		$this->db->where('courseCode', $courseCode);
		$data = $this->db->get();

		$result = array();

		foreach($data->result_array() as $row){
			array_push($result, array('cCode' => $row['courseCode']));
		}
		return $result;
	}

	function deleteCourse($courseCode){
		$this->db->where('courseCode', $courseCode);
		$this->db->delete('courses');
	} // end function deleteCourse
}
?>