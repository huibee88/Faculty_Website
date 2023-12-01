<?php

	class Finance extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		/*------------------------------
			Student - View and Pay Fee
		-------------------------------*/
		function getStudentInfo(){
			$this->db->select('user1.userLastName,user1.userFirstName,user1.userID,courses.courseName,user1.email,user1.phone,user1.userPic');
			$this->db->from('user1');
			$this->db->join('courses','courses.courseCode = user1.courseID');
			$data = $this->db->get();

			$result = array();

			foreach($data->result_array() as $row){
				array_push($result, array('sName'=>$row['userLastName'] . $row['userFirstName'],
										'sID' => $row['userID'],
										'sCourseName' => $row['courseName'],
										'sEmail' => $row['email'],
										'sPhoneNo' => $row['phone'],
										'sPicture' => $row['userPic']
									));
			}

			return $result;
		}


		/*View Course Fee*/
		function getStudentLedger(){

			 $data = $this->db->query(//'select DISTINCT course_fee.course_feeID, semester, totalfee, paymentDate, receipt
			// 					from student
			// 					left join course using (courseID)
			// 					left join course_fee using (courseID)
			// 					left join 
			// 					payment using (studentID) order by course_feeID;'
			 	'select DISTINCT course_fee.course_feeID, semester, totalfee, paymentDate, receipt
								from courses
								join course_fee on courses.courseCode = course_fee.courseID
								left join 
								payment using (course_feeID)
                                where course_fee.courseID = (select courseID from user1 where userID="1")
                                 order by course_feeID;');

			$result = array();

			foreach($data->result_array() as $row){
				array_push($result,array('course_feeID'=>$row['course_feeID'],
										 'semester'=>$row['semester'],
										 'Amount'=>$row['totalfee'],
										 'Date'=> $row['paymentDate'],
										 'Receipt'=>$row['receipt']));
			}
			return $result;
		}//end getStudentLedger


		/* Payment form*/
		function getPaymentDetail($coursefeeID){
			$this->db->select('user1.userID,course_fee.semester, course_fee.totalfee');
			$this->db->from('user1,course_fee');
			$this->db->where('course_feeID',$coursefeeID);
			$query=$this->db->get();
			
			if($query -> num_rows()>=1 ){
				$data = $query->row_array();

				$value = array(
					'sCourseID' => $coursefeeID,		
					'sID' => $data['userID'],
					'sSemester'	=>$data['semester'],
					'sAmount' => $data['totalfee']
				);
				return $value;
			}else{
				return false;
			}
		}

		/* Upload Receipt & store into database*/
		function uploadReceipt($data){
			if($data){
				//check duplicate of payment
				$query = $this->db->get_where('payment',array('studentID'=>trim($data['pstudentID']),'course_feeID'=>trim($data['pCourseFeeID'])));
				$count = $query->num_rows();
				if($count==0){
					$value = array(
					'course_feeID' =>trim($data['pCourseFeeID']),
					'paymentDate' => trim($data['pDate']),
					'studentID' => trim($data['pstudentID']),
					'totalAmount' => trim($data['pAmount']),
					'receipt' => trim($data['pReceipt'])
					);

					$this->db->insert('payment',$value);
					return true;
				}
				else{
					return false;
				}

			}
		}//end function uploadReceipt

		/*------------------------------
			Admin - Manage Course Fee
		-------------------------------*/
		/*------------------------------
			Read Course Fee
		-------------------------------*/
		/*-- View Course Fee List --*/
		function getCourseFee(){
			$this->db->select('course_fee.course_feeID,courses.courseName,course_fee.semester,course_fee.description,course_fee.totalfee');
			$this->db->from('course_fee');
			$this->db->join('courses','courses.courseCode = course_fee.courseID');
			$data = $this->db->get();

			$result = array();

			foreach($data->result_array() as $row){
				array_push($result,array('course_feeID'=>$row['course_feeID'],
										 'courseName'=>$row['courseName'],
										 'semester'=>$row['semester'],
										 'description'=>$row['description'],
										 'totalfee'=>$row['totalfee'] ));
			}

			return $result;
		}

		/*------------------------------
			Create New Course Fee
		-------------------------------*/
		/*Add New Course Fee*/
		function insertNewCourseFee($data){
			if($data){
				$this->db->trans_begin(true);

			//check the duplication of course_fee
			$this->db->select('courseCode');
			$this->db->from('courses');
			$this->db->where('courseName',trim($data['insertCourseName']));

			$check = $this->db->get()->row_array()['courseCode'];

			$query = $this->db->get_where('course_fee',array('semester'=>trim($data['insertSemester']),'courseID'=>trim($check)));

			$count = $query->num_rows();
			
			if($count==0){	
				$value = array(
					'courseID' => trim($check),
					'semester' => trim($data['insertSemester']),
					'description' => trim($data['insertDescription']),
					'totalfee' => trim($data['insertTotalAmount'])
				);

				$this->db->insert('course_fee',$value);
			} else {
				$this->db->trans_rollback();
				return false;
			}

			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				return true;
			}

			} else {
				return false;
			}
		}//end function insertNewCourseFee
		
		/*------------------------------
			Edit Course Fee
		-------------------------------*/
		/*Get Data*/
		function getData($coursefeeID){
			$this->db->select('courses.courseName,course_fee.semester,course_fee.description,course_fee.totalfee');
			$this->db->from('course_fee');
			$this->db->join('courses','courses.courseCode=course_fee.courseID');
			$this->db->where('course_feeID', $coursefeeID);

			$query = $this->db->get();

			if($query -> num_rows() == 1){
				$data = $query -> row_array();

				$value = array(
					'iCourseFeeID' => $coursefeeID,
					'iCourse' => $data['courseName'],
					'iSemester' => $data['semester'],
					'iDesc' => $data['description'], 
					'iAmount' => $data['totalfee']
				);
				return $value;
			}else{
				return false;
			}
		}//end function getData

		/* Update Course Fee*/
		function updateCourseFee($data){
			$this->db->select('courseCode');
			$this->db->from('courses');
			$this->db->where('courseName',trim($data['insertCourseName']));

			$checkID = $this->db->get()->row_array()['courseCode'];

			$value=array(
				'courseID' => trim($checkID),
				'semester' => trim($data['insertSemester']),
				'description' => trim($data['insertDescription']),
				'totalfee' => trim($data['insertTotalAmount'])
			);

			$this->db->where('course_feeID',$data['insertCourseFeeID']);

			if($this->db->update('course_fee',$value)){
				return true;
			}else{
				return false;
			}

		}//end function updateCourseFee

		/*------------------------------
			Delete Course Fee
		-------------------------------*/
		/*Delete*/
		function deleteCF($coursefeeID){
			$this->db->where('course_feeID',$coursefeeID);
			$this->db->delete('course_fee');
		}//end function delete

	}

?>