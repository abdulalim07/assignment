<?php

namespace Config;

class Config
{
    protected static $variables = [];

    public static function load(string $path = __DIR__ . '/../.env')
    {
        $resolvedPath = realpath($path);
        if ($resolvedPath === false) {
            throw new \Exception('Resolved path is false.');
        }
        if (!file_exists($resolvedPath)) {
            throw new \Exception('Environment file not found at: ' . $resolvedPath);
        }

        $lines = file($resolvedPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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
