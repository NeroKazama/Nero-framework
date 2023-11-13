<?php

use App\Controllers\Auth\AuthController;
use App\Src\Router;
use App\Controllers\BaseController;

$router = new Router();

$router->get('/', BaseController::class . '::show');

$router->get('/login', AuthController::class . '::show');

$router->post('/login', AuthController::class . '::signin');

$router->post('/create', AuthController::class . '::register');

$router->addNotFoundError(function () {
    echo "Error";
});

$router->run()

?>