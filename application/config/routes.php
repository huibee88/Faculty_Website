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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//manage facilities
$route['facilities']['GET'] = 'FacilitiesController/mainFacilityDisplay';
$route['facilities/manage']['GET'] = 'FacilitiesController/manage';
$route['facilities/add']['GET'] = 'FacilitiesController/create';
$route['facilities/add']['POST'] = 'FacilitiesController/store';
$route['facilities/edit/(:any)']['GET'] = 'FacilitiesController/edit/$1';
$route['facilities/update/(:any)']['POST'] = 'FacilitiesController/update/$1';
$route['facilities/delete/(:any)']['GET'] = 'FacilitiesController/delete/$1';

//login and logout
$route['login']['GET'] = 'LoginController/loginForm';
$route['login']['POST'] = 'LoginController/login';
$route['logout']['GET'] = 'LoginController/logout';



//Normal User view route
$route['viewfacilities']['GET'] = 'NormalViewPage/displayFacility';
$route['home']['GET'] = 'NormalViewPage/displayHome';

//after login common view pages
$route['homeafter']['GET'] = 'CommonViewPageAfterLogin/displayHomeAfter';
$route['viewfacilitiesAfterLogin']['GET'] = 'CommonViewPageAfterLogin/displayFacilityAfter';
$route['aboutafter']['GET'] = 'CommonViewPageAfterLogin/displayAboutAfter';
$route['contactafter']['GET'] = 'CommonViewPageAfterLogin/displayContactAfter';
