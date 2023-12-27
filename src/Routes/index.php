<?php

use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\Ad;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');
$router->get('/login', HomeController::class, 'login');
$router->get('/admin', Admin::class, 'index');


$router->dispatch();
