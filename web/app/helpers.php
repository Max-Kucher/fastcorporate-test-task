<?php

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, $encoding): string
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
