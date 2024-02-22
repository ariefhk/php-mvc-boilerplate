<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Router;
use App\Controller\HomeController;

// use App\Config\Test;




// $test = new Test();
// var_dump($test->name);


Router::add('GET', '/', HomeController::class, 'index');


Router::run();
