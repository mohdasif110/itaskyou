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
				//$this->send_otp($phone_number, $otp_code); //  send otp  in case of new user creation.
			}
	}
	
	//Send OTP to the entered  phone number.
	//@param ;  phone number.
	function send_otp($phone_number = '9873878430', $otp='jujl')
	{
		$message = 'Please find otp: '.$otp;
		$url = "http://5.189.187.160/api/mt/SendSMS?user=bookmyhouse01&password=123456&senderid=BKMYHS&channel=2&DCS=0&flashsms=0&number=$phone_number&text=$message&route=1";
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, urlencode($url));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl,CURLOPT_USERPWD,"ASas:ASas");
		$result = curl_exec($curl);
		curl_close($curl);
		print($result);

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
		foreach($IndustoryType as $val){
		
			$tempArr[]				=	array( 	
												'type'=>$val->type,
												'typeID'=>$val->typeID,
												'subType'=>array($this->get_sub_industry_type_second($val->typeID))
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
		
		if(isset($_GET['industoryType']) && $_GET['industoryType']!=''){
		
			$industryType		=	$_GET['industoryType'];
		
		}else{
			
			$temp_error['industoryType']				= "Please select industory Type.";	
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
									'nationality'=>$nationality,
									'deviceID'=>$deviceID,
									'userPhoto'=>$userPhoto,
									'otp'=>'',
									'status'=>'1',
									'created_date'=>date('YY-mm-dd'),
									'updated_date'=>date('yy-mm-dd')
									);
		
		$this->db->where(array('contactNo'=>$phone_number));
		
		if($this->db->update($this->db->dbprefix('api_users'),  $data))
		{
			$dataGamming	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number))->get()->row();
			echo  json_encode($dataGamming);
		
		}
	
	}

	
	//Get tags 
	function get_tags(){
	
		$data	=	$this->db->select('*')->from($this->db->dbprefix('api_tag_master'))->where('status','1')->get()->result();
		echo json_encode($data);
	
	}
	
	
	//select user(s) as reciver.
	function get_select_users(){
		$dataGamming	=	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('status'=>'1'))->get()->result();
		echo  json_encode($dataGamming);
	}
	
	//Request Paramenter...
	function create_task(){}
	//Get task from master..
	function get_tasks(){}
	//Auto Saggation...
	

	
}





