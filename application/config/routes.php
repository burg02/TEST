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

//pages


$route['default_controller'] = 'Pages/index';
$route['dashboard'] = 'Pages/dashboard';
$route['producers'] = 'Pages/producers';
$route['music-releases'] = 'Pages/releases';
$route['genres/(:any)'] = 'Pages/genres/$1';
$route['profile'] = 'Pages/profile';
$route['producer/(:any)'] = 'Pages/view_producer/$1';

// producers

$route['fetch-top-producers'] = 'DashboardController/fetch_top_producers';
$route['fetch-all-producers'] = 'DashboardController/fetch_all_producers';

// music releases

$route['fetch-latest-music'] = 'DashboardController/fetch_latest_music';
$route['fetch-all-music'] = 'DashboardController/fetch_all_music';
$route['search-music'] = 'DashboardController/search_music';

// genres

$route['fetch-genres'] = 'DashboardController/fetch_genres';

// profile 

$route['update-banner'] = 'DashboardController/update_banner';
$route['update-profile'] = 'DashboardController/update_profile';
$route['add-music'] = 'DashboardController/upload_music';
$route['view-music'] = 'DashboardController/fetch_music';

// delete music

$route['view-music/(:any)'] = 'DashboardController/view_music/$1';
$route['delete-music/(:any)'] = 'DashboardController/delete_music/$1';


// auth

$route['signupListener'] = 'AuthController/signupListener';
$route['signupProducer'] = 'AuthController/signupProducer';
$route['signin'] = 'AuthController/signin';
$route['signout'] = 'AuthController/signout';

// admin route

$route['admin/dashboard'] = 'Pages/admin_dashboard';
$route['admin/all-users'] = 'Pages/all_users';
$route['admin/all-music'] = 'Pages/all_music';
$route['admin/most-visited'] = 'Pages/most_visited';
$route['admin/login'] = 'Pages/login';
$route['admin/logout'] = 'Pages/logout';

// save actions

$route['savePlayedMusic'] = 'Pages/savePlayedMusic';

// default

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

