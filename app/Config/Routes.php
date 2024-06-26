<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/register', 'RegisterController::register');
$routes->post('/login', 'LoginController::login');
