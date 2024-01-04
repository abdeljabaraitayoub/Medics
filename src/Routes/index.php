<?php
session_start();

// use App\Models\Database;
use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\UserController;
use App\Controllers\VenteController;
use App\Controllers\auth;
use App\Controllers\rapport;
use App\Router;

$router = new Router();
//login and register
$router->get('/', auth::class, 'getlogin');
$router->get('/login', auth::class, 'getlogin');
$router->post('/', auth::class, 'login');
$router->get('/register', auth::class, 'getregister');
$router->get('/logout', auth::class, 'logout');
$router->post('/register', auth::class, 'register');
//rapports
$router->get('/stock', rapport::class, 'stock');
$router->get('/vente', rapport::class, 'vente');

$router->get('/admin', Admin::class, 'index');
$router->get('/sales', VenteController::class, 'index');
$router->get('/user', UserController::class, 'index');
$router->get('/add', VenteController::class, 'addOnLigne');
$router->post('/add', VenteController::class, 'creerVenteEnMagasin');
$router->get('/delete', VenteController::class, 'deleteVente');

$router->get('/edit', VenteController::class, 'editVente');
$router->get('/users', UserController::class, 'index2');
$router->post('/addUser', UserController::class, 'addUsers');
$router->get('/delete', UserController::class, 'deleteUsers');
$router->get('/edituser', UserController::class, 'editUsers');

$router->get('/edit', VenteController::class, 'getVente');
$router->post('/editVente', VenteController::class, 'editVente');



$router->dispatch();
