<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_model {
	
	function  get_records(){
		
		$selector		=	array(
									'G.groupID',
									'G.groupPhoto',
									'G.groupName',
									'G.groupPhoto',
									'G.createdDate',
									'G.modifiedDate',
									'G.status',
									'U.firstName',
									'U.lastName',
									'U.emailID',
									'U.userPhoto',
								);
		
		$data			= $this->db->select($selector)
										->from($this->db->dbprefix('api_groups as G'))
										->order_by("G.groupID","desc")
										->join($this->db->dbprefix('api_users as U'), 'G.createdBy=U.userID')
										->get()
										->result();
		return  $data;
	}

	// @Group Details
	// group name,  
	// group members 
	// group Tasks.
	// Group Task Detail 
	// open same window of the task detil  from the list based on  task id.	
	
	function get_group_detail($groupID=null, $userID=null)
	{
		
		
		
		
		$groupArr		=	array();
		
		$selector		=	array(
									'G.groupID',
									'G.groupPhoto',
									'G.groupName',
									'G.groupDescription',
									'G.groupPhoto',
									'G.createdDate',
									'G.modifiedDate',
									'G.status',
									'U.firstName',
									'U.lastName',
									'U.emailID',
									'U.userPhoto',
								);
		
		$data			= 	$this->db->select($selector)
										->from($this->db->dbprefix('api_groups as G'))
										->order_by("G.groupID","desc")
										->join($this->db->dbprefix('api_users as U'), 'G.createdBy=U.userID')
										->where(array('G.groupID'=>$groupID))
										->get()
										->row();
		  
		if(count($data)>0){
			
			$gID								=	$data->groupID;
			$data->groupMembersData				=	$this->get_user_group_list($gID);
			
			$this->load->model('tasks_model');	// loading model in a model.
			
			if($userID==null){
			
				$data->groupTaskData			=	$this->get_group_tasks($gID);
			
			}else{
				
				$data->recievedTaskData			=	$this->tasks_model->getRecievedTaskData($groupID,$userID);
				$data->givenTaskData			=	$this->tasks_model->getGivenTaskData($groupID,$userID);
			
			}
		
		}
	
		return $data;
		//echo json_encode($data);
	}

	
	//Get group task 
	function get_group_tasks()
	{
		//ity_group_tasks
		//ity_api_tasks
		//funcationlityTypeID - where  map with groupiID and
		//funtionalityType -3 
	
		$data = $this->db->select('*')
					 ->from($this->db->dbprefix('api_tasks as Task'))
					 ->join($this->db->dbprefix('api_groups as G'), 'Task.funcationlityTypeID=G.groupID')
					 ->where(array('Task.funtionalityType'=>3))
					 ->get()
					 ->result();
			
			return  $data;
		}
	//End Ger group task 

	//Get user's group
	function get_user_group_list($groupID=null)
	{
		$selector		=	array(
										'U.firstName',
										'U.lastName',
										'U.emailID',
										'GU.is_admin',
										'U.contactNo',
										'U.userPhoto',
										'U.status',
										'U.countryPhoneCode',
										'ITM.type',
										'SITM.subType'		
									);
		
		$data 	 = $this->db->select($selector)
				  ->from($this->db->dbprefix('api_users as U'))
				  ->join($this->db->dbprefix('api_group_users as GU'),'GU.userID=U.userID')
				  ->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType', 'left')
				  ->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
				  ->where(array('U.status'=>1))
				  ->where(array('GU.groupID'=>$groupID))
				  ->get()
				  ->result();
		
		
		if(count($data)>0)
		{
			return $data;
		
		}else{
			
			return 'nodata';
		}
	}

	//Adding group  menmber into the group .
	function add_new_member_into_group()
	{
		
	}
	// End of Adding group member intp the group.
	
	 //List the group menbers on based on  grouo  id.
	 function  get_group_members_list()
	 {
		 
	 }	
	 //End List the group  menmbers  on the based on grouo  id.
	 //Get Group Task  bind task model with  group model.
	
	//@request  params -  group_id 
	function get_group_task_list()
	{
	
	}
	// Get Group Task  bind task model with  group model.
	
	
	
	
	
	
	
	
	
}

?>
