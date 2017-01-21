<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubIndustoryType extends Admin_Controller {

  function __construct()
  {
	
	parent::__construct();
	parent::admin_authenitcation();
    $this->load->model('subindustorytype_model');

 }
	
	function index()
	{
	$view						=	"subindustorytype/index";
	$data['page_title']			=	'Sub Industory Type';
	render('admin_dashboard',$view,$data);
	//$this->load->view("admin/".$view,$data);
	}

	//get industory type..
	function get_records()
	{
		$mydata	= $this->subindustorytype_model->get_records();
		echo json_encode($mydata);
	}
	
	// end of get indutory type..
	// Save industory type..	
	function  saveItem()
	{
		
		//echo date('Y-m-d');
		
		$Formdata		=	file_get_contents("php://input");
		
		$Formdata		=	json_decode($Formdata, true);
		
		$flag = $this->subindustorytype_model->check_available($Formdata['subType'],$Formdata['typeID']);
		
		if($flag==0){
			
			//save script.
			$saveData		=	array(
										'subType'=>$Formdata['subType'],
										'typeID'=>$Formdata['typeID'],
										'createdDate'=>date('Y-m-d')
									 );
			
				$this->subindustorytype_model->saveItem($saveData);
				echo  json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type has been saved successfully.'));
		  
		  }else{
			
			echo  json_encode(array('action'=>'error','type'=>'already','message'=>'Sub industory Type already exist, please enter another industory type'));
		}
	}
	
	// end  of save industory type.
	// Save industory type..	
	
	function  updateItem()
	{
		
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		
		$typeID				=	$Formdata['typeID'];
		$subType			=	$Formdata['subType'];
		$subTypeID			=	$Formdata['subTypeID'];
		
		$flag = $this->subindustorytype_model->check_available_edit($subType,$subTypeID,$typeID);
		
		//update script.
		$saveData		=	array(
										'subType'=>$Formdata['subType'],
										'typeID'=>$Formdata['typeID'],
										'modifiedDate'=>date('Y-m-d')
								);
		
		$this->subindustorytype_model->updateItem($saveData, $subTypeID);
		echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type has been updated successfully.'));
	}
	
	 //Get industory type..
	 function get_industorytype_single(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$mydata	= $this->subindustorytype_model->get_indutoryType_single($typeID);
		echo json_encode($mydata);
	 
	 }
	// end of get indutory type..
	
	function  toggleStatus()
	{
	
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$status			=	$Formdata['status'];
		
		
		$flag			= 	$this->subindustorytype_model->toggleStatus($typeID, $status);
		
		if($flag==1){
			
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type status has been updated successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}

   function  deleteItem(){
	 
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$typeText		=	$Formdata['typeText'];	 
	
		$flag			= 	$this->subindustorytype_model->deleteItem($typeID);
		
		if($flag==1){
		
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Sub industory Type has been deleted successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}	
	
}

?>