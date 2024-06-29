<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';

// guru
$route['guru/act'] = 'Guru/add_act';
$route['guru/act-edit'] = 'Guru/edit_act';
$route['guru/delete/(:num)'] = 'Guru/hapus_act/$1';

// mapel
$route['mata-pelajaran'] = 'Mata_pelajaran';
$route['mata-pelajaran/act-add2'] = 'Mata_pelajaran/validation_form';

// ruangan
$route['ruangan/act'] = 'Ruangan/add_act';
$route['ruangan/delete/(:num)'] = 'Ruangan/hapus_act/$1';

// Guru Pengampu
$route['guru-pengampu'] = 'Guru_pengampu';
$route['guru-pengampu/act-add'] = 'Guru_pengampu/act_add';
$route['guru-pengampu/create-pengampu/(:any)'] = 'Guru_pengampu/create_pengampu/$1';

// Jadwal Khusus

$route['jadwal-khusus/(:num)'] = 'Jadwal_khusus';
$route['jadwal-khusus'] = 'Jadwal_khusus';
$route['jadwal-khusus/act-add'] = 'Jadwal_khusus/act_add';

// kelas
$route['kelas/act-add'] = 'Kelas/add_act';

// jam
$route['jam/act-add'] = 'Jam/act_add';


// login
$route['login/act-login'] = 'Login/proses_login';

// request-jadwal
$route['request-jadwal'] = 'Request_jadwal';

// request-jadwal
$route['tahun-akademik'] = 'Tahun_akademik';
$route['tahun-akademik/act-add'] = 'Tahun_akademik/add_act';
$route['tahun-akademik/act-aktif/(:num)'] = 'Tahun_akademik/act_aktif/$1';

// request-jadwal
$route['request-jadwal/act-add'] = 'Request_jadwal/act_add';


// penjadwalan
$route['penjadwalan/update-act'] = 'Penjadwalan/update_act2';
$route['penjadwalan/act-plan'] = 'Penjadwalan/act_plan';
$route['penjadwalan/create/(:num)'] = 'Penjadwalan/create/$1';

$route['penjadwalan/create-jadwal'] = 'Penjadwalan/create_jadwal';
$route['penjadwalan/reset-jadwal'] = 'Penjadwalan/reset_jadwal';
$route['penjadwalan/reset-penjadwalan'] = 'Penjadwalan/reset_penjadwalan';
$route['penjadwalan/reset-rumusan'] = 'Penjadwalan/reset_rumusan';
$route['penjadwalan/ploting-jadwal'] = 'Penjadwalan/ploting_jadwal';

$route['404_override'] = 'Error_page';
$route['translate_uri_dashes'] = FALSE;
