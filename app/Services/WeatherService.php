<?php

namespace App\Services;

class WeatherService
{
    private array $csv;

    public function __construct($filename)
    {
        $this->csv = file($filename);
    }

    public function getAvgTempForEachDay(): array
    {
        $arr = [];
        foreach ($this->csv as $line) {
            [$dateTime, $temperature] = str_getcsv($line, ";");
            $dateTime = \DateTime::createFromFormat("d.m.Y H:i", $dateTime);

            if (gettype($dateTime) !== "object") {
                continue;
            }

            $day = $dateTime->format("d.m.Y");
            $arr[$day][] = $temperature;
        }

        $averages = [];
        foreach ($arr as $day => $temps) {
            $count = count($temps);
            $averages[] = [
                'day' => $day,
                'avg_temp' => array_sum($temps) / $count
            ];
        }

        return array_reverse($averages);
    }

    public function getRollingAverageFor($period): array
    {
        $averageTemp = $this->getAvgTempForEachDay();
        $windowSize = match ($period) {
            'day' => 1,
            'week' => 7,
            'month' => 30
        };

        for ($i = 0; $i < count($averageTemp); $i++) {
            $window[] = $averageTemp[$i]['avg_temp'];

            if (count($window) > $windowSize) {
                $rollingAverage[$averageTemp[$i]['day']] = array_sum($window) / count($window);
                $averageTemp[$i]['avg_rolling'] = array_sum($window) / count($window);
                array_shift($window);
            } else {
                $averageTemp[$i]['avg_rolling'] = null;
            }
        }

        return $averageTemp;
    }
}