<?php

namespace Config;

class xConfig
{
    protected static $variables = [];

    public static function load(string $path = __DIR__ . '/../.env')
    {
        if (!file_exists($path)) {
            throw new \Exception('Environment file not found.');
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            self::$variables[trim($name)] = trim($value);
        }
    }

    public static function get(string $key, $default = null)
    {
        return self::$variables[$key] ?? $default;
    }
}