<?php

use Middleware\middleware;
use Modules\route\RouteCollector;

$router = new RouteCollector();
$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router->get('/', [App\Controllers\HomeController::class, 'index']);

$router->get('product/{id}/detail', [\App\Controllers\HomeController::class, 'detailProduct']);

// $router->get('checkout', [\App\Controllers\HomeController::class, 'checkout']);

$router->get('admin/dashboard', [\App\Controllers\Admin\AdminController::class, 'dashboard'])->middleware('auth');

$router->get('signup', [\App\Controllers\Client\ClientController::class, 'signup'])->middleware('signup');
$router->get('signin', [\App\Controllers\Client\ClientController::class, 'signin'])->middleware('signin');
$router->post('signup', [\App\Controllers\Client\ClientController::class, 'setSignup']);
$router->post('signin', [\App\Controllers\Client\ClientController::class, 'setSignin']);
$router->get('logout', [\App\Controllers\Client\ClientController::class, 'logOut']);

$router->get('profile/{id}', [\App\Controllers\Client\ClientController::class, 'profile'])->middleware('user');
$router->post('profile/{id}', [\App\Controllers\Client\ClientController::class, 'updateProfile'])->middleware('user');
$router->post('profile/{id}/upload', [\App\Controllers\Client\ClientController::class, 'uploadImage'])->middleware('user');
$router->get('profile/{id}/deleteimg', [\App\Controllers\Client\ClientController::class, 'deleteImage'])->middleware('user');
$router->post('profile/{id}/password', [\App\Controllers\Client\ClientController::class, 'changePassword'])->middleware('user');

$router->get('admin/category', [\App\Controllers\Admin\AdminController::class, 'category'])->middleware('auth');
$router->get('admin/category/add', [\App\Controllers\Admin\AdminController::class, 'categoryCreate'])->middleware('auth');
$router->get('admin/category/{id}/in_active', [\App\Controllers\Admin\AdminController::class, 'categoryInActive'])->middleware('auth');
$router->get('admin/category/{id}/active', [\App\Controllers\Admin\AdminController::class, 'categoryActive'])->middleware('auth');
$router->get('admin/category/{id}/edit', [\App\Controllers\Admin\AdminController::class, 'categoryEdit'])->middleware('auth');
$router->post('admin/category/add', [\App\Controllers\Admin\AdminController::class, 'categoryStore'])->middleware('auth');
$router->post('admin/category/{id}/update', [\App\Controllers\Admin\AdminController::class, 'categoryUpdate'])->middleware('auth');
$router->get('admin/category/{id}/remove/img', [\App\Controllers\Admin\AdminController::class, 'categoryRemoveImg'])->middleware('auth');

$router->get('admin/product', [\App\Controllers\Admin\AdminController::class, 'product'])->middleware('auth');
$router->get('admin/product/add', [\App\Controllers\Admin\AdminController::class, 'productCreate'])->middleware('auth');
$router->post('admin/product/add', [\App\Controllers\Admin\AdminController::class, 'productStore'])->middleware('auth');
$router->get('admin/product/{id}/edit', [\App\Controllers\Admin\AdminController::class, 'productEdit'])->middleware('auth');
$router->post('admin/product/{id}/update', [\App\Controllers\Admin\AdminController::class, 'productUpdate'])->middleware('auth');
$router->get('admin/product/{id}/delete', [\App\Controllers\Admin\AdminController::class, 'productDelete'])->middleware('auth');

$router->get('admin/user', [\App\Controllers\Admin\AdminController::class, 'user'])->middleware('auth');
$router->get('admin/user/{id}/in_active', [\App\Controllers\Admin\AdminController::class, 'userInActive'])->middleware('auth');
$router->get('admin/user/{id}/active', [\App\Controllers\Admin\AdminController::class, 'userActive'])->middleware('auth');
$router->get('admin/{id}/role', [\App\Controllers\Admin\AdminController::class, 'role'])->middleware('auth');

$router->get('admin/comment', [\App\Controllers\Admin\AdminController::class, 'comment'])->middleware('auth');
$router->get('admin/comment/{id}/delete', [\App\Controllers\Admin\AdminController::class, 'commentDelete'])->middleware('auth');

$router->get('shop', [\App\Controllers\HomeController::class, 'shop']);
$router->post('shop', [\App\Controllers\HomeController::class, 'shop']);
$router->get('setview/{id}', [\App\Controllers\HomeController::class, 'setView']);
$router->get('shop/{id}/category', [\App\Controllers\HomeController::class, 'filterCategory']);
$router->get('shop/{id}/category', [\App\Controllers\HomeController::class, 'filterCategory']);
$router->get('shop/search', [\App\Controllers\HomeController::class, 'filterSearch']);
$router->post('shop/{id}/comment/{id}', [\App\Controllers\HomeController::class, 'postComment'])->middleware('user');
$router->get('comment/{id}/delete', [\App\Controllers\HomeController::class, 'deleteComment'])->middleware('user');
$router->post('shop/{id}/comment/{id}/reply/{id}', [\App\Controllers\HomeController::class, 'replyComment'])->middleware('auth');

$router->get('*', function () {
    require_once 'resources/views/pages/404.php';
});

$router->dispatch($_SERVER['REQUEST_METHOD'], $url);

$router->run();
