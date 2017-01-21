<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/


//$route['default_controller'] = "welcome";
//$route['404_override'] = '';

$route['default_controller'] = "Admin/Admin";
$route['404_override'] = '';



//Admin login page 
$route['admin'] 				= 'Admin/Admin';
$route['admin/login'] 			= 'Admin/Admin/login';
$route['admin/theme'] 			= 'Admin/dashboard/theme';
$route['admin/countries'] 		= 'Admin/Countries';

$route['admin/industorytype'] 	= 'Admin/IndustorType';
$route['admin/industorytype/save_industorytype'] 	= 'Admin/IndustorType/save_industorytype';
$route['admin/industorytype/update_industorytype'] 	= 'Admin/IndustorType/update_industorytype';
$route['admin/industorytype/toggleIndustoryType'] 	= 'Admin/IndustorType/toggleIndustoryType';

$route['admin/industorytype/deleteIndustoryType'] 	= 'Admin/IndustorType/deleteIndustoryType';


$route['admin/industorytype/get_industorytype'] 	= 'Admin/IndustorType/get_industorytype';
$route['admin/industorytype/get_industorytype_single'] 	= 'Admin/IndustorType/get_industorytype_single';


//Sub industory type.
$route['admin/subindustorytype'] 				= 'Admin/subindustoryType';
$route['admin/subindustorytype/get_records'] 	= 'Admin/subindustoryType/get_records';
$route['admin/subindustorytype/saveItem'] 		= 'Admin/subindustoryType/saveItem';
$route['admin/subindustorytype/updateItem'] 	= 'Admin/subindustoryType/updateItem';
$route['admin/subindustorytype/toggleStatus'] 	= 'Admin/subindustoryType/toggleStatus';
$route['admin/subindustorytype/deleteItem'] 	= 'Admin/subindustoryType/deleteItem';

//End of subindustory type.

/* End of file routes.php */
/* Location: ./application/config/routes.php */