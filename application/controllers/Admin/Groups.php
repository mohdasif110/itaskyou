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
	
	//Get  group  detail.
	function get_group_detail($groupID=25){
	
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$groupID		=	$Formdata['groupID'];
		$GroupDeatil = $this->group_model->get_group_detail($groupID);
		echo  json_encode($GroupDeatil);
	
	}
	
	//Get group  list for the users wise. 
	function  get_group_list($userID	=	1){
		
		$data 			=	 $this->group_model->get_group_list($userID);
		echo json_encode($data);
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/Admin/Groups.php */