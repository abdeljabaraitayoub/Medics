<?php

// use App\Models\Database;
use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\CashierController;
use App\Controllers\UserController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');
$router->get('/login', HomeController::class, 'login');
$router->get('/admin', Admin::class, 'index');
$router->get('/cashier', CashierController::class, 'index');
$router->get('/user', UserController::class, 'index');


$router->dispatch();
