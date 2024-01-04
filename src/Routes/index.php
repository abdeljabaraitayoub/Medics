<?php
session_start();

// use App\Models\Database;
use App\Controllers\HomeController;
use App\Controllers\Admin;
use App\Controllers\UserController;
use App\Controllers\VenteController;
use App\Controllers\MedController;
use App\Controllers\auth;
use App\Controllers\rapport;
use App\Router;

$router = new Router();
//login and register
$router->get('/', auth::class, 'getlogin');
$router->post('/', auth::class, 'login');
$router->get('/login', auth::class, 'getlogin');
$router->get('/register', auth::class, 'getregister');
$router->get('/logout', auth::class, 'logout');
$router->post('/register', auth::class, 'register');
//rapports
$router->get('/stock', rapport::class, 'stock');
$router->get('/vente', rapport::class, 'vente');
$router->get('/bon', rapport::class, 'bon');


$router->get('/search', UserController::class, 'search');

$router->get('/admin', Admin::class, 'index');
$router->get('/sales', VenteController::class, 'index');
$router->get('/user', UserController::class, 'index');
$router->get('/add', VenteController::class, 'addOnLigne');
$router->post('/add', VenteController::class, 'creerVenteEnMagasin');
$router->get('/delete', VenteController::class, 'deleteVente');

$router->get('/edit', VenteController::class, 'editVente');
$router->get('/users', UserController::class, 'index2');

$router->get('/edit', VenteController::class, 'getVente');
$router->post('/editVente', VenteController::class, 'editVente');
$router->get('/accepter', VenteController::class, 'accepterVente');

$router->get('/medicine', MedController::class, 'ShowMed');
$router->get('/editMed', MedController::class, 'getMedEDit');
$router->get('/deleteMed', MedController::class, 'deleteMed');
$router->post('/add-medicine', MedController::class, 'creerMedEnMagasin');

$router->post('/editMedDetails', MedController::class, 'editMed');


$router->dispatch();
