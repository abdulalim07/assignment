<?php

/**
 * Count word in a file.
 */

function wordCount($string)
{
    $trimmedString = trim($string);

    $wordStore = [];

    $currentWord = "";

    for ($i = 0; $i < strlen($trimmedString); $i++) {
        $char = $trimmedString[$i];

        if (preg_match('/[\s[:punct:]\n\r]/', $char)) {

            if ($currentWord !== "") {
                $wordStore[] = $currentWord;
                $currentWord = "";
            }
        } else {
            $currentWord .= $char;
        }
    }

    if ($currentWord !== "") {
        $wordStore[] = $currentWord;
    }

    $wordCount = count($wordStore);
    return $wordCount;
}

$str = "Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.";

$wordCount = wordCount($str);

// echo $str;
echo "Total Word of above conversion or content is : $wordCount";
echo "\n";
// Solution by built-in-function
echo "Solution by built-in-function str_word_count :" . str_word_count($str);
