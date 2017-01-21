<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Tags extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		parent::admin_authenitcation();
		$this->load->model('tags_model');
	}
	
	function index()
	{
		$view						=	"tags/index";
		$data['page_title']			=	'Tags';
		render('admin_dashboard',$view,$data);
		//$this->load->view("admin/".$view,$data);
	}
	
	//get industory type..
	function get_records()
	{
		$mydata	= $this->tags_model->get_records();
		echo json_encode($mydata);
	}
	
	// end of get indutory type..
	// Save industory type..	
	function  saveItem()
	{
		//echo date('Y-m-d');
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		$flag = $this->tags_model->check_available($Formdata['tagText']);
		
		if($flag==0){
			
			//save script.
			$saveData		=	array(
										'tagText'=>$Formdata['tagText'],
										'createdDate'=>date('Y-m-d')
									 );
			
				$this->tags_model->saveItem($saveData);
				echo  json_encode(array('action'=>'success','type'=>'saved','message'=>'Tag has been saved successfully.'));
		  
		  }else{
			
			echo  json_encode(array('action'=>'error','type'=>'already','message'=>'Tag already exist, please enter another industory type'));
		}
	}
	
	// end  of save industory type.
	// Save industory type..	
	
	function  updateItem()
	{
	
		$Formdata				=	file_get_contents("php://input");
		$Formdata				=	json_decode($Formdata, true);
		
		$tagID					=	$Formdata['tagID'];
		$tagTtextedit			=	$Formdata['tagTtextedit'];
		
		$flag = $this->tags_model->check_available_edit($tagTtextedit,$tagID);
		
		//update script.
		$saveData		=	array(
										'tagText'=>$Formdata['tagTtextedit'],
										 'modifiedDate'=>date('Y-m-d')
								);
		
		
		$this->tags_model->updateItem($saveData, $tagID);
		echo json_encode(array('action'=>'success','type'=>'saved','message'=>'tag has been updated successfully.'));
	
	}
	
	//Get industory type..
	function get_industorytype_single(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$mydata	= $this->tags_model->get_indutoryType_single($typeID);
		echo json_encode($mydata);
	
	}
	
	//End of get indutory type..
	function  toggleStatus()
	{
	
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$tagID			=	$Formdata['tagID'];
		$status			=	$Formdata['status'];
		
		
		$flag			= 	$this->tags_model->toggleStatus($tagID, $status);
		
		if($flag==1){
			
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type status has been updated successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}

   function  deleteItem(){
	 
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$tagID			=	$Formdata['tagID'];
		$tagText		=	$Formdata['tagText'];	 
	
		$flag			= 	$this->tags_model->deleteItem($tagID);
		
		if($flag==1){
		
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Tag has been deleted successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}	
	
}

?>