<?php


require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//config files

require_once __DIR__ . '/Routes/routes.php';



