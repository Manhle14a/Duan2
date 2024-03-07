<?php

use Admin\Mvcoop\Controllers\Admin\DashboardController;
use Admin\Mvcoop\Controllers\Admin\UserController;
use Admin\Mvcoop\Controllers\Admin\CategoryController;
use Bramus\Router\Router;

use Admin\Mvcoop\Controllers\Client\HomeController;
//Tạo phiên bản
$router = new Router();

// Xác định tuyến đường
$router->get('/', HomeController::class . '@index');

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/{id}/show' ,                      UserController::class . '@show');
        $router->get('/{id}/delete',                UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->match('GET|POST', '/create',       UserController::class . '@create');
    });
    $router->mount('/categories', function () use ($router) {
        $router->get('/',                           CategoryController::class . '@index');
        $router->get('/{id}/show' ,                      CategoryController::class . '@show');
        $router->get('/{id}/delete',                CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CategoryController::class . '@update');
        $router->match('GET|POST', '/create',       CategoryController::class . '@create');
    });
});

// Chạy nó
$router->run();
