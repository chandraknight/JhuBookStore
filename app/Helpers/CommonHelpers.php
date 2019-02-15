<?php

    /**
     * @param $string
     * cleans all the special character along with multiple - and other special characters
     * @return string|string[]|null
     */

if (! function_exists('clean')) {
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
}
