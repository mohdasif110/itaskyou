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
					//echo "<pre>";
					//print_r($error);
					//$this->load->view('upload_form', $error);
				
				}else{
						$data 		= 	array('upload_data' => $this->upload->data());
						//echo "<pre>";
						//print_r($data);
				}
	}
	
	
	
	function do_upload2()
	{
			
			$bmh_media 			=	'bmh';
			
			$image 				= 	$_REQUEST['userfile'];
			$filename			=	time().".png";
			
			if(isset($_REQUEST['image_for']))
			{
				
				if($_REQUEST['image_for']!='')
				{
					
					if($_REQUEST['image_for']=='groupIcon')
					{
							$path = "./media/groupicon/".$filename;
							$actualpath = base_url()."media/groupicon/".$path;
					}
				
				}
			
			}else{
				
				$path = "./media/apiusers/profile/".$filename;
				$actualpath = base_url()."/media/apiusers/profile/".$filename;
			
			}
		
		file_put_contents($path,base64_decode($image));
		echo json_encode(array("photourl"=>base64_encode($actualpath)));
	
	}
	
	//Do Attachement..
	function  do_media_attachement()
	{
		
		if(isset($_REQUEST['mediaType']) && $_REQUEST['mediaType']!='')
		{
			
			switch($_REQUEST['mediaType'])
			{
				case 'image': 
				$this->upload_image($_REQUEST);
				break;
				case 'video': 
				$this->upload_video($_REQUEST);
				break;
				case 'audeo': 
				$this->upload_audeo($_REQUEST);
				break;
			}
		
		}
	}
	
	//Media Attachmennt...   
	function do_upload_media()
	{
		
		$bmh_media 			=	'BMH';
		
		$ArrError			=	array();
		
		if(isset($_REQUEST['deviceID'])){
			
			if($_REQUEST['deviceID']!=''){
				
				$deviceID		=	 $_REQUEST['deviceID'];
			
			}else{
				
				$ArrError['deviceID']			=	"DeviceID value is blank";
			}
		
			}else{
				
				$ArrError['deviceID']				=	"Please send deviceID";
			}
		
	if(isset($_REQUEST['userID'])){
			
			if($_REQUEST['userID']!=''){
				
				$userID		=	 $_REQUEST['userID'];
			
			}else{
				
				$ArrError['userID']			=	"userID value is blank";
			}
		
			}else{
			
				$ArrError['userID']				=	"Please send userID";
			
		}	
		
		if(isset($_REQUEST['attachementFor']))
		{  
			
				if($_REQUEST['attachementFor']!=''){
				
					$attachementFor					=	 $_REQUEST['attachementFor'];
				
				}else{
					
					$ArrError['attachementFor']			=	"attachement for value is blank";
				}
		
			}else{
				
				$ArrError['attachementFor']				=	"Please send attachement for";
			}
		
			if(isset($_REQUEST['attachementType'])){
			
				if($_REQUEST['attachementType']!=''){
				
					$attachementType		=	 $_REQUEST['attachementType'];
				
				}else{
					
					$ArrError['attachementType']			=	"attachement type value is blank";
				}
		
			}else{
				
				$ArrError['attachementType']				=	"Please send attachement type";
			}
		
		if(isset($_REQUEST['fileContent'])){
			
			if($_REQUEST['fileContent']!=''){
			
				$fileContent						=	 $_REQUEST['fileContent'];
			
			}else{
				
				$ArrError['fileContent']			=	"fileContent for value is blank";
			}
		
		}else{
				
				$ArrError['fileContent']				=	"Please send fileContent";
		} 
		
		if(isset($_REQUEST['fileType'])){
			
			if($_REQUEST['fileType']!=''){
			
				$fileType						=	 $_REQUEST['fileType'];
			
			}else{
				
				$ArrError['fileType']			=	"fileType for value is blank";
			}
		
		}else{
			
			$ArrError['fileType']				=	"Please send fileType";
		} 
		
		if(count($ArrError)>0){
			
				echo json_encode(array('action'=>'error', 'message'=>'Validtion fail','fields'=>$ArrError));
				die();
		}
		
		$mediaContent 				= 	$_REQUEST['fileContent'];	//Media Content..
		
		$fileName					=	$bmh_media."-".$attachementFor."-".md5($attachementFor."-".time()).".".$fileType;
		
		switch($attachementType){
			
			case 'Image': 
				$path 				=		"./media/itasku_media/tasks/task_image/".$fileName;
				$mediaurl			=		 base_url()."media/itasku_media/tasks/task_image/".$fileName;
			break;	
			case 'Video': 
				$path 				=		"./media/itasku_media/tasks/task_video/".$fileName;
				$mediaurl			=		 base_url()."media/itasku_media/tasks/task_video/".$fileName;
			break;
			case 'Audeo': 
				$path 				=		"./media/itasku_media/tasks/task_audeo/".$fileName;
				$mediaurl			=		 base_url()."media/itasku_media/tasks/task_audeo/".$fileName;
			break;	
			case 'Documentation': 
				$path 				=		"./media/itasku_media/tasks/task_documentation/".$fileName;
				$mediaurl			=		 base_url()."media/itasku_media/tasks/task_documentation/".$fileName;
			break;		
			default: 
			echo json_encode(array('action'=>'error', 'message'=>'Under development','fields'=>null));
			die();
	
			
			
		}
		
		file_put_contents($path,base64_decode($mediaContent));
		
		if(file_exists($path)) {
			
			$Data					=	array(
												'userID'=>$userID,
												'deviceID'=>$deviceID,
												'attachementType'=>$attachementType,
												'attachementFor'=>$attachementFor,
												'mediaContent'=>$mediaContent,
												'mediaURL'=>$mediaurl,
												'dateTime'=>date('Y-m-d H:i:s')
											  );	
	
			$attachmentID		=	0;
	
		if($this->db->insert($this->db->dbprefix('temporary_media_attachment'),$Data)){
				
				$attachmentID	=	$this->db->insert_id();
		}
		
		if($attachmentID==0){
			echo json_encode(array("mediaurl"=>'','attachmentID'=>0,'attachementType'=>$attachementType,	'attachementFor'=>$attachementFor,'status'=>'false'));
			
		}else{
			
			echo json_encode(array("mediaurl"=>base64_encode($mediaurl),'attachmentID'=>$attachmentID,'attachementType'=>$attachementType,	'attachementFor'=>$attachementFor,'status'=>'true'));
		}
	
		}else{
			
			echo json_encode(array("mediaurl"=>'','attachmentID'=>0,'attachementType'=>$attachementType,	'attachementFor'=>$attachementFor,'status'=>'false'));
		}
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
