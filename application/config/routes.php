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
$route['translate_uri_dashes'] = TRUE;

//===============Auth=================//
$route['signin'] = 'Auth/SigninController/signIn';
$route['signup'] = 'Auth/SignupController/signUp';
$route['signout'] = 'Auth/SignoutController/signout';

//===============Video=================//
$route['upload'] = 'User/UploadController/upload';
$route['upload_video'] = 'User/UploadController/upload_video';
$route['video_saya'] = 'User/UserController/video_saya';
$route['video_user'] = 'User/UserController/video_user';
$route['video_saya/revisi'] = 'User/UserController/video_saya';
$route['video_saya/tidak'] = 'User/UserController/video_saya';
$route['video_user/revisi'] = 'User/UserController/video_user';
$route['video_user/tidak'] = 'User/UserController/video_user';
$route['video_saya/:num'] = 'User/UploadController/video_saya';
$route['komentar_video'] = 'User/UploadController/komentar_video';
$route['video'] = 'User/DataController/video';
$route['cetak/:num'] = 'User/DataController/cetak/';
$route['profile'] = 'User/UserController/profile_saya';
$route['info'] = 'User/UserController/informasi_dasar';
$route['ganti_foto'] = 'User/UserController/ganti_foto';
$route['upload_foto'] = 'User/UserController/upload_foto';
$route['ganti_password'] = 'User/UserController/ubah_password';