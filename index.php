<?php

use Services\WeatherService;

require_once './vendor/autoload.php';

$weather = new WeatherService("weather_statistics.csv");
//var_dump($weather->countAvgTempForEachDay());
var_dump($weather->countRollingAverage('day'));
