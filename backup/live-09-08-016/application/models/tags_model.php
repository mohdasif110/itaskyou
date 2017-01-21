<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tags_model extends CI_model {

 
	// Admin 
	 function get_records()
	 {
		
		$PhoneCountryCode			= $this->db->select('*')
										->from($this->db->dbprefix('api_tag_master as Tag'))
										->order_by("Tag.tagID","desc")
										->get()
										->result();
		
		return  $PhoneCountryCode;
	}
	
	function  check_available($tagText)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_tag_master'))
										->where(array('tagText'=>$tagText))
										->get()
										->num_rows();
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}
	
	
	function check_available_edit($tagID,$tagText)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_tag_master'))
										->where(array('tagID'=>$tagID,'tagText'=>$tagText))
										->get()
										->num_rows();
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}
	
	function saveItem($data){
		
		if($this->db->insert($this->db->dbprefix('api_tag_master'), $data)){
		
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}
	
	function updateItem($data,$tagID)
	{
		$this->db->where('tagID', $tagID);
		
		if($this->db->update($this->db->dbprefix('api_tag_master'), $data)){
			
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}

	
	function  toggleStatus($tagID, $status){
		
		$data			=	array('status'=>$status);	
		$this->db->where('tagID', $tagID);
		if($this->db->update($this->db->dbprefix('api_tag_master'), $data))
		{
			return 1;
			
		}else{
			
		    return 0;	
		}	
	}
	
	function  deleteItem($tagID)
	{
	
		if($this->db->delete($this->db->dbprefix('api_tag_master'), array('tagID'=>$tagID)))
		{
			
			return 1;
		
		}else{
		
			return 0;	
		
		}	
	}
	
}

?>
