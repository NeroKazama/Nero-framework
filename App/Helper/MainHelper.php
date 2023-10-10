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
        
        $layout = true;
        if (!empty($params)) {
            $last_key = array_key_last($params[0]);

            foreach ($params[0] as $key => $value) {
                if ($key == $last_key) {
                    if($value == false) {
                        $layout = $value;
                    }
                } else {
                    ${$key} = $value;
                } 
            }
        }
       
        if($layout == false ) {
            include($this->view . $path);
        }

        $page = $this->view . $path;
        include($this->view . '/app/app.php');
    }

    public function errorView($error): void
    {
        include('Public/Views/404.php');
    }

}

?>