<?php

namespace App;

use App\Controller;
use Symfony\Component\VarDumper\VarDumper;

class Router extends Controller
{
    protected $routes = [];


    private function addRoute($route, $controller, $action, $method)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
        // dump($this->routes);
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];
        // dump(array_key_exists($uri, $this->routes[$method]));
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            $this->render('/404');
            // throw new \Exception("No route found for URI: $uri");
        }
    }
}
