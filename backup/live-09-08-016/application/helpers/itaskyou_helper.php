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

  
  
  
  
	