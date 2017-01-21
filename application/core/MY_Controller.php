<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
	
		parent::__construct();
	}
	
}

//Load admin controller..
if ( ! class_exists('Admin_Controller'))
{
    require_once APPPATH.'core/Admin_controller.php';
}

//Load mobile api controller..


