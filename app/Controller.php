<?php

namespace app;

use App\Services\WeatherService;

class Controller
{
    private WeatherService $service;

    public function __construct()
    {
        $this->service = new WeatherService("weather_statistics.csv");
        header('Content-type: application/json');
    }

    public function day(): void
    {
        echo json_encode(
            $this->service->getRollingAverageFor('day')
        );
    }

    public function week(): void
    {
        echo json_encode(
            $this->service->getRollingAverageFor('week')
        );
    }

    public function month(): void
    {
        echo json_encode(
            $this->service->getRollingAverageFor('month')
        );
    }
}