<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Chat room for itasktyou..  group chat,  individual  chat,mom chat , team chat ,   
class Itaskyou extends CI_Controller {
	
	function __construct()
    {
		parent::__construct();
		$this->load->database();	
		$this->load->model('chat_model');
	}

	//send message to the recievers..
	function send_message(){
		
		$saveArr			=	array();
		
		if(isset($_REQUEST['deviceID'])){
			
			if($_REQUEST['deviceID']!='')
			{
					$deviceID						=	$_REQUEST['deviceID'];
					$saveArr['deviceID']			=	$deviceID;
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please send deviceID.'));
				die();
			}
			
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send deviceID.'));
			die();
		}
		
		//Login user ID 
		if(isset($_REQUEST['senderID'])){
			
				if($_REQUEST['senderID']!=''){
					
					$senderID						=	$_REQUEST['senderID'];
					$saveArr['senderID']			=   $senderID;
					
				}else{
					
					echo json_encode(array('action'=>'error','message'=>'Please send senderid.'));
					die();
				}
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please send senderid.'));
				die();
			}
		
			if(isset($_REQUEST['reciverIDs'])){
			
				if($_REQUEST['reciverIDs']!=''){
					
					$reciverIDs						=	$_REQUEST['reciverIDs'];
					$saveArr['reciverIDs']			=   $reciverIDs;
				
				}else{
					
					echo json_encode(array('action'=>'error','message'=>'Please send reciverIDs.'));
					die();
				}
			
			}else{
		
				echo json_encode(array('action'=>'error','message'=>'Please send reciverIDs.'));
				die();
		}
	
	if(isset($_REQUEST['chatRoomType'])){
			
			if($_REQUEST['chatRoomType']!='')
			{
				$chatRoomType						=	$_REQUEST['chatRoomType'];
				$saveArr['chatRoomType']			=   $chatRoomType;
			
			}else{
				
					echo json_encode(array('action'=>'error','message'=>'Please send chatRoomType.'));
					die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send chatRoomType.'));
			die();
		}
	
	   if(isset($_REQUEST['chatRoomID'])){
			
			if($_REQUEST['chatRoomID']!='')
			{
				
				$chatRoomID						=	$_REQUEST['chatRoomID'];
				$saveArr['chatRoomID']			=   $chatRoomID;
			
			}else{
				
				echo json_encode(array('action'=>'error','message'=>'Please send chatRoomID.'));
				die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send chatRoomID.'));
			die();
		}
	
	if(isset($_REQUEST['taskID'])){
			
			if($_REQUEST['taskID']!='')
			{
					
					$taskID						=	$_REQUEST['taskID'];
					$saveArr['taskID']			=   $taskID;
			
			}else{
					
					echo json_encode(array('action'=>'error','message'=>'Please send taskID.'));
					die();
			}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send taskID.'));
			die();
		}

		if(isset($_REQUEST['message'])){
			
			if($_REQUEST['message']!='')
			{
					
					$message			=	$_REQUEST['message'];
					$saveArr['message']			=   $message;
				}else{
						
					echo json_encode(array('action'=>'error','message'=>'Please send message.'));
					die();
				}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send message.'));
			die();
		}
	 
	 
	 		if(isset($_REQUEST['messageType'])){
			
			if($_REQUEST['messageType']!='')
			{
					
					$messageType						=	$_REQUEST['messageType'];
					$saveArr['messageType']			=   $messageType;
				
				}else{
					
					echo json_encode(array('action'=>'error','message'=>'Please send messageType.'));
					die();
				}
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'Please send messageType.'));
			die();
		}
		
		$saveArr['dateTime']				=		date('Y-m-d H:i:s');
		
		if($this->chat_model->save_message($saveArr)){
		
		
		
		
			echo json_encode(array('action'=>'success','message'=>'message has been sent'));
			die();
		
		}else{
			
			echo json_encode(array('action'=>'error','message'=>'database issue please contact to the administrator.'));
			die();
		
		}
		
	}

	//Read message..
	function read_message(){
	
			if(isset($_REQUEST['userID']) && $_REQUEST['userID']!='')
			{
					
					if($_REQUEST['userID']!='')
					{
						
						$userID			=	$_REQUEST['userID'];
					
					}
			}
		
			$where				=	array('userID'=>$userID,'chatRoomID'=>24,'chatRoomType'=>'Task');
			$data				=	$this->chat_model->read_message($where);
	
	
	}
	//End Read message..

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */