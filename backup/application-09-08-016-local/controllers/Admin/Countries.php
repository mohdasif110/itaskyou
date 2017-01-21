<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends Admin_Controller {

  function __construct()
  {
    parent::__construct();
	parent::admin_authenitcation();
    $this->load->model('country_model');
  }
	
	function index(){
		
		$mydata	= $this->country_model->get_contries_code();
		$view						=	"countries/index";
		$data['page_title']			=	'Countries';
		$data['countries']			=	$mydata;
		render('admin_dashboard',$view,$data);
	 
	 }
	
	//get industory type..
	function get_records()
	{
		$mydata	= $this->country_model->get_records();
		echo json_encode($mydata);
	}
	
	// end of get indutory type..
	
	// Save industory type..	
	function  saveItem()
	{
		//echo date('Y-m-d');
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		$flag 		=	 $this->country_model->check_available($Formdata['CountryText'],$Formdata['CountryCode']);
		
		if($flag==0){
			//save script.
			$saveData		=	array(
										'name'=>$Formdata['CountryText'],
										'phonecode'=>$Formdata['CountryCode'],
										'createdDate'=>date('Y-m-d')
									);
			
			$this->country_model->saveItem($saveData);
			echo  json_encode(array('action'=>'success','type'=>'saved','message'=>'Country Code has been saved successfully.'));
		 
			}else{
			
				echo  json_encode(array('action'=>'error','type'=>'already','message'=>'Country code already exist, please enter another Country code'));
		}
	}
	
	// end  of save industory type.
	// Save industory type..	
	
	function  updateItem()
	{
		
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		
		
		$countryID				=	$Formdata['countryID'];
		$countryText			=	$Formdata['countryText'];
		$countryCode			=	$Formdata['countryCode'];
		
		$flag = $this->country_model->check_available_edit($countryText,$countryID);
		
		//update script.
		$saveData		=	array(
									'name'=>$Formdata['countryText'],
									'phonecode'=>$Formdata['countryCode'],
									'modifiedDate'=>date('Y-m-d')
								);
		
		$this->country_model->updateItem($saveData, $countryID);
		echo json_encode(array('action'=>'success','type'=>'saved','message'=>'country code been updated successfully.'));
	 
	 }
	
	//Get industory type..
	function get_industorytype_single(){
		
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$typeID			=	$Formdata['typeID'];
		$mydata	= $this->country_model->get_indutoryType_single($typeID);
		echo json_encode($mydata);
	
	}
	
	//End of get indutory type..
	function  toggleStatus()
	{
	
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$countryID			=	$Formdata['countryID'];
		$status			=	$Formdata['status'];
		
		
		$flag			= 	$this->country_model->toggleStatus($countryID, $status);
		
		if($flag==1){
			
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Country status has been updated successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact .'));
		
		}
	}

   function  deleteItem()
   {	
   
   
		$Formdata		=	file_get_contents("php://input");
		$Formdata		=	json_decode($Formdata, true);
		$countryID		=	$Formdata['countryID'];
		$name		    =	$Formdata['name'];	 
	    $flag			= 	$this->country_model->deleteItem($countryID);
		
		if($flag==1){
			
			echo json_encode(array('action'=>'success','type'=>'saved','message'=>'Country Code has been deleted successfully.'));
		
		}else{
			
			echo json_encode(array('action'=>'error','type'=>'fail','message'=>'Some teachnical issue, please contact.'));
		}
	
	}
	 
	 
	 
}

?>