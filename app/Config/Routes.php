<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/stokpusat', 'StokDataController::index', ['filter' => 'auth']);
$routes->post('/stokpusat/simpan', 'StokDataController::simpanDataStok', ['filter' => 'auth']);
$routes->get('/stokpusat/getBytipe/(:any)', 'Home::getBytipe/$1', ['filter' => 'auth']);
$routes->get('wilayah/getByName/(:any)', 'Home::getByName/$1', ['filter' => 'auth']);
$routes->get('wilayah/getByWilayah/(:any)', 'Home::getByWilayah/$1', ['filter' => 'auth']);
$routes->get('wilayah/getDeskripsi', 'Home::getDeskripsi', ['filter' => 'auth']);
$routes->get('/ranpur', 'RanpurController::index', ['filter' => 'auth']);
$routes->post('/ranpur/simpan', 'RanpurController::simpanDataRanpur', ['filter' => 'auth']);
$routes->get('/user', 'UserController::index', ['filter' => 'auth']);
$routes->get('/user/list', 'UserController::getUserList', ['filter' => 'auth']);
$routes->post('/user/create', 'UserController::create', ['filter' => 'auth']);
$routes->get('/user/edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
$routes->post('/user/update/(:num)', 'UserController::update/$1', ['filter' => 'auth']);
$routes->get('/user/delete/(:num)', 'UserController::delete/$1', ['filter' => 'auth']);
$routes->get('login', 'AuthController::login');
$routes->post('auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

