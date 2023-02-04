<?php

namespace App;

class Controller
{
    public function __construct(
        private readonly WeatherService $service
    )
    {
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