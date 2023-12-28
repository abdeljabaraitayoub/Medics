<?php
require '../vendor/autoload.php';

use App\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// print_r($_ENV);
$router = require '../src/Routes/index.php';
