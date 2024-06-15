<?php

/**
 * Calculate the sum of the digits of an integer.
 */
function sumOfIntegerDigits(int $int): int
{
    $intDigits = str_split((string) $int);
    $digitSum = 0;

    foreach ($intDigits as $intDigit) {
        $digitSum += (int) $intDigit;
    }

    return $digitSum;
}

$int = 62343;
// $int = 1000;
$sum = sumOfIntegerDigits($int);

echo "The sum of the digits of $int is: $sum";
