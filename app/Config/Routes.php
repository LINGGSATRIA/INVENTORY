<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/stokpusat', 'StokDataController::index');
$routes->post('/stokpusat/simpan', 'StokDataController::simpanDataStok');
$routes->get('/stokpusat/getBytipe/(:any)', 'Home::getBytipe/$1');
$routes->get('wilayah/getByName/(:any)', 'Home::getByName/$1');
$routes->get('wilayah/getByWilayah/(:any)', 'Home::getByWilayah/$1');
$routes->get('wilayah/getDeskripsi', 'Home::getDeskripsi');
$routes->get('/ranpur', 'RanpurController::index');
$routes->post('/ranpur/simpan', 'RanpurController::simpanDataRanpur');
$routes->post('auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');
