<?php

/**
 * Given a list of integers, find the minimum of their absolute values.
 */

function minAbsoluteValue($int_in_str)
{
    $str_to_ints = explode(" ", $int_in_str);
    $min_value = null;

    foreach ($str_to_ints as $integer) {

        // need check positive or negative value
        if ($integer >= 0) {
            $int_number = $integer;
        } else {
            $int_number = -$integer;
        }

        // now check minimum value
        if ($min_value === null || $int_number < $min_value) {
            $min_value = $int_number;
        }
    }
    return $min_value;
}

echo minAbsoluteValue('12 15 189 22 2 34');
echo "\n";
echo minAbsoluteValue('10 -12 34 12 -3 123');
