<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Admin_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	public function export_csv(){
		
		$this->load->dbutil();
		$query = $this->db->query("SELECT contactNo,otp FROM ity_api_users");
		$backup =$this->dbutil->csv_from_result($query);

		$db_name = 'Students'.'_'. date('Y-m-d') .'.csv';
		
		$this->load->helper('download');
		force_download($db_name, $backup);

		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */