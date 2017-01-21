<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends Admin_Controller 
{

	function __construct()
	{
			parent::__construct();
			parent::admin_authenitcation();
			$this->load->model('tasks_model');
	}

	function index()
	{
		$view						=	"tasks/index";
		$data['page_title']			=	'Tasks';
		render('admin_dashboard',$view,$data);
	}
	
	//Get industory type..
	function get_records()
	{
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		$mydata	= $this->tasks_model->get_all_task_oginators_admin($Formdata);
		
		$tasks		=	array();
		
		foreach($mydata['data'] as $task){
			
		
			$toUsers		=	$this->get_toUsers($task->recieverID,'arr');	
			
			$tasks[]		=	array(
									'taskID'=>$task->taskID,
									'taskName'=>$task->taskName,
									'taskDescription'=>$task->taskDescription,
									'allotmentDate'=>$task->allotmentDate,
									'orginatorName'=>$task->firstName." ".$task->lastName,
									'orginatorContactNo'=>'+'.$task->countryPhoneCode." ".$task->contactNo,
									'functionalityType'=>$task->type,
									'orginatorphoto'=>$task->userPhoto,
									'recieverData'=>$toUsers,
									'statusText'=>ucfirst($task->statusText),
									'momName'=>$task->momName,
									'momID'=>$task->momID,
									'groupName'=>$task->groupName,
									'groupID'=>$task->groupID,
								 );
		}
		
		echo json_encode(array("total"=>$mydata['total'],"data"=>$tasks));
	
	}

	//End of get indutory type.
	
	function  get_toUsers($userIDs=null , $type='json'){
		
		if($userIDs!=''){
			
			$userIDArr			=	explode("," , $userIDs);
			
			$toUserdata  		= $this->db->select('U.firstName,U.lastName,U.emailID,ITM.type as industryType,SITM.subType as subIndustryTypeID,U.countryPhoneCode,U.contactNo,U.userPhoto')
							->from($this->db->dbprefix('api_users AS U'))
							->join($this->db->dbprefix('api_industory_type_master ITM'),'ITM.typeID=U.industryType')
							->join($this->db->dbprefix('api_sub_industory_type_master SITM'),'SITM.subTypeID=U.subIndustoryType', 'left')
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

	// Admin Task Detail.
	function get_task_detail()
	{
		
		if(isset($_GET['taskID']) && $_GET['taskID']!=''){
		
			$TaskDetail			=	 $this->tasks_model->get_task_detail($_GET['taskID']);
			echo json_encode(array('action'=>'success',  'taskData'=>$TaskDetail));
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Task id is not comming.'));
		}
	
	}
	// End of admin task Detail.
	
	function get_task_at_home()
	{
		$DataTask	=	$this->tasks_model->get_tasks_at_home($_REQUEST['userID'], $_REQUEST['tabval']);
		//echo "<pre>";
		//print_r($DataTask);
		echo json_encode($DataTask);
	}
	
}

?>