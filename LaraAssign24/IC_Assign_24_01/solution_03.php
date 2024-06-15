<?php

function fixed_position_rev_word($string)
{
    $words = explode(' ', $string);
    $reversed_words = [];

    foreach ($words as $word) {
        if (preg_match('/[\s[:punct:]\n\r]/', $word)) { //here I need to work with ('), because when found like this "can't" word, it will not be "t'cant".
            $reversed_words[] = $word;
        } else {
            $reversed_words[] = strrev($word);
        }
    }

    $rev_str = implode(' ', $reversed_words);

    return $rev_str;
}

// $str = "I didn't complete this assignment.";
/** here is a problem with (') when short form like can't*/

$str = 'I love programming';
echo fixed_position_rev_word($str);
