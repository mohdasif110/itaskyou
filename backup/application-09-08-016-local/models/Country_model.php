<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_model {

 
 // Admin 
 function get_contries_code(){
	 
		$PhoneCountryCode			= $this->db->select('*')
										->from($this->db->dbprefix('api_country_master as CM'))
										->get()
										->result();
										
		return  $PhoneCountryCode;
	 
 }
	
	// Admin 
	 function get_records()
	 {
		
		$PhoneCountryCode			= $this->db->select('*')
										->from($this->db->dbprefix('api_country_master as CM'))
										->order_by('id', 'desc')
										->get()
										->result();
		
		return  $PhoneCountryCode;
	}
	
	function  check_available($CountryText,$CountryCode)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_country_master'))
										->where(array('name'=>$CountryText,'phonecode'=>$CountryCode))
										->get()
										->num_rows();
		
	 if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	}
	
	function check_available_edit($countryID,$countryText)
	{
		
		$PhoneCountryCode				= $this->db->select('*')
										->from($this->db->dbprefix('api_country_master'))
										->where(array('id'=>$countryID,'name'=>$countryText))
										->get()
										->num_rows();
		
		if($PhoneCountryCode==0){
			
			return 0;
		
		}else{
			
			return 1;
		}		
	
	}
	
	function saveItem($data){
		
		if($this->db->insert($this->db->dbprefix('api_country_master'), $data)){
		
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}
	
	function updateItem($data,$countryID)
	{
		$this->db->where('id', $countryID);
		
		if($this->db->update($this->db->dbprefix('api_country_master'), $data)){
			
			return 1; 
			
		}else{
			
			return 0;
		}	 
	}

	
	function  toggleStatus($countryID, $status)
	{
		
		$data			=	array('status'=>$status);	
		$this->db->where('id', $countryID);
		if($this->db->update($this->db->dbprefix('api_country_master'), $data))
		{
			return 1;
			
		}else{
			
			return 0;	
		}	
	}
	
	function  deleteItem($countryID)
	{
	
		if($this->db->delete($this->db->dbprefix('api_country_master'), array('id'=>$countryID)))
		{
			
			return 1;
		
		}else{
		
			return 0;	
		
		}	
	}

}

?>
