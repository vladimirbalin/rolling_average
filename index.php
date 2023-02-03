<?php

use App\Router;
use App\WeatherService;

require_once './vendor/autoload.php';

$weather = new WeatherService("weather_statistics.csv");

$router = new Router();

$router->addRoute('/day', [\App\Controller::class, 'day']);
$router->addRoute('/week', [\App\Controller::class, 'week']);
$router->addRoute('/month', [\App\Controller::class, 'month']);

$router->resolve();