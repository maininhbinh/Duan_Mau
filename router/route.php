<?php

use Modules\route\RouteCollector;

$router = new RouteCollector();
$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router->get('/', [App\Controllers\HomeController::class, 'index']);

$router->get('*', function () {
    require_once 'resources/views/pages/404.php';
});

$router->dispatch($_SERVER['REQUEST_METHOD'], $url);

$router->run();
