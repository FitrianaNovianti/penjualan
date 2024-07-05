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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['admin'] = 'admin/index';
$route['admin/create'] = 'admin/create';
$route['admin/edit/(:num)'] = 'admin/edit/$1';
$route['admin/delete/(:num)'] = 'admin/delete/$1';

$route['customer'] = 'customer/index';
$route['customer/create'] = 'customer/create';
$route['customer/edit/(:num)'] = 'customer/edit/$1';
$route['customer/view/(:num)'] = 'customer/view/$1';
$route['customer/delete/(:num)'] = 'customer/delete/$1';

$route['buku'] = 'buku/index';
$route['buku/create'] = 'buku/create';
$route['buku/edit/(:num)'] = 'buku/edit/$1';
$route['buku/view/(:num)'] = 'buku/view/$1';
$route['buku/delete/(:num)'] = 'buku/delete/$1';

$route['order'] = 'order/index';
$route['order/create'] = 'order/create';
$route['order/edit/(:num)'] = 'order/edit/$1';
$route['order/view/(:num)'] = 'order/view/$1';
$route['order/delete/(:num)'] = 'order/delete/$1';

$route['order_item/create/(:num)'] = 'order_item/create/$1';
$route['order_item/edit/(:num)'] = 'order_item/edit/$1';
$route['order_item/delete/(:num)'] = 'order_item/delete/$1';

$route['category'] = 'category/index';
$route['category/create'] = 'category/create';
$route['category/edit/(:num)'] = 'category/edit/$1';
$route['category/view/(:num)'] = 'category/view/$1';
$route['category/delete/(:num)'] = 'category/delete/$1';
