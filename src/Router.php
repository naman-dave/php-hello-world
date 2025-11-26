<?php

namespace App;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $method = strtoupper($method);
        $path = parse_url($path, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            $response = call_user_func($handler);
            $this->sendResponse($response);
        } else {
            $this->sendResponse(['error' => 'Not Found'], 404);
        }
    }

    private function sendResponse($data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}

