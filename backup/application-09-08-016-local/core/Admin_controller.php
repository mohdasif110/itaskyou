<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public $layout_defualt  = 'admin_dashboard';	
	
	function __construct()
	{
		
		parent::__construct();
		
	
		
	}

		function admin_authenitcation(){
			
			/*
			$sessionData	=	$this->session->userdata('logged_in');
		
			if($sessionData->userID=='')
			{
				redirect('admin', 'refresh');
				die();
			}
			*/
		
		}
		
	
}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */