<?php

use Modules\route\RouteCollector;

$router = new RouteCollector();
$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router->get('/', [App\Controllers\HomeController::class, 'index']);

$router->get('product/detail', [\App\Controllers\HomeController::class, 'detailProduct']);

// $router->get('checkout', [\App\Controllers\HomeController::class, 'checkout']);

$router->get('admin/dashboard', [\App\Controllers\Admin\AdminController::class, 'dashboard'])->middleware('auth');

$router->get('signup', [\App\Controllers\Client\ClientController::class, 'signup'])->middleware('signup');
$router->get('signin', [\App\Controllers\Client\ClientController::class, 'signin'])->middleware('signin');
$router->post('signup', [\App\Controllers\Client\ClientController::class, 'setSignup']);
$router->post('signin', [\App\Controllers\Client\ClientController::class, 'setSignin']);
$router->get('logout', [\App\Controllers\Client\ClientController::class, 'logOut']);

$router->get('admin/category', [\App\Controllers\Admin\AdminController::class, 'category'])->middleware('auth');
$router->get('admin/category/add', [\App\Controllers\Admin\AdminController::class, 'categoryCreate'])->middleware('auth');
$router->get('admin/category/{id}/delete', [\App\Controllers\Admin\AdminController::class, 'categoryInActive'])->middleware('auth');
$router->get('admin/category/{id}/edit', [\App\Controllers\Admin\AdminController::class, 'categoryEdit'])->middleware('auth');
$router->post('admin/category/add', [\App\Controllers\Admin\AdminController::class, 'categoryStore'])->middleware('auth');
$router->post('admin/category/{id}/update', [\App\Controllers\Admin\AdminController::class, 'categoryUpdate'])->middleware('auth');

$router->get('*', function () {
    require_once 'resources/views/pages/404.php';
});

$router->dispatch($_SERVER['REQUEST_METHOD'], $url);

$router->run();
