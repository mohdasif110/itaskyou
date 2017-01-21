<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tasks_model extends CI_model {


	
	function get_all_task_oginators_admin($Formdata)
	{
		
		$pagenumber				=	$Formdata['pageno'];
		$itemsPerPage			=	$Formdata['itemsPerPage'];
		
		$start			=  ($pagenumber-1)*$itemsPerPage;
		$limit			=   $itemsPerPage;
		
		$total	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->order_by('Task.taskID','desc')
					->get()
					->num_rows();
		
		
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->order_by('Task.taskID','desc')
					->limit($limit,$start)
					->get()
					->result();
					return array('total'=>$total, 'data'=>$data);
		}
	
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
	
	//End  of get all  the orginator.
	//Get all  the task of specific orginator.
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
	
	function  get_toUsers($userIDs=null , $type='json')
	{
		
		$where		=	"(U.status='1' or U.status='0')";
		
		if($userIDs!=''){
			
			$userIDArr			=	explode("," , $userIDs);
			$toUserdata			=	$this->db->select('U.firstName, U.status,U.userID,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
			->from($this->db->dbprefix('api_users AS U'))
			->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType' ,'left')
			->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
			->where_in('userID',$userIDArr)
			->where($where)
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

	
	//Add user in a group..
	function add_user_in_group_task($userID, $taskID)
	{
	
		$prevousUserArr		=	array();
		$resp				=	array();
		
		$alreadyArr			=	array();
		$newyArr			=	array();
		
		$taskDetail	=  $this->db->select('Task.recieverID')
			->from($this->db->dbprefix('api_tasks as Task'))
			->where(array('taskID'=>$taskID))
			->get()
			->row();
		
		$prevousUser 		=	  $taskDetail->recieverID;
		
		if($prevousUser!=''){
			
			$prevousUserArr			=	explode("," , $prevousUser);
			$userIDArr				=	explode("," , $userID);
			
			if(count($userIDArr)==1){
				//single user selected.
			
				if(in_array($userIDArr[0],$prevousUserArr)){
				
						$alreadyArr	= array('alreadyAddedUser'=>$userIDArr);
				
				}else{
						
						$resp	= array('newAddedUser'=>$userIDArr);
						$newyArr[]		=	$userIDArr[0];
				}
			
			}else{
				
				//Multiple users selected.	
				foreach($userIDArr as $user){
					
					if(in_array($user,$prevousUserArr)){
							
							$alreadyArr[]			=	$user;
					
					}else{
							$newyArr[]				=	$user;
							$prevousUserArr[]		=	$user;
					}
				}
			}
				
				if(count($prevousUserArr)>0)
				{
					
					$prevousUserArr			=	array_unique ($prevousUserArr);
					$prevousUserImp			=	implode(",",$prevousUserArr);	
					$this->db->where(array('taskID'=>$taskID));
					if($this->db->update($this->db->dbprefix('api_tasks as Task'), array('recieverID'=>$prevousUserImp))){
						return array('alreadyAddedUsers'=>array_unique($alreadyArr),'newAddedUsers'=>array_unique($newyArr));
					}
				}
			
			}else{
				
				return false;
			}
	}
  //end of add a user in a group.

  
	######################################## GET TASKS SECTION  ##############################################	
	//get task of a user
	//TASK IN / orginatorID / recieverID / ccID - /orginator task / receiver Tasks / following task.
	//Pending = 0 |  InProgress = 1 | Completed = 2 | Declined = 3 | Overdue= 4
	
	function get_all_task_count($userID, $type='all')
	{
		
			switch ($type) {
			case 'all':
				$where = "(FIND_IN_SET('".$userID."', T.recieverID) or T.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', T.ccID))"; 
			break;
			case 'tome':
				$where = "(FIND_IN_SET('".$userID."', T.recieverID))"; 
			break;
			case 'byme':
				$where = "(T.orginatorID='".$userID."')"; 
			break;
			case 'mytodo':
				$where = "(T.orginatorID='0')"; 
			break;
			case 'following':
				$where = "(FIND_IN_SET('".$userID."', T.ccID))"; 
			break;
			default:
				$where = "(FIND_IN_SET('".$userID."', T.recieverID) or T.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', T.ccID))";  
			}
		
		$TempArr		=	array();
		$PendingCount	= $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->where(array('T.status'=>'0'))
						->get()
						->num_rows();				
		
		$TempArr['PendingCount']		=	$PendingCount;
		
		$InProgressCount = $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->where(array('T.status'=>'1'))
						->get()
						->num_rows();	
		
		$TempArr['InProgressCount']		=	$InProgressCount;
	
		$CompletedCount = $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->where(array('T.status'=>'2'))
						->get()
						->num_rows();
		
		$TempArr['CompletedCount']		=	$CompletedCount;
		
		$DeclinedCount = $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->where(array('T.status'=>'3'))
						->get()
						->num_rows();
		
		$TempArr['DeclinedCount']		=	$DeclinedCount;	
		
		$OverdueCount = $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->where(array('T.status'=>'4'))
						->get()
						->num_rows();						
		
		$TempArr['OverdueCount']		=	$OverdueCount;	
		$allTaskCount					=	$PendingCount+$InProgressCount+$CompletedCount+$DeclinedCount+$OverdueCount;
		$TempArr['allTaskCount']		=	$allTaskCount;	
		
		//$TempArr['AllCount']			=	array_sum($OverdueCount);	
		
		return $TempArr;
	
	}
	
	
	function get_all_task_list($userID)
	{
		
		$where = "FIND_IN_SET('".$userID."', recieverID) or orginatorID='".$userID."' or FIND_IN_SET('".$userID."', ccID) ";  
		
		$AllDataCount	= $this->db->select('*')
						->from($this->db->dbprefix('api_tasks as T'))
						->where($where)
						->get()
						->result();
			
			return $AllDataCount;		
   }
  
  // Home all  tasks of user 
  function  get_tasks_at_home_old($userID=NULL, $type='all')
  {
		switch ($type) {
			case 'all':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID))"; 
			break;
			case 'tome':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID))"; 
			break;
			case 'byme':
				$where = "(Task.orginatorID='".$userID."')"; 
			break;
			case 'mytodo':
				$where = "(Task.orginatorID='0')"; 
			break;
			case 'following':
				$where = "(FIND_IN_SET('".$userID."', Task.ccID))"; 
			break;
			default:
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID))";  
		} 
		
		$selector	= array(
							'Task.taskID',
							'Task.taskName',
							'Task.taskDescription',
							'Task.allotmentDate as startDate',
							'Task.revisedDate',
							'Task.dueDate',
							'Task.taskType',
							'SM.statusText',
							'SM.taskStatus',
							'FT.type as funType', 
							'Task.orginatorID',
							'User.firstName as orginatorFirstName',
							'User.lastName as orginatorLastName',
							'User.countryPhoneCode as phoneCode',
							'User.userPhoto',
						);
		
		$data	    = $this->db->select($selector)
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->where($where)
					->order_by('Task.taskID','desc')
			 		->get()
					->result();
			
					return $data;				
	
	}
	
	
	function  get_tasks_at_home($userID=NULL, $type='all')
  {
	  
	  
	  
	  
		switch ($type)
		{
			case 'all':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID))"; 
			break;
			case 'tome':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID)) and Task.funtionalityType!='0' "; 
			break;
			case 'byme':
				$where = "(Task.orginatorID='".$userID."') and Task.funtionalityType!='0'"; 
			break;
			case 'mytodo':
				$where = "(Task.orginatorID='".$userID."') and Task.funtionalityType='0'"; // My To Do task. // as per monika discussion my to do is self task.
				break;
			case 'mom':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID)) and  Task.funtionalityType='4'";
			break;
			case 'team':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID)) and  Task.funtionalityType='2'";
		    break;
			case 'group':
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID)) and  Task.funtionalityType='3'";
			break;
			case 'following':
				$where = "(FIND_IN_SET('".$userID."', Task.ccID))"; 
			break;
			default:
				$where = "(FIND_IN_SET('".$userID."', Task.recieverID) or Task.orginatorID='".$userID."' or FIND_IN_SET('".$userID."', Task.ccID))";  
		}
		
		
		$selector  		= array(
						'Task.taskID',
						'Task.taskName',
						'Task.taskDescription',
						'Task.allotmentDate as startDate',
						'Task.revisedDate',
						'Task.dueDate',
						'Task.taskType',
						'SM.statusText',
						'SM.taskStatus',
						'FT.type as funType', 
						'Task.orginatorID',
						'User.firstName as orginatorFirstName',
						'User.lastName as orginatorLastName',
						'User.countryPhoneCode as phoneCode',
						'User.userPhoto',
					);
		
		$data	 = 	$this->db->select($selector)
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID')
					->join($this->db->dbprefix('api_functionality_type_master FT'),'FT.functionalityTypeID=Task.funtionalityType')
					->join($this->db->dbprefix('api_task_status_master as SM') , 'SM.taskStatus=Task.status')
					->where($where)
					->order_by('Task.taskID','desc')
			 		->get()
					->result();
					return $data;				
	}
	
	//End Home all tasks of user 
    //Get Task detail
	function get_task_detail($taskID=null)
	{
		$ccUsers 	= 	array();
		$tagData	= 	array();
		$toUsers	= 	array();	
		$selection	=	array
						(
							'Task.taskID',
							'Task.taskName',
							'Task.taskDescription',
							'Task.allotmentDate',
							'Task.revisedDate',
							'Task.dueDate',
							'Task.taskType',
							'Task.recieverID',
							'Task.ccID',
							'Task.tagID',
							'User.firstName',
							'User.lastName',
							'User.emailID',
							'User.contactNo', 
							'FT.type', 
							'SM.statusText', 
							'User.userPhoto'
						);
		
		$data	    = $this->db->select()
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
								'orginatorContacNo'=>$data->contactNo,
								'functionityType'=>$data->type,
								'taskStatus'=>$data->statusText,
								'OrginatorPhoto'=>$data->userPhoto,
								'recieverData'=>$toUsers,
								'ccUsersData'=>$ccUsers,
								'tagsData'=>$tagData
						     ); 
			return $Mydata;
	}
	
	//End of task detail.
	######################################## END GET TASKS SECTION  ##############################################	
	
	
	
	
	
}

?>
