<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//backend
$route['backend'] = 'BackController/masuk';
$route['backend_masuk'] = 'BackController/masuk_admin';
$route['back/(:any)'] = 'BackController/akses_admin/$1';

//frontend
$route['default_controller'] = 'FrontController/index';
$route['front/(:any)'] = 'FrontController/halaman/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
