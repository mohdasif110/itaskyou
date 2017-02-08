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
	function  add_participant($req, $type='a',$is_mom_creator=0){
			
		 $data			=	array('userID'=>$req['userID'],'momID'=>$req['momID'],'participantAs'=>$type,'is_mom_creator'=>$is_mom_creator);
		
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
	
	//save mom... 
	function save_mom($saveData=array(),$participant=null, $momParticipantCC=null){
		
			if($this->db->insert($this->db->dbprefix('api_mom'), $saveData)){
			
				$momID					=	$this->db->insert_id();
				$participant			=	explode(",",$participant);
				$momParticipantCC			=	explode(",",$momParticipantCC);				
			
				$req		=	array('userID'=>$saveData['createdBy'],'momID'=>$momID);
				$this->add_participant($req,'a','1');// participants
			
				if(count($participant)>0){
					
					foreach($participant as $val){
						
						if($saveData['createdBy']!=$val){
							
							$req		=	array('userID'=>$val,'momID'=>$momID);
							$this->add_participant($req,'a','0');// participants
						
						}
						
					}
				}
			
				if(count($momParticipantCC)>0){
					
					foreach($momParticipantCC as $val){
						
						if($saveData['createdBy']!=$val){
							
							$req		=	array('userID'=>$val,'momID'=>$momID);
							$this->add_participant($req,'c','0');// participants
						
						}
					}
				}
				
				return true;
		
		}else{
			
			return false;
		
		}
	}
	//End of save mom.
	
	

	function add_mom_observations($saveData)
	{
		
		if($this->db->insert($this->db->dbprefix('api_mom_observation'), $saveData)){
		
			return true;
		
		}else{
		
			return false;
		}
	}
	
	function  add_mom_tasks(){}
	
	function  get_mom_list(){}
	
	function  get_mom_details(){}
	
}
?>