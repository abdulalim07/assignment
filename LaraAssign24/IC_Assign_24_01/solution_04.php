<?php

/**
 * Create a triangle pattern.
 */

function triangleShapePrint($n)
{
    for ($i = 0; $i < $n; $i++) {

        $spaces = $n - $i - 1;
        for ($j = 0; $j < $spaces; $j++) {
            echo " ";
        }

        $stars = 2 * $i + 1;
        for ($k = 0; $k < $stars; $k++) {
            echo "*";
        }
        echo "\n";
    }
}

$n = 5;
echo triangleShapePrint($n);
