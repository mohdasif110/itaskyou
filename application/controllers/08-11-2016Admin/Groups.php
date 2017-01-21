<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Groups extends Admin_Controller {
	
	
	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		
		//$this->load->model('User');
		//$this->load->model('tasks_model');
		
		$this->load->model('group_model');
		
		
	}
	
	
	public function index()
	{
		$view						=	"groups/index";
		$data['page_title']			=	'API Groups';
		render('admin_dashboard',$view,$data);
	}
	
	// In Admin Groups list.
	function  get_records(){
			
			$data 			=	 $this->group_model->get_records();
			echo json_encode($data);
	}

	// Get group  list for the users wise. 
	
	function  get_group_list($userID	=	1){
	
			$data 			=	 $this->group_model->get_group_list($userID);
			echo json_encode($data);
	
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/Admin/Groups.php */