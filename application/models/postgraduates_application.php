<?php

class postgraduates_application extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	//function to get programmes details
	function getProgramme()
	{
		$this->db->select('*');
		$this->db->from('programmes');
		$prog_name=$this->db->get();

		$prog = array();

		foreach ($prog_name->result_array() as $row)
		{
        	array_push($prog, array('p_name'=>$row["p_programmeName"],
        							'p_desc'=>$row["p_programmeDescript"],
        							'p_img'=>$row["p_programmeImg"]));
		}

		return $prog;
	}

	//function to add new applicant
	function addNewApplicant($data)
	{
		if ($data) 
		{
			
			$this->db->trans_begin(true);

			if (true) 
			{
				$value = array(
					'programmeID' => trim($data['appProg']),
					'dateOfApply' => trim($data['appDate']),
					'app_name' => trim($data['appName']),
					'app_ic_pass' => trim($data['appIC']),
					'app_gender' => trim($data['appGender']),
					'app_DOB' => trim($data['appDOB']),
					'app_nationality' => trim($data['appNation']),
					'app_race' => trim($data['appRace']),
					'app_phone_no' => trim($data['app_phone_no']),
					'app_add1' => trim($data['appAdd1']),
					'app_add2' => trim($data['appAdd']),
					'app_postCode' => trim($data['appPost']),
					'app_city' => trim($data['appCity']),
					'app_state' => trim($data['appState']),
					'app_country' => trim($data['appCountry']),
					'app_email' => trim($data['appEmail']),
					'app_pic' => trim($data['appImg'])
				);

				$this->db->insert('applicants', $value);
			}

			else
			{
				$this->db->trans_rollback();
				return false;
			}

			if ($this->db->trans_status() === FALSE) 
			{
		
				$this->db->trans_rollback();
				return false;
			}

			else
			{
				$this->db->trans_commit();
				return true;
			}
		}

		else
		{
			return false;
		}
	}

	//function to get master namelist
	function getMaster() 
	{
		$this->db->select('app_name,app_ID');
		$this->db->from('applicants');
		$this->db->join('programmes', 'applicants.programmeID = programmes.p_programmeID', 'left');
		$this->db->where('programmeLevel', 'Master');

		$query = $this->db->get();
		$masterList=array();

		foreach($query->result_array() as $row)
		{
			array_push($masterList, array($row["app_ID"],$row["app_name"]));
		}

		return $masterList;
	}

	//function to get dr philosophy namelist
	function getDr() 
	{
		$this->db->select('app_name,app_ID');
		$this->db->from('applicants');
		$this->db->join('programmes', 'applicants.programmeID = programmes.p_programmeID', 'left');
		$this->db->where('programmeLevel', 'Doctor of Philosophy');
			
		$query = $this->db->get();
		$drList=array();

		foreach($query->result_array() as $row)
		{
			array_push($drList, array($row["app_ID"],$row["app_name"]));
		}

		return $drList;
	}

	//function to get applicant's full details
	function getApplicant($appID) 
	{
		$this->db->select('*');
		$this->db->from('applicants');
		$this->db->where('app_ID', $appID);

		$query=$this->db->get();

		if($query->num_rows()==1) 
		{
			$data = $query->row_array();

			$value = array(
			'aID' => $data['app_ID'],	
			'aProg' => $data['programmeID'],
			'aDate' => $data['dateOfApply'],	
			'aName' => $data['app_name'],
			'aICPass' => $data['app_ic_pass'],
			'aGender' => $data['app_gender'],
			'aDOB' => $data['app_DOB'],
			'aNationality' => $data['app_nationality'],
			'aRace' => $data['app_race'],
			'aPhoneNo' => $data['app_phone_no'],
			'aAdd1' => $data['app_add1'],
			'aAdd2' => $data['app_add2'],
			'aPostCode' => $data['app_postCode'],
			'aCity' => $data['app_city'],
			'aState' => $data['app_state'],
			'aCountry' => $data['app_country'],
			'aEmail' => $data['app_email'],
			'aImg' => $data['app_pic']
			);

			return $value;
		}

		else 
		{
			return false;
		}
	}	

	//function to delete applicant
	function deleteApp($appID)
	{	
		$this->db->where('app_ID', $appID);
		$this->db->delete('applicants');
	}

	//function to change approval status
	function approvalStatus($data)
	{
		$value=array('app_ID'=>trim($data['aID']),
			'approvalStatus' => trim($data['aStatus'])			
		);
		$this->db->where('app_ID', $data['aID']);
		$this->db->update('applicants', $value);
	}
}
?>