<?php

use Src\View\View;

if (!function_exists('base_path')) {
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('view_path')) {
    function view_path()
    {
        return base_path() . '/views/';
    }
}

if (!function_exists('view')) {
    function view($view, $params = [])
    {
        return View::make($view, $params);
    }
}

if (!function_exists('redirect')) {
    function redirect($url, $message = null, $statusCode = 302)
    {
        if ($message) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['flash_message'] = $message;
        }

        header('Location: ' . $url, true, $statusCode);
        exit();
    }
}


if (!function_exists('flush')) {
    function flush()
    {
        $url = strtok($_SERVER['REQUEST_URI'], '?');

        header('Location: ' . $url, true, 302);
        exit();
    }
}
