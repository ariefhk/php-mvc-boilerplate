<?php

namespace App\Config;

use App\Middleware\Middleware;


class Router
{

    public static function testPrint()
    {
        echo "HELLO WORLD";
    }

    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function,
            "middlewares" => $middlewares
        ];
    }
    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            # code...
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            # code...
            if (preg_match($pattern, $path, $variables) &&  $method == $route['method']) {

                foreach ($route['middlewares'] as $middleware) {
                    # code...
                    $instanceMiddleware = new $middleware();
                    $instanceMiddleware->before();
                }

                # code...
                $controller = new $route['controller']();
                $function = $route['function'];

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);
                // echo "CONTROLLER : " . $route['controller'] . " FUNCTION : " . $route['function'];
                return;
            }
        }
        http_response_code(404);
        echo "CONTROLLER NOT FOUND!";
    }
}
