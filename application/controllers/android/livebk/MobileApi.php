<?php
date_default_timezone_set('Asia/kolkata');
defined('BASEPATH') OR exit('No direct script access allowed');
class MobileApi extends CI_Controller
{
	
	function __construct()
    {
	
		parent::__construct();
		//api_request_log($_REQUEST,'android');
		$this->load->library('user_agent');
		$this->load->database();	
		$this->load->model('tasks_model');
		$this->load->model('user');
		$this->load->model('group_model');
		
			$userID2			=	0;

		if(isset($_REQUEST['userID'])){
			$userID2		=	$_REQUEST['userID'];
		}

		if(isset($_REQUEST['orginatorID'])){
			$userID2		=	$_REQUEST['orginatorID'];
		}
		$saveData		=	array('request'=>json_encode($_REQUEST),'url'=>$_SERVER['PATH_INFO'],'date'=>date('Y-m-d H:i:s'),'userID'=>$userID2);
		
		$this->db->insert($this->db->dbprefix('api_hits_call'),$saveData);
	
	}
	
	function get_otp_number_random()
	{
		
		$digits = 4;
		$num	=  rand(pow(10, $digits-1), pow(10, $digits)-1);
		return $num;
	
	}	
	
	//Get phone com.
	function get_phone_country_code()
	{
				$PhoneCountryCode		= $this->db->select('name, phonecode as code')
										->from($this->db->dbprefix('api_country_master as CM'))
										->where(array('CM.status'=>'1'))
										->get()
										->result();
				echo json_encode($PhoneCountryCode, JSON_UNESCAPED_SLASHES);
	}	
	
	//Check Contact  number is available or not.
	//@param-  phone number-
	
	//Device id
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
						
						if(is_numeric ( $_REQUEST['code'] )){
						
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
		
			//Partialy Register - A user leave the application without completing his info. 
			//if he comes next time then it will find new otp.	
			if($getData->status=='-1'){
		
				
		
					$otp_code		=	$this->get_otp_number_random();
					// Redirect to the profile page.
					
					if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey)){
						
						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'appKey'=>$appKey,'otp'=>$otp_code));
					
						
						$getDataR			=	array(
														'userID'=>$getData->userID,	
														'firstName'=>'',
														'lastName'=>'',
														'emailID'=>'',
														'industryType'=>'',
														'subIndustoryType'=>'',
														'deviceID'=>$getData->deviceID,
														'countryPhoneCode'=>'',
														'contactNo'=>$getData->contactNo,
														'userPhoto'=>'',
														'status'=>$getData->status
													 );
													 
					
						echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.', 'userData'=>$getDataR));
					
					}else{
						
						echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
						die();
					}
				
				die();
			
			}else{
			
			// User change the device and use regster contact number,   new otp  will send to the user mobile. 
			// Device checking.. 
			
			if(isset($_REQUEST['isDataSaved'])){
				
			if($_REQUEST['isDataSaved']==0){
				
				
				
				
				$otp_code		=	$this->get_otp_number_random();
				//Redirect to the profile page.
				
				//Conatct number register and diffrent mobile.
				$this->db->where('contactNo',$phone_number);
				$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('appKey'=>$appKey,'otp'=>$otp_code));
		
				if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey))
				{

					$this->db->where('contactNo',$phone_number);
					$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('appKey'=>$appKey,'otp'=>$otp_code));
					
					$this->load->model('user');
					$conditionArr		=	array(
												'contactNo'=>$phone_number,
												'countryPhoneCode'=>$country_code,
												'U.status'=>'1'
											 );
					
					$dataGamming	=	$this->user->get_user_info($conditionArr);
					
					if($dataGamming->subIndustryTypeID==''){
						
						$dataGamming->subIndustryTypeID		=	'';
					}
				
				echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.', 'userData'=>$dataGamming));
				die();
			
				}else{
									echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
									die();
				
				}
				
			}
	}	
	
		if($getData->deviceID!=$deviceID){
				
					$otp_code		=	$this->get_otp_number_random();
					//Redirect to the profile page.
					//Conatct number register and diffrent mobile.
					$this->db->where('contactNo',$phone_number);
					$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('appKey'=>$appKey,'otp'=>$otp_code));
					
					
					if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey)){

						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('appKey'=>$appKey,'otp'=>$otp_code));
						
						
						$this->load->model('user');
						$conditionArr		=	array(
												'contactNo'=>$phone_number,
												'countryPhoneCode'=>$country_code,
												'U.status'=>'1'
											 );
						$dataGamming	=	$this->user->get_user_info($conditionArr);
						
						
						
						echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.', 'userData'=>$dataGamming));

					}else{
							echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
							die();
					}
					
				}else{
				
						$this->load->model('user');
						$conditionArr		=	array(
											 'contactNo'=>$phone_number,
											 'countryPhoneCode'=>$country_code,
											 'U.status'=>'1'
											 );
				
				
						$dataGamming	=	$this->user->get_user_info($conditionArr);
						
						$this->db->where('contactNo',$phone_number);
						$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('appKey'=>$appKey));
						
						echo json_encode(array('action'=>'already','message'=>'user already registered', 'userData'=>$dataGamming));
						die();
					}
			}
		
		}else{
				
				$otp_code		=	$this->get_otp_number_random();
				if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey))
				{
					

					$default_setting		=	json_encode($this->user_app_defualt_setting());
				
					//save phone  number and send otp  to enteree number.
					$flagsave		=	$this->db->insert($this->db->dbprefix('api_users') , array('status'=>'-1' , 'countryPhoneCode'=>$country_code,'contactNo'=>$phone_number,'otp'=>$otp_code,'deviceID'=>$deviceID,'appKey'=>$appKey,'AppAccessFlag'=>$default_setting));
					
					
/*					//save phone  number and send otp  to enteree number.
					$flagsave		=	$this->db->insert($this->db->dbprefix('api_users') , array('status'=>'-1' , 'countryPhoneCode'=>$country_code,'contactNo'=>$phone_number,'otp'=>$otp_code,'deviceID'=>$deviceID,'appKey'=>$appKey));
					//$NowgetData				= 		
				
*/
				
					echo json_encode(array('action'=>'available','message'=>'OTP has been sent to your phone number.', 'userData'=>array('contactNo'=>$phone_number,'countryPhoneCode'=>$country_code)));

					 
				}else{
							echo json_encode(array('action'=>'error','message'=>'Phone number is invalid.'));
							die();
				}				
		
		    }

	}
	//check otp 
	// Redend OTP  
	function resend_otp()
	{
			
			$otp_code		=	$this->get_otp_number_random();
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
						
						if(is_numeric ( $_REQUEST['code'] )){
						
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

				 echo json_encode(array('action'=>'error','message'=>'request is not valid please send device id.'));
				 die();
			}	
			
			if(isset($_REQUEST['appKey']) && $_REQUEST['appKey']!=''){
				
				$appKey				=	$_REQUEST['appKey'];
			
			}else{
				
				$appKey				=	'';
			}
		
		if(send_otp_message($phone_number, $country_code, $otp_code ,$app_type='android', $type='sms',$deviceID, $appKey))
		{
			$this->db->where(array('contactNo'=>$phone_number,'countryPhoneCode'=>$country_code,'deviceID'=>$deviceID));
			$flagsave		=	$this->db->update($this->db->dbprefix('api_users') , array('otp'=>$otp_code));
			echo json_encode(array('action'=>'success','message'=>'OTP has been sent to your phone number.'));
		
		
		}
	
	}
	// End of Resend OPT
	
	
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
	
	/*	
		if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){
	
				$country_code		=	$_REQUEST['code'];

			}else{

				echo json_encode(array('action'=>'error','message'=>'code is blan.'));
				die();
					
		}
	*/
	
		if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!=''){
	
				$deviceID		=	$_REQUEST['deviceID'];

		}	
	
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
		
			$getData				= 	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
			$sql = $this->db->last_query();
			
			//echo $sql;
			//echo "<pre>";
			//print_r($getData);
			
			if(count($getData)>0){
				
				
				$this->db->where('contactNo',$phone_number);
				$flagsave	=  $this->db->update($this->db->dbprefix('api_users') , array('deviceID'=>$deviceID,'otp'=>''));
			    echo json_encode(array('action'=>'success', 'userData'=>$getData));
				//echo json_encode(array('action'=>'success'));
			
			
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
										->where(array('status'=>'1'))
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
		
		if(count($SubIndustoryType)>0){
			
			return  $SubIndustoryType;
		
		 }else{
			
			return 'nodata';
		 }
	
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
			$appKey								=	'';
		}
		
		if(isset($_REQUEST['userPhoto']) && $_REQUEST['userPhoto']!=''){
			
			$userPhoto			=	$_REQUEST['userPhoto'];
		
		 }else{
			 
			$userPhoto			    =		base_url().'/assets/images/default_avatar.png';
			//$userPhoto			=	'';
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
		
		$numrows	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where($conditionArr)->get()->num_rows();
		
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
				
				$this->load->model('user');
				
				$conditionArr		=	array(
											 'contactNo'=>$phone_number,
											 'countryPhoneCode'=>$code,
											 'U.status'=>'1'
											 );
				
				$dataGamming	=	$this->user->get_user_info($conditionArr);
				echo json_encode(array('action'=>'success','message'=>'Profile has been  updated successfully' ,'userData'=>$dataGamming));
			
			}
	}

	/// TASK  MODULES
	// Get Task Element.

	function get_task_form_elements()
	{
		$this->load->model('user');
		
		$Arr			=	array(
									//'userData'=>$this->get_select_users('arr'),
									'userData'=>$this->user->get_active_user_list(),
									'tags'=>$this->get_tags('arr'),
									'taskType'=>$this->get_task_type('arr'),
									'funtionalityType'=>$this->get_functionality_type('arr'),
									'taskStatus'=>$this->get_task_status('arr')
								);
			
				echo json_encode($Arr);
	}
	
	//Get Tags... 
	function get_tags($type='json')
	{
		$data	=	$this->db->select('tagID,tagText')->from($this->db->dbprefix('api_tag_master'))->where('status','1')->get()->result();
	
		if($type=='arr'){
		
			return $data;
		
		}else{
			
			echo json_encode($data);
		}
	}
	//End  Get Tags.
	
	//select user(s) as reciver.
	function get_select_users($type='json')
	{
		
		//$dataGamming	=	$this->db->select('userID,firstName,lastName,contactNo,countryPhoneCode')->from($this->db->dbprefix('api_users'))->where(array('status'=>'1'))->get()->result();
		
		$dataGamming	=	$this->user->get_active_user_list();
		
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

	
	//Create Task.
	function create_task()
	{
		
		$postForm			=	$_REQUEST;
		$validationArr		=  array();
	
		if(isset($postForm['taskName']))
		{
		
				if($postForm['taskName']==''){
					
					$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task name.'); // it will save into task table...
				
				}else{
					
					if(taskNameValidation($postForm['taskName']))
					{
						$validationArr[]			=	 array('action'=>'error', 'message'=>'The task name can be a mix of text with Numeric / special characters but not only numeric/special characters.');
					}
				}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send taskName to the server.'); // it will... 
		}
	
	
		if(isset($postForm['orginatorID']))
		{
		
			if($postForm['orginatorID']==''){
				$validationArr[]			=	 array('action'=>'error', 'message'=>'orginator id is not comming.');
				//it will save into task table.
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send orginatorID to the server.');
		}
		
		
		if(isset($postForm['taskDescription']))
		{	
			
			if($postForm['taskDescription']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task description.');
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send taskDescription to the server.');
			
		}
		
		
		
		if(isset($postForm['startDate']) && $postForm['startDate']){
			
			$postForm['startDate']		=	$postForm['startDate'];
				//$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task start date.');
		}else{
			
			$postForm['startDate']		=	date('Y-m-d');			
		}
		
		
		if(isset($postForm['dueDate'])){
			
			if($postForm['dueDate']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task due date.');
			}
			
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Pleas send dueDate to the sever.');
		}
		
		
		
		if(isset($postForm['toUsers']))
		{
		
			if($postForm['toUsers']==''){
		
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please slect reciver.');
			
			}else{
				
				$toUsers		=	explode(",",$postForm['toUsers']);// it will  save in to reciver table with Task ID.
				$toUsers 		= 	array_filter($toUsers); 
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send toUsers to the server.');
		}
	
		
		if(isset($postForm['ccUsers']))
		{
			
			if($postForm['ccUsers']==''){
					
					$ccUser 		= array();
			
				}else{
						$ccUser			=	explode(",",$postForm['ccUsers']);// it will save in to carbon copy table with task id.
						$ccUser 		= 	array_filter($ccUser); 
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send ccUsers to the server.');
		}		
		
		
		if(!isset($postForm['tags'])){
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send tag param tags');
		}
		
		$taskType			=	0; //defualt - Main Task.
		
		if(count($validationArr)>0){
			
			echo json_encode($validationArr);
			die();
		}
		
		 if(isset($postForm['taskType'])){
				
				$taskType			=	 $postForm['taskType'];
			}
			
			if(isset($postForm['status'])){
			
				$status			=	 $postForm['status'];
			
			}else{
				$status			=	 0;
			}
		
			if(isset($postForm['functionalityType'])){
			
				$functionalityType				=	$postForm['functionalityType'];

			}else{
				
				$functionalityType				=	0;
			
			
			if(count($toUsers)==1){
				
				//Task for self or  individual.
				if($toUsers[0]==$postForm['orginatorID']){
					//self / My To Do.
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
			
			$Tags 			=	array();
			
			if(isset($postForm['tags']) && $postForm['tags']!=''){
				
				
				$strTags 		=	str_replace("[", "" , $postForm['tags']);
				$strTags 		=	str_replace("]", "" , $strTags);
				$Tags 			=	explode(",", $strTags);
				$TagsJson		=	json_encode(array_filter($Tags));
			
			}else{
				
				$TagsJson		=	'';
			}
			
			//Saving data into task table.
			$saveData			=	array(
											'taskName'=>$postForm['taskName'],
											'taskDescription'=>$postForm['taskDescription'],
											'orginatorID'=>$postForm['orginatorID'],
											'ccID'=>$postForm['ccUsers'],
											'recieverID'=>$postForm['toUsers'],
											'tagID'=>$postForm['tags'],
											'taskTags'=>$TagsJson,
											'status'=>$status,
											'funtionalityType'=>$functionalityType,
											'allotmentDate'=>$postForm['startDate'],
											//'allotmentDate'=>date('Y-m-d'),
											'dueDate'=>$postForm['dueDate']
				);
			
			if($this->db->insert($this->db->dbprefix('api_tasks'),$saveData))
			{
				$taskID	=	$this->db->insert_id();
				$this->assign_task_to_reciver($taskID,$toUsers);
				$this->assign_task_cc_reciver($taskID,$ccUser);
				
				if($postForm['tags']!=''){
					
					$this->map_task_tags($taskID,$Tags,$postForm['orginatorID']);
				}
			
				//attachementID
				
				if(isset($postForm['attachementID'])){
					
					if($postForm['attachementID']!=''){
						
						$attachementArrID		=  explode(",",$postForm['attachementID']);
						$this->map_media_with_task($attachementArrID,$postForm['orginatorID'],$taskID,$attachementFor='Task');
					
					}
				}
			
				$this->load->model('tasks_model');
				
				$TaskDetail			=	 $this->tasks_model->get_task_detail($taskID);
				
				$action				=	"New task created by ".$TaskDetail->firstName." ".$TaskDetail->lastName." - ".$postForm['taskName'];
				echo json_encode(array('action'=>'success', 'message'=>'Task has been  created successfully.', "taskID"=>$taskID));
				
				
				$reciepient		=	array_merge($toUsers,$ccUser);
				
				
				$Data			=	array(
											'type'=>'task',
											'action'=>'create',
											'message'=>$action,
											'data'=>$TaskDetail	
										);
				
			
			/*
				$Data			=	array(
											'action'=>'create_task',
											'message'=>$action,
											'taskName'=>'dddd',
											'taskID'=>2	
										);
			*/
				
				
				//Send Push Notification  to  the server
				send_push_notification_android_fcm($reciepient, $Data,'development');
				
				$this->set_task_log($taskID , $postForm['orginatorID'],$action, $TaskDetail,'New Task Created');
			
			}

		}//End of valid data block.
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
	function map_task_tags($taskID=null,$data=array(),$orginatorID=null)
	{
		
		$flag			=	false;
		
		foreach($data as $val)
		{	
			
			$SaveMasterTag			=	array(
												'tagText'=>$val,
												'createdDate'=>date('Y-m-d'),
												'userID'=>$orginatorID
											 );
			
			$select  		=	$this->db->select('tagID,tagText')
										  ->from($this->db->dbprefix('api_tag_master'))
										  ->where(array('tagText'=>$val))
										  ->get()
			
							  ->row();
			
		if(count($select)==0){
			
			if($this->db->insert($this->db->dbprefix('api_tag_master'), $SaveMasterTag)){
				
				//new 
				$tagId			=	$this->db->insert_id();
				$saveData		=	array('taskID'=>$taskID,'tagID'=>$tagId,'userID'=>$orginatorID);
				if($this->db->insert($this->db->dbprefix('api_tag_task'),$saveData))
				{
				
						$this->map_user_tags($orginatorID,$tagId);

				}
			}
		
		}else{
				//old 	
				$tagId			=	$select->tagID;
				$saveData		=	array('taskID'=>$taskID,'tagID'=>$tagId,'userID'=>$orginatorID);
				if($this->db->insert($this->db->dbprefix('api_tag_task'),$saveData))
				{
					$this->map_user_tags($orginatorID,$tagId);


				}
		}
	}

 }
	///adding tag  ref to users 
	function map_user_tags($userID=NULL, $tagID=NULL)
	{
				$saveData		=	array('userID'=>$userID,'tagID'=>$tagID);
				$count			=	$this->db->select('tagID')
											->from($this->db->dbprefix('api_user_tags'))	
											->where($saveData)
											->get()
											->num_rows();
			if($count==0){
				
				if($this->db->insert($this->db->dbprefix('api_user_tags'),$saveData))
				{

				}
			}
	}
	
	//End of adding ref to  users 
	//Get ogriniator  Task....
	function get_all_task_orginators()
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
	function get_task_by_me_old()
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
	
	// Task Created by me.. new  
	function get_task_by_me()
	{
		
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!='')
		{
		
			$userID			=	$_REQUEST['userID'];
			
		}else{
			
			echo json_encode(array('acrion'=>'error', 'message'=>'user id is not comming'));
			die();
		}
	}
	
	//Task Created by me.. new
	
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
			$TaskDetail					=	 $this->tasks_model->get_task_detail($_REQUEST['taskID']);
			
			
			
			$mediaAttached				=	$this->get_attached_media($_REQUEST['taskID'],'Task');
			
			if(count($TaskDetail)>0){
				
				$TaskDetail->mediaData		=	$mediaAttached;
			}
			
			echo json_encode(array('action'=>'success',  'taskData'=>$TaskDetail));
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Task id is not available.'));
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
				$this->set_task_log($_REQUEST['taskID'], $_REQUEST['userID'],$action, $TaskDetail,'update Task');
			
			}else{
				
				echo json_encode(array('action'=>'fail','error'=>200,'message'=>'Please contact api administraator to fix this issue.'));
			}
		}
	}

	
	function set_task_log($taskID= 0,$userID = 0, $actions='test',$Arr=array(),$title='')
	{
		
		$saveData		=	array(
										'taskID'=>$taskID,
										'actions'=>$actions,
										'userID'=>$userID,
										'json'=>json_encode($Arr),
										'createdDate'=>date('Y-m-d'),
										'title'=>$title,
										'act'=>str_replace(" ","_",strtolower($title))
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

	//it is gloal.
	function get_user_info()
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

	#### TASK  SECTION
	//DAS Tasks
	function get_user_task_count()
	{
		$Arr			=	array();
		
		if(isset($_REQUEST['contactNo']) && $_REQUEST['contactNo']!=''){
			$contactNo			=		 $_REQUEST['contactNo'];
		}else{
			$Arr['conatctNo']			=	'Please send contact no';
		}

		if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){
			$code			=		 $_REQUEST['code'];
		
		}else{
		
			$Arr['code']			=	'Please send code';
		
	    }
		
		if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!=''){
			$deviceID			=		 $_REQUEST['deviceID'];
		
		}else{
		
			$Arr['deviceID']			=	'Please send deviceID';
		
	    }
		
		if(count($Arr)>0){
			
			echo  json_encode(array('action'=>'error', 'message'=>$Arr));
			die();
		}
		
		$Condition						=	array('contactNo'=>$contactNo,'countryPhoneCode'=>$code,'deviceID'=>$deviceID);
		$userData						=   $this->user->get_user_info($Condition);
		
		if(count($userData)>0){
			
			$userID							=	$userData->userID;
		
		}else{
			
			echo  json_encode(array('action'=>'error', 'message'=>'useris not exit'));
			die();
		}
		
		$tempArr 						=	array();
		$AllCount  						=  $this->tasks_model->get_all_task_count($userID,'all');	
		
		$tempArr['All']					=	$AllCount;
		$to_me_Count  					=   $this->tasks_model->get_all_task_count($userID	,'tome');
	
		$tempArr['To Me']				=	$to_me_Count;
		$by_me_Count  					=   $this->tasks_model->get_all_task_count($userID	,'byme');

		$tempArr['By Me']				=	$by_me_Count;
		$my_to_do_Count  				=   $this->tasks_model->get_all_task_count($userID	,'mytodo');
	
	
		$tempArr['My To Do']			=	$my_to_do_Count;
		$following_Count  				=   $this->tasks_model->get_all_task_count($userID	,'following');
		
		$tempArr['Following']		=	$following_Count;
		echo json_encode($tempArr);
	
	}

	//Home page -  
	function get_tasks_at_home()
	{
		
		$Arr			=	array();
		
		
		if(isset($_REQUEST['userID'])){
		
			if($_REQUEST['userID']!=''){
					$userID					=	$_REQUEST['userID'];
			}
		}
		
		if(isset($_REQUEST['contactNo']) && $_REQUEST['contactNo']!=''){
		
			$contactNo			=		 $_REQUEST['contactNo'];
		
		}else{
			
			$Arr['conatctNo']			=	'Please send contact no';
		}
		
		if(isset($_REQUEST['code']) && $_REQUEST['code']!=''){
			
			$code			=		 $_REQUEST['code'];
		
		}else{
			
			$Arr['code']			=	'Please send code';
		}
	
		if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!=''){
		
			$deviceID			=		 $_REQUEST['deviceID'];
		
		}else{
			
			$Arr['deviceID']			=	'Please send deviceID';
		}
		
		if(isset($_REQUEST['tabval']) && $_REQUEST['tabval']!=''){
			
			$tabval			=	$_REQUEST['tabval'];
		
		}else{
			
			$tabval			=	'all';	
		}
		
		if(count($Arr)>0){
			
			echo  json_encode(array('action'=>'error', 'message'=>$Arr));
			die();
		}
		
		//$Condition					=		array('contactNo'=>$contactNo,'countryPhoneCode'=>$code,'deviceID'=>$deviceID,'U.status'=>'1');
		
		$Condition					=		array('userID'=>$userID,'U.status'=>'1');
		
		$userData					=   	$this->user->get_user_info($Condition);
		
		if(count($userData)>0){
			
				$userID							=	$userData->userID;
				
				if($userData->deviceID!=$deviceID)
				{
					
					echo  json_encode(array('action'=>'error','auth'=>'false', 'message'=>"Your device has been changed."));
					die();
				}
		
			}else{
			
			echo  json_encode(array('action'=>'error','auth'=>'false', 'message'=>"invalid user,may be deactivated or deleted."));
			die();
		}
		
		//get All Task for the users...
		
		$functionalityTypeID		=	0;
		if(isset($_REQUEST['groupID'])){
			
			if($_REQUEST['groupID']!=''){
				
				$functionalityTypeID	=	 $_REQUEST['groupID'];
			}
		}

		if(isset($_REQUEST['momID'])){
			
			if($_REQUEST['momID']!=''){
				
				$functionalityTypeID	=	 $_REQUEST['momID'];
			}
		}	
		
		$DataTask	=	$this->tasks_model->get_tasks_at_home($userID, $tabval,$functionalityTypeID);
		
		//echo "<pre>";
		//print_r($DataTask);
		
		$tempData 			=	array();
		
		
		echo json_encode(array("action"=>'success','auth'=>'true','message'=>'success' ,'dataValue'=>$DataTask));
	
	}
	
	//check local contact  number. 
	function get_local_marked_contact_number()
	{
		
		if(isset($_REQUEST['conatctList']) && $_REQUEST['conatctList']!='')
		 {
			$phoneContact 		=	explode("|", $_REQUEST['conatctList']);
		 }
	
		if(count($phoneContact)==0){
			
			echo json_encode(array("action"=>"error","message"=>'please send conatct numbers.'));
			die();
		}
		
		$TempArr1			=	array();
		$TempArr2			=	array();
		
		foreach($phoneContact as $conatct){
			
			if($conatct!='')
			{
				
				$expload		=	explode(",", $conatct);	
				$dataGamming	=	$this->user->get_check_active_user($expload[1]);
				
				if($dataGamming){
				
				/*
				$TempArr1[] 	=	array(
										'flag'=>'Y',
										'userData'=>array(
											//'firstName'=>$dataGamming->firstName,
											//'lasttName'=>$dataGamming->lastName,
											'contactNo'=>$dataGamming->contactNo,
											'userPhoto'=>$dataGamming->userPhoto
										)
								);
								
				*/
				
				 $dataGamming->PhoneContactName		=   $expload[0];// phone name..
				 $dataGamming->Contactavail		=   'Y';
				 $TempArr1[] 						=	$dataGamming;
				
				}else{
					
					$TempArr2[]	=	array(
										'Contactavail'=>'No',
										'contactNo'=>$expload[1],
										'PhoneContactName'=>$expload[0]
									);
				}
			}		
		}
		$TempArr = array_merge($TempArr1, $TempArr2);
		echo json_encode($TempArr);
		//echo json_encode($TempArr1);
		die();
	
	}
	//End of local contact number.
	
	//Draft...
	function save_task_draft()
	{
		
		if(!isset($_REQUEST['orginatorID']))
		{
			
			echo json_encode(array('action'=>'error','message'=>'please send orginator id.'));
			die();
		}
		
		$Data		=	array(
								'userID'=>$_REQUEST['orginatorID'],
								'taskDetail'=>json_encode($_REQUEST),
								'createdDate'=>date('Y-m-d')
							); 
		
		if($this->db->insert($this->db->dbprefix('api_draft_tasks'),$Data)){
			
			echo json_encode(array('action'=>'success','message'=>'draft save succesfully.'));
		}
		
		die();
	}

	//End Draft.
	function get_drafted_task()
	{
		
		$Validationerror			=	array();
		
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']==''){
			
			echo  json_encode(array('action'=>'error', 'message'=>'please send userID'));
			die();
		}
		
		$draftData 	=	$this->db->select('taskDetail')
		          ->from($this->db->dbprefix('api_draft_tasks'))
	              ->where(array('userID'=>$_REQUEST['userID']))
				  ->get()
				  ->result();
		
		$tempArr		=	array();
		
		foreach($draftData as $val){
		
			$jsonObj			=  json_decode($val->taskDetail);	
			$jsonObj->toUsers	=	$this->user->get_multiple_active_users($jsonObj->toUsers);
			$jsonObj->ccUsers	=	$this->user->get_multiple_active_users($jsonObj->ccUsers);				
			$tempArr[]			=	$jsonObj;
		}
		
		echo json_encode($tempArr);
		
	}
	
	// Get my Tags  
	function get_user_tags()
	{
		
		if(isset($_REQUEST['userID'])){
			
			if($_REQUEST['userID']==''){
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send user id'));
				die();
			
			}else{
				
				$userID 		=		$_REQUEST['userID'];
			  }
		
		}else{
			
			echo  json_encode(array('action'=>'error', 'message'=>'Please send userID is not set please set userID'));
			die();
		}
		
		$tagData = $this->db->select('TM.tagText')
						 ->from($this->db->dbprefix('api_tag_master as TM'))
						 ->join($this->db->dbprefix('api_user_tags UT') ,'TM.tagID=UT.tagID')
						 ->where(array('UT.userID'=>$userID))
						 ->get()
						 ->result();
		
		echo json_encode(array('action'=>'success', 'message'=>'success', 'tagData'=>$tagData));
	}
	
	//TASK SECTION
	
	//chnage Task field 
	function chnage_task_params_value()
	{
	
    	$messageFlag 		=		false;
		$action				=     '';	
		
		if(isset($_REQUEST['userID']) && $_REQUEST['userID']!='')
		{
			
			$userID		=	 $_REQUEST['userID'];
			//get user info..
			$conditionArr		=	array(
											'U.userID'=>$userID	,
											'U.status'=>'1'
										);
			
			$dataGamming	=	$this->user->get_user_info($conditionArr);
			
			if(count($dataGamming)==0){
				
				echo json_encode(array('action'=>'error', 'message'=>'you are not authentic user to change task info.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'please send userid'));
			die();
		}	
	
		if(isset($_REQUEST['contactNo']) && $_REQUEST['contactNo']!='')
		{
		
			$contactNo		=	 $_REQUEST['contactNo'];
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'please send contact number'));
			die();
		}
		
		if(isset($_REQUEST['deviceID']) && $_REQUEST['deviceID']!='')
		{
			
			$deviceID		=	 $_REQUEST['deviceID'];
		
		}else{
		
			echo json_encode(array('action'=>'error', 'message'=>'please send deviceID.'));
			die();
		}
	
		if(isset($_REQUEST['appKey']) && $_REQUEST['appKey']!='')
		{
		
			$appKey		=	 $_REQUEST['appKey'];
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'please send appkey.'));
			die();
		}
	
	
		if(isset($_REQUEST['paramName'])){
		
		//Upload photo.. 
		if($_REQUEST['paramName']=='ophoto'){
		
				if(isset($_REQUEST['paramValue'])&& $_REQUEST['paramValue']!=''){
					
					$this->db->where(array('userID'=>$userID));
					
					if($this->db->update($this->db->dbprefix('api_users'),array('userPhoto'=>$_REQUEST['paramValue']))){
						
						echo json_encode(array('action'=>'success','message'=>'value has been updated succesfully.'));
						die();
					}
			
				}else{
					
					echo json_encode(array('action'=>'success','message'=>'photo path is not comming.'));
					die();
				}	
		
		}
		
		// End of photo upload..
		
		$fields 	= 	$this->db->field_data($this->db->dbprefix('api_tasks'));
		$myField	=	array();
	
		if(isset($_REQUEST['taskID']) && $_REQUEST['taskID']!=''){
			
			$taskID 			=	$_REQUEST['taskID'];
			
			
			$TaskDetail			=	 	$this->tasks_model->get_task_detail($taskID); // task Detail...
			
			if(count($TaskDetail)==0){
				
				echo json_encode(array('action'=>'error','message'=>"Task  is not available."));
				die();
			}
		
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'please send task id.'));
			die();
		
		}
		
		
		$toUsers		=	explode(",",$TaskDetail->recieverID);
		$ccID			=	explode(",",$TaskDetail->ccID);
		$reciepient		=	array_filter(array_merge($toUsers,$ccID));
		
		foreach($fields as $val){
			
				if($_REQUEST['paramName']===$val->name){
					
					$myField[$val->name]		=	$_REQUEST['paramValue'];
					break;
				}
		 }
	
		if(count($myField)==0){
			
			echo json_encode(array('action'=>'error', 'message'=>'please send params name and params value.'));
			die();
		}
		
		if($_REQUEST['paramName']=='taskID')
		{
			echo json_encode(array('action'=>'error','message'=>'it can not be changed send valid parmas name.'));
			die();
		}
		
		//adding or removing more tags...
		if($_REQUEST['paramName']=='taskTags')
		{
				$strTags 		=	str_replace("[", "" , $_REQUEST['paramValue']);
				$strTags 		=	str_replace("]", "" , $strTags);
				$Tags 			=	explode(",", $strTags);
				$TagsJson		=	json_encode(array_filter($Tags));
				$myField[$_REQUEST['paramName']]	=	$TagsJson;
				$this->map_task_tags($taskID, $Tags,$_REQUEST['userID']);
				$action				=        "Tags".$strTags."  are added by ".$dataGamming->firstName." ".$dataGamming->lastName;
		}
	
		//adding or removing more tags...
		if($_REQUEST['paramName']=='taskName')
		{
			$action				=        "Task name changed from '".$TaskDetail->taskName."' to  '".$_REQUEST['paramValue']."'  by ".$dataGamming->firstName." ".$dataGamming->lastName;
		}
		
		//adding or removing more tags...
		if($_REQUEST['paramName']=='taskDescription')
		{
			$action				=        " task description changed by ".$dataGamming->firstName." ".$dataGamming->lastName;
		}
		
		if($_REQUEST['paramName']=='dueDate')
		{
			
			$action				=        "Due date changed by ".$dataGamming->firstName." ".$dataGamming->lastName;
		}
		
		//Adding more cc..
		if($_REQUEST['paramName']=='ccID')
		{
			
			if($TaskDetail->ccID!='')
            {
				$explodeArr		=	explode(",",	$TaskDetail->ccID);
				$explodeNewArr	=	explode(",",	$_REQUEST['paramValue']);
				$reciver		=	array_unique(array_merge($explodeNewArr,$explodeArr));
				$reciepient		=	$reciver;
				$myField[$_REQUEST['paramName']]	=	implode("," , $reciver);
				
				$conditionArr		=	array(
											'U.userID'=>$_REQUEST['paramValue'],
											'U.status'=>'1'
										);
				
				$ReciverName		=	$this->user->get_user_info($conditionArr);
				$messageFlag		=	"Participant has been added succesfully.";
				
				$action			   =	$ReciverName->firstName." ".$ReciverName->lastName." marked as following this task";
				
			}
		}
		
		// Adding more recieverID...
		if($_REQUEST['paramName']=='recieverID')
		{
		
			if($TaskDetail->recieverID!='')
			{
				$explodeArr		=	explode(",",	$TaskDetail->recieverID);
				$explodeNewArr	=	explode(",",	$_REQUEST['paramValue']);
				$reciver		=	array_unique(array_merge($explodeNewArr,$explodeArr));
				$reciepient		=	$reciver;
				$myField[$_REQUEST['paramName']]	=	implode("," , $reciver);
				$myField['funtionalityType']		=	2;
				$messageFlag 		=		"Participant has been added succesfully.";
				
				$conditionArr		=	array(
											'U.userID'=>$_REQUEST['paramValue'],
											'U.status'=>'1'
										);
				
				$ReciverName		=	$this->user->get_user_info($conditionArr);
				$messageFlag		=	"Participant has been added succesfully.";
				$action			   =	$ReciverName->firstName." ".$ReciverName->lastName." is added in this task.";
			
			}
		
		}
		
		//Revised date.
		if($_REQUEST['paramName']=='revisedDate')
		{
			//date is revised...change the due date... 
			//echo json_encode(array('action'=>'error','message'=>'under development.'));
			//die();
		
		}
		
		
		//Revised date.
		if($_REQUEST['paramName']=='status')
		{
			
			
			switch($_REQUEST['paramValue']){
				
				case 'Completed':
				$myField[$_REQUEST['paramName']]		=	4;
				$messageFlag 		=		"Task has status has been chnaged succesfully.";
				$action				=       "Task status changed from '".$TaskDetail->statusText."' to '".$_REQUEST['paramValue']."' by ".$dataGamming->firstName." ".$dataGamming->lastName;		
				break;
				case 'Declined':
				$myField[$_REQUEST['paramName']]		=	1;
				$messageFlag 		=		"Task has status has been chnaged succesfully.";
				$action				=       "Task status changed from '".$TaskDetail->statusText."' to '".$_REQUEST['paramValue']."' by ".$dataGamming->firstName." ".$dataGamming->lastName;
				break;
				case 'Closed':
				
				$myField[$_REQUEST['paramName']]		=	6;
				$messageFlag 		=		"Task has status has been changed succesfully.";
				
				$action				=       "Task status changed from '".$TaskDetail->statusText."' to '".$_REQUEST['paramValue']."' by ".$dataGamming->firstName." ".$dataGamming->lastName;
				
				break;
				case 'deleteTask':
				if($this->delete_task($taskID))
				{
					//6
					$action					=       "Task has deleted by ".$dataGamming->firstName." ".$dataGamming->lastName;
					$messageFlag 			=		"Task has been deleted successfully.";
					
					$this->set_task_log($_REQUEST['taskID'], $_REQUEST['userID'],$action, $TaskDetail);
					echo json_encode(array('action'=>'success','message'=>$messageFlag));
					die();
				}
				break;
		}
			
			//date is revised...change the due date... 
			///echo json_encode(array('action'=>'error','message'=>'under development.'));
			//die();
		
		}
		

		$this->db->where(array('taskID'=>$taskID));
		if($this->db->update($this->db->dbprefix('api_tasks'),$myField))
		{
			
			if($action!=''){	
				
			
				$Data			=	array(
											'type'=>'task',
											'action'=>'update',
											'message'=>$action,
											'data'=>$TaskDetail,
										);
				
				
				//Send Push Notification  to  the server
				
				if($_REQUEST['paramName']!=''){
					
					
					
					
					send_push_notification_android_fcm($reciepient, $Data,'development');
					$this->set_task_log($_REQUEST['taskID'], $_REQUEST['userID'],$action, $TaskDetail,'task update');
				}
			}	
			
			if($messageFlag){
				
				echo json_encode(array('action'=>'success','message'=>$messageFlag));
				die();
			
			}else{
				
				echo json_encode(array('action'=>'success','message'=>'value has been updated succesfully.'));
				die();
			}
		}
	
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'please send params name.'));
		}
 }

	function delete_task($taskID=NULL)
	{
		$this->db->where('taskID', $taskID);
        if($this->db->delete($this->db->dbprefix('api_tasks'))){
			return true;
		} 			
	}	

	//Get task history... 
	function get_task_history()
	{
		
		if(isset($_REQUEST['deviceID'])){
		
			if($_REQUEST['deviceID']!=''){
				
				$deviceID		=	 $_REQUEST['deviceID'];
				
			}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send deviceID'));
				die();
			}
		
		}else{
			
			echo  json_encode(array('action'=>'error', 'message'=>'Please send deviceID'));
			die();
		}
		
		if(isset($_REQUEST['userID'])){
			
			if($_REQUEST['userID']!=''){
			
				$userID		=	 $_REQUEST['userID'];
			
			}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send userID'));
				die();
			}
		
		}else{
			
			echo  json_encode(array('action'=>'error', 'message'=>'Please send userID'));
			die();
		}
	
		if(isset($_REQUEST['taskID'])){
		
				if($_REQUEST['taskID']!=''){
					
					$taskID		=	 $_REQUEST['taskID'];
				
				}else{
					
					echo  json_encode(array('action'=>'error', 'message'=>'Please send task Id'));
					die();
				}
	
		}else{
			
			echo  json_encode(array('action'=>'error', 'message'=>'Please send task Id'));
			die();
		}
		
		$data	    = $this->db->select('taskID,createdDate,title,actions,act')
					->from($this->db->dbprefix('api_log_task'))
					->where('taskID', $taskID)
					->get()
					->result();
		
		
		$TaskDetail			=	 	$this->tasks_model->get_task_detail($taskID); // task Detail...
		echo json_encode(array('action'=>'success',"logData"=>$data,'taskData'=>$TaskDetail));
		
	
	}
	
	//End  of task hostory..
	
	//Change Task request API..
	function change_task_deadlin_request()
	{
		
		//Start of validations.....
		if(isset($_REQUEST['userID'])){
		
			if($_REQUEST['userID']==''){
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send user Id'));
				die();
			
			}else{
			
				$userID 	=		$_REQUEST['userID'];
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send user Id'));
			die();
		}
		
		if(isset($_REQUEST['taskID'])){
			
			if($_REQUEST['taskID']==''){
			
				echo json_encode(array('action'=>'error', 'message'=>'Please send task Id'));
				die();
				
			}else{
				
				$taskID 		=	$_REQUEST['taskID'];
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send task Id'));
			die();
		}
		
		if(isset($_REQUEST['requestedDateTime'])){
			
			if($_REQUEST['requestedDateTime']!=''){
			
				$requestDateTime		=  $_REQUEST['requestedDateTime'];		
			
			}else{
			
				echo json_encode(array('action'=>'error', 'message'=>'Please send requested date and time'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send requested date and time'));
			die();
		}
		
		if(isset($_REQUEST['remark'])){
		
			if($_REQUEST['remark']!=''){
			
				$remark 		=	$_REQUEST['remark'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send remark'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send remark'));
			die();
		}
	///End of validation...
	
	$TaskDetail			=	 	$this->tasks_model->get_task_detail($taskID); // task Detail...
	
	if(count($TaskDetail)==0){
	
		echo json_encode(array('action'=>'error', 'message'=>'task is not available please contact to the administrator.'));
		die();
	
	}else{
		
		//echo "<pre>";
		//print_r($TaskDetail);

		$requestSave			=	array(
												'taskID'=>$taskID,
												'userID'=>$userID,
												'taskOrginatorID'=>$TaskDetail->orginatorID,
												'taskDueDate'=>$TaskDetail->dueDate,
												'requestedDate'=>$requestDateTime,
												'remark'=>$remark,
												'actionFrom'=>'reciever',
												'taskDetailJson'=>json_encode($TaskDetail),
												'funType'=>$TaskDetail->funType,
												'createdDate'=>date('Y-m-d')
										);
		
		if($this->db->insert($this->db->dbprefix('request_deadline_change'),$requestSave))
		{
		
			//save in log and send Push notification to the task orginator for  accepting/rejecting the task.	
			
			
			$action		=	"Deadline change request of task ".$TaskDetail->taskName;
			
			$Data			=	array(
										'type'=>'task',
										'action'=>'change_deadline',
										'message'=>$action,
										'data'=>$TaskDetail,
									);
											
			
			$recipient				=	explode(",", $TaskDetail->ccID);
			$recipient[]			=	$TaskDetail->orginatorID;
			$recipient				=	array_unique($recipient);
			
			send_push_notification_android_fcm($recipient, $Data,'development');
			
			$this->set_task_log($_REQUEST['taskID'],$userID, $action, $TaskDetail);
			echo json_encode(array('action'=>'success','message'=>'change dead line request send succesfully.'));
			die();
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'contact with administraator.'));
			die();
		}
	}
  }
   ///
	function  change_task_deadlin_request_accepted_rejected()
	{
		
		if(isset($_REQUEST['requestChangeDeadlineID'])){
			
				if($_REQUEST['requestChangeDeadlineID']!=''){
					
					$requestChangeDeadlineID	=	$_REQUEST['requestChangeDeadlineID'];
				
				}else{
					
					echo json_encode(array('action'=>'error', 'message'=>'Please send request change deadline id.' ));
					die();	
				}
			
		}else{
			
				echo json_encode(array('action'=>'error', 'message'=>'Please send request change deadline id.' ));
				die();
		}
	
		//-- 1
		
		if(isset($_REQUEST['requesterUserID'])){
			
			if($_REQUEST['requesterUserID']!=''){
				
				$requesterUserID	=	$_REQUEST['requesterUserID'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send requester user id.'));
				die();	
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send requester user id.'));
			die();
		}	
		
		//-- 2
		
		if(isset($_REQUEST['taskID'])){
			
			if($_REQUEST['taskID']!=''){
				
				$taskID	=	$_REQUEST['taskID'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send task id.'));
				die();	
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send requester task id.'));
			die();
	}	
	
	//-- 2
	
		if(isset($_REQUEST['userID'])){
			
			
			if($_REQUEST['userID']!=''){
			
				$userID	=	$_REQUEST['userID'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send user id.'));
				die();	
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send  user id.'));
			die();
		}	
	
		//-- 2
	
		if(isset($_REQUEST['status'])){
			
			
			if($_REQUEST['status']!='')
			{
				
				$status	=	$_REQUEST['status'];
			
			}else{
			
				echo json_encode(array('action'=>'error', 'message'=>'Please send status.'));
				die();	
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send status.'));
			die();
		}	
		
		switch($status){
			
			case 'rejected':
				echo json_encode(array('action'=>'success', 'message'=>'Task rejection in under development.'));
				die();
			break;
			case 'accepted':
				echo json_encode(array('action'=>'success', 'message'=>'Task accepted in under development.'));
				die();
			break;
		}
	
	}
	
	
	////GROUP  SECTION START.....
	//Creatng Group
	function create_group()
	{
		
		$errorArr					=	array();
		$groupUsers					=	array();
		
		if(isset($_REQUEST['createdBy']))
		{
			
			if($_REQUEST['createdBy']!=''){
			
				$createdBy			=	$_REQUEST['createdBy'];
			
			}else{
					$errorArr['createdBy']					=	"Please send userid.";
			}
			
		}else{
			
			$errorArr['createdBy']					=	"Please send userid.";
		
		}
		
		if(isset($_REQUEST['groupName']))
		{
			
			if($_REQUEST['groupName']!=''){
					
					$groupName			=	$_REQUEST['groupName'];
			}else{
					$errorArr['groupName']					=	"Please enter group name.";
					//echo json_encode(array('action'=>'error','message'=>'Please enter group name'));
			}
		
		}else{
			
			$errorArr['groupName']					=	"Please enter group name.";
		}
		
		//Default Creator will  be a admin of the group.
		if(isset($_REQUEST['groupUsers']))
		{
			
			if($_REQUEST['groupUsers']!=''){
			
				$groupUsers			=	$_REQUEST['groupUsers'];
			
			}else{
				
				$errorArr['groupUsers']					=	"Please sent group member(s).";
			}
			
		}else{
			
			$errorArr['groupUsers']						=	"Please sent group member(s).";
		}
		
		if(isset($_REQUEST['groupDescription']))
		{
			
			if($_REQUEST['groupDescription']!=''){
					
					$groupDescription							=	$_REQUEST['groupDescription'];
			}else{
				
				$errorArr['groupDescription']					=	"Please enter group description.";
			}
		
		}else{
			
			$errorArr['groupDescription']					   =	"Please enter group description.";
		}
		
		$groupPhoto			=	'defualtGroPhoto';
		
		if(isset($_REQUEST['groupPhoto']))
		{
			
			if($_REQUEST['groupPhoto']!=''){
				
				$groupPhoto			=	$_REQUEST['groupPhoto'];
			
			}else{
				
				$groupPhoto			=	base_url()."/assets/images/logo.png";
			
			}
			
		}else{
			
			$groupPhoto			=	base_url()."/assets/images/logo.png";
		}
		
		if(count($errorArr)>0){
			
			echo json_encode(array('action'=>'error', 'message'=>$errorArr));
		
		}else{
		
		
			$av_flag		= $this->group_model->check_group_name_available($groupName,'bmh');
			
			if($av_flag){
			
				///$errorArr['groupNameAvailable']			= "group name already exist,please enter another group name."; 
				echo json_encode(array('action'=>'error', 'message'=>'group name already exist,please enter another group name.'));
				die();
			}
			
			$saveData			=	array(
											'groupName'=>$groupName,
											'groupDescription'=>$groupDescription,
											'groupPhoto'=>$groupPhoto,
											'createdDate'=>date('Y-m-d H:i:s'),
											'createdBy'=>$createdBy,
											'status'=>'1'
										);
			
			// check group  already exist.
			if($this->db->insert($this->db->dbprefix('api_groups'),$saveData))
			{
				
				$groupID	=	$this->db->insert_id();
				
				if($this->db->insert($this->db->dbprefix('api_group_users'),array('userID'=>$createdBy,'groupID'=>$groupID,'is_admin'=>'1','make_admin_by'=>$createdBy,'groupCreator'=>'1')))
				{
				
					$this->add_group_members($groupUsers,$groupID,$createdBy);
					
					
					$saveData	= $this->group_model->get_group_detail($groupID,$createdBy);
					unset($saveData->recievedTaskData);
					unset($saveData->givenTaskData);
					//unset($saveData->data->modifiedDate);
					//unset($saveData->data->status);
					//echo json_encode($saveData);
					
					
					$Data					=	array(
													'type'=>'group',
													'action'=>'create',
													'message'=>'new group is created by '.$saveData->firstName." -".$groupName,
													'data'=>$saveData
												);
					
					$reciepient				   =   	explode(",",$groupUsers);
					
					//echo "<pre>";
					//print_r($reciepient);
					
					send_push_notification_android_fcm($reciepient, $Data);
					
					echo json_encode(array('action'=>'success', 'message'=>'Group has been created successfully.', 'data'=>$saveData));
					
					
				
				}
			
			}else{
					echo json_encode(array('action'=>'error', 'message'=>'database issue please contact to the administrator.'));
			
			}
		}
	}
	//End creating group..
	
	//Add Group Members
	function add_group_members($groupUsers, $groupID,$createdBy)
	{
		
		//echo "==".$groupUsers."---";
		
		if($groupUsers!=''){
			
			$exploadArr			=	explode(",",$groupUsers);
			
			if(count($exploadArr)>0)
			{
			    foreach($exploadArr as  $user)
				{
						
					if($user>0){	
					
						if($createdBy!=$user){	
						
							if($this->db->insert($this->db->dbprefix('api_group_users'),array('userID'=>$user,'groupID'=>$groupID,'is_admin'=>'0')))
							{
								//return true;
							}
						}
					
					}	
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
	//// GROUP  SECTION END.....
	//Group detail section.
	function get_group_detail()
	{
		
		if(isset($_REQUEST['groupID'])){
			
			if($_REQUEST['groupID']!=''){
				
				$groupID		=  $_REQUEST['groupID'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send group id.--'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send group id.'));
			die();
		}
		
		if(isset($_REQUEST['userID'])){
		
			if($_REQUEST['userID']!=''){
				
				$userID		=  $_REQUEST['userID'];
			
			}else{
				
				echo json_encode(array('action'=>'error', 'message'=>'Please send group id.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error', 'message'=>'Please send group id.'));
			die();
		}
		
		if(isset($_REQUEST['deviceID'])){
			
			if($_REQUEST['deviceID']!=''){
				$deviceID		=	$_REQUEST['deviceID'];
			
			}else{
				echo json_encode(array('action'=>'error', 'message'=>'Please send device id.'));
					die();
			}
			
		}else{
			echo json_encode(array('action'=>'error', 'message'=>'Please send device id.'));
			die();
		}
		
		//Start Auth Authentication on. 
			// Required- userID, DeviceID,contactNo.
		//End of Authentication.. 
		
		echo json_encode(array("action"=>'success',"groupData"=>$this->group_model->get_group_detail($groupID,$userID)));
	
	}

	//choose a user to assign task.
	/*
	function create_task_in_a_group_old()
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
  */

   function add_members_in_a_group()
   {

	
	if(isset($_REQUEST['groupID'])){
			
			if($_REQUEST['groupID']!=''){
				
				$groupID 	=	 $_REQUEST['groupID'];
			
			}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send group id.'));
				die();
			}
		
		}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send a groupID to the server.'));
				die();
		}
		
		
		if(isset($_REQUEST['userID'])){
			
			if($_REQUEST['userID']!=''){
				
				$userID 	=	 $_REQUEST['groupID'];
			
			}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send user id.'));
				die();
			}
		
		}else{
				
				echo  json_encode(array('action'=>'error', 'message'=>'Please send a userID to the server.'));
				die();
		}

	}

	//Create Task.
	function create_task_in_a_group()
	{
		
		$postForm			=	$_REQUEST;
		$validationArr		=  array();
		
		if(isset($_REQUEST['groupID']) && $_REQUEST['groupID']!=''){
			
			$groupID					=	$_REQUEST['groupID'];
		
		}else{
			
			$validationArr[]			=	"Please send group  id";
	   }
		
		if(isset($postForm['taskName'])){
			
			if($postForm['taskName']==''){
						
					$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task name.'); // it will save into task table.
				
				}else{
					
					if(taskNameValidation($postForm['taskName']))
					{
						$validationArr[]			=	 array('action'=>'error', 'message'=>'The task name can be a mix of text with Numeric / special characters but not only numeric/special characters.');
					}
				}
		
		}else{
		
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send taskName to the server.'); // it will 
		}
		
		if(isset($postForm['orginatorID']))
		{
			
			if($postForm['orginatorID']==''){
				$validationArr[]			=	 array('action'=>'error', 'message'=>'orginator id is not comming.');
				//it will save into task table.
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send orginatorID to the server.');
		}
	
		if(isset($postForm['taskDescription']))
		{	
			
			if($postForm['taskDescription']==''){
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter task description.');
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send taskDescription to the server.');
		}
		
		if(isset($postForm['startDate']) && $postForm['startDate']){
			
				$postForm['startDate']		=	$postForm['startDate'];
				//$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task start date.');
		}else{
			
			$postForm['startDate']		=	date('Y-m-d');			
		}
		
		if(isset($postForm['dueDate'])){
			
			if($postForm['dueDate']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please enter select task due date.');
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Pleas send dueDate to the sever.');
		}
		
		if(isset($postForm['toUsers']))
		{
		
			if($postForm['toUsers']==''){
				
				$validationArr[]			=	 array('action'=>'error', 'message'=>'Please slect reciver.');
			
			}else{
				
				$toUsers		=	explode(",",$postForm['toUsers']);// it will  save in to reciver table with Task ID.
				$toUsers 		= 	array_filter($toUsers); 
			}
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send toUsers to the server.');
		}
		
		if(isset($postForm['ccUsers']))
		{
			
			if($postForm['ccUsers']==''){
					
					$ccUser 		= array();
			
				}else{
						$ccUser			=	explode(",",$postForm['ccUsers']);// it will save in to carbon copy table with task id.
						$ccUser 		= 	array_filter($ccUser); 
			}
		
		}else{
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send ccUsers to the server.');
		}		
		
		
		if(!isset($postForm['tags'])){
			
			$validationArr[]			=	 array('action'=>'error', 'message'=>'Please send tag param tags');
		}
		
		$taskType			=	0; //defualt - Main Task.
		
		if(count($validationArr)>0){
			
			echo json_encode($validationArr);
			die();
		}
		
		 if(isset($postForm['taskType'])){
				
				$taskType			=	 $postForm['taskType'];
		}
			
			if(isset($postForm['status'])){
			
				$status			=	 $postForm['status'];
			
			}else{
				$status			=	 0;
			}
			
			if(isset($postForm['functionalityType'])){
			
				$functionalityType				=	$postForm['functionalityType'];

			}else{
				
				$functionalityType				=	0;
			
			
			if(count($toUsers)==1){
				
				//Task for self or  individual.
				if($toUsers[0]==$postForm['orginatorID']){
					//self / My To Do.
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
			
			$Tags 			=	array();
			
			if(isset($postForm['tags']) && $postForm['tags']!=''){
				
				
				$strTags 		=	str_replace("[", "" , $postForm['tags']);
				$strTags 		=	str_replace("]", "" , $strTags);
				$Tags 			=	explode(",", $strTags);
				$TagsJson		=	json_encode(array_filter($Tags));
			
			}else{
				
				$TagsJson		=	'';
			}
			
			//Saving data into task table.
			$saveData			=	array(
											'taskName'=>$postForm['taskName'],
											'taskDescription'=>$postForm['taskDescription'],
											'orginatorID'=>$postForm['orginatorID'],
											'ccID'=>$postForm['ccUsers'],
											'recieverID'=>$postForm['toUsers'],
											'tagID'=>$postForm['tags'],
											'taskTags'=>$TagsJson,
											'status'=>$status,
											'funtionalityType'=>'3',
											'funcationlityTypeID'=>$groupID,
											'allotmentDate'=>$postForm['startDate'],
											//'allotmentDate'=>date('Y-m-d'),
											'dueDate'=>$postForm['dueDate']
			);
			
			if($this->db->insert($this->db->dbprefix('api_tasks'),$saveData))
			{
				$taskID	=	$this->db->insert_id();
				$this->assign_task_to_reciver($taskID,$toUsers);
				$this->assign_task_cc_reciver($taskID,$ccUser);
				
				if($postForm['tags']!=''){
					
					$this->map_task_tags($taskID,$Tags,$postForm['orginatorID']);
				}
				
				$this->load->model('tasks_model');
				$TaskDetail			=	 $this->tasks_model->get_task_detail($taskID);
				$action				=	"Task '".$postForm['taskName']."' was created by ".$TaskDetail->firstName." ".$TaskDetail->lastName;
				
				echo json_encode(array('action'=>'success', 'message'=>'Task has been  created successfully.', "taskID"=>$taskID));
			
				$this->set_task_log($taskID , $postForm['orginatorID'],$action, $TaskDetail,'New Task is created in a group' );
				
		
			}
		
		}//End of valid data block.
	}
  
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
		$this->db->truncate($this->db->dbprefix('api_user_tags'));
		//$this->db->truncate($this->db->dbprefix('api_users'));
		echo "Clear tasks data";
   }
   //End of Clean Task.
	
	function fcm_notification_test(){
	
		if(isset($_REQUEST['registerToken'])){
		
			if($_REQUEST['registerToken']!=''){
				
				$registerToken		=	$_REQUEST['registerToken'];
			
			}else{
		
			echo json_encode(array('action'=>'error', 'message'=>'Please send registerToken for checking pushnotification.'));
			die();
		}
		
	}else{
		
		echo json_encode(array('action'=>'error', 'message'=>'Please send registerToken for checking pushnotification.'));
		die();
	
	}
	
	$array					=	array($registerToken);
	
		/*
			$msg = array
			(
					'message' 	=> $message,
					'title'		=> 'This is a title. title',
					'subtitle'	=> 'This is a subtitle. subtitle',
					'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
					'vibrate'	=> 1,
					'sound'		=> 1,
					'largeIcon'	=> 'large_icon',
					'smallIcon'	=> 'small_icon'
			);
		*/
		
		$Data					=	array('message'=>'Hello BMH FCMoioooo.','taskID'=>1,'funType'=>'team','largeIcon'	=> 'small_icon','sound'=>0);
		
		echo send_push_notification_android_fcm($array, $Data);
		die();
	
	}
	
	function mail_test()
	{
		
		$email				=	'asif@bookmyhouse.com';
		$message			=	"Hello Message";
		$data				=	 array();
		$templateChoser		=	'otp';
		send_mail_otp($email,$message,$data,$templateChoser);
	}
	

	//log Request   	
	function api_request_log(){
		
		api_request_log($_REQUEST,'android');
	
	}

	// Send SMS  API. 
	function  send_sms_download_link(){
	
		if(isset($_REQUEST['conatctNo'])){
			
			if($_REQUEST['conatctNo']==''){
					echo json_encode(array('action'=>'error','message'=>'Please send contact'));
					die();
			}else{
					$contactNo		=	$_REQUEST['conatctNo'];
			}
		
		}else{
				echo json_encode(array('action'=>'error','message'=>'Please send contact'));
				die();
		}
	
		if(isset($_REQUEST['userID'])){
			
			if($_REQUEST['userID']==''){
				
					echo json_encode(array('action'=>'error','message'=>'Please send userID'));
					die();
			}else{
				$userID		=	$_REQUEST['userID'];
			}
		
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please send userID'));
				die();
			}
			
			if(send_sms_apk($contactNo,'http://itasku.bookmyhouse.co/itaskyou/')){
				
				echo json_encode(array('action'=>'success','message'=>'Downlod app message has been sent succesfully.'));
				die();
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'some issue may be in sms gatway..'));
				die();
			}
		}

	
	//Media attachement..
	function  map_media_with_task($attachementArrID=array(),$userID=null,$actionID=null,$attachementFor=null){
		
		
		$data				= 	$this->db->select('*')
							   ->from($this->db->dbprefix('temporary_media_attachment'))
							   ->where(array('userID'=>$userID,'attachementFor'=>$attachementFor))
							   ->where_in('attachmentID',$attachementArrID)
							   ->get()
							   ->result();
							   
	
		
		if(count($data)>0){
	
			$tempArr					=	array();
		
			foreach($data as $val){
					
					$tempArr[]				=	array(
												'userID'=>$val->userID,
												'deviceID'=>$val->deviceID,
												'attachementFor'=>$val->attachementFor,
												'mediaContent'=>$val->mediaContent,
												'mediaURL'=>$val->mediaURL,
												'dateTime'=>date('Y-m-d H:i:s'),
												'actionID'=>$actionID,
												'tempAttachmentID'=>$val->attachmentID,
												'attachementType'=>$val->attachementType
											 );
			}
			
			if($this->db->insert_batch($this->db->dbprefix('media_attachment'),$tempArr)){
				//$this->db->delete($this->db->dbprefix('temporary_media_attachment'),array('deviceID'=>$deviceID,'userID'=>$userID,'attachementFor'=>$attachementFor));		
			}
		}
	}
	//Media  attachement.	
function get_attached_media($actionID=null,$attachementFor=null){
	
		 $data				= 	$this->db->select('attachementType,mediaURL,attachmentID,mediaContent')
							   ->from($this->db->dbprefix('media_attachment'))
							   ->where(array('attachementFor'=>$attachementFor,'actionID'=>$actionID))
							   ->get()
							   ->result();	
		
		$tempArr						=	array();		
		$tempArr['Image']				=	array();
		$tempArr['Video']				=	array();
		$tempArr['Audeo']				=	array();
		$tempArr['Documentation']		=	array();
		$tempArr['Contacts']				=	array();
		$tempArr['Locations']			=	array();
		
		if(count($data)>0){
			
			foreach($data as $media){
			
			if($media->attachementType=='Contact'){
			
				$tempArr['Contacts'][]				=	array(
																	'Contact'=>json_decode($media->mediaContent),
																	'attachmentID'=>$media->attachmentID
																 );
			}else if($media->attachementType=='Location'){		
				
				$tempArr['Locations'][]		=	array(
																	'Location'=>json_decode($media->mediaContent),
																	'attachmentID'=>$media->attachmentID
																 );
			
			}else{
				
				$tempArr[$media->attachementType][]		=	array(
																	'path'=>$media->mediaURL,
																	'attachmentID'=>$media->attachmentID
																 );
			}
			
		}
			
			return $tempArr;
		
		}else{
			
			return $tempArr;
		}
	}

	
	//Marked as a favorite task...
	function marked_favorite_unfavorite()
	{
		
		if(isset($_REQUEST['deviceID'])){
		
			if($_REQUEST['deviceID']!=''){
			
				$deviceID		=	$_REQUEST['deviceID'];
			
			}else{
			
				echo json_encode(array('action'=>'error','message'=>'please send deviceID.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'please send deviceID.'));
			die();
		}
	
	if(isset($_REQUEST['userID'])){
	
		if($_REQUEST['userID']!=''){
			
				$userID		=	$_REQUEST['userID'];
		
		}else{
				echo json_encode(array('action'=>'error','message'=>'please send userID.'));
				die();
		}
	
	}else{
			
			echo json_encode(array('action'=>'error','message'=>'please send userID.'));
			die();
		}	
	
	if(isset($_REQUEST['taskID'])){
		
			if($_REQUEST['taskID']!='')
			{
				
				$taskID		=	$_REQUEST['taskID'];
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'please send taskID.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'please send taskID.'));
			die();
		}
		
		
		if(isset($_REQUEST['favStatus'])){
		
			if($_REQUEST['favStatus']!=''){
				
				$favStatus		=	$_REQUEST['favStatus'];
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'please send favStatus.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'please send favStatus.'));
			die();
		}
		
		$where 						=	array(
												'userID'=>$userID,
												'taskID'=>$taskID
											);
		
		$num 						=	$this->db->select('*')
											  ->from($this->db->dbprefix('user_favorite_tasks'))
											  ->where($where)
											  ->get()
											   ->num_rows();		
		
		if($num>0){
			
			if($_REQUEST['favStatus']==0){
				
					//Remove favorite...
					if($this->db->delete($this->db->dbprefix('user_favorite_tasks'),$where)){
						
						echo json_encode(array('action'=>'success','message'=>'Task has been unfavorite successfully.'));
						die();	
					}
				//End of Remove favorite...
	
			}else{
		
				echo json_encode(array('action'=>'error','message'=>'This task has been already favorite.'));
				die();
			}			
	
		}else{
			
			if($_REQUEST['favStatus']==1)
			{
			
				$saveData		=		array(
												'userID'=>$userID,
												'taskID'=>$taskID,
												'created'=>date('Y-m-d H:i:s')												
												);	
				
				if($this->db->insert($this->db->dbprefix('user_favorite_tasks'),$saveData)){
					
					echo json_encode(array('action'=>'success','message'=>'task marked as favorite succesfully.'));
					die();
				
				}
				
			}	
		}
	}

	//Re Assign Task..
	function re_assign_api()
	{
	
		$oldAssine						=  array();
		$reassignTo						= array();		
		
		if(isset($_REQUEST['deviceID']))
		{
			
			if($_REQUEST['deviceID']!=''){
			
				$deviceID			=	$_REQUEST['deviceID'];
			
			}else{
					
					echo json_encode(array('action'=>'error','message'=>'devieID is blank.'));
					die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'devieID is blank.'));
			die();
		}
		
		if(isset($_REQUEST['userID']))
		{
			
			if($_REQUEST['userID']!=''){
				$userID			=	$_REQUEST['userID'];
			}else{
				echo json_encode(array('action'=>'error','message'=>'userID is blank.'));
				die();
			}
		}else{
			echo json_encode(array('action'=>'error','message'=>'userID is blank.'));
			die();
		 }
		
		if(isset($_REQUEST['taskID']))
		{
			
			if($_REQUEST['taskID']!=''){
				$taskID			=	$_REQUEST['taskID'];
			}else{
				echo json_encode(array('action'=>'error','message'=>'taskID is blank.'));
				die();
			}
		}else{
			echo json_encode(array('action'=>'error','message'=>'taskID is blank.'));
			die();
		}
		
		if(isset($_REQUEST['toUsers']))
		{
			if($_REQUEST['toUsers']!=''){
				
				$toUsers			=	$_REQUEST['toUsers'];
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'toUsers is blank.'));
				die();
			}
			
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'toUsers is blank.'));
			die();
		}

		if(isset($_REQUEST['ccUsers']))
		{
			
			if($_REQUEST['ccUsers']!=''){
				
				$ccUsers			=	$_REQUEST['ccUsers'];
			}
		}
		
		
		$TaskDetail			              	=	$this->tasks_model->get_task_detail($taskID);
		$orginatorID					  	=	$TaskDetail->orginatorID;
	
		//lalla tu task  creator ko task assign nhi  kar sacta he.  
		
		if($orginatorID==$userID){
			
			echo json_encode(array('action'=>'error','message'=>'You can not assign task to task creator.'));
			die();
		}
		//sandesh samapt lalla tu task creator ko task assign nhi  kar sacta he.  

		
		$oldRcieversArr 				  	= 	explode(",",$TaskDetail->recieverID);
		$oldCcArr 					 	 	= 	explode(",",$TaskDetail->ccID);	
		
		$toUsersArr							=	explode(",",$toUsers);
		
		
		$ccUsersArr							=	explode(",",$ccUsers);
	
	
		$newAssignment						=	array_unique(array_filter(array_merge($oldRcieversArr,$toUsersArr)));
		$newCC								=	array_unique(array_filter(array_merge($oldCcArr,$ccUsersArr)));
		
		$conditionArr		=	array(
										'U.userID'=>$userID,
										'U.status'=>'1'
									);
		
		$AssignedBy				=	$this->user->get_user_info($conditionArr);
		
		if(count($AssignedBy)==0){
			
			echo json_encode(array('action'=>'error','message'=>'you are deactivated.'));
			die();
		}
	
		$newadded				=	$this->user->get_multiple_active_users($toUsers);
		
		$AssingToArrName			=	array();
		foreach($newadded as $uName){
		
			$AssingToArrName[]		=	$uName->firstName." ".$uName->lastName;
		}
	
		$AssingToSteingName	=	implode(",",$AssingToArrName);
		
		$reassignTo[]			=    array(
											"assignBy"=>$AssignedBy,
											"assignTo"=>$newadded,
											"following"=>$this->user->get_multiple_active_users($ccUsers),
											"assignDate"=>date('Y-m-d H:i:s')
										);
		
		if(isset($TaskDetail->reassignJsonData)){
		
			if($TaskDetail->reassignJsonData!='')
			{
				
				$action			=	
				$oldReassingData				=	json_decode($TaskDetail->reassignJsonData,true);	
				
				if(is_array($oldReassingData)){
					
					$reassignTo						=	array_merge($oldReassingData,$reassignTo);
				}
			}
		}
		
		$reassignTo							=	json_encode($reassignTo);
		
		//New Assigment.
		$newAssignmentjosn						=	implode(",",$newAssignment);
		$ccUsersJoson							=	implode(",",$ccUsersArr);
		
		$saveData							=  array(
													'reassignJsonData'=>$reassignTo,
													'recieverID'=>$newAssignmentjosn,
													'ccID'=>$ccUsersJoson
													);
		
		$this->db->where(array('taskID'=>$taskID));
		if($this->db->update($this->db->dbprefix('api_tasks as T'),$saveData)){
		
			//Push Notification....
			
			$action  			=	$TaskDetail->taskName." is assigned to  ".$AssingToSteingName."  by ".$AssignedBy->firstName." ".$AssignedBy	->lastName;	
		
			$toUsersArr[]	=	$TaskDetail->orginatorID;
			$reciepient			=	array_unique(array_filter(array_merge($toUsersArr,$ccUsersArr)));
			
			$Data				=	array(
											'type'=>'task',
											'action'=>'reassign',
											'message'=>$action,
											'data'=>$TaskDetail	
										);
			
			//Send Push Notification  to  the server
			
			send_push_notification_android_fcm($reciepient, $Data,'development');
			$this->set_task_log($taskID , $userID,$action, $TaskDetail,'New Task Created');
			echo json_encode(array('action'=>'success','message'=>'task has been re assign succesfully.'));
			//Push Notificatio will send to the all the members... 	
			die();
		}
		
}
//Re assigne... 	
	
	


 function attach_more_media_to_task()
 {
	
	$ArrError			=	array();
	
	if(isset($_REQUEST['deviceID']))
	{
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
	
	if(isset($_REQUEST['taskID'])){
		
		if($_REQUEST['taskID']!=''){
				
				$taskID		=	 $_REQUEST['taskID'];
			
			}else{
				
				$ArrError['taskID']			=	"taskID value is blank";
			}
			
			}else{
				
				$ArrError['taskID']				=	"Please send taskID";
		}		
	
		if(isset($_REQUEST['attachementIDS'])){
		
				if($_REQUEST['attachementIDS']!=''){
					
					$attachementIDS		=	 explode(",",$_REQUEST['attachementIDS']);
				
				}else{
					
					$ArrError['attachementIDS']			=	"attachementIDS value is blank";
				}
				
			}else{
			
				$ArrError['attachementIDS']				=	"Please send attachementIDS";
			}
	
	if(count($ArrError)>0){
	
		echo json_encode(array('action'=>'error','message'=>$ArrError));
		die();
	}
	
	$this->map_media_with_task($attachementIDS,$userID,$taskID,$attachementFor='Task');
 }	
 
 ///Group Home screen Listing.. 

 function get_home_group(){
	
	$ArrError			=	array();
	
	if(isset($_REQUEST['deviceID']))
	{
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

		if(count($ArrError)>0){
		
			echo json_encode(array('action'=>'error','message'=>$ArrError));
			die();
		}
	
		$data 			=	 	$this->group_model->get_user_inbolved_group($userID);
		echo json_encode(array('action'=>'success','message'=>'success','groupData'=>$data));	

}

// Group home screen.. 

 //Group home screen.. 
	function  change_group_params_value()
	{
		
		$errorArr				=	array();
		
		if(isset($_REQUEST['paramName']))
		{
		
			if($_REQUEST['paramName']!=''){
				
				$paramName			=  $_REQUEST['paramName'];	
			
			}else{
				
				$errorArr['paramName']							=	"Please send paramName";
			}
		
		}else{
			
			$errorArr['paramName']							=	"Please send paramName";
		}
		
		if(isset($_REQUEST['paramValue']))
		{
			
			if($_REQUEST['paramValue']!=''){
				
				$paramValue			=  $_REQUEST['paramValue'];	
				
			}else{
				
				$errorArr['paramValue']							=	"Please send paramValue";
			}
		
		}else{
			
			$errorArr['paramValue']							=	"Please send paramValue";
		}
		
		if(isset($_REQUEST['userID']))
		{
			
			if($_REQUEST['userID']!=''){
				$userID			=  $_REQUEST['userID'];	
				
				}else{
					
					$errorArr['userID']							=	"Please send userID";
			}
		
		}else{
			
			$errorArr['userID']							=	"Please send userID";
		}
		
		if(isset($_REQUEST['deviceID'])){
			
				if($_REQUEST['deviceID']!=''){
					
					$deviceID			=  $_REQUEST['deviceID'];	
			
			}else{
				
				$errorArr['deviceID']							=	"Please send deviceID";
			}
		
		}else{
			
			$errorArr['deviceID']							=	"Please send deviceID";
		}
	
		if(isset($_REQUEST['groupID']))
		{
			
			if($_REQUEST['groupID']!=''){
				
				$groupID			=  $_REQUEST['groupID'];	
				
			}else{
				
				$errorArr['groupID']							=	"Please send groupID";
			}
		
		}else{
			
			$errorArr['groupID']							=	"Please send groupID";
		}
		
		if(count($errorArr)>0){
			
			echo  json_encode(array('action'=>'error','message'=>$errorArr));
			die();
		}
		
		//groupName
		//groupPhoto
		//groupDescription
		 
		 switch($paramName)
		 {
			case 'groupName':
			
			/*
			$av_flag		= $this->group_model->check_group_name_available($paramValue,'bmh');
			
			if($av_flag){
				echo json_encode(array('action'=>'error', 'message'=>'group name already exist,please enter another group name.'));
				die();
			}
			*/
			$updateArr			=	array(
										    'groupName'=>$paramValue,	
											'modifiedDate'=>date('Y-m-d H:i:s')	
										);
			$message				=	"group name has changed.";
			break;
			case 'groupDescription':
				$updateArr		=	array(
									   'groupDescription'=>$paramValue,	
									   'modifiedDate'=>date('Y-m-d H:i:s')	
									);
			$message				=	"group description has changed.";	
			break;
			case 'groupPhoto':
				$updateArr		=	array(
									   'groupPhoto'=>$paramValue,	
									   'modifiedDate'=>date('Y-m-d H:i:s')	
			
						);
			
			$message				=	"group photo has changed.";			
			break;
			default: 
			echo json_encode(array('action'=>'error','message'=>'please send valid paramName'));
			die();
	}
	
		$this->db->where(array('groupID'=>$groupID));
		
		if($this->db->update($this->db->dbprefix('api_groups'), $updateArr)){
		
			//getGroup members:-  
			
			$groupdetail		=	$this->group_model->get_group_detail($groupID,$userID);
			
		if(count($groupdetail)==0){
		
		echo json_encode(array('action'=>'error','message'=>'wrong group request please contact to group administrator.'));
		die();
	
		}else{
			
			unset($groupdetail->recievedTaskData);
			unset($groupdetail->givenTaskData);
			$reciepient			=	array();
			
			if(count($groupdetail->groupMembersData)>0){
				
				foreach($groupdetail->groupMembersData as $rep){
					
					$reciepient[]		=	$rep->userID;
				}
			}
		   
		   $Data					        =	array(
														'type'=>'group',
														'action'=>'update',
														'message'=>$message,
														'data'=>$groupdetail
												 );
			
			send_push_notification_android_fcm($reciepient, $Data);
			echo json_encode(array('action'=>'success','message'=>'value has been updated succesfully.'));
			die();
		
		}
	 
	 }
  }
  
  
  
  	function user_app_defualt_setting($userID	= null){
	
			$defualtSetting 		=	array(
											
												'as_orginator'=>array(
																'task'=>array(
																	    're_assign'=>true,
																		'ratting'=>true,
																 )
												),
											
												'as_reciever'=>array(
																	'task'=>array(
																		're_assign'=>true,
																		'ratting'=>false,	
																	 )
												)
							);
			
			return  $defualtSetting;
	
	}
	
  
  
}
//End of class.
