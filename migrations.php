<?php

require_once __DIR__."/vendor/autoload.php";

use App\Controllers\AuthController;
use NoxxPHP\Core\Application;
use App\Controllers\SiteController;

// load phpdotenv package to make env configurations available
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config= [
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'username'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ]
    ];

// instantiate  Application class responsible for running the app
// and pass in root dir path and config array
$app= new Application(__DIR__, $config);

// run the app
$app->db->runMigrations();