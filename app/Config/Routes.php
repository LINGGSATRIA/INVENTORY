<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->group('admin', ['filter' => ['auth', 'role:1']], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('stokpusat', 'StokDataController::index');
    $routes->post('stokpusat/simpan', 'StokDataController::simpanDataStok');
    $routes->post('stokpusat/getDeskripsi', 'StokDataController::getDeskripsi');
    $routes->get('ranpur', 'RanpurController::index');
    $routes->post('ranpur/simpan', 'RanpurController::simpanDataRanpur');
    $routes->get('user', 'UserController::index');
    $routes->get('user/list', 'UserController::getUserList');
    $routes->post('user/create', 'UserController::create');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::update/$1');
    $routes->get('user/delete/(:num)', 'UserController::delete/$1');
});

$routes->group('user', ['filter' => ['auth', 'role:2']], function ($routes) {
    $routes->get('dashboard', 'Home::userdash');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('update/(:num)', 'UserController::update/$1');
});

// Rute autentikasi tanpa filter auth
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout', ['filter' => 'auth']);
$routes->get('/wilayah/getTIpeBykategori/(:any)', 'Home::getTIpeBykategori/$1', ['filter' => 'auth']);
$routes->get('/wilayah/getByNameWithVersi/(:any)', 'Home::getByNameWithVersi/$1', ['filter' => 'auth']);
$routes->get('/wilayah/getByName/(:any)', 'Home::getByName/$1', ['filter' => 'auth']);
$routes->get('/wilayah/getByWilayah/(:any)', 'Home::getByWilayah/$1', ['filter' => 'auth']);
$routes->get('/wilayah/getSubWilayahByWilayah/(:any)', 'Home::getSubWilayahByWilayah/$1', ['filter' => 'auth']);
$routes->get('/wilayah/getDeskripsi', 'Home::getDeskripsi', ['filter' => 'auth']);
$routes->get('stokpusat/getBytipe/(:any)', 'Home::getBytipe/$1', ['filter' => 'auth']);
$routes->get('stokpusat/getByWilayahSubWilayah/(:any)/(:any)', 'Home::getByWilayahSubWilayah/$1/$2', ['filter' => 'auth']);
