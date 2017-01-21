<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploadfiles extends Admin_Controller {
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	
	}
	
	public function do_upload()
    {
                $config['upload_path']          = './media/apiusers/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('userfile'))
                {
					$error = array('error' => $this->upload->display_errors());
					echo "<pre>";
					print_r($error);
					//$this->load->view('upload_form', $error);
                
				}else{
					
						$data = array('upload_data' => $this->upload->data());
						
						
				}
      }
	
	
	function do_upload2(){
		
		
		$image = $_REQUEST['userfile'];
		//$name = $_REQUEST['name'];
		$filename	=	time().".png";
		$path = "./media/apiusers/profile/".$filename;
		//$actualpath = "http://simplifiedcoding.16mb.com/PhotoUploadWithText/$path";
		$actualpath = "http://itasku.bookmyhouse.co/itaskyou/media/apiusers/profile/".$filename;
		file_put_contents($path,base64_decode($image));
		echo json_encode(array("photourl"=>base64_encode($actualpath)));
	}
	  
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */