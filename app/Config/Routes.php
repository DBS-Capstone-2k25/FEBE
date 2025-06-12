<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('articles', 'Articles::index');
$routes->get('jadwal', 'Jadwals::index');
