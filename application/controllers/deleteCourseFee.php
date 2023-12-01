<?php 
	class deleteCourseFee extends CI_Controller {
		function __construct(){
			parent::__construct();

			$this -> load -> model('Finance', '', TRUE);
			$this -> load -> library('session');
		}

		function getCourseFeeID($coursefeeID){
			$this->index($coursefeeID);
		}


		public function index($coursefeeID){
			$this -> Finance -> deleteCF($coursefeeID);
			redirect('http://localhost/Faculty_Website/adminFinance/', 'refresh');
		}
	}//class
?>