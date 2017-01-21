<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Moms extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		$this->load->model('mom_model');
	}

	function index()
	{
		$view						=	"moms/index";
		$data['page_title']			=	'Minutes of Meeting';
		render('admin_dashboard',$view,$data);
		//$this->load->view("admin/".$view,$data);
	}

	//get industory type..
	function get_records()
	{
		$mydata	= $this->mom_model->get_records();
		echo json_encode($mydata);
	}

	//get mom detail
	function get_mom_detail(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		if(isset($Formdata['momID']))
		{
		
			$momData	=	$this->mom_model->get_mom_detail($Formdata['momID']);
			echo json_encode($momData);
		
		}else{
			
			echo  "noData";
		
		}
	}
	
}

?>