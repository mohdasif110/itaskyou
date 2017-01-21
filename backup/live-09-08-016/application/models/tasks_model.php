<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tasks_model extends CI_model {

	
	//Get all orginator..
	function get_all_task_oginators()
	{
		
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->order_by('Task.taskID','desc')
					->get()
					->result();
		$dataTempData		=	 array();
		return $data;
	
	}
	
	// end  of get all  the orginator.
	// Get all  the task of specific orginator.
	function get_orginator_taks($orginatorID=null, $type='json')
	{
		$data	    = $this->db->select('taskID,taskName,taskDescription,allotmentDate,orginatorID,revisedDate,dueDate,status')
					->from($this->db->dbprefix('api_tasks as Task'))
					->where(array('orginatorID'=>$orginatorID))
					->order_by('Task.taskID','desc')
					->get()
					->result();
		
			if($type=='json'){
				
				echo json_encode($data);
			
			}else{
				
				return $data;
			}
	}
	
	//Get Task detail
	
	function get_task_detail($taskID=null){
		
		$data	    = $this->db->select('Task.taskID,Task.taskName,Task.taskDescription,Task.allotmentDate,Task.revisedDate,Task.dueDate,Task.taskType,Task.recieverID ,Task.ccID,Task.tagID,User.firstName, User.lastName ,User.emailID, FT.type, SM.statusText, User.userPhoto')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->where(array('Task.taskID'=>$taskID))
					->order_by('Task.taskID','desc')
					->get()
					->row();
		if($data->recieverID!=''){
			
			$toUsers			=	$this->get_toUsers($data->recieverID,'arr');
		}
		
		if($data->ccID!=''){
			$ccUsers			=	$this->get_toUsers($data->ccID,'arr');
		}
	
		if($data->tagID!=''){
			$tagData				=	$this->get_tags($data->tagID,'arr');
		}
		
		
		$Mydata		=	array(
								'taskID'=>$data->taskID,
								'taskName'=>$data->taskName,
								'taskDescription'=>$data->taskDescription,
								'allotmentDate'=>$data->allotmentDate,
								'revisedDate'=>$data->revisedDate,
								'dueDate'=>$data->dueDate,
								'taskType'=>$data->taskType,
								'orginatorName'=>$data->firstName." ".$data->lastName,
								'orginatorEmailID'=>$data->emailID,
								'function;ityType'=>$data->type,
								'taskStatus'=>$data->statusText,
								'OrginatorPhoto'=>$data->userPhoto,
								'recieverData'=>$toUsers,
								'ccUsersData'=>$ccUsers,
								'tagsData'=>$tagData
						     ); 
			return $Mydata;
	}
	//End of task detail.
	
	function  get_toUsers($userIDs=null , $type='json'){
		
		if($userIDs!=''){
		
			$userIDArr			=	explode("," , $userIDs);
			$toUserdata  		= $this->db->select('firstName,lastName,userID')
										->from($this->db->dbprefix('api_users as User'))
										->where_in('userID',$userIDArr)
										->get()
										->result();
			
			if($type=='arr'){
			
				return $toUserdata;
			
			}else{
				
				echo json_encode($toUserdata);  
			}
		}
	}
	
	function  get_tags($tagIDs=null , $type='json'){

		if($tagIDs!=''){
			
			$tagIDArr			=	explode("," , $tagIDs);
			$tagdata  		= $this->db->select('Tag.tagText,Tag.tagID')
										->from($this->db->dbprefix('api_tag_master as Tag'))
										->where_in('tagID',$tagIDArr)
										->get()
										->result();
			
			if($type=='arr'){
			
				return $tagdata;
			
			}else{
				
				echo json_encode($tagdata);  
			}
			
		}
	}
	
	
}

?>
