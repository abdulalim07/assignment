<?php

namespace Src\Support;

class DataValidation
{
    /**
     * Sanitize the given data.
     *
     * @param string $data
     * @return string
     */
    public static function sanitize(string $data): string
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    /**
     * Dump and die with formatted output.
     *
     * @param mixed $data
     * @return void
     */
    public static function dd(mixed $data): void
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}
