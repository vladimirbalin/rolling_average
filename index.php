<?php

use App\Router;

require_once './vendor/autoload.php';

$router = new Router();

$router->addRoute('/day', [\App\Controller::class, 'day']);
$router->addRoute('/week', [\App\Controller::class, 'week']);
$router->addRoute('/month', [\App\Controller::class, 'month']);

$router->resolve();