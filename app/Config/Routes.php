<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/stokpusat', 'Home::Stok');
$routes->get('/ranpur', 'Home::DataRanpur');
$routes->post('auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');
