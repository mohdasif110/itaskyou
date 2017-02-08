<?php
Class Organization extends CI_Model
{



 
 function get_organizations(){
	
	$data	=	$this->db->select('*')->from($this->db->dbprefix('api_organizations'))
						  ->get()
						  ->result();	
	
	
	return  $data;
	
 }
	

	
	
	
}

?>