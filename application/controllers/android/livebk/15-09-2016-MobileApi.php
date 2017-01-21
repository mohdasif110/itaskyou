<?php
date_default_timezone_set('Asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');
class MobileApi extends CI_Controller
{
	
	
	function __construct()
    {
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->database();	
		
		/*
		if(!$this->agent->is_mobile()){
			//echo "mobile API";
		}
		*/
	
	}
	
	function get_otp_number_random()
	{
		$digits = 4;
		$num	=  rand(pow(10, $digits-1), pow(10, $digits)-1);
		return $num;
	}	
	
	//Get phone com.
	function  get_phone_country_code()
	{
			$PhoneCountryCode			= $this->db->select('name, phonecode as code')
										->from($this->db->dbprefix('api_country_master as CM'))
										->where(array('CM.status'=>'1'))
										->get()
										->result();
	
			echo json_encode($PhoneCountryCode, JSON_UNESCAPED_SLASHES);
	}

	//Check Contact  number is available or not.
	//@param-  phone number-
	//Device id.
	
	function  check_contact_number()
	{
			//phone number validation...
			if(isset($_REQUEST['contactNumber']))
			{
					if($_REQUEST['contactNumber']!='')
					{
						
						if(is_numeric ( $_REQUEST['contactNumber'] ))
						{
							
							if(preg_match('/^[0-9]{10}+$/', $_REQUEST['contactNumber']))
							{
							   // code here.
								$phone_number			=	$_REQUEST['contactNumber'];
							
							}else{

								echo json_encode(array('action'=>'error','message'=>'Please enter 10 digit phone number.'));
								die();
							}  
						
						}else{
							
							echo json_encode(array('action'=>'error','message'=>'Please enter valid phone number.'));
							die();
						}
					
					}else{
						
						echo json_encode(array('action'=>'error','message'=>'Please enter phone number.'));
						die();
					}
				
				}else{
					
					echo json_encode(array('action'=>'error','message'=>'request is not valid please send phone number in request.'));
					die();
			   
			   }
			
			 ///Phone number validation.	
			 if(isset($_REQUEST['code'])){
					
					if($_REQUEST['code']!=''){
						
						if(is_numeric ( $_REQUEST['code'] ))
						{
						
							$country_code		=	$_REQUEST['code'];
						
						}else{
							
							echo json_encode(array('action'=>'error','message'=>'Please enter valid country code.'));
							die();
					   }
					
					}else{
						
						echo json_encode(array('action'=>'error','message'=>'Please enter country code.'));
						die();
					}
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'request is not valid please send phone number country code in  request.'));
				 die();
			
			}
			
			if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!=''){
			
				$deviceID				=	$_REQUEST['deviceID'];
			
			}else{
				
				$deviceID				='';
			}	
			
			if(isset($_REQUEST['appKey']) && $_REQUEST['appKey']!=''){
				
				$appKey				=	$_REQUEST['appKey'];
			
			}else{
				
				$appKey				=	'';
			}	
			
			//$getData				= 		$this->db->select('*')->from($this->db->dbprefix('api_users'))->where('contactNo',$phone_number)->get()->row();
		
		
			$conditions				=		array('contactNo'=>$phone_number,'countryPhoneCode'=>$country_code);
			
			$getData				= 		$this->db->select('*')->from($this->db->dbprefix('api_users'))->where($conditions)->get()->row();
			
			if(count($getData)>0)
			{
				
				//User is deactivated..
				if($getData->status=='0'){
						echo json_encode(array('action'=>'error','message'=>'Your acount has deactivated please contact with administrator.'));
						die();
				}
				
			// User Deleted.
			if($getData->status=='-2'){
				
				echo json_encode(array('action'=>'error','message'=>'Your acount has deactivated please contact with administrator.'));
				die();
			}
			
			// Partialy Register - A user leave the application without completing his info. 
			// if he comes next time then it will find new otp.	
			
			if($getData->status=='-1'){
		
					$otp_code		=	$this->get_otp_number_random();
					// Redirect to the profile page.
					
					if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey)){
						
						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'appKey'=>$appKey,'otp'=>$otp_code));
						
						echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.'));
					
					}else{
						
						echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
						die();
					}
				die();
			
			}else{
					// User change the device and use regster contact number,   new otp  will send to the user mobile. 
					// Device checking.. 
					if($getData->deviceID!=$deviceID){
						
						$otp_code		=	$this->get_otp_number_random();
						//Redirect to the profile page.
					    //Conatct number register and diffrent mobile.
						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'appKey'=>$appKey,'otp'=>$otp_code));
					
					if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey)){

						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'appKey'=>$appKey,'otp'=>$otp_code));
						echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.'));

					}else{
							echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
							die();
					}
					
					
					}else{
						
						//Redirct to the dashboard.
						// Contact number registered and with same mobile.
						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'appKey'=>$appKey));
						echo json_encode(array('action'=>'already','message'=>'user already registered.'));
						die();
					}
			}
		
		}else{
				
				$otp_code		=	$this->get_otp_number_random();
				if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey))
				{
					//save phone  number and send otp  to enteree number.
					$flagsave		=	$this->db->insert($this->db->dbprefix('api_users') , array('status'=>'-1' , 'countryPhoneCode'=>$country_code,'contactNo'=>$phone_number,'otp'=>$otp_code,'deviceID'=>$deviceID,'appKey'=>$appKey));
					//$NowgetData				= 		$this->db->select('otp,countryPhoneCode,contactNo')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
					echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.'));
				
				}else{
							echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
							die();
				}
				
			}
	}
	//check otp 
	//@parme :  phone number ,  otp number.
	function check_otp()
	{
			//phone number validation...
			if(isset($_REQUEST['contactNumber']))
			{
				if($_REQUEST['contactNumber']!='')
				{
					if(is_numeric ( $_REQUEST['contactNumber'] )){
						
						if(preg_match('/^[0-9]{10}+$/', $_REQUEST['contactNumber']))
						{
							  $phone_number			=	$_REQUEST['contactNumber'];
						
						}else{

								echo json_encode(array('action'=>'error','message'=>'Please enter 10 digit phone number.'));
								die();
						}  
						
					}else{
							
							echo json_encode(array('action'=>'error','message'=>'Please enter valid phone number.'));
							die();
						}
					
				}else
				{
						
						echo json_encode(array('action'=>'error','message'=>'Please enter phone number.'));
						die();
				}
				
			}else{
			    
					echo json_encode(array('action'=>'error','message'=>'request is not valid please send phone number in request.'));
					die();
			}
	
		//End of phone number checking.
		//otp cheking.
		
		if(isset($_REQUEST['otp'])){
		  
		  if($_REQUEST['otp']!=''){
			  
			  $otp_code			=	$_REQUEST['otp'];
			  
		  }else{
			   
				echo json_encode(array('action'=>'error','message'=>'Please enter otp.'));
				die();
		  }
			
		}else{
				
				echo json_encode(array('action'=>'error','message'=>'request is not valid please send otp in request.'));
				die();
		}	
		
			/*
			if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){

			$country_code		=	$_REQUEST['code'];

			}else{

			echo json_encode(array('action'=>'error','message'=>'code is blan.'));
			die();
			}
			*/

			$getData				= 	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
			
			if(count($getData)>0){
				
					//echo json_encode(array('action'=>'success', 'userData'=>$getData));
					 echo json_encode(array('action'=>'success'));
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please enter valid otp number.'));
				die();
			}
	}

	//Check user is uathentic is authentic.
	function  authanticated_user(){
	 //phone number and code.
	}	 
	//End of check phone 
	//Get industory Type.
	function get_industry_type()
	{
		$IndustoryType		= $this->db->select('typeID,type')
										->from($this->db->dbprefix('api_industory_type_master'))
										->get()
										->result();
		echo json_encode($IndustoryType);
	}
	
	// Get Sub Industry Type..
	function get_sub_industry_type()
	{
		
		if(isset($_REQUEST['typeID']) && $_REQUEST['typeID'] )
		{
		
			$typeID				=	$_REQUEST['typeID'];
			
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'please select sub industry type.'));
			die();
		}
		
		$SubIndustoryType		= $this->db->select('subTypeID,subType')
										->from($this->db->dbprefix('api_sub_industory_type_master'))
										->where('typeID', $typeID)
										->where('status','1')
										->get()
										->result();
		
		if(count($SubIndustoryType)>0){
		
			echo json_encode(array('action'=>'success','data'=>$SubIndustoryType));
		
		}else{
			
			echo json_encode(array('action'=>'error' ,'message'=>'No sub industory type.'));
		
		}
	
	}
	
	//child and parent  IndustoryType ..
	//Get industory Type.
	function get_industry_type_second()
	{
		
		$IndustoryType		= $this->db->select('typeID,type')
										->from($this->db->dbprefix('api_industory_type_master'))
										->get()
										->result();
		
		$tempArr		=	array();
		
		foreach($IndustoryType as $val)
		{
			$tempArr[]				=	array( 	
												'type'=>$val->type,
												'typeID'=>$val->typeID,
												'subTypes'=>$this->get_sub_industry_type_second($val->typeID)
											);
			
		}
		
		echo json_encode($tempArr);
	
	}
	
	function get_sub_industry_type_second($typeID)
	{
		
		$SubIndustoryType		= $this->db->select('subTypeID,subType')
										->from($this->db->dbprefix('api_sub_industory_type_master'))
										->where('typeID', $typeID)
										->where('status','1')
										->get()
										->result();
		return  $SubIndustoryType;
	}
	
	//End  of child andd parent industory  type..
	//update profile	
	function upate_profile()
	{
		
		$temp_error 			=	array();
		//phone  number checking.
		
		if(isset($_REQUEST['contactNo']) && $_REQUEST['contactNo']!=''){
			
			$phone_number		=	$_REQUEST['contactNo'];
		
		}else{
			
			$temp_error['contactNo']				= "Contact number is blank";	
		}
		
		if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){
			
			$code		=	$_REQUEST['code'];
		
		}else{
			
			$temp_error['code']				= "country code is blank";	
		}
	
	
	
		// end of phone number cheking.
		// First name checking.. 
		
		if(isset($_REQUEST['firstName']) && $_REQUEST['firstName']!=''){
			
			if (!preg_match("/^[a-zA-Z ]*$/", $_REQUEST['firstName'])) 
			{
					$temp_error['firstName']	= "First name should not be numeric or special characters.";	
			}else{
				
				$firstName			=	$_REQUEST['firstName'];
			}
	
			}else{
				
				$temp_error['firstName']				= "Please enter first name.";	
			}
			
		//Validate First Name.
		//End  of  first name checking..
		if(isset($_REQUEST['lastName'])  && $_REQUEST['lastName']!='')
		{
				if (!preg_match("/^[a-zA-Z ]*$/",$_REQUEST['lastName'])) 
				{
					$temp_error['lastName']				= "Last name should not be numeric or special characters.";	
				
				}else{
					
					$lastName			=	$_REQUEST['lastName'];
				}
			
		}else{
					$temp_error['lastName']				= "Please enter last name.";		
		}
		
		if(isset($_REQUEST['emailID']) && $_REQUEST['emailID']!='')
		{
			
			if(filter_var($_REQUEST['emailID'], FILTER_VALIDATE_EMAIL)!='')
			{
			
				$emailID			=	$_REQUEST['emailID'];
				
			}else{
				
				$temp_error['emailID']				= "Please enter valid email address.";		
			}
		
		}else{
			
			$temp_error['emailID']				= "Please enter email address.";		
		}		
		
		if(isset($_REQUEST['typeID']) && $_REQUEST['typeID']!=''){
		
			$industryType		=	$_REQUEST['typeID'];
		
		}else{
			
			$temp_error['typeID']				= "Please select industory type.";	
		}
		
		if(isset($_REQUEST['subTypeID']) && $_REQUEST['subTypeID']!=''){
			
			$subIndustoryType		=	$_REQUEST['subTypeID'];
		
		}else{
			
			//$temp_error['subTypeID']				= "Please select sub industory type.";	
			$subIndustoryType		=	'';
		}
		
		if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!='')
		{

			$deviceID				=	$_REQUEST['deviceID'];

		}else{
			
			$temp_error['deviceID']				= "blank deviceID";
			$deviceID							='';
		}	
	
		if(isset($_REQUEST['appKey']) && $_REQUEST['appKey']!='')
		{
			
			
			$appKey				=	$_REQUEST['appKey'];

		}else{
			
			$temp_error['appKey']				= "blank appKey";
			$appKey				=	'';
		}
		
		if(isset($_REQUEST['userPhoto']) && $_REQUEST['userPhoto']!=''){
			
			$userPhoto			=	$_REQUEST['userPhoto'];
		
		 }else{
			
			$userPhoto			=	'';
		 }
		
		if(isset($_REQUEST['nationality']) && $_REQUEST['nationality']!=''){
				
				$nationality	 	=	$_REQUEST['nationality'];
			 
		 }else{
				
				$nationality		=	'indian';
		 }

		if(count($temp_error)>0){
				
				echo json_encode(array('action'=>'error','message'=>$temp_error));
				die();
		}
	
		$conditionArr			=	array(
											 'contactNo'=>$phone_number,
											 'deviceID'=>$deviceID,
											 'appKey'=>$appKey,
											 'countryPhoneCode'=>$code
											 );
		
		$numrows	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where($conditionArr	)->get()->num_rows();
		
		$data		=	array(
									'firstName'=>$firstName,
									'lastName'=>$lastName,
									'emailID'=>$emailID,
									'industryType'=>$industryType,
									'subIndustoryType'=>$subIndustoryType,
									'nationality'=>$nationality,
									//'deviceID'=>$deviceID,
									'userPhoto'=>$userPhoto,
									'otp'=>'',
									'status'=>'1',
									'created_date'=>date('Y-m-d'),
									'updated_date'=>date('Y-m-d H:i:s')
									);
			
			if($numrows==0){
				
				echo  json_encode(array('action'=>'error', 'message'=>'Phone number is not available in databse.'));
				return false;
			}
			
			$this->db->where(array('contactNo'=>$phone_number));
			if($this->db->update($this->db->dbprefix('api_users'),  $data))
			{
				$dataGamming	=	$this->db->select('firstName,lastName,emailID,industryType as typeID,subIndustoryType as subTypeID,nationality,countryPhoneCode,contactNo,userPhoto')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number))->get()->row();
				echo  json_encode(array('action'=>'success','message'=>'Profile has been  updated successfully' ,'userData'=>$dataGamming));
			}
	}
	
	// Get Task Element.
	function get_task_form_elements()
	{
		
		$Arr			=	array(
									'userData'=>$this->get_select_users('arr'),
									'tags'=>$this->get_tags('arr'),
									'taskType'=>$this->get_task_type('arr'),
									'funtionalityType'=>$this->get_functionality_type('arr'),
									'taskStatus'=>$this->get_task_status('arr')
								);
		echo json_encode($Arr);
	}
	
	//Get tasg 
	function get_tags($type='json')
	{
		
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_tag_master'))->where('status','1')->get()->result();
		
		if($type=='arr'){
			
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}

	//select user(s) as reciver.
	function get_select_users($type='json')
	{
		
		$dataGamming	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('status'=>'1'))->get()->result();
		
		if($type=='arr'){
			
			return $dataGamming;
		
		}else{
			
			echo json_encode($dataGamming);
		}
		
	}

	//get task type 
	function  get_task_type($type='json')
	{
	
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_task_type_master'))->get()->result();
		
		if($type=='arr'){
			
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	
	} 
	
	// Get functionality Type.
	function  get_functionality_type($type='json')
	{
	
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_functionality_type_master'))->get()->result();
		
		if($type=='arr'){
			
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}

	// Get task  status master.
	function  get_task_status($type='json')
	{
		
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_task_status_master'))->get()->result();
		
		if($type=='arr'){
		
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}

	// Create Task.
	function create_task()
	{
			$postForm			=	$_GET;
			$validationArr		=  array();
			
			if($postForm['taskName']==''){
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task name.'); // it will save into task table.
			
			}else{
			
				if(taskNameValidation($postForm['taskName']))
				{
					
					$validationArr[]			=	 array('action'=>'error', 'message'=>'The task name can be a mix of text with Numeric / special characters but not only numeric/special characters.');

				}
				
			}
			
			if($postForm['orginatorID']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'orginator id is not comming.');// it will save into task table.
			}
			
			
			if($postForm['taskDescription']==''){
			
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task description.');
			
			}
		
			if($postForm['startDate']==''){
			
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task start date.');
			
			}

			if($postForm['dueDate']==''){
			
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task due date.');
			
			}
			
			if($postForm['toUsers']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please slect reciver.');
			
			}else{
				
				$toUsers		=	explode(",",$postForm['toUsers']);// it will  save in to reciver table with Task ID.
			}
			
			if($postForm['ccUsers']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please slect cc reciver.');
			
			}else{
				
				$ccUser		=	explode(",",$postForm['ccUsers']);// it will save in to carbon copy table with task id.
			}
			
			
			if(count($validationArr)>0){
				
				echo json_encode($validationArr);
				die();
			}
	
	
			$taskType			=	0; //defualt - Main Task.
			
			if(isset($postForm['taskType'])){
				
				$taskType			=	 $postForm['taskType'];
			}
			
			if(isset($postForm['functionalityType'])){
				
				$functionalityType				=	$postForm['functionalityType'];

			}else{

			$functionalityType				=	0;

			if(count($toUsers)==1){
				
				//Task for self or  individual.
				if($toUsers[0]==$postForm['orginatorID']){
					
					//self
					$functionalityType		=	0;
				
				}else{
					
					//Induvidual	
					$functionalityType		=	1;
				}
			
			}else{
				
					// Task for Team -  multiple reciver- Team.
					$functionalityType				=	2;
				}
			}
		
		 if(count($validationArr)>0){
			
			echo json_encode($validationArr);
			die();
		
		}else{
			
			//Saving data into task table.
			$saveData			=	array(
											'taskName'=>$postForm['taskName'],
											'taskDescription'=>$postForm['taskDescription'],
											'orginatorID'=>$postForm['orginatorID'],
											'ccID'=>$postForm['ccUsers'],
											'recieverID'=>$postForm['toUsers'],
											'tagID'=>$postForm['tags'],
											'status'=>'0',
											'funtionalityType'=>$functionalityType,
											'allotmentDate'=>$postForm['startDate'],
											'dueDate'=>$postForm['dueDate']
										);
			
			if($this->db->insert($this->db->dbprefix('api_tasks'),$saveData))
			{
				
				$taskID	=	$this->db->insert_id();
				$this->assign_task_to_reciver($taskID,$toUsers);
				$this->assign_task_cc_reciver($taskID,$ccUser);
				
				if($postForm['tags']!=''){
				
					$this->map_task_tags($taskID,explode(",",$postForm['tags']));
				
				}else{
					
					$this->map_task_tags($taskID,explode(",",array()));
				}
			
				$this->load->model('tasks_model');
				$TaskDetail			=	 $this->tasks_model->get_task_detail($taskID);
				$action				=	"Task '".$postForm['taskName']."' was created by ".$TaskDetail['orginatorName'];
				echo json_encode(array('action'=>'success', 'message'=>'Task has been  created successfully.'));
				$this->set_task_log($taskID , $postForm['orginatorID'],$action, $TaskDetail );
			
			}
			
		 }// end of valid data block.
	}

	// Assigned task to reciver..
	function assign_task_to_reciver($taskID,$data)
	{
	
		foreach($data as $val)
		{
			$saveData		=	array('taskID'=>$taskID,'userID'=>$val);
			
			if($this->db->insert($this->db->dbprefix('api_receiveer'),$saveData))
			{
				///send notifiction to the users.
				///Send notification to the.
				return true;
			
			}else{
				
				return false; 
			}
		}
	}

	//Assign task to the cc users.
	function assign_task_cc_reciver($taskID,$data)
	{
		
		foreach($data as $val)
		{
			
			$saveData		=	array('taskID'=>$taskID,'userID'=>$val);
			
			if($this->db->insert($this->db->dbprefix('api_task_carbon'),$saveData)){
				
				return true;
			
			}else{
				
				return false; 
			}
		}
	}
	
	//map Tag..
	function map_task_tags($taskID,$data)
	{
		
		foreach($data as $val)
		{
			
			$saveData		=	array('taskID'=>$taskID,'tagID'=>$val);
			
			if($this->db->insert($this->db->dbprefix('api_tag_task'),$saveData))
			{
				return  true;
			
			}else{
				
				return false;
			}
		}
	}
	
	//Get ogriniator  Task
	function get_all_task_oginators()
	{
		
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!=''){
			
			$userID			=	$_REQUEST['userID'];
		
		}else{
			
			echo json_encode(array('acrion'=>'error', 'message'=>'user id is not comming'));
			die();
		}
		
		$where = "FIND_IN_SET('".$userID."', recieverID)";  
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID' )
					->where($where)
					->or_where('orginatorID',$userID)
					->order_by('Task.taskID','desc')
					->get()
					->result();
	
	
		$dataTempData		=	 array();
		
		foreach($data as $tasks)
		{
			
			$orginatorsTask							=	$this->get_orginator_taks($tasks->orginatorID,'arr');
			
			$dataTempData[$tasks->orginatorID]		=	array(
														'orginator'=>$tasks->orginatorID,
														'firstName'=>$tasks->firstName,
														'lastName'=>$tasks->lastName,
														'contactNo'=>$tasks->contactNo,
														'taskcount'=>count($orginatorsTask),
														'tasks'=>$orginatorsTask	
														);
		
		}
		
		$ArrData	=	formattingArr($dataTempData);
		echo json_encode(array('orginators'=>$ArrData));
	
	}
	
	//Get Task To me
	function get_task_to_me()
	{
	
	
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!=''){
		
			$userID			=	$_REQUEST['userID'];
			
		}else{
			
			echo json_encode(array('acrion'=>'error', 'message'=>'user id is not comming'));
			die();
		}
		
		$where = "FIND_IN_SET('".$userID."', recieverID)";  
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID' )
					->where($where)
					->order_by('Task.taskID','desc')
					->get()
					->result();
		
		$dataTempData		=	 array();
		
		foreach($data as $tasks)
		{
				
			$orginatorsTask							=	$this->get_orginator_taks($tasks->orginatorID,'arr');
			$dataTempData[$tasks->orginatorID]		=	array(
														'orginator'=>$tasks->orginatorID,
														'firstName'=>$tasks->firstName,
														'lastName'=>$tasks->lastName,
														'contactNo'=>$tasks->contactNo,
														'taskcount'=>count($orginatorsTask),
														'tasks'=>$orginatorsTask	
														);
														
		}
			
			echo json_encode(array('orginators'=>$dataTempData));
	}
	//End of get task to me.
	
	//Get Task To me
	function get_task_by_me()
	{
		
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!=''){
			
			$userID			=	$_REQUEST['userID'];
			
		}else{
		
			echo json_encode(array('acrion'=>'error', 'message'=>'user id is not comming'));
			die();
		}
	
		$data	    = $this->db->select('*')
					->from($this->db->dbprefix('api_tasks as Task'))
					->join($this->db->dbprefix('api_users as User'),'User.userID=Task.orginatorID' )
					->where('Task.orginatorID', $userID)
					->order_by('Task.taskID','desc')
					->get()
					->result();
		
		$dataTempData		=	 array();
		foreach($data as $tasks)
		{
				
			$orginatorsTask							=	$this->get_orginator_taks($tasks->orginatorID,'arr');
			$dataTempData[$tasks->orginatorID]		=	array(
														'orginator'=>$tasks->orginatorID,
														'firstName'=>$tasks->firstName,
														'lastName'=>$tasks->lastName,
														'contactNo'=>$tasks->contactNo,
														'taskcount'=>count($orginatorsTask),
														'tasks'=>$orginatorsTask	
														);
														
		}
			
			echo json_encode(array('orginators'=>$dataTempData));
	}

	function get_orginator_taks($orginatorID=null, $type='json')
	{
		
		$data	    = $this->db->select('taskID,taskName,taskDescription,allotmentDate,orginatorID,recieverID,revisedDate,dueDate,status')
					->from($this->db->dbprefix('api_tasks as Task'))
					->where(array('orginatorID'=>$orginatorID))
					->order_by('Task.taskID','desc')
					->get()
					->result();
			
			if($type=='json'){
			
				echo json_encode($data);
			
			}else{
				
				return $data;
			}
	}
	
	//this can be used for the task detail api
	function get_task_detail()
	{
		
		if(isset($_REQUEST['taskID']) && $_REQUEST['taskID']!=''){
		
			$this->load->model('tasks_model');
			$TaskDetail			=	 $this->tasks_model->get_task_detail($_REQUEST['taskID']);
			echo json_encode(array('action'=>'success',  'taskData'=>$TaskDetail));
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Task id is not comming.'));
		}
	}
	//Get assined task to me.
	
	function get_all_assigned_taks_to_users(){} 
	//It is a  data cleaning for only  tasks related  it will use only  development time.
	//@parames: userID,taskID, "status change from  to "   
	function set_task_status()
	{
		
		//echo "set task  status comepleted";
		//$this->db->dbprefix('api_tasks')
		if($_REQUEST['taskID']!='' && $_REQUEST['userID']!='' && $_REQUEST['taskStatus']!=''){
			
			$this->load->model('tasks_model');
			$this->load->model('user');
			
			$this->db->where(array('taskID'=>$_REQUEST['taskID']));
			
			if($this->db->update($this->db->dbprefix('api_tasks'), array('status'=>$_REQUEST['taskStatus'])))
			{
				
				echo json_encode(array('action'=>'success','error'=>0,'message'=>'Task status has been changed successfully.'));
				$this->load->model('tasks_model');
				$TaskDetail			=	 	$this->tasks_model->get_task_detail($_REQUEST['taskID']);
				$userinfo			=		$this->user->get_api_user_info($_REQUEST['userID']);
				$action				=       "Task status has changed to ".$TaskDetail['taskStatus']." by ".$userinfo->firstName." ".$userinfo->lastName;
				$this->set_task_log($_REQUEST['taskID'], $_REQUEST['userID'],$action, $TaskDetail);
			
			}else{
				
				echo json_encode(array('action'=>'fail','error'=>200,'message'=>'Please contact api administraator to fix this issue.'));
			}
		}
	}
	
	function set_task_log($taskID= 0,$userID = 0, $actions='test',$Arr=array())
	{
		
		$saveData		=	array(
										'taskID'=>$taskID,
										'actions'=>$actions,
										'userID'=>$userID,
										'json'=>json_encode($Arr),
										'createdDate'=>date('Y-m-d')
								);
			
			if($this->db->insert($this->db->dbprefix('api_log_task'),$saveData))
			{
				return  true;
			
			}else{
				
				return false;
			}
	}

	function get_status_text($status=0)
	{
		
		$data =$this->db->select('TSM.statusText')
			->from($this->db->dbprefix('api_task_status_master as TSM'))
			->where(array('taskStatus'=>$status))
			->get()
			->row();
		
	}

	// Update task  title from  detail page.
	function update_task_params()
	{
		//Call history Log.
		//Push Notification.
	}

	///Creatng Group
	function create_group()
	{
		
		$errorArr					=	array();
		if(isset($_REQUEST['createdBy']))
		{
			
			if($_REQUEST['createdBy']!=''){
					
					$createdBy			=	$_REQUEST['createdBy'];
			}else{
				
					$errorArr['createdBy']					=	"Please send userid.";
					//echo json_encode(array('action'=>'error','message'=>'Please enter group name'));
			}
		}

		if(isset($_REQUEST['groupName']))
		{
			
			if($_REQUEST['groupName']!=''){
					
					$groupName			=	$_REQUEST['groupName'];
			}else{
				
					$errorArr['groupName']					=	"Please enter group name.";
					//echo json_encode(array('action'=>'error','message'=>'Please enter group name'));
			}
		}
		
		// Default Creator will  be a admin of the group.
		if(isset($_REQUEST['groupUsers']))
		{
			
			if($_REQUEST['groupUsers']!=''){
					
					$groupUsers			=	$_REQUEST['groupUsers'];
			}else{
				
				$errorArr['groupUsers']					=	"Please select users.";
			}
		}
		
		if(isset($_REQUEST['groupDescription']))
		{
			
			if($_REQUEST['groupDescription']!=''){
					
					$groupDescription			=	$_REQUEST['groupDescription'];
			}else{
				
				 $errorArr['groupDescription']					=	"Please enter group description.";
			}
		}

		
		$groupPhoto			=	'defualtGroPhoto';
		
		if(isset($_REQUEST['groupPhoto']))
		{
			
			if($_REQUEST['groupPhoto']!=''){
					$groupPhoto			=	$_REQUEST['groupPhoto'];
			}
		}
		
		if(count($errorArr)>0){
		
			echo json_encode(array('action'=>'fail', 'message'=>$errorArr));
			
		}else{
			
			$saveData			=	array(
											'groupName'=>$groupName,
											'groupDescription'=>$groupDescription,
											'groupPhoto'=>$groupPhoto,
											'createdDate'=>date('Y-m-d'),
											'createdBy'=>$createdBy,
											'status'=>'1'
										);
			
			
			// check group  already exist.
			if($this->db->insert($this->db->dbprefix('api_groups'),$saveData))
			{
			
				$groupID	=	$this->db->insert_id();
				
				if($this->db->insert($this->db->dbprefix('api_group_users'),array('userID'=>$createdBy,'groupID'=>$groupID,'is_admin'=>'1')))
				{
					
				
				
					$this->add_group_members($groupUsers,$groupID);
					echo json_encode(array('action'=>'success', 'message'=>'Group has been created successfully.', 'data'=>array('groupID'=>$groupID)));
				}
			
			}else{
					
					echo json_encode(array('action'=>'fail', 'message'=>'database issue please contact to the administrator.'));
			}
		}
	}
	//End creating group..

	//Add Group Members
	function add_group_members($groupUsers, $groupID)
	{
		
		if($groupUsers!=''){
			
			$exploadArr			=	explode(",",$groupUsers);
			
			foreach($exploadArr as  $user){
			
			if($this->db->insert($this->db->dbprefix('api_group_users'),array('userID'=>$user,'groupID'=>$groupID,'is_admin'=>'0')))
			{
			
			}	
		 }
		}
	}
	//end of add members in a group.

	//Get grouped users.
	function get_grouped_users()
	{
	
		if(isset($_REQUEST['groupID']) && $_REQUEST['groupID']!='')
		{
			//echo "Group Users is comming soon";
			$this->load->model('user');
			$groupUserData		=	$this->user->get_group_users($_REQUEST['groupID']);
			echo "<pre>";
			print_r($groupUserData);
		}
	}
	
	//End of grouped users.
	//Request prams.  
	//groupID.
    //taskName.
	//choose a user to assign task.
	function create_task_in_a_group()
	{
		$validationArr			=	array();
	    
		if(isset($_REQUEST['groupID']) && $_REQUEST['groupID']!=''){
		
			$groupID					=	$_REQUEST['groupID'];
		
		}else{
			
			$validationArr[]			=	"Please send group  id";
	   }
	
		if(isset($_REQUEST['taskName']) && $_REQUEST['taskName']!=''){
		
			$taskName					=	$_REQUEST['taskName'];
		
		}else{
		 
			$validationArr[]			=	"please enter task Name";
	    }
		
		if(isset($_REQUEST['taskDescription']) && $_REQUEST['taskDescription']!=''){
			
			$taskDescription					=	$_REQUEST['taskDescription'];
		
		}else{
			$validationArr[]			=	"please enter task description";
	   }
		
		if(isset($_REQUEST['toUsers']) && $_REQUEST['toUsers']!=''){   
			
			$toUsers					=	$_REQUEST['toUsers'];
		
		}else{
			
			$validationArr[]			=	"please select users";
	   }
	
		if(isset($_REQUEST['orginatorID']) && $_REQUEST['orginatorID']!=''){
			
			$orginatorID					=	$_REQUEST['orginatorID'];
		
		}else{
			
			$validationArr[]				=	"please orginator id is not comming.";
	   }
		
		if(isset($_REQUEST['dueDate']) && $_REQUEST['dueDate']!=''){

			$dueDate					=	$_REQUEST['dueDate'];

		}else{

			$validationArr[]			=	"please select due date..";
		}
		
		if(count($validationArr)>0){
		
			echo json_encode(array('action'=>'error', 'message'=>$validationArr));
	   
		}else{
			
			//work hare..
			$saveData						=	array(
														'taskName'=>$taskName,
														'taskDescription'=>$taskDescription,
														'allotmentDate'=>date('Y-m-d'),	//task  start date.
														'dueDate'=>$dueDate,
														'orginatorID'=>$orginatorID,
														'recieverID'=>$toUsers,
														'funtionalityType'=>'3',
														'funcationlityTypeID'=>$groupID,
														'status'=>'0'
												);
			
				if($this->db->insert($this->db->dbprefix('api_tasks'),$saveData))
				{
					$taskID	=	$this->db->insert_id();	
					$action			=	"Task created in a group";
					$this->set_task_log($taskID, $orginatorID ,$action,  $saveData);
					echo json_encode(array('action'=>'success', 'message'=>'Task has been successfully created.'));
				}
		
		}
  }

	//Request params
	//userID // selected from group users.
	//taskID // group task id.
	function  add_user_in_group_task()
	{
		
		$errorArr			=	array();

		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!='')
		{
			$userID			=	$_REQUEST['userID'];
		
		}else{
			
			$errorArr[]		=	"Please send user id";	
		}
		
		if(isset($_REQUEST['taskID']) && $_REQUEST['taskID']!='')
		{
			$taskID			=	$_REQUEST['taskID'];
		
		}else{
		
			$errorArr[]		=	"Please send task id";	
		}
		
		if(count($errorArr)>0){
		
			echo json_encode(array('action'=>'error','message'=>$errorArr));
		
		}else{
			
			$this->load->model('tasks_model');
			$resData = $this->tasks_model->add_user_in_group_task($userID,$taskID);
			
			if($resData){
				
				echo json_encode(array('action'=>'success', 'message'=>$resData));
			
			}else{
				
				echo json_encode(array('action'=>'fail', 'message'=>"please contact with administraator"));
			}
		}
	}
	
	//Clean your Taks.
	function clean_all_tasks()
	{
		
		$this->db->truncate($this->db->dbprefix('api_tag_task'));
		$this->db->truncate($this->db->dbprefix('api_task_carbon'));
		$this->db->truncate($this->db->dbprefix('api_receiveer'));
		$this->db->truncate($this->db->dbprefix('api_tasks'));
		$this->db->truncate($this->db->dbprefix('api_log_task'));
		//$this->db->truncate($this->db->dbprefix('api_users'));
		echo "Clear tasks data";
	}
	//End of Clean Task.
	
	//it is gloal.
	function get_user_info()
	{
		
			$this->load->model('user');
			$temp_error 			=	array();
			//phone  number checking.
			
			if(isset($_REQUEST['contactNo']) && $_REQUEST['contactNo']!=''){

				$phone_number		=	$_REQUEST['contactNo'];

			}else{

			    $temp_error['contactNo']				= "Contact number is blank";	
			}

			if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){

				$code		=	$_REQUEST['code'];

			}else{

				$temp_error['code']		= "country code is blank";	
			
			}
			
			if(count($temp_error)>0){
				
				echo  json_encode(array('action'=>'error', 'message'=>$temp_error));
				die();
			}
			$conditionArr		=	array(
											 'U.contactNo'=>$phone_number,
											 'U.countryPhoneCode'=>$code,
											 'U.status'=>'1'
											 );
			$dataGamming	=	$this->user->get_user_info($conditionArr);
			echo json_encode(array('action'=>'success', 'userData'=>$dataGamming));
	}
	
	
}
//End of class.
