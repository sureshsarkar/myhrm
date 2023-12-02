<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = "index";
$route['404_override'] = 'errorpage';
$route['translate_uri_dashes'] = FALSE;

//$route['front/login/resetPasswordConfirmUser/(:any)'] = 'front/login/resetPasswordConfirmUser/$1';
$route['admin'] = 'admin/dashboard';
// Service support


$route['download/(:any)'] = 'index/download/$1';
$route['play/(:any)'] = 'index/player/$1';
$route['category/(:any)'] = 'index/index/$1';
$route['search'] = 'index/index';
$route['downloadnow'] = 'index/autoformcontroller';
$route['analytics'] = 'appcallapi/analytics';
/*url for productlist*/
$route['courses/(:any)'] = 'video/index/$1';
$route['my-gear'] = 'my_gear';

//$route['vendor/edit-product/(:any)'] = 'vendor/products/edit/$1';

$route['time-closed'] = 'timeclosed';


// Sarkar Routes 
$route['company/(:any)'] = 'company/index/$1';
$route['design-and-development/(:any)'] = 'design_development/index/$1';
$route['our-solutions/(:any)'] = 'our_solutions/index/$1';
$route['digital-solutions/(:any)'] = 'digital_solutions/index/$1';
$route['experience/(:any)'] = 'experience/index/$1';
$route['contact-us/(:any)'] = 'contact_us/index/$1';
$route['contact-enquery'] = 'contact_us/contact_enquery';

$route['temples/(:any)'] = 'temples/index/$1';
$route['experiences/(:any)'] = 'experiences/index/$1';
$route['disclaimer'] = 'comonpage/disclaimer/index';
$route['privacy'] = 'comonpage/privacy/index';
$route['terms-and-conditions'] = 'comonpage/terms_conditions/index';

$route['test'] = 'test/index';


$route['index/'] = 'admin/login';
// $route['(:any)'] = 'commoncontroler/index/$1';
