<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Dashboard extends Admin_controller {
	
	
	function __construct(){
		
		parent::__construct();
	}
	
	public function index()
	{
		$view						=	"dashboard";
		$data['title']				=	'Dashboard';
		render('admin_dashboard',$view,$data);
	}
	
	public function theme()
	{
		//$sessionData	=	$this->session->userdata('logged_in');
		$this->load->view('admin/theme');
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('admin', 'refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/welcome.php */