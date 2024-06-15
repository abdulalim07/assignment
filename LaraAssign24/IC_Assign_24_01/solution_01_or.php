<?php

/**
 * Given a list of integers, find the minimum of their absolute values.
 */

function minAbsoluteValue($int_in_str)
{
    $str_to_ints = explode(" ", $int_in_str);
    $min_abs_value = PHP_INT_MAX;

    foreach ($str_to_ints as $integer) {

        // need check positive or negetive value
        $abs_value = abs($integer);
        $abs_value = $integer < 0 ? -$integer : $integer;

        // now check minimum value
        if ($abs_value < $min_abs_value) {
            $min_abs_value = $abs_value;
        }
    }
    return $min_abs_value;
}

echo minAbsoluteValue('12 15 189 22 2 34');
echo "\n";
echo minAbsoluteValue('10 -12 34 12 -3 123');
