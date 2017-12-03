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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['categories'] = 'categories/index';
$route['categories/(:any)'] = 'categories/subcategory/$1';
$route['categories/advertisements/(:any)/(:any)'] = 'categories/advertisements/$1/$2';

$route['advertisements'] = 'advertisements/index';
$route['advertisements/create'] = 'advertisements/create';
$route['advertisements/update'] = 'advertisements/update';
$route['advertisements/updateRating'] = 'advertisements/updateRating';
$route['advertisements/delete(:any)'] = 'advertisements/delete/$1';
$route['advertisements/edit/(:any)'] = 'advertisements/edit/$1';
$route['advertisements/user/(:any)'] = 'advertisements/view_user/$1';
$route['advertisements/(:any)'] = 'advertisements/view/$1';

$route['admins'] = 'admins/index';
$route['admins/advertisements'] = 'admins/index';
$route['admins/payments'] = 'admins/payments';
$route['admins/backupPayments'] = 'admins/backupPayments';
$route['admins/reports'] = 'admins/reports';
$route['admins/report1'] = 'admins/report1';
$route['admins/report2'] = 'admins/report2';
$route['admins/report3'] = 'admins/report3';
$route['admins/report4'] = 'admins/report4';
$route['admins/report5'] = 'admins/report5';
$route['admins/report6/(:any)'] = 'admins/report6/$1';
$route['admins/report7'] = 'admins/report7';
$route['admins/report8/(:any)'] = 'admins/report8/$1';
$route['admins/report9/(:any)'] = 'admins/report9/$1';

$route['locations'] = 'locations/index';
$route['locations/set/:id'] = 'locations/set';

$route['stores'] = 'stores/index';

$route['auth_controller/login'] = 'auth_controller/login';
$route['auth_controller/register'] = 'auth_controller/register';
$route['viewProfile'] = 'auth_controller/viewProfile';
$route['default_controller'] = 'pages/view';

$route['purchaseMembership'] = 'ClientPayment/purchaseMembership';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
