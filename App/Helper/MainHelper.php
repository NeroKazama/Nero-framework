<?php

namespace App\Helper;

class MainHelper
{

    public $view;
    public $path;
    public $uri;
    public $method;

    public function __construct()
    {
        $this->view = $_SERVER['DOCUMENT_ROOT'] . '/Public/Views/';
        $this->path = $_SERVER['DOCUMENT_ROOT'] . '\App\Controllers';
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function View(string $path, ...$params): void
    {
        
        if (!empty($params)) {

            $lastitem = array_key_last($params[0]);

            foreach ($params[0] as $key => $value) {
                ${$key} = $value;
            }
           
            if ($params[0][$lastitem] === false) {
                include($this->view . $path);
                return;
            }

        }

        $page = $this->view . $path;
        include($this->view . '/app/app.php');
    }

    public function errorView($error): void
    {
        include('Public/Views/404.php');
    }

    public function redirectback($error): void
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function passHash($pass): string
    {
        $pwd_peppered = hash_hmac("sha256", $pass, $_ENV['App_Hash']);
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
        return $pwd_hashed;
    }

}

?>