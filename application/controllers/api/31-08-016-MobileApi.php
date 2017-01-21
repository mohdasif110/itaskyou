<?php
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
		$this->load->helper('string');
		return random_string('alnum',4);
	}	
	
	// get phone co
	function  get_phone_country_code()
	{
			$PhoneCountryCode			= $this->db->select('name, phonecode as code')
										->from($this->db->dbprefix('api_country_master as CM'))
										->where(array('CM.status'=>'1'))
										->get()
										->result();
	
	
	
		if ($this->agent->is_browser())
		{
		
			echo json_encode($PhoneCountryCode, JSON_UNESCAPED_SLASHES);
			
		}elseif ($this->agent->is_robot()){
		
			$agent = $this->agent->robot();
			
		}elseif ($this->agent->is_mobile()){
			
			echo json_encode($PhoneCountryCode);
			
		}else{
			
			$agent = 'Unidentified User Agent';
		}
		
		}
	
	
	//Check Contact  number is available or not.
	//@param-  phone number-
	//Device id.

	function  check_contact_number()
	{
			//phone number validation...
			if(isset($_REQUEST['contactNumber']))
			{
	
				if($_REQUEST['contactNumber']!=''){
					
					if(is_numeric ( $_REQUEST['contactNumber'] )){
								
							if(preg_match('/^[0-9]{10}+$/', $_REQUEST['contactNumber']))
							{
							   // code here.
								$phone_number			=	$_REQUEST['contactNumber'];
							
							}else{

								echo json_encode(array('action'=>'error','message'=>'Please enter 10 digit phone number.','userData'=>array('contactNo'=>'','otp'=>'')));
								die();
							}  
						
						}else{
							
							echo json_encode(array('action'=>'error','message'=>'Please enter valid phone number.','userData'=>array('contactNo'=>'','otp'=>'')));
							die();
						}
					
					}else{
						echo json_encode(array('action'=>'error','message'=>'Please enter phone number.','userData'=>array('contactNo'=>'','otp'=>'')));
						die();
					}
				
				}else{
					
					echo json_encode(array('action'=>'error','message'=>'request is not valid please send phone number in request.','userData'=>array('contactNo'=>'','otp'=>'')));
					die();
			   }
			
			///Phone number validation.	
			 
			 if(isset($_REQUEST['code'])){
					
					if($_REQUEST['code']!=''){
						
						if(is_numeric ( $_REQUEST['code'] )){
						
							$country_code		=	$_REQUEST['code'];
						
						}else{
							
							echo json_encode(array('action'=>'error','message'=>'Please enter valid country code.','userData'=>array('contactNo'=>'','otp'=>'')));
							die();
					   }
					
					}else{
						
						echo json_encode(array('action'=>'error','message'=>'Please enter country code.','userData'=>array('contactNo'=>'','otp'=>'')));
						die();
					}
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'request is not valid please send phone number country code in  request.','userData'=>array('contactNo'=>'','otp'=>'')));
				 die();
			 }
			 
			$getData				= 		$this->db->select('*')->from($this->db->dbprefix('api_users'))->where('contactNo',$phone_number)->get()->row();
			
			if(count($getData)>0)
			{
				
				echo json_encode(array('action'=>'already','message'=>'user already registered.','userData'=>$getData));
			
			}else{
				
				// save phone  number and send otp  to enteree number.
				$otp_code		=	$this->get_otp_number_random();
				
				$flagsave		=	$this->db->insert($this->db->dbprefix('api_users') , array('status'=>'0' , 'countryPhoneCode'=>$country_code,'contactNo'=>$phone_number,'otp'=>$otp_code));
				
				$NowgetData				= 		$this->db->select('otp,countryPhoneCode,contactNo')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
				
				 echo json_encode(array('action'=>'available','message'=>'otp','userData'=>array($NowgetData)));
				//send otp  to the phone number.
				
				$otp_code		=	"iTaskyouOTP:-" .$otp_code;
				$this->send_otp($phone_number, $otp_code); //  send otp  in case of new user creation.
			}
	}
	
	//Send OTP to the entered  phone number.
	//@param ;  phone number.
	function send_otp($phone_number = '9873878430', $otp='hkks')
	{
		$message = $otp;
		$url = "http://5.189.187.160/api/mt/SendSMS?user=bookmyhouse01&password=123456&senderid=BKMYHS&channel=2&DCS=0&flashsms=0&number=".$phone_number."&text=".$message."&route=1";
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$query = curl_exec($curl_handle);
		//print_r($query);
		curl_close($curl_handle);
	}
	
	//check otp 
	//@parme :  phone number ,  otp number.
	function check_otp()
	{
		
		    //phone number validation...
			if(isset($_REQUEST['contactNumber']))
			{
				if($_REQUEST['contactNumber']!=''){
					
					if(is_numeric ( $_REQUEST['contactNumber'] )){
					
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
	   // end of  phone number checking.
	  //otp cheking...
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
		
			$getData				= 	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
			
			if(count($getData)>0){
				
				//echo json_encode(array('action'=>'success', 'userData'=>$getData));
				echo json_encode(array('action'=>'success'));
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please enter valid otp number.'));
				die();
			}
	}

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
		
		
		if(isset($_REQUEST['typeID']) && $_REQUEST['typeID'] ){
		
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
		
		$deviceID			=	'DSDSADASDASDASDASDADSASDADS';
		
		if(isset($_REQUEST['userPhoto']) && $_REQUEST['userPhoto']!=''){
			
			$userPhoto			=	$_REQUEST['userPhoto'];
		
		 }else{
			
			$userPhoto			=	'';
		 }
		
		if(isset($_REQUEST['nationality']) && $_REQUEST['nationality']!=''){
			
				$nationality		=	$_REQUEST['nationality'];
			 
		 }else{
			
				$nationality		=	'indian';
		}

		if(count($temp_error)>0){
			
			echo json_encode(array('action'=>'error','message'=>$temp_error));
			die();
		}

		$data				=	array(
									'firstName'=>$firstName,
									'lastName'=>$lastName,
									'emailID'=>$emailID,
									'industryType'=>$industryType,
									'subIndustoryType'=>$subIndustoryType,
									'nationality'=>$nationality,
									'deviceID'=>$deviceID,
									'userPhoto'=>$userPhoto,
									'otp'=>'',
									'status'=>'1',
									'created_date'=>date('YY-mm-dd'),
									'updated_date'=>date('yy-mm-dd')
									);
		
		
			$numrows	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number))->get()->num_rows();
			
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
										'createdDate'=>date('yy-mm-dd')
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
											'createdDate'=>date('YY-mm-dd'),
											'createdBy'=>$createdBy,
											'status'=>'1'
										);
			
			
			// check  group  already exist.
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
	
		if(isset($_REQUEST['groupID']) && $_REQUEST['groupID']!=''){
		
		
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
		
		if(isset($_REQUEST['taskduedate']) && $_REQUEST['taskduedate']!=''){
			
			$taskduedate					=	$_REQUEST['taskduedate'];
		
		}else{
		 
			$validationArr[]			=	"please select task  due date";
	   }
		
		if(isset($_REQUEST['toUsers']) && $_REQUEST['toUsers']!=''){
			
			$toUsers					=	$_REQUEST['toUsers'];
		
		}else{
			
			$validationArr[]			=	"please select users";
	   }
		
		if(isset($_REQUEST['orginatorID']) && $_REQUEST['orginatorID']!=''){
			
			$orginatorID					=	$_REQUEST['orginatorID'];
		
		}else{
			
			$validationArr[]			=	"please orginator id is not comming.";
	   }
		
		if(count($validationArr)>0){
			
			echo json_encode(array('action'=>'error', 'message'=>$validationArr));
	   
		}else{
			//work hare..
		}
	}

	//Clean your Taks...
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

}
// end of class.
