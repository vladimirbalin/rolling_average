<?php

use App\Router;

require_once './vendor/autoload.php';

$router = new Router();
$weatherService = new \App\WeatherService("weather_statistics.csv");

$router->addRoute('/day', [\App\Controller::class, 'day'], [$weatherService]);
$router->addRoute('/week', [\App\Controller::class, 'week'], [$weatherService]);
$router->addRoute('/month', [\App\Controller::class, 'month'], [$weatherService]);

$router->resolve();