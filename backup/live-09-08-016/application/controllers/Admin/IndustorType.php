<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IndustorType extends Admin_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('industorytype_model');
  }

  
  function index(){
		
		$mydata	= $this->industorytype_model->get_indutoryType();
		$view						=	"industorytype/index";
		$data['page_title']			=	'Industory Type';
		$data['countries']			=	$mydata;
		render('admin_dashboard',$view,$data);
		
		//$this->load->view("admin/".$view,$data);
		
	}
	
	// Save industory type..	
	function  save_industorytype(){
		
		//echo date('Y-m-d');
		
		$Formdata	=	file_get_contents("php://input");
		
		$Formdata		=	json_decode($Formdata, true);
		
		$flag = $this->industorytype_model->check_available($Formdata['type']);
		
		if($flag==0){
			
			//save script.
			$saveData		=	array(
										'type'=>$Formdata['type'],
										'createdDate'=>date('Y-m-d')
									 );
			
			$this->industorytype_model->industoryTypeSave($saveData);
			echo  json_encode(array('action'=>'success','type'=>'saved','message'=>'industory Type has been saved successfully.'));
			
		}else{
			
			echo  json_encode(array('action'=>'error','type'=>'already','message'=>'industory Type already exist, please enter another industory type'));
			
		}
	
	
	}
	// end  of save industory type.
	
	
	
	// Save industory type..	
	function  update_industorytype(){
		
		
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		$flag = $this->industorytype_model->check_available($Formdata['type']);
		//update script.
		$saveData		=	array(
										'type'=>$Formdata['type'],
										'modifiedDate'=>date('Y-m-d')
								);
		
		$this->industorytype_model->industoryTypeUpdate($saveData, $Formdata['typeID']);
		echo json_encode(array('action'=>'success','type'=>'saved','message'=>'industory Type has been updated successfully.'));
	}
	
	 //get industory type..
	 function get_industorytype(){
		  $mydata	= $this->industorytype_model->get_indutoryType();
		  echo json_encode($mydata);
	  }
	// end of get indutory type..
	
	 //Get industory type..
	 function get_industorytype_single(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		
		$mydata	= $this->industorytype_model->get_indutoryType_single($typeID);
		echo json_encode($mydata);
	 
	 }
	// end of get indutory type..
	
	function  toggleIndustoryType()
	{
	
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$status			=	$Formdata['status'];
		
		
		$flag			= 	$this->industorytype_model->toggleIndustoryType($typeID, $status);
		
		if($flag==1){
			
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'industory Type status has been updated successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}

   function  deleteIndustoryType(){
	 
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$typeText		=	$Formdata['typeText'];	 
	
		$flag			= 	$this->industorytype_model->deleteIndustoryType($typeID);
		
		if($flag==1){
		
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'industory Type has been deleted successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	 
	   
   }	
	
	
	 
}

?>