<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends Admin_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('country_model');
  }
	
	function index(){
		
		$mydata	= $this->country_model->get_contries_code();
		$view						=	"countries/index";
		$data['page_title']			=	'Countries';
		$data['countries']			=	$mydata;
		
		
		//echo "<pre>";
		//print_r($data);
		//exit;
		
		render('admin_dashboard',$view,$data);
	 
	 }
	 
}

?>