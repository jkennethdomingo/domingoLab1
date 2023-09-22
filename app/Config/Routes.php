<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('save', 'MainController::save');
$routes->get('delete/(:any)', 'MainController::delete/$1');
$routes->get('edit/(:any)', 'MainController::edit/$1');
$routes->get('editSection/(:any)', 'MainController::editSection/$1');
$routes->post('add', 'MainController::add');
$routes->get('remove/(:any)', 'MainController::remove/$1');
