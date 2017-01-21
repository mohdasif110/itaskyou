<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class IndustoryType_model extends CI_model {

 
 // Admin 
 function get_indutoryType()
 {
	 
		$PhoneCountryCode			= $this->db->select('*')
										->from($this->db->dbprefix('api_industory_type_master'))
										->order_by("typeID","desc")
										->get()
										->result();
		
		return  $PhoneCountryCode;
	}

	
	 function get_indutoryType_single($typeID)
	 {
	 
		$PhoneCountryCode			= $this->db->select('type,typeID')
										->from($this->db->dbprefix('api_industory_type_master'))
										->where(array('typeID'=>$typeID))
										->order_by("typeID","desc")
										->get()
										->row();
		
		return  $PhoneCountryCode;
	}
	
	
	
	function  check_available($type)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_industory_type_master'))
										->where('type',$type)
										->get()
										->num_rows();
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}

	function industoryTypeSave($data){
	 

		if($this->db->insert($this->db->dbprefix('api_industory_type_master'), $data)){
			
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}

	function industoryTypeUpdate($data,$typeID)
	{
	 
		
		$this->db->where('typeID', $typeID);
		if($this->db->update($this->db->dbprefix('api_industory_type_master'), $data)){
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}

	
	function  toggleIndustoryType($typeID, $status){
		
		$data			=	array('status'=>$status);	
		$this->db->where('typeID', $typeID);
		if($this->db->update($this->db->dbprefix('api_industory_type_master'), $data))
		{
			return 1;
			
		}else{
			
		    return 0;	
		}	
	}
	
	function  deleteIndustoryType($typeID)
	{
		
		//$this->db->where('typeID', $typeID);
		
		if($this->db->delete($this->db->dbprefix('api_industory_type_master'), array('typeID'=>$typeID)))
		{
			return 1;
		
		}else{
			
		    return 0;	
		}	
		
	}

	
}

?>
