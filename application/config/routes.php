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
$route['default_controller'] = 'C_Home';
$route['view/category'] = 'C_Category';
$route['view/video'] = 'C_Detail/loadDetail/1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['C_Search'] = 'C_NotifyErrors';
$route['manager'] = 'C_NotifyErrors';
$route['admin'] = 'C_NotifyErrors';

$route['view/login'] = 'C_Account/login';
$route['view/signup'] = 'C_Account/signup';



// Thay doi route
// Xem lai reg group : 0-1-2
$route['view/video/(:any)'] = "C_Detail/loadDetail/$1";

$route['video/author/(:any)'] = "C_Author_Videos/getVideoByAuthor/$1";

$route['view/category/(:any)'] = "C_Category/loadCategory/$1";


// Home
$route['home'] = 'C_Home';

//Sidebar 
$route['admin/logout'] = 'C_Account/logout';


// Manager
$route['manager/myvideo'] = 'manager/C_Admin_Video';
$route['manager/sharelinkvideo'] = 'C_ShareVideo/getAllLinkVideoUnAgreed';
$route['manager/linkvideo'] = 'C_ShareVideo/getAllLinkVideoUnAgreed';

// Admin
$route['manager/admin/system'] = 'manager/admin/C_Admin_Video';
$route['manager/admin/view/insertVideo'] = 'manager/admin/C_Admin_Video/insertVideo';
$route['manager/admin/video/updateVideo/(:any)'] = 'manager/admin/C_Admin_Video/updateVideo/$1';
$route['manager/admin/video/deleteVideo/(:any)'] = 'manager/admin/C_Admin_Video/deleteVideoById/$1';
$route['manager/admin/video/view/(:any)'] = 'manager/admin/C_Admin_Video/getVideoById/$1';

$route['manager/admin/view/uploadVideo/(:any)'] = 'manager/admin/C_Admin_Video/uploadVideo/$1';
$route['manager/admin/view/conductUploadVideo'] = 'manager/admin/C_Admin_Video/conductUploadVideo';


// Admin Share Video
$route['manager/admin/view/sharelink'] = 'manager/admin/C_Share_Video/getAllLinkVideoAgreed';
$route['manager/admin/view/unagreedsharelink'] = 'manager/admin/C_Share_Video/getAllLinkVideoUnAgreed';


// Admin Category
$route['manager/admin/category'] = 'manager/admin/C_Admin_Category';
$route['manager/admin/category/insertCategory'] = 'manager/admin/C_Admin_Category/insertCategory';
$route['manager/admin/category/updateCategory/(:any)'] = 'manager/admin/C_Admin_Category/updateCategory/$1';
$route['manager/admin/category/deleteCategory/(:any)'] = 'manager/admin/C_Admin_Category/deleteCategory/$1';
$route['manager/admin/category/view/(:any)'] = 'manager/admin/C_Admin_Category/getCategoryById/$1';


// Admin SubCategory
$route['manager/admin/sub-category'] = 'manager/admin/C_Admin_SubCategory';
$route['manager/admin/sub-category/insertSubCategory'] = 'manager/admin/C_Admin_SubCategory/insertSubCategory';
$route['manager/admin/sub-category/updateSubCategory/(:any)'] = 'manager/admin/C_Admin_SubCategory/updateSubCategory/$1';
$route['manager/admin/sub-category/deleteSubCategory/(:any)'] = 'manager/admin/C_Admin_SubCategory/deleteCategory/$1';
$route['manager/admin/sub-category/view/(:any)'] = 'manager/admin/C_Admin_SubCategory/getSubCategoryById/$1';


// Admin search
$route['manager/admin/search'] = 'manager/admin/C_Admin_Search';


