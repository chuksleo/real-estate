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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about-us'] = "pages/about";
$route['auth/register'] = "auth/create_user";

$route['blog'] = "blog";
// $route['contact-us'] = "pages/contact";


$route['post-request'] = "pages/contact";
$route['lets-build'] = "pages/build";
$route['network-marketing'] = "pages/marketing";
$route['categories'] = "category/public_list";
$route['category/(:any)/(:num)'] = 'property/category/$1/$2';
$route['blog/(:num)/(:any)'] = 'blog/post/$1/$2';


$route['all-properties'] = 'property/listProperties';
$route['properties/popular'] = 'property/listPopularProperties';

$route['all-properties/(:num)'] = 'property/listProperties/$1';
$route['property/add'] = 'property/create';
$route['properties/search'] = 'property/search';
$route['properties/search/(:num)'] = 'property/search/$1';
$route['property-category/(:any)/(:num)'] = 'property/category/$1/$2';
$route['property-category/(:any)/(:num)/(:num)'] = 'property/category/$1/$2/$3';

$route['property/(:any)/(:num)'] = 'property/viewproperty/$1/$2';
$route['property/location/(:any)/(:num)'] = 'property/locationView/$1/$2';
$route['property/location/(:any)/(:num)/(:num)'] = 'property/locationView/$1/$2/$3';

// $route['user-property/edit/(:num)'] = 'property/edit/$1';
$route['user-property/publish/(:num)'] = 'property/publish/$1';
$route['donate/(:any)/(:num)'] = 'donation/pay/$1/$2';
 

$route['admin/dashboard'] = 'admin';

$route['user/properties'] = 'property';
$route['user/properties/add'] = 'property/create';
$route['user/properties/edit/(:num)'] = 'property/edit/$1';
$route['admin/properties'] = 'property/allPropertyAdmin';
$route['admin/properties/unpublished'] = 'property/allUnPublishedPropertyAdmin';


$route['admin/property/messages'] = 'admin/messages';
$route['admin/contact-messages'] = 'admin/contactmessages';
$route['admin/properties/unpublished'] = 'property/allUnPublishedPropertyAdmin';

$route['admin/properties/add'] = 'property/create';
$route['admin/properties/edit/(:num)'] = 'property/edit/$1';

$route['admin/properties/categories'] = 'admin/categorylist';
$route['admin/properties/categories/edit/(:num)'] = 'admin/categoryedit/$1';
$route['admin/properties/categories/add'] = 'admin/categoryadd';
$route['admin/properties/category/delete/(:num)'] = 'admin/categorydelete/$1';


$route['admin/properties/facilities'] = 'admin/facilitylist';
$route['admin/properties/facilities/edit/(:num)'] = 'admin/facilityedit/$1';
$route['admin/properties/facilities/add'] = 'admin/facilityadd';
$route['admin/properties/facility/delete/(:num)'] = 'admin/facilitydelete/$1';

$route['admin/properties/types'] = 'admin/propertyTypeList';
$route['admin/properties/category-type-map'] = 'admin/categoryMap';
$route['admin/properties/types/edit/(:num)'] = 'admin/propertyTypeEdit/$1';
$route['admin/properties/types/add'] = 'admin/propertyTypeAdd';
$route['admin/properties/types/delete/(:num)'] = 'admin/propertyTypeDelete/$1';


$route['admin/locations'] = 'admin/locationlist';
$route['admin/locations/add'] = 'admin/locationadd';
$route['admin/locations/edit/(:num)'] = 'admin/locationedit/$1';
$route['admin/locations/delete/(:num)'] = 'admin/locationdelete/$1';


$route['admin/projects'] = 'admin/projectlist';
$route['admin/projects/add'] = 'admin/projectadd';
$route['admin/projects/edit/(:num)'] = 'admin/projectedit/$1';
$route['admin/projects/delete/(:num)'] = 'admin/projectdelete/$1';


$route['lets-build/(:any)/(:num)'] = 'project/projectdetails/$2';

$route['admin/banners'] = 'admin/bannerlist';
$route['admin/banners/add'] = 'admin/banneradd';
$route['admin/banners/edit/(:num)'] = 'admin/banneredit/$1';
$route['admin/banners/delete/(:num)'] = 'admin/bannerdelete/$1';


$route['admin/members'] = 'auth/index';

$route['admin/reported-property'] = 'property/reported_campaign';


$route['admin/category/edit/(:num)'] = 'category/edit/$1';
$route['admin/category/delete/(:num)'] = 'category/delete/$1';
