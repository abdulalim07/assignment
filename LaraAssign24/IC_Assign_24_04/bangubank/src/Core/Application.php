<?php

namespace Src\Core;

use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;
use Src\Support\AppHelper;

class Application
{
    protected Route $route;

    public function __construct()
    {
        $this->bootstrap();
    }

    protected function bootstrap()
    {
        ob_start();
        session_start();
        $this->loadHelpers();
        $this->registerRoutes();
    }

    protected function loadHelpers()
    {
        require_once AppHelper::basePath() . '/vendor/autoload.php';
    }

    protected function registerRoutes()
    {
        require_once AppHelper::basePath() . '/routes/web.php';
        $this->route = new Route(new Request(), new Response());
    }

    public function run()
    {
        $this->route->resolve();
        ob_end_flush();
    }
}
