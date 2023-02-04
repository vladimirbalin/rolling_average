<?php

namespace App;

class Router
{
    /**
     * @var array Роуты.
     * Имеет вид:
     *    ['/url' =>
     *      [
     *         'handler' => [SomeController::class, method] | \Namespace\SomeController::class | callable,
     *         'deps' => [dependencies]
     *       ]
     *    ]
     */
    protected array $routes = [];

    public function addRoute(
        $route,
        string|callable|array $handler,
        array $deps = []
    ): void
    {
        $this->routes[$route] = ['handler' => $handler, 'deps' => $deps];
    }

    public function resolve(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $arr) {

            if ($uri !== $route) {
                continue;
            }

            if (is_array($arr['handler'])) {
                $class = $arr['handler'][0];
                $arr['handler'][0] = new $class(...$arr['deps']);

                call_user_func($arr['handler']);
                return;
            }

            if (is_string($arr['handler'])) {
                //TODO
            }
            if (is_object($arr['handler'])) {
                //TODO
            }
        }

        http_response_code(404);
        echo 'Route not found';
    }
}
