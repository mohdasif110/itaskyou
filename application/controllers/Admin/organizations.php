<?php
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organizations extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		$this->load->model('User');
		$this->load->model('Organization');
	
	}
	
	public function index()
	{
		$view						=	"organizations/index";
		$data['page_title']			=	'Organizations';
		render('admin_dashboard',$view,$data);
	}
	
	//Get API Users data.
    function get_records(){
		
		$mydata	= $this->Organization->get_organizations();
		
		
		
		
		echo json_encode($mydata);
	}
	
	//end of get Users data ..
	
	function  toggleStatus()
	{
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$tagID			=	$Formdata['tagID'];
		$status			=	$Formdata['status'];
		$flag			= 	$this->User->toggleStatus($tagID, $status);
		
		if($flag==1){
		
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type status has been updated successfully.'));
	
		}else{
		
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	
	}
	

	
	//all
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
		// declined
	//To Me
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	   // declined
	//By Me
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	   // declined
	//My To Do
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
		//declined
	//Following
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
		//declined
	
	function get_complete_user_info(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$userID			=	$Formdata['userID'];

		$tempArr 						=	array();

		$AllCount  						=  $this->tasks_model->get_all_task_count($userID,'all');	

		$tempArr['All']			=	$AllCount;

		$to_me_Count  					=   $this->tasks_model->get_all_task_count($userID	,'tome');

		$tempArr['To Me']			=	$to_me_Count;

		$by_me_Count  					=   $this->tasks_model->get_all_task_count($userID	,'byme');

		$tempArr['By Me']			=	$by_me_Count;

		$my_to_do_Count  				=   $this->tasks_model->get_all_task_count($userID	,'mytodo');
		$tempArr['My To Do']			=	$my_to_do_Count;
		
		$following_Count  				=   $this->tasks_model->get_all_task_count($userID	,'following');
		
		$tempArr['Following']		=	$following_Count;
		echo json_encode($tempArr);
	}
	
	
	
	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/welcome.php */