<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mediaattachement extends Admin_Controller {
	

	 private	$mediafolder			=	"media";
	 private	$org_media_folder		=	"bmh_itasku_media";
	 private 	$userImage				=	"users";
	 private 	$userImageThumb			=	"users_thumb";
	 private 	$taskMedia				=	"tasks";	
	 private	$taskImage				=	"task_image";
	 private	$taskImagethumb			=	"task_image_thumb";
	 private	$taskVideo				=	"task_video";
	 private	$taskAudeo				=	"task_audeo";
	 private	$taskDocumenttation		=	"task_documentation";
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	//Media Attachement--- 
	function itasku_media_folder_genrator(){
		
		$baseURL 			=	 base_url();
		//Org folder created;
		$org_folder			=   $this->mediafolder.'/'.$this->org_media_folder;
		
		if(!is_dir($org_folder)){
		
			$oldumask = umask(0); 
			mkdir($org_folder,'0777');
			umask($oldumask); 
		}
		
		//Org user image folder created;
		$org_folder_user_image			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->userImage;
		
		if(!is_dir($org_folder_user_image)){
			
			$oldumask = umask(0); 
			mkdir($org_folder_user_image,'0777');
			umask($oldumask); 
		}
		
		//Org user image folder created;
		$org_folder_user_image_thumb		=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->userImage."/".$this->userImageThumb;
		
		if(!is_dir($org_folder_user_image_thumb)){
			
			$oldumask = umask(0); 
			mkdir($org_folder_user_image_thumb,'0777');
			umask($oldumask); 
		}
		
		//Org Task  Folder.
		$org_task_folder			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia;
		
		if(!is_dir($org_task_folder)){
			
			$oldumask = umask(0); 
			mkdir($org_task_folder,'0777');
			umask($oldumask); 
		}
		
		//Org Task Image Folder.
		$org_task_image_folder			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia."/".$this->taskImage;
		
		if(!is_dir($org_task_image_folder)){
			
			$oldumask = umask(0); 
			mkdir($org_task_image_folder,'0777');
			umask($oldumask); 
		}
		
		//Org Task Image thumb Folder.
		$org_task_image_folder_thumb			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia."/".$this->taskImage."/".$this->taskImagethumb;
		
		if(!is_dir($org_task_image_folder_thumb)){
		
			$oldumask = umask(0); 
			mkdir($org_task_image_folder_thumb,'0777');
			umask($oldumask); 
		}
	
		//Org Task video Folder.
		$org_task_video_folder			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia."/".$this->taskVideo;
		
		if(!is_dir($org_task_video_folder)){
			
			$oldumask = umask(0); 
			mkdir($org_task_video_folder,'0777');
			umask($oldumask); 
		}
	
		//Org Task  audeo Folder.
		$org_task_audeo_folder			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia."/".$this->taskAudeo;
		
		if(!is_dir($org_task_audeo_folder)){
			
			$oldumask = umask(0); 
			mkdir($org_task_audeo_folder,'0777');
			umask($oldumask); 
		}
		
		//Org Task  audeo Folder.
		$org_task_documentation_folder			=   $this->mediafolder.'/'.$this->org_media_folder."/".$this->taskMedia."/".$this->taskDocumenttation;
		
		if(!is_dir($org_task_documentation_folder)){
		    
			$oldumask = umask(0); 
			mkdir($org_task_documentation_folder,'0777');
			umask($oldumask); 
		}
    }
	
	//Task Media... 
	function upload_task_media(){
		
		if(isset($_REQUEST['media_for'])){
			
			if($_REQUEST['media_for']!=''){
				
				$folder_name				=	str_replace(" ","_" , strtolower($_REQUEST['media_for']));
				$folder_name				=	str_replace("", "_" , $folder_name);
				$this->org_media_folder		=	$folder_name;
			}
		
		}
		
		// Create file and folder to the server.	
		$this->itasku_media_folder_genrator();	// Folder.
	}
	
	//Base64-
	
	function base64_encode_image (){
		
		$path		=	"http://localhost/img/asif.docx";
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		
		//$base64 = 'data:docx/' . $type . ';base64,' . base64_encode($data);
		//file_put_contents();
	
	}
	 
}
	
