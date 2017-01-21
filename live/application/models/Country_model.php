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

}

?>
