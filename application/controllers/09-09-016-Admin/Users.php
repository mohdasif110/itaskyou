<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Admin_Controller {

	
	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		$this->load->model('User');
	
	}

	public function index()
	{
		echo "User Panel";
		//$this->load->view('admin/login');
	}
	
	//API users ..  
	function  api_users(){
		//$mydata	= $this->User->get_api_users();
		$view						=	"users/index";
		$data['page_title']			=	'API Users';
		render('admin_dashboard',$view,$data);
	}

	
	
	// get API Users data.
    function get_records(){
	
		$mydata	= $this->User->get_api_users();
		echo json_encode($mydata);
	}
	//end of get Users data ..
	
	//all
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	//To Me
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	
	//By Me
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	
	//My To Do
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	//Following
		//-Total Task
		// In Progress 
		// Completed
        // OverDue
	function get_complete_user_info(){
	
		
	
	
	}
	
	
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
	
}

/* End of file admin.php */
/* Location: ./application/controllers/welcome.php */