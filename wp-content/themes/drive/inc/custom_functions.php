<?php

if (!function_exists('dd')) {
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }
}

function get_template_part_var($template, $data = [])
{
    extract($data);
    require locate_template($template . '.php');
}

function wp_get_current_url()
{
    return home_url($_SERVER['REQUEST_URI']);
}

function getImage($name) : string
{
    return get_template_directory_uri() . '/assets/images/' . $name;
}

function getBgImage($name) : string
{
    $image = getImage($name);
    return 'background-image: url(' . $image . ')';
}

function textLimiter($text, $limit = 40)
{
    $plainText = strip_tags($text);
    return strlen($plainText) > $limit ? mb_strimwidth($plainText, 0, $limit, "...") : $plainText;

}