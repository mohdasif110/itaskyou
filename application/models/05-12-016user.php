<?php
Class User extends CI_Model
{
	
	function login($username, $password)
	{
		$this -> db -> select('userID, username,emailID,firstName,lastName,contactNo');
		$this -> db -> from($this->db->dbprefix('web_users'));
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1)
		{
			return $query->row();
		
		}else{
			
			return false;
		}
	}
	
	//API USERS -- Listing in admin.
	function get_api_users(){
		
		$where		=	"(U.status='1' or U.status='0')";
		$dataGamming	=	$this->db->select('U.firstName, U.status,U.userID,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType' ,'left')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
			->where($where)
			->order_by('U.userID','desc')
			->get()->result();
			return $dataGamming;
	}

	//API USERS --  Listing in admin.
	function get_assigned_task_me()
	{
	
		if(isset($_GET['userID']) && $_GET['userID']!=''){
			
			$userID			=	$_GET['userID'];
		
		}else{
		
			echo json_encode(array('acrion'=>'error', 'message'=>'user id is not comming'));
			die();
		}
	
		$where = "FIND_IN_SET('".$userID."', recieverID)";  
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID' )
					->where($where)
					->order_by('Task.taskID','desc')
					->get()
					->result();
		$dataTempData		=	 array();
		
		foreach($data as $tasks)
		{
			
			$orginatorsTask							=	$this->get_orginator_taks($tasks->orginatorID,'arr');
			$dataTempData[$tasks->orginatorID]		=	array(
														'orginator'=>$tasks->orginatorID,
														'firstName'=>$tasks->firstName,
														'lastName'=>$tasks->lastName,
														'contactNo'=>$tasks->contactNo,
														'taskcount'=>count($orginatorsTask),
														'tasks'=>$orginatorsTask	
													);
														
		}
		
		echo json_encode(array('orginators'=>$dataTempData));
	}
	
	
	function  toggleStatus($typeID, $status)
	{
		
		$data			=	array('status'=>$status);	
		$this->db->where('userID', $typeID);
		if($this->db->update($this->db->dbprefix('api_users'), $data))
		{
			return 1;
			
		}else{
			
		    return 0;	
		}	
	}
	
	//Get API user info 
	function get_api_user_info($userID)
	{
			$dataGamming	=	$this->db->select('U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
			->where(array('userID'=>$userID))
			->get()->row();
			return $dataGamming;
	
	}
	
	//Using params - contactNo, code, status-1 
	function get_user_info($conditionArr){
				
			$dataGamming	=	$this->db->select('U.userID,U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
			->where($conditionArr)
			->get()->row();
			return $dataGamming;
	}
	
	//get active user list 
	 function  get_active_user_list(){
		
		$dataGamming	=	$this->db->select('U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
		//	->where(array('U.status'=>1,'U.otp'=>null))
		    ->order_by('U.firstName', 'asc')
			->where(array('U.status'=>1))
			->get()->result();
			return $dataGamming;
	}
	// Get active user list.
	
	//Get Group Users  
	function get_group_users($groupID)
	{
				 $data		=	$this->db->select('U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
				->from($this->db->dbprefix('api_users AS U'))
				->join($this->db->dbprefix('api_group_users GU') , 'U.userID=GU.userID')
				->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
				->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
				->where(array('groupID'=>$groupID,'U.status'=>'1'))
				->get()
				->result();
			return $data;
	}
	//End  of Group User.
	
	//get active user list 
	 function  get_check_active_user($conatctNo){
		
		$dataGamming	=	$this->db->select('U.userID,U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
		    ->order_by('U.firstName', 'asc')
			->where(array('U.status'=>1,'contactNo'=>$conatctNo))
			->get()->row();
			
			if(count($dataGamming)>0){
				
				return $dataGamming;
			
			}else{
				
				return false;
			}
	}
	// Get active user list.
	
	function get_multiple_active_users($userArr	=	array()){
	
		
		if($userArr==''){
			return 'blank';
		}
		
		$userArr		=	explode("," , $userArr);
		
		$dataGamming	=	$this->db->select('U.userID,U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
		    ->order_by('U.firstName', 'asc')
			->where(array('U.status'=>1))
			->where_in('userID', $userArr)
			->get()->result();
			
			return $dataGamming;
	}

}

?>