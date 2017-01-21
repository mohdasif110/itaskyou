<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class SubIndustoryType_model extends CI_model {

 
	// Admin 
	 function get_records()
	 {
		
		$PhoneCountryCode			= $this->db->select('subtype.*,type.type')
										->from($this->db->dbprefix('api_sub_industory_type_master as subtype'))
										->join($this->db->dbprefix('api_industory_type_master as type') , 'type.typeID=subtype.typeID')
										->order_by("subtype.subTypeID","desc")
										->get()
										->result();
			
		//echo $sql = $this->db->last_query();							
		
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

	function  check_available($subType,$typeID)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_sub_industory_type_master'))
										->where(array('subType'=>$subType,'typeID'=>$typeID))
										->get()
										->num_rows();
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}
	
	
	function check_available_edit($subType,$subTypeID,$typeID)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_sub_industory_type_master'))
										->where(array('subType'=>$subType,'typeID'=>$typeID))
										->get()
										->num_rows();
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}
	
	function saveItem($data){
		
		if($this->db->insert($this->db->dbprefix('api_sub_industory_type_master'), $data)){
		
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}
	
	function updateItem($data,$subTypeID)
	{
		$this->db->where('subTypeID', $subTypeID);
		
		if($this->db->update($this->db->dbprefix('api_sub_industory_type_master'), $data)){
			
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}

	
	function  toggleStatus($typeID, $status){
		
		$data			=	array('status'=>$status);	
		$this->db->where('subTypeID', $typeID);
		if($this->db->update($this->db->dbprefix('api_sub_industory_type_master'), $data))
		{
			return 1;
			
		}else{
			
		    return 0;	
		}	
	}

	function  deleteItem($typeID)
	{
		
		if($this->db->delete($this->db->dbprefix('api_sub_industory_type_master'), array('subTypeID'=>$typeID)))
		{
			return 1;
		
		}else{
		 
		 return 0;	
		
		}	
	}

	
}

?>
