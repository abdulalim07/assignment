<?php

namespace Src\Support;

use Src\View\View;

class AppHelper
{
    public static function basePath()
    {
        return dirname(__DIR__) . '/../';
    }

    public static function viewPath()
    {
        return self::basePath() . '/views/';
    }

    public static function view($view, $params = [])
    {
        return View::make($view, $params);
    }

    public static function redirect($url, $message = null, $statusCode = 302)
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

    public static function flush()
    {
        $url = strtok($_SERVER['REQUEST_URI'], '?');

        header('Location: ' . $url, true, 302);
        exit();
    }
}
