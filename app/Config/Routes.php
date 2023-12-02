<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/blog', 'Home::blog');

$routes->get('/login', 'Auth::index');
$routes->get('/admin', 'Auth::index');
$routes->post('/ceklogin', 'Auth::CekLogin');
$routes->post('/ceklogin', 'Auth::CekLogin');

$routes->post('/logout', 'Auth::logout');
$routes->get('logout', 'Auth::logout');


$routes->get('admin/dashboard', 'Admin::index', ['filter' => 'auth']);

$routes->get('admin/produk', 'Admin::Produk', ['filter' => 'auth']);
$routes->get('admin/tambahproduk', 'Admin::TambahProduk', ['filter' => 'auth']);
$routes->post('admin/simpanproduk', 'Admin::SimpanProduk', ['filter' => 'auth']);
$routes->post('admin/produk/ubah/(:num)', 'Admin::UpdateProduk/$1', ['filter' => 'auth']);
$routes->get('admin/produk/hapus/(:num)', 'Admin::HapusProduk/$1', ['filter' => 'auth']);

$routes->get('admin/post', 'Admin::Post', ['filter' => 'auth']);
$routes->get('admin/tambahpost', 'Admin::Tambahpost', ['filter' => 'auth']);
$routes->post('admin/simpanpost', 'Admin::Simpanpost', ['filter' => 'auth']);
$routes->post('admin/post/ubah/(:num)', 'Admin::Updatepost/$1', ['filter' => 'auth']);
$routes->get('admin/post/hapus/(:num)', 'Admin::Hapuspost/$1', ['filter' => 'auth']);


$routes->get('admin/akun', 'Admin::Akun', ['filter' => 'auth']);
$routes->post('admin/updateakun', 'Admin::UpdateAkun', ['filter' => 'auth']);
$routes->post('admin/updateprofile', 'Admin::updateProfile', ['filter' => 'auth']);

$routes->post('admin/tambahreview', 'Admin::TambahReview', ['filter' => 'auth']);
$routes->post('admin/updatereview/(:num)', 'Admin::updateReview/$1', ['filter' => 'auth']);
$routes->get('admin/hapusreview/(:num)', 'Admin::HapusReview/$1', ['filter' => 'auth']);





