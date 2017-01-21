<?php
Class Mom_model extends CI_Model
{
	
	function get_records(){
	
			$selector		=	array(
									'U.firstName',
									'U.lastName',
									'U.contactNo',
									'U.emailID',
									'U.userPhoto',
									'MOM.momName',
									'MOM.momDescription',
									'MOM.createdDate',
									'MOM.modifiedDate',
									'MOM.momID',
								);
			
			$momData		=	$this->db->select($selector)
									 ->from($this->db->dbprefix('api_mom MOM'))
									 ->join($this->db->dbprefix('api_users U'), 'U.userID=MOM.createdBy')
									 ->order_by('MOM.momID', 'desc')
									 ->get()
									 ->result();
		
			
			return $momData;
	
	}

	//momID,deviceID,contactNo, phoneCountryCode
	function  add_participant($req){
			
		 $data			=	array('userID'=>$req['userID'],'momID'=>$req['momID']);
		
		if($this->db->insert($this->db->dbprefix('api_mom_participant'), $data)){
		
			return true;
		}else{
		
			return false;
		}
	}

	//Get mom detail.
	function get_mom_detail($momID=NULL)
	{
	
		$TempArr		=	array();
		$selector		=	array(
									'MOM.momID',
									'MOM.momName',
									'MOM.momDescription',
									'MOM.createdDate',
									'MOM.modifiedDate',
									'U.firstName',
									'U.lastName',
									'U.contactNo',
									'U.emailID',
									'U.userPhoto'
								);
		
		$momData		=	$this->db->select($selector)
									 ->from($this->db->dbprefix('api_mom MOM'))
									 ->join($this->db->dbprefix('api_users U'), 'U.userID=MOM.createdBy')
									 ->where(array('momID'=>$momID))	
									 ->get()
									 ->row();
		
		if(count($momData)>0){								
		
			$momData->participant		=	$this->get_mom_participants($momID);// mom participant.
			$momData->observation		=	$this->get_mom_observations($momID);// mom observation.	
			$momData->tasks				=	$this->get_mom_tasks($momID);       // mom taks. 	
			return $momData;
	
		}else{
			
			return array();	
	    }

	}
	//End of mom detail.

	//Participant..
	function get_mom_participants($momID=NULL){ 
	
		$selector		=	array(
							'U.firstName',
							'U.lastName',
							'U.contactNo',
							'U.emailID',
							'U.userPhoto',
							'U.status'
						);
		
		$momData		=	$this->db->select($selector)
							 ->from($this->db->dbprefix('api_mom_participant MOMP'))
							 ->join($this->db->dbprefix('api_users U'), 'U.userID=MOMP.userID')
							 ->where(array('momID'=>$momID,'status'=>'1'))
							 ->get()
							 ->result();
		return $momData;
		
	}
	//End of participant;
	
	// MoM Observations:-
	function get_mom_observations($momID=NULL){ 
		
		//api_mom_observation
		//api_mom
		
		
		$selector		=	array(
							'MO.observationName',
							'MO.observationDescription',
							'MO.createdDate',
							'MO.modifiedDate',
							'MO.modifiedDate',
							);
		
		$momData		=	$this->db->select($selector)
							 ->from($this->db->dbprefix('api_mom_observation MO'))
							 ->join($this->db->dbprefix('api_mom M'), 'M.momID=MO.momID')
							 ->where(array('MO.momID'=>$momID))
							 ->get()
							 ->result();
		return $momData;
		//return array();
	}
	
	//
	function get_mom_tasks($momID=NULL){ 
		
		return array();
	}

	//Add observatons
	function add_observation($req){
	
		$data			=	array(
									'observationName'=>$req['observationName'],
									'momID'=>$req['momID'],
									'observationDescription'=>$req['observationDescription'],
									'createdBy'=>$req['userID'],
									'createdDate'=>date('Y-m-d')
								);

		if($this->db->insert($this->db->dbprefix('api_mom_participant'), $data)){
		
			return true;
		
		}else{
			
			return false;
		}
	}

	//Adding.................
	function add_mom_task(){}
	//End Adding..................
	
}
?>