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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']                         = 'auth/admin';
$route['404']                           = 'dashboard/not_found';
$route['authentication-worker']         = 'auth/authentication_worker';
$route['authentication-admin']          = 'auth/authentication_admin';
$route['pengaturan-admin/(:any)']       = 'dashboard/configuration_admin/$1';
$route['proses-configuration/(:any)']   = 'dashboard/process_configuration/$1';

$route['dashboard']                     = 'dashboard/index';
$route['signout']                       = 'auth/logout';
$route['kategori']                      = 'buku/kategori_page';
$route['penerbit']                      = 'buku/penerbit_page';
$route['petugas']                       = 'petugas/index';
$route['lemari']                        = 'buku/lemari_page';
$route['buku']                          = 'buku/index';
$route['kelas']                         = 'siswa/kelas_page';
$route['siswa']                         = 'siswa/index';
$route['rent']                          = 'rent/index';

$route['tambah-buku']                   = 'buku/add_buku';
$route['insert-buku']                   = 'buku/insert_book';
$route['update-buku']                   = 'buku/update_book';
$route['edit-buku/(:any)']              = 'buku/edit_buku/$1';

$route['insert-kategori']               = 'buku/insert_category';
$route['update-kategori']               = 'buku/update_category';
$route['edit-kategori/(:any)']          = 'buku/edit_kategori/$1';
$route['del-kategori/(:any)']           = 'buku/del_category/$1';

$route['insert-lemari']                 = 'buku/insert_lemari';
$route['update-lemari']                 = 'buku/update_lemari';
$route['edit-lemari/(:any)']            = 'buku/edit_lemari/$1';
$route['del-lemari/(:any)']             = 'buku/del_lemari/$1';

$route['insert-kelas']                  = 'siswa/insert_kelas';
$route['update-kelas']                  = 'siswa/update_kelas';
$route['detail-siswa-kelas/(:any)']     = 'siswa/kelas_siswa/$1';
$route['edit-kelas/(:any)']             = 'siswa/edit_kelas/$1';
$route['del-kelas/(:any)']              = 'siswa/del_kelas/$1';

$route['insert-penerbit']               = 'buku/insert_penerbit';
$route['update-penerbit']               = 'buku/update_penerbit';
$route['edit-penerbit/(:any)']          = 'buku/edit_penerbit/$1';
$route['del-penerbit/(:any)']           = 'buku/del_penerbit/$1';

$route['add-siswa']                     = 'siswa/add_siswa';
$route['edit-siswa/(:any)']             = 'siswa/edit_siswa/$1';
$route['insert-siswa']                  = 'siswa/insert_process';
$route['update-siswa/(:any)']           = 'siswa/update_process/$1';
$route['del-siswa/(:any)/(:any)']       = 'siswa/del_siswa/$1/$1';
$route['clear-photo/(:any)/(:any)']     = 'siswa/clear_photo/$1/$1';

$route['tambah-petugas']                = 'petugas/add_petugas';
$route['insert-petugas']                = 'petugas/insert_petugas';
$route['update-petugas/(:any)']         = 'petugas/update_petugas/$1';
$route['tambah-akun-petugas']           = 'petugas/add_userworker';
$route['update-akun-petugas']           = 'petugas/update_userworker';
$route['detail-petugas/(:any)']         = 'petugas/detail_petugas/$1';
$route['edit-petugas/(:any)']           = 'petugas/edit_petugas/$1';
$route['del-petugas/(:any)/(:any)']     = 'petugas/del_petugas/$1/$1';


$route['stok-buku/(:any)']              = 'buku/stok_page/$1';
$route['edit-stok/(:any)']              = 'buku/edit_stok/$1';
$route['tambah-stok/(:any)']            = 'buku/add_stok_buku/$1';
$route['insert-stok/(:any)']            = 'buku/insert_stok/$1';
$route['update-stok/(:any)']            = 'buku/update_stok/$1';
$route['del-stok/(:any)']               = 'buku/del_stok/$1';

$route['insert-rent']                   = 'rent/insert_rent';
$route['update-rent']                   = 'petugas/update_petugas';
$route['edit-rent/(:any)']              = 'rent/edit_rent/$1';
$route['del-rent/(:any)/(:any)']        = 'rent/del_rent/$1/$1';
