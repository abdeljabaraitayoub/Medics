<?php
session_start();

// use App\Models\Database;
use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\auth;
use App\Controllers\rapport;
// use App\Controllers\Ad;
use App\Router;

$router = new Router();
//login and register
$router->get('/', auth::class, 'getlogin');
$router->post('/', auth::class, 'login');
$router->get('/register', auth::class, 'getregister');
$router->post('/register', auth::class, 'register');
//rapports
$router->get('/stock', rapport::class, 'stock');

$router->get('/admin', Admin::class, 'index');


$router->dispatch();
