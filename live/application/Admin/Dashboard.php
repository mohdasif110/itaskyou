<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Dashboard extends CI_Controller {
	
	public function index()
	{
		
		$sessionData	=	$this->session->userdata('logged_in');
		$data['userData']		=	$sessionData;
		$this->load->view('admin/dashboard' , $data);
	}
	

	public function theme()
	{
		//$sessionData	=	$this->session->userdata('logged_in');
		$this->load->view('admin/theme');
	}

	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/welcome.php */