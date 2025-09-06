<?php

namespace App\Core;

define('BASE_URL', '/SeekYu/public');

class Router
{
    protected $routes = [];

    public function get($path, $handler)
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute($method, $path, $handler)
    {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch($uri, $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        // Detect base path dynamically (e.g., /SeekYu/public)
        $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        $basePath = rtrim($scriptName, '/');

        // Remove base path if present
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = rtrim($uri, '/');
        if ($uri === '') $uri = '/';

        foreach ($this->routes as $route) {
            if ($route['path'] === $uri && $route['method'] === strtoupper($method)) {
                [$controller, $action] = explode('@', $route['handler']);
                $controllerClass = "App\\Controllers\\$controller";

                if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                    $obj = new $controllerClass();
                    return $obj->$action();
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
