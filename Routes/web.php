<?php

use App\Src\Router;
use App\Controllers\BaseController;

$router = new Router();

$router->get('/', BaseController::class . '::show');

$router->addNotFoundError(function () {
    echo "Error";
});

$router->run()

?>