<?php

use app\Router;
use app\Services\WeatherService;

require_once './vendor/autoload.php';

$weather = new WeatherService("weather_statistics.csv");

$router = new Router();

$router->addRoute('/day', [\app\Controller::class, 'day']);
$router->addRoute('/week', [\app\Controller::class, 'week']);
$router->addRoute('/month', [\app\Controller::class, 'month']);

$router->resolve();