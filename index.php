<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Server;
use App\HelloWorld;

$router = new Router();

// Hello World endpoint
$router->get('/hello-world', function () {
    $hello = new HelloWorld();
    return $hello->toArray();
});

// Root endpoint
$router->get('/', function () {
    return [
        'message' => 'Welcome to PHP Hello World API',
        'endpoints' => [
            '/hello-world' => 'GET - Returns Hello World message'
        ]
    ];
});

$server = new Server($router);
$server->run();

