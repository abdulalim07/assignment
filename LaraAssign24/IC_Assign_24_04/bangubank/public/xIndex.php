<?php
ob_start();

session_start();

use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;

require_once __DIR__ . '/../src/Support/helper.php';

require_once base_path() . '/vendor/autoload.php';

require_once base_path() . '/routes/web.php';

$route = new Route(new Request(), new Response());

$route->resolve();

ob_end_flush();
