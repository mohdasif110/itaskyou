<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

   //Prevent special character , it function  return true to prevent the special. 
   if(!function_exists('nospecialchar'))
   {
		function taskNameValidation($value)
		{
			if(is_numeric($value))
			{
				return true;
			}
		}
	}

	
   // Numeric value checking. 	
   if(!function_exists('check_numeric'))
   {
		function check_numeric_value($value)
		{
			if(is_numeric($value))
			{
				return true;
			
			}else{
				
				echo "Please send numreic.";
			}
		}
	}
	
	
	if(!function_exists('formattingArr'))
	{
		
		function formattingArr($Arr)
		{
			$tempArr	= array();
		
			foreach($Arr as $val)
			{
			
				$tempArr[]		=	$val;
			
			}
			
			return $tempArr;
		}
	}
	
	//SMS Gateway.
	if(!function_exists('send_otp_message'))
	{
		
		function send_otp_message($contactNumber, $country_code , $otp ,$app_type='android', $type='sms', $deviceID,$appKey)
		{
			
			$contactNumber		=	$country_code.$contactNumber;
		
			$message			=	"ITaskYou:".$otp; //OTP mesage body.
			
			switch ($type)
			{
				case "push":
				
				if($app_type=='android')
				{
					
					send_push_notification_android($contactNumber, $message);
				
				}else{
					
					send_push_notification_ios($contactNumber, $message);
				}
				
				break;
				default:
				return send_sms($contactNumber,$message);
				
			}
		
		}
	}
	
	//send sms. 
	if(!function_exists('send_sms'))
	{
		function send_sms($contactNumber, $message)
		{
			//return true;
			
			$url = "http://5.189.187.160/api/mt/SendSMS?user=bookmyhouse01&password=123456&senderid=BKMYHS&channel=2&DCS=0&flashsms=0&number=".$contactNumber."&text=".$message."&route=1";
			
			

			$curl_handle=curl_init();
			curl_setopt($curl_handle, CURLOPT_URL,$url);
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
			$query = curl_exec($curl_handle);
			$josn_decode		=	json_decode($query);
			//return true;  //It is temporary  due to sms gateway is not working. 
			
			if($josn_decode->ErrorMessage=='Success'){
				
				return true;
			
			}else{
				
				return true;
				//return false;
			
			}
			
			curl_close($curl_handle);
	 }
	 
	}
	//End of send sms.
	
	//send sms. 
	if(!function_exists('send_push_notification_android'))
	{
		function send_push_notification_android($contactNumber, $message)
		{
		
		}
	}
	//End of send sms.
	
	
	
	if(!function_exists('send_push_notification_android_fcm'))
	{
			function send_push_notification_android_fcm($target, $data,$modeType='debugg')
			{
				
				
				
				
				$url = 'https://fcm.googleapis.com/fcm/send';
				//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
				$server_key = 'AIzaSyDJZwdZV7FTi9GxLSuIYLPFhyMfBm4RpHU';
				
				$fields 							= 	array();
				$fields['data'] 					= 	$data;
				
				$target			=	array_unique($target); 
				
				switch($modeType){
						case 'development':
						
						$obj 			=	& get_instance();
						$obj->load->model('user');
						$target			=	$obj->user->get_multiple_active_users_token($target);
					    break;	
						default	:
				
				}
				
				//echo "<pre>";
				//print_r($target);
				
				if(is_array($target)){
					
					$fields['registration_ids'] 		= 	$target;
				
				}else{
					
					$fields['to'] = $target;
				}
				
				
				
				//header with content_type api key
				
			$headers = array(
				'Content-Type:application/json',
				'Authorization:key='.$server_key
				);

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
				$result = curl_exec($ch);
				
				//echo "<pre>";
				//print_r($result);
			
			
				if ($result === FALSE) {
					
					return curl_error($ch);
					//die('FCM Send Error: ' . curl_error($ch));
				
				}else{
				
					return $result;
				
				}
				
				curl_close($ch);
				return $result;
		}
	
	}
	
	
	
	
	
	//send sms. 
	if(!function_exists('send_push_notification_ios'))
	{
		function send_push_notification_ios($contactNumber, $message)
		{
			
		}
	}
	//End of send sms.
	
	//send sms. 
	if(!function_exists('generate_otp'))
	{
		function generate_otp()
		{
			
			$digits = 4;
			$num	=  rand(pow(10, $digits-1), pow(10, $digits)-1);
			return $num;
		}
	}
	//End of send sms.
	
	
	
	
	if(!function_exists('send_mail_otp'))
	{
		
		function send_mail_otp($email=null,$message=null,$data=array(),$templateChoser='default')
		{
			
			$obj			 =& get_instance();
			$obj->load->library('email');
			


			$config['protocol']    			= 'smtp';
			$config['smtp_host']    		= 's43.cyberspace.in';
			
			$config['smtp_port']    		= '587';
			$config['smtp_timeout'] 		= '7';
			$config['smtp_user']    		= 'customersupport@bookmyhouse.com';
			$config['smtp_pass']    		= 'Cs_!@#';
			$config['charset']    			= 'utf-8';
			$config['newline']   			= "\r\n";
			$config['mailtype'] 			= 'text'; // or html
			
			//$config['validation'] = TRUE; // bool whether to validate email or not      
			
			$obj->email->initialize($config);
			$obj->email->from('info@bookmyhouse.com', 'book my house team');
			$obj->email->to('asif@bookmyhouse.com');
			
			//$obj->email->cc('another@another-example.com');
			//$obj->email->bcc('them@their-example.com');
			
			$obj->email->subject('I task you Mail Test..');
			$obj->email->message('Testing the email class.');
			
			if($obj->email->send()){
		
				echo "Mail sent";
			
			}else{

				
				echo "Mail is not send";
	
			}
			
			echo $obj->email->print_debugger();

			
		}
	
	}
	
	
		// API Request Log.
		if(!function_exists('api_request_log'))
		{
			function api_request_log($req,$from_req)
			{
				
				$filePath		=	"/var/www/html/itaskyou/apilog/android_request_log.txt";
				
				$oldString 		= file_get_contents($filePath);
				
				$logString 		=	date('d-m-Y H:i:s')."\t";
				$logString		.=	json_encode($req);
				$logString		=  $oldString."\n".$logString;
				echo file_put_contents($filePath,$logString);
			
			}
			
		}




if(!function_exists('send_sms_apk'))
	{
		function send_sms_apk($contactNumber, $message)
		{
			
				//echo $contactNumber."<br>";
				//echo $message;
			//return true;
			
			$url = "http://5.189.187.160/api/mt/SendSMS?user=bookmyhouse01&password=123456&senderid=BKMYHS&channel=2&DCS=0&flashsms=0&number=".$contactNumber."&text=".$message."&route=1";
			
			

			$curl_handle=curl_init();
			curl_setopt($curl_handle, CURLOPT_URL,$url);
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
			$query = curl_exec($curl_handle);
			$josn_decode		=	json_decode($query);
			//return true;  //It is temporary  due to sms gateway is not working. 
			
			
			
			if($josn_decode->ErrorMessage=='Success'){
				
				return true;
			
			}else{
				
				return true;
				//return false;
			
			}
			
			
			curl_close($curl_handle);
	 }
	 
	}	

	
	if(!function_exists('send_push_chat_notification_fcm'))
	{
			
			function send_push_chat_notification_fcm($target, $data,$modeType='debugg')
			{
			
				$url = 'https://fcm.googleapis.com/fcm/send';
				$server_key = 'AIzaSyDJZwdZV7FTi9GxLSuIYLPFhyMfBm4RpHU';
				
				$fields 							= 	array();
				$fields['data'] 					= 	$data;
				$target			=	array_unique($target); 
				
				if(is_array($target)){
					
					$fields['registration_ids'] 		= 	$target;
				
				}else{
					
					$fields['to'] = $target;
				}
				
				
				
				//header with content_type api key
				
			$headers = array(
				'Content-Type:application/json',
				'Authorization:key='.$server_key
				);

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
				$result = curl_exec($ch);
				
				//echo "<pre>";
				//print_r($result);
			
			
				if ($result === FALSE) {
					
					return curl_error($ch);
					//die('FCM Send Error: ' . curl_error($ch));
				
				}else{
				
					return $result;
				
				}
				
				curl_close($ch);
				return $result;
		}
	
	}

	
		
		
		
	
	