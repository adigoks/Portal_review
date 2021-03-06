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
$route['post/paging/(:any)/(:any)'] = 'post/paginasi_komen/$1/$2';
$route['admin-edit-komen/paging/(:any)/(:any)'] = 'admin_post/view_edit_komen/$1/$2';
$route['post/paging'] = 'post/paginasi_komen';
$route['admin-dashboard/post/komentar/delete/(:any)'] = 'admin_post/del_com/$1';
$route['admin-dashboard/post/komentar/(:any)/(:any)'] = 'admin_post/paginasi_edit_komen/$1/$2';
$route['post/balas'] = 'post/balas_komen';
$route['post/komentar'] = 'post/komentar';
$route['kategori/(:any)/(:any)'] = 'post/kategori/$1/$2';
$route['kategori/(:any)'] = 'post/kategori/$1';
$route['tag/(:any)/(:any)'] = 'post/tag/$1/$2';
$route['tag/(:any)'] = 'post/tag/$1';
$route['page/kirim_saran'] = 'page/send_saran';
$route['page/logout'] = 'page/logout';
$route['page/form_profile'] = 'page/form_profile';
$route['page/update'] = 'page/update';
$route['page/lupa_password'] = 'page/lupa_password';
$route['page/send_lupa_pass'] = 'page/send_lupa_pass';
$route['page/daftar'] = 'page/daftar';
$route['validasi'] = 'page/validasi';
$route['user-page'] = 'page';
$route['post/:any'] = 'post/index/';
$route['search/(:any)/(:any)'] = 'post/search/$1/$2';
$route['search/(:any)'] = 'post/search/$1';
$route['search'] = 'post/search';
$route['user-post-tags'] = 'post';
$route['admin-dashboard'] = 'admin_dashboard';
$route['admin-dashboard/tampilan'] = 'admin_layout';
$route['admin-dashboard/layout'] = 'admin_layout/layout';
$route['admin-dashboard/pengaturan'] = 'admin_pengaturan';
$route['admin-dashboard/pengaturan/ubah-pass'] = 'admin_pengaturan/ubah_pass';
$route['admin-dashboard/inbox'] = 'admin_inbox';
$route['admin-dashboard/tampilan'] = 'admin_layout';
$route['admin-dashboard/layout'] = 'admin_layout/layout';
$route['admin-dashboard/layout/footer'] = 'admin_layout/footer';
$route['admin-dashboard/media'] = 'admin_media';
$route['admin-dashboard/profil/validasi/(:any)'] = 'admin_profil/validasi';
$route['admin-dashboard/profil'] = 'admin_profil';
$route['admin-dashboard/post/sesuaikan'] = 'admin_post/sesuaikan_post';
$route['admin-dashboard/post/tambah'] = 'admin_post/tambah_post';
$route['admin-dashboard/post'] = 'admin_post/tambah_post';
$route['admin-dashboard/menu/update_menu'] = 'admin_menu/update_menu';
$route['admin-dashboard/menu/sesuaikan'] = 'admin_menu/menu_sesuaikan';
$route['admin-dashboard/menu'] = 'admin_menu';
$route['admin-login'] = 'admin_login';
$route['page/(:any)'] = 'page/index/$1';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
