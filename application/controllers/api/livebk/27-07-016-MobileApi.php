<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MobileApi extends CI_Controller
{
	
	function __construct()
    {
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->database();	
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
			//phone number validation.
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
				$flagsave		=	$this->db->insert($this->db->dbprefix('api_users') , array('countryPhoneCode'=>$country_code,'contactNo'=>$phone_number,'otp'=>$otp_code));
				
				$NowgetData				= 		$this->db->select('otp,countryPhoneCode,contactNo')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
				echo json_encode(array('action'=>'available','message'=>'otp','userData'=>array($NowgetData)));
			
			}
	}
	
	//Send OTP to the entered  phone number.
	//@param ;  phone number.
	function send_otp($phone_number = null)
	{
		//send otp and save in a  database table.
	}

	//check otp 
	//@parme :  phone number ,  otp number.
	function check_otp()
	{
		$phone_number 		=	9873878430;
		$otp_code			=	1234;
		
		$getData				= 	$this->db->select('*')->from($this->db->dbprefix('api_users'))->where(array('contactNo'=>$phone_number,'otp'=>$otp_code))->get()->row();
		echo json_encode($getData);
	
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
		
		$type_id				=	2;
		$SubIndustoryType		= $this->db->select('subTypeID,subType')
										->from($this->db->dbprefix('ity_api_sub_industory_type_master'))
										->where('typeID', $type_id)
										->get()
										->result();
		echo json_encode($SubIndustoryType);
	}
	
	//update profile	
	function upate_profile()
	{
		
		
		$phone_number		=	9873878462;
		$firstName			=	'Mohamamd'; //? 
		$lastName			=	'Asif';
		$emailID			=	'asif@bookmyhouse.com';
		$industryType		=	1;
		$deviceID			=	'DSDSADASDASDASDASDADSASDADS';
		$userPhoto			=	'userPhoto.jpg';
		$nationality		=	'india';
		
		
		
		$data				=	array(
									'firstName'=>$firstName,
									'lastName'=>$lastName,
									'emailID'=>$emailID,
									'industryType'=>$industryType,
									'nationality'=>$nationality,
									'deviceID'=>$deviceID,
									'userPhoto'=>$userPhoto,
									'otp'=>'',
									'created_date'=>date('yy-mm-dd')
									);
		
		$this->db->where(array('contactNo'=>$phone_number));
		if($this->db->update($this->db->dbprefix('ity_api_users'),  $data))
		{
			$dataGamming	=	$this->db->select('*')->from($this->db->dbprefix('ity_api_users'))->where(array('contactNo'=>$phone_number))->get()->row();
			echo  json_encode($dataGamming);
		
		}
	}

	//Request Paramenter...
	function create_task(){}
	//End of create task...
	//Get task from master..
	function get_tags(){}
	//Get Task...
	function get_tasks(){}
	//Auto Saggation...
	function get_select_users(){}
	
	
}




