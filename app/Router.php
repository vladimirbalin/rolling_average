<?php

namespace App;

class Router
{
    protected array $routes = [];

    public function addRoute($route, $handler): void
    {
        $this->routes[$route] = $handler;
    }

    public function resolve(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $handler) {
            if ($uri === $route) {
                $handler[0] = new $handler[0];
                call_user_func($handler);
                return;
            }
        }

        http_response_code(404);
        echo 'Route not found';
    }
}
