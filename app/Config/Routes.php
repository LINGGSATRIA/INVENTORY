<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/stokpusat', 'Home::Stok');
$routes->get('wilayah/getByName/(:any)', 'Home::getByName/$1');
$routes->get('wilayah/getByWilayah/(:any)', 'Home::getByWilayah/$1');
$routes->get('wilayah/getDeskripsi', 'Home::getDeskripsi');
$routes->get('/ranpur', 'RanpurController::index');
$routes->post('/ranpur/simpan', 'RanpurController::simpanDataRanpur');
$routes->post('auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');
