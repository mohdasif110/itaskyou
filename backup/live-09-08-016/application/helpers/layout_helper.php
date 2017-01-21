<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

// Handling the layout. 
if(!function_exists('render')){

	function render($layout='admin_dashboard' ,$view, $data=array()){
	
		$obj =& get_instance();
		$data['view']				=	$view;
		
		$data['mydata']				=	$data;
		
		
		$obj->load->view('layouts/'.$layout , $data);
	}
	
}

//Render   
if(!function_exists('render_top_bar')){

	function render_top_bar(){
		
		$obj =& get_instance();
		$sessionData						=	$obj->session->userdata('logged_in');
		$data['userData']					=	$sessionData;
		$obj->load->view('layouts/includes/topbar', $data);
	}
	
}

if(!function_exists('render_side_bar')){

	function render_side_bar(){
	
		$obj =& get_instance();
		$sessionData					=	$obj->session->userdata('logged_in');
		$data['userData']				=	$sessionData;
		$obj->load->view('layouts/includes/sidebar', $data);
	
	}
}

  
  
  
  
	