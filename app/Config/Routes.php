<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('articles', 'Articles::index');
$routes->get('articles/(:any)', 'Articles::detail/$1');
$routes->get('jadwal', 'Jadwals::index');

$routes->get('img-clas', 'ImgClas::index');  // Menampilkan halaman upload
$routes->post('img-clas', 'ImgClas::predict');


$routes->get('objec-det', 'ObjectDetController::index');
$routes->post('objec-det', 'ObjectDetController::detect');




$routes->get('chatbot', 'ChatbotController::index');
$routes->post('chatbot/send', 'ChatbotController::sendMessage');
