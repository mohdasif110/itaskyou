<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MobileApi extends CI_Controller
{
	
	function __construct()
    {
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->database();	
		
		if(!$this->agent->is_mobile()){
			//echo "mobile API";
		}
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
	
	// Check Contact  number is available or not.
	// @param-  phone number-
	// Device id.
	
	function  check_contact_number()
	{
			//phone number validation...
			if(isset($_GET['contactNumber']))
			{
			
					if($_GET['contactNumber']!=''){
			
						if(is_numeric ( $_GET['contactNumber'] )){
						
						
							if(preg_match('/^[0-9]{10}+$/', $_GET['contactNumber']))
							{
							   // code here.
								$phone_number			=	$_GET['contactNumber'];
							
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
			 if(isset($_GET['code'])){
					
					if($_GET['code']!=''){
					
						if(is_numeric ( $_GET['code'] )){
						
							$country_code		=	$_GET['code'];
					  
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
			if(isset($_GET['contactNumber']))
			{
				if($_GET['contactNumber']!=''){
					
					if(is_numeric ( $_GET['contactNumber'] )){
					
						if(preg_match('/^[0-9]{10}+$/', $_GET['contactNumber']))
							{
							   // code here.
								$phone_number			=	$_GET['contactNumber'];
							
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
	  if(isset($_GET['otp'])){
		  
		  if($_GET['otp']!=''){
			  
			  $otp_code			=	$_GET['otp'];
			  
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
				
				echo json_encode(array('action'=>'success', 'userData'=>$getData));
				
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
	
	function get_sub_industry_type()
	{
		
		
		if(isset($_GET['typeID']) && $_GET['typeID'] ){
		
			$typeID				=	$_GET['typeID'];
			
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
	///////////// child and parent  IndustoryType ..
	
	//Get industory Type.
	function get_industry_type_second()
	{
		$IndustoryType		= $this->db->select('typeID,type')
										->from($this->db->dbprefix('api_industory_type_master'))
										->get()
										->result();
		//echo json_encode($IndustoryType);
		
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
	////// End  of child andd parent industory  type..
	
	//update profile	
	function upate_profile()
	{
		
		$temp_error 			=	array();
		//phone  number checking.
		
		if(isset($_GET['contactNo']) && $_GET['contactNo']!=''){
			
			$phone_number		=	$_GET['contactNo'];
		
		}else{
				
				$temp_error['contactNo']				= "Contact number is blank";	
		}
	
		// end of phone number cheking.
		// First name checking.. 
		
		if(isset($_GET['firstName']) && $_GET['firstName']!=''){
			
			$firstName			=	$_GET['firstName'];
		
		}else{
			
			$temp_error['firstName']				= "Please enter first name.";	
		}
		//End  of  first name checking..
		
		if(isset($_GET['lastName'])  && $_GET['lastName']!=''){
			
				$lastName			=	$_GET['lastName'];
		
		}else{
		
			$temp_error['lastName']				= "Please enter last name.";		
		}
		
		if(isset($_GET['emailID']) && $_GET['emailID']!='')
		{
			
			if(filter_var($_GET['emailID'], FILTER_VALIDATE_EMAIL)!='')
			{
			
				$emailID			=	$_GET['emailID'];
				
			}else{
				
				$temp_error['emailID']				= "Please enter valid email address.";		
			}
		
		}else{
			
			$temp_error['emailID']				= "Please enter email address.";		
		}		
		
		if(isset($_GET['typeID']) && $_GET['typeID']!=''){
		
			$industryType		=	$_GET['typeID'];
		
		}else{
			
			$temp_error['typeID']				= "Please select industory type.";	
		}
		
		if(isset($_GET['subTypeID']) && $_GET['subTypeID']!=''){
			
			$subIndustoryType		=	$_GET['subTypeID'];
		
		}else{
			
			//$temp_error['subTypeID']				= "Please select sub industory type.";	
			$subIndustoryType		=	'';
		}
		
		$deviceID			=	'DSDSADASDASDASDASDADSASDADS';
		
		if(isset($_GET['userPhoto']) && $_GET['userPhoto']!=''){
			
			$userPhoto			=	$_GET['userPhoto'];
		
		 }else{
			
			$userPhoto			=	'';
		 }
		
		if(isset($_GET['nationality']) && $_GET['nationality']!=''){
			
				$nationality		=	$_GET['nationality'];
			 
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

	//Get tags 
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
	
	function  get_functionality_type($type='json')
	{
	
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_functionality_type_master'))->get()->result();
		
		if($type=='arr'){
			
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}
	
	function  get_task_status($type='json')
	{
		
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_task_status_master'))->get()->result();
		
		if($type=='arr'){
		
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}
	
	//Request Paramenter...
	//ity_api_tasks
	//1-taskName
	//2-taskDescription
	//3-allotmentDate
	//4-orginatorID
	//5-cc  	-  Users put them in the cc table.
	//6-to  	-  users put them in to the reciver tabel.
	//7-tags 	-  put them into the  task  tag table. 
	//8-status  -  bydefault pending 0.
	//ity_api_task_carbon
	//ity_api_receiveer
	//ity_api_tag_task
	//ity_api_log_task
	//Validation.

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
		
			
			$taskType			=	0;//defualt - Main Task.
			
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
			
			// saving data into task table.
			$saveData			=	array(
											'taskName'=>$postForm['taskName'],
											'taskDescription'=>$postForm['taskDescription'],
											'orginatorID'=>$postForm['orginatorID'],
											'ccID'=>$postForm['ccUsers'],
											'recieverID'=>$postForm['toUsers'],
											'tagID'=>$postForm['tags'],
											'status'=>'0',
											'funtionalityType'=>$functionalityType
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
				
				
				echo json_encode(array('action'=>'success', 'message'=>'Task has been  created successfully.'));
				
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
	
	/*
	function map_task_logs($taskID,$data)
	{
		
		foreach($data as $val)
		{
			
			$saveData		=	array('taskID'=>$taskID,'tagID'=>$val);
			
			if($this->db->insert($this->db->dbprefix('api_logs_task'),$saveData))
			{
				return  true;
				
			}else{
				return false;
			}
		}
	}
	*/

	
	//Get ogriniator  Task
	function get_all_task_oginators()
	{
		
		if(isset($_GET['userID']) && $_GET['userID']!=''){
			
			$userID			=	$_GET['userID'];
		
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
	
	
		if(isset($_GET['userID']) && $_GET['userID']!=''){
		
			$userID			=	$_GET['userID'];
			
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
	
	
		if(isset($_GET['userID']) && $_GET['userID']!=''){
			
			$userID			=	$_GET['userID'];
			
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
	
		if(isset($_GET['taskID']) && $_GET['taskID']!=''){
			
			$this->load->model('tasks_model');
			$TaskDetail			=	 $this->tasks_model->get_task_detail($_GET['taskID']);
			echo json_encode(array('action'=>'success',  'taskData'=>$TaskDetail));
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Task id is not comming.'));
		}
	}
	//Get assined task to me.
	
	
	function get_all_assigned_taks_to_users(){} 
	//It is a  data cleaning for only  tasks related  it will use only  development time.
	
	function clean_all_tasks()
	{
		$this->db->truncate($this->db->dbprefix('api_tag_task'));
		$this->db->truncate($this->db->dbprefix('api_task_carbon'));
		$this->db->truncate($this->db->dbprefix('api_receiveer'));
		$this->db->truncate($this->db->dbprefix('api_tasks'));
	}
	
}
// end of class.