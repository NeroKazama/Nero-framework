<?php

namespace App\Src;


use App\Controllers\Controller;

class Router extends Controller {

    private $notFoundError;
    private array $handlers;
    private const M_GET = 'GET';
    private const M_POST = 'POST';

    public function run(): void {
        $requestUri = parse_url($this->Helper->uri);
        $requestPath = $requestUri['path'];
        
        $callback = null;
        foreach( $this->handlers as $handler) {
            if($handler['path'] === $requestPath && $this->Helper->method === $handler['method']) {
                $callback = $handler['handlers'];
            }
        }

        if(is_string($callback)) {
            $parts = explode('::', $callback);
            if(is_array($parts)) {
                $classname = array_shift($parts);
                $handler = new $classname;
                
                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if(!$callback) {
            header("HTTP/1.0 404 Not Found");
            if(!empty($this->notFoundError)) {
                $callback = $this->notFoundError;
            }
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }

    public function addNotFoundError($handlers): void {

        $this->notFoundError = $handlers;
    }

    public function get(string $path, $handlers): void {

        $this->addhandlers(self::M_GET, $path, $handlers);
    }

    public function post(string $path, $handlers): void {

        $this->addhandlers(self::M_POST, $path, $handlers);
    }

    private function addhandlers(string $method, string $path, $handlers): void {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handlers' => $handlers,
        ];
    }

}

?>