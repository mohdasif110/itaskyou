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

	
	function read_message($where=array()){
	
		$where = "(R.senderID='".$where['userID']."'or R.reciversID='".$where['userID']."')";
		
		$messages					= $this->db->select('R.senderID, R.reciversID,M.chatID,M.message as messageBody')
									    ->from($this->db->dbprefix('chat_recievers R'))
										->join($this->db->dbprefix('chat_master M'),'M.chatID=R.chatID')
										->where($where)
										->group_by('M.chatID')
										->order_by('M.dateTime asc')
										->get()
										->result();
			
			
			echo "<pre>";
			print_r($messages);
	
	}
	
}

?>
