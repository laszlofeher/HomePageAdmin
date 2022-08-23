<?php

if (!function_exists('leadText')) {

    function leadText($text, $length, $optionalEnd = '') {
        if($length < strlen($text)){
            $point          = strpos($text, '.', $length);
            $question       = strpos($text, '?', $length);
            $exclamation    = strpos($text, '!', $length);
            $sortArray[] = $point;
            $sortArray[] = $question;
            $sortArray[] = $exclamation;
            sort($sortArray);

            if($sortArray[0])
            {
                return substr($text, 0, $sortArray[0]).$optionalEnd;
            }
            else
            {
                $space = strpos($text, ' ', $length);
                return substr($text, 0, $space).$optionalEnd;
            }
        }
        return $text;
    }
}
