<?php

/**
 * User: ChinonsoIke
 * Date: 24/02/22
 * Time: 12:13 am
 */
require_once __DIR__."/../vendor/autoload.php";

use App\Controllers\AuthController;
use App\Core\Application;
use App\Controllers\SiteController;

// load phpdotenv package to make env configurations available
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config= [
    'userClass'=> \App\Models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'username'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ]
    ];

// instantiate  Application class responsible for running the app
// and pass in root dir path and config array
$app= new Application(dirname(__DIR__), $config);

// set routes, pass in either view name or callback
$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

// run the app
$app->run();