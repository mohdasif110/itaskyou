<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Admin_Controller {
	
	
	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		
	}
	
	public function index()
	{
		
		$view							=	"users/index";
		$data['page_title']				=	'Mobile api';
		render('admin_dashboard',$view,$data);
	
	}
	//API users..
	
	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/welcome.php */