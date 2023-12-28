<?php
session_start();

use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\auth;
use App\Controllers\Ad;
use App\Router;

$router = new Router();
//login and register
$router->get('/', auth::class, 'getlogin');
$router->post('/', auth::class, 'login');
$router->get('/register', auth::class, 'getregister');
$router->post('/register', auth::class, 'register');

$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');
$router->get('/login', HomeController::class, 'login');
$router->get('/admin', Admin::class, 'index');


$router->dispatch();
