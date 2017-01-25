<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_model {
	
	function save_message($saveData=array())
	{
		
		if($this->db->insert($this->db->dbprefix('chat_master'),$saveData)){
			
			$chatID 				= 	$this->db->insert_id();
			$reciverIDs				=	explode(",",$saveData['reciverIDs']);
			$senderID				=	$saveData['senderID'];			
			
			$tempData				=	array();
			$saveData				=	array();
			
			foreach($reciverIDs as $val)
			{
			
			
				$tempData['reciversID']				=	$val;
				$tempData['senderID']				=	$senderID;
				$tempData['chatID']					=	$chatID;
				$tempData['dateTime']				=	date('Y-m-d H:i:s');
				$saveData[]							=	$tempData;
			}
			
			if($this->db->insert_batch($this->db->dbprefix('chat_recievers'),$saveData)){
			
				return true;
				
			}else{
				
				return false;
			}
			
			
			
		}else{
			
			return false;
		}
		
	}

	// save recipient... 
	function  save_recipient(){
		
		
		
	}	
	// end save recipient...
	
}

?>
