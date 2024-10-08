<?php

namespace Src\Http;

use Src\View\View;

class Route
{
    public $request;
    public $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public static $routes = [];

    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();

        $action = isset(self::$routes[$method][$path]) ? self::$routes[$method][$path] : false;

        if (!array_key_exists($path, self::$routes[$method])) {
            View::makeError('404');
            return;
        }

        if (is_callable($action)) {
            call_user_func_array($action, [$_POST]);
        }

        if (is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];

            call_user_func_array([$controller, $method], [$_POST]);
        }
    }
}