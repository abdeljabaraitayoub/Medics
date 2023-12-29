<?php

// use App\Models\Database;
use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\UserController;
use App\Controllers\VenteController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');
$router->get('/login', HomeController::class, 'login');
$router->get('/admin', Admin::class, 'index');
$router->get('/sales', VenteController::class, 'index');
$router->get('/user', UserController::class, 'index');
$router->get('/add', VenteController::class, 'addOnLigne');
$router->post('/add', VenteController::class, 'creerVenteEnMagasin');
$router->get('/delete', VenteController::class, 'deleteVente');


$router->dispatch();
